<?php

namespace App\Membership\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Membership\Application\Services\MembershipService;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;


class AdminMembershipController extends BaseController
{


    private MembershipService $membershipService;



    public function __construct(
        MembershipService $membershipService
    ) {

        parent::__construct();


        $this->membershipService =
            $membershipService;
    }



    public function index()
    {


        $memberships =
            $this->membershipService
            ->getPendingMemberships();

        $statistics =
            $this->membershipService
            ->getStatistics();



        $this->view(

            'Membership/Presentation/Views/admin/index',

            [

                'title' => 'Membership Requests',

                'memberships' => $memberships,

                'statistics' => $statistics

            ],

            'admin'

        );
    }

    public function approve(
        int $id
    ) {

        $adminId =
            $_SESSION['user']['id'];


        try {


            $this->membershipService
                ->approveMembership(
                    $id,
                    $adminId
                );


            Flash::set(
                'success',
                'Membership request approved successfully'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }


        return Response::redirect(
            '/admin/memberships'
        );
    }


    public function reject(
        int $id
    ) {

        $adminId =
            $_SESSION['user']['id'];


        try {


            $this->membershipService
                ->rejectMembership(
                    $id,
                    $adminId
                );


            Flash::set(
                'success',
                'Membership request rejected successfully'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }


        return Response::redirect(
            '/admin/memberships'
        );
    }

    public function updateRole()
    {

        $membershipId = (int)$_POST['membership_id'];


        $roleId = (int)$_POST['role_id'];



        $result = $this->membershipService
            ->updateRole(
                $membershipId,
                $roleId
            );



        if ($result) {

            Flash::set(
                'success',
                'Member role updated successfully.'
            );
        } else {

            Flash::set(
                'error',
                'Failed to update role.'
            );
        }



        Response::redirect(
            '/admin/clubs/' . $_POST['club_id']
        );
    }

    public function members(
        int $clubId
    ) {

        $page = (int)(
            $_GET['page'] ?? 1
        );


        $filters = [

            'search' =>
            $_GET['search'] ?? null,


            'role_id' =>
            $_GET['role_id'] ?? null,


            'status' =>
            $_GET['status'] ?? null

        ];


        $data =
            $this->membershipService
            ->getMembersByClub(
                $clubId,
                $filters,
                $page
            );


        $roles =
            $this->membershipService
            ->getRoles();



        $this->view(

            'Membership/Presentation/Views/admin/members',

            [

                'clubId' =>
                $clubId,


                'members' =>
                $data['members'],


                'pagination' =>
                $data['pagination'],


                'filters' =>
                $filters,


                'roles' =>
                $roles

            ],

            'admin'

        );
    }
    public function editRole(
        int $id
    ) {

        $membership =
            $this->membershipService
            ->getMembershipById(
                $id
            );


        $roles =
            $this->membershipService
            ->getRoles();



        $this->view(

            'Membership/Presentation/Views/admin/edit-role',

            [

                'membership' =>
                $membership,


                'roles' =>
                $roles

            ],

            'admin'

        );
    }

    public function remove(
        int $id
    ) {

        try {


            $this->membershipService
                ->removeMember(
                    $id
                );


            Flash::set(
                'success',
                'Member removed successfully.'
            );
        } catch (\Exception $e) {


            Flash::set(
                'error',
                $e->getMessage()
            );
        }


        Response::redirect(
            '/admin/clubs/' . $_POST['club_id'] . '/members'
        );
    }
}