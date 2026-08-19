<?php

namespace App\Payment\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Payment\Application\Services\PaymentService;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;


class AdminPaymentController extends BaseController
{


    private PaymentService $paymentService;


    public function __construct(
        PaymentService $paymentService
    ) {


        parent::__construct();

        $this->paymentService = $paymentService;
    }

    /**
     * Payment List
     */
    // public function index()
    // {


    //     $payments =
    //         $this->paymentService
    //         ->getPayments();

    //     $statistics = $this->paymentService->getStatistics();


    //     $this->view(

    //         'Payment/Presentation/Views/admin/index',

    //         [

    //             'title' => 'Payment Management',


    //             'payments' => $payments,

    //             'statistics' => $statistics

    //         ],

    //         'admin'

    //     );
    // }


    /**
     * Payment List
     */
    public function index()
    {
        $page = max(
            1,
            (int) ($_GET['page'] ?? 1)
        );

        $limit = 10;

        $filters = [

            'search' =>
            trim($_GET['search'] ?? ''),

            'status' =>
            $_GET['status'] ?? '',

            'payment_method' =>
            $_GET['payment_method'] ?? ''

        ];

        $result =
            $this->paymentService
            ->getPayments(
                $page,
                $limit,
                $filters
            );

        $statistics =
            $this->paymentService
            ->getStatistics();

        return $this->view(

            'Payment/Presentation/Views/admin/index',

            [

                'title' =>
                'Payment Management',

                'payments' =>
                $result['payments'],

                'filters' =>
                $filters,

                'pagination' =>
                $result['pagination'],

                'statistics' =>
                $statistics

            ],

            'admin'
        );
    }

    /**
     * Payment Detail
     */
    public function show(
        int $id
    ) {


        $payment =
            $this->paymentService
            ->getPayment(
                $id
            );




        $this->view(

            'Payment/Presentation/Views/admin/show',

            [

                'payment' =>
                $payment

            ],

            'admin'

        );
    }

    public function verify(
        int $id
    ) {


        $adminId =
            $_SESSION['user']['id'];



        try {


            /*
            Step 1:
            Verify payment
        */
            $result = $this->paymentService
                ->verifyPayment(

                    $id,

                    $adminId

                );

            /*
            Step 2:
            Get payment information
        */
            $payment =
                $this->paymentService
                ->getPayment(
                    $id
                );



            if (!$payment) {

                throw new \Exception(
                    "Payment not found."
                );
            }
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }




        return Response::redirect(
            '/admin/payments'
        );
    }

    /**
     * Reject Payment
     */
    public function reject(
        int $id
    ) {


        $adminId =
            $_SESSION['user']['id'];

        $reason = $_POST['reason'] ?? null;


        try {


            // $this->paymentService
            //     ->rejectPayment(

            //         $id,

            //         $adminId

            //     );




            if (!$reason) {

                Flash::set(
                    'error',
                    'Rejection reason is required.'
                );

                return Response::redirect(
                    '/admin/payments'
                );
            }


            $this->paymentService
                ->rejectPayment(

                    $id,

                    $adminId,

                    $reason

                );



            Flash::set(

                'success',

                'Payment rejected successfully.'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }





        return Response::redirect(
            '/admin/payments'
        );
    }
}
