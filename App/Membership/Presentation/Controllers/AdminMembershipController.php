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
}