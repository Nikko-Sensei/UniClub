<?php

namespace App\Club\Club\Presentation\Controllers;

use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;

use App\Club\Club\Application\Services\ClubService;
use App\Club\Club\Application\Validators\ClubValidator;
use App\Club\Club\Application\Factories\ClubFactory;

use App\Club\Club\Domain\Exceptions\ClubException;
use App\Master\Application\Services\MasterService;
use Throwable;

class ClubController extends BaseController
{
    public function __construct(
        private ClubService $clubService,
        private ClubValidator $validator,
        private MasterService $masterService
    ) {
        parent::__construct();
    }

    // =========================
    // LIST
    // =========================
    public function index()
    {
        return $this->view(
            'Club/Presentation/Views/index',
            [
                'title' => 'Club Management',
                'clubs' => $this->clubService->getAll(),
                'statistics' => $this->clubService->statistics(),
                'success' => Flash::get('success'),
                'error' => Flash::get('error'),
            ],
            'app'
        );
    }

    // =========================
    // CREATE PAGE
    // =========================
    public function create()
    {
        return $this->view(
            'Club/Presentation/Views/create',
            [
                'title' => 'Create Club',
                'categories' => $this->masterService->getClubCategories(),
                'errors' => $_SESSION['errors'] ?? [],
                'old' => $_SESSION['old'] ?? [],
            ],
            'app'
        );
    }

    // =========================
    // STORE
    // =========================
    public function store()
    {
        $data = $this->request->all();

        if (!$this->validator->validate($data)) {

            $_SESSION['errors'] = $this->validator->errors();
            $_SESSION['old'] = $data;

            return Response::redirect('/clubs/create');
        }

        $dto = ClubFactory::fromArray($data);

        try {
            $this->clubService->create($dto);

            Flash::set('success', 'Club created successfully.');

            return Response::redirect('/clubs');

        } catch (ClubException $e) {

            $_SESSION['errors'] = [
                $e->getField() => $e->getMessage()
            ];

            $_SESSION['old'] = $data;

            return Response::redirect('/clubs');

        } catch (Throwable $e) {

            error_log($e->getMessage());

            Flash::set('error', 'Something went wrong.');

            return Response::redirect('/clubs');
        }
    }

    // =========================
    // EDIT
    // =========================
    public function edit(int $id)
    {
        try {
            $club = $this->clubService->getById($id);
        } catch (ClubException $e) {
            return Response::abort(404, $e->getMessage());
        }

        return $this->view(
            'Club/Presentation/Views/edit',
            [
                'title' => 'Edit Club',
                'club' => $club,
                'categories' => $this->masterService->getClubCategories(),
                'errors' => $_SESSION['errors'] ?? [],
                'old' => $_SESSION['old'] ?? [],
            ],
            'app'
        );
    }

    // =========================
    // UPDATE
    // =========================
    public function update(int $id)
    {
        $data = $this->request->all();

        if (!$this->validator->validate($data)) {

            $_SESSION['errors'] = $this->validator->errors();
            $_SESSION['old'] = $data;

            return Response::redirect("/clubs/edit/$id");
        }

        $dto = ClubFactory::fromArray($data);

        try {
            $this->clubService->update($id, $dto);

            Flash::set('success', 'Club updated successfully.');

            return Response::redirect('/clubs');

        } catch (ClubException $e) {

            $_SESSION['errors'] = [
                $e->getField() => $e->getMessage()
            ];

            $_SESSION['old'] = $data;

            return Response::redirect("/clubs/edit/$id");

        } catch (Throwable $e) {

            error_log($e->getMessage());

            Flash::set('error', 'Unable to update club.');

            return Response::redirect("/clubs/edit/$id");
        }
    }

    // =========================
    // DELETE
    // =========================
    public function destroy(int $id)
    {
        try {
            $this->clubService->delete($id);
            Flash::set('success', 'Club deleted successfully.');
        } catch (ClubException $e) {
            Flash::set('error', $e->getMessage());
        } catch (Throwable $e) {
            error_log($e->getMessage());
            Flash::set('error', 'Unable to delete club.');
        }

        return Response::redirect('/clubs');
    }

    // =========================
    // SHOW
    // =========================
    public function show(int $id)
    {
        try {
            $club = $this->clubService->getById($id);
        } catch (ClubException $e) {
            return Response::abort(404, $e->getMessage());
        }

        return $this->view(
            'Club/Presentation/Views/show',
            [
                'title' => 'Club Details',
                'club' => $club
            ],
            'app'
        );
    }
}