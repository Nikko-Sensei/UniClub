<?php

namespace App\Payment\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Payment\Application\Services\PaymentService;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;
use App\Membership\Application\Services\MembershipService;
use App\Club\Application\Services\ClubService;
use App\PaymentAccount\Application\Services\PaymentAccountService;


class StudentPaymentController extends BaseController
{


    private PaymentService $paymentService;

    private MembershipService $membershipService;

    private ClubService $clubService;

    private PaymentAccountService $paymentAccountService;


    public function __construct(
        PaymentService $paymentService,
        MembershipService $membershipService,
        ClubService $clubService,
        PaymentAccountService $paymentAccountService
    ) {


        parent::__construct();

        $this->paymentService = $paymentService;

        $this->membershipService = $membershipService;

        $this->clubService = $clubService;

        $this->paymentAccountService = $paymentAccountService;
    }

    /**
     * Payment Form
     */
    public function create(
        int $clubId
    ) {



        $club =
            $this->clubService
            ->getClub(
                $clubId
            );


        if (!$club) {

            throw new \Exception(
                'Club not found.'
            );
        }


        $paymentAccounts =
            $this->paymentAccountService
            ->getAccountsByClub(
                $clubId
            );
        $this->view(

            'Payment/Presentation/Views/student/create',

            [

                'clubId' => $clubId,

                'club' => $club,

                'paymentAccounts' => $paymentAccounts

            ]

        );
    }

    public function store()
    {

    

        $userId =
            $_SESSION['user']['id'];


        $clubId =
            (int)$_POST['club_id'];



        try {


            /*
            Step 1:
            Create membership
            Get membership_id
        */
            $membershipId =
                $this->membershipService
                ->joinClub(

                    $clubId,

                    $userId

                );



            /*
            Step 2:
            Create payment
        */
            $data = [


                'user_id' =>
                $userId,


                'club_id' =>
                $clubId,


                'membership_id' =>
                $membershipId,


                'amount' =>
                $_POST['amount'],


                'payment_method' =>
                $_POST['payment_method'],


                'transaction_number' =>
                $_POST['transaction_number']
                    ?? null,


                'receipt_image' =>
                isset($_FILES['receipt_image'])
                    ?
                    $this->uploadReceipt(
                        $_FILES['receipt_image']
                    )
                    :
                    null

            ];




            $this->paymentService
                ->submitPayment(
                    $data
                );



            Flash::set(

                'success',

                'Payment submitted successfully. Waiting for verification.'

            );
        } catch (\Exception $e) {


            Flash::set(

                'error',

                $e->getMessage()

            );
        }



        return Response::redirect(
            '/payments/history'
        );
    }









    /**
     * Payment History
     */
    public function history()
    {


        $userId =
            $_SESSION['user']['id'];



        $payments =
            $this->paymentService
            ->getStudentPayments(
                $userId
            );





        $this->view(

            'Payment/Presentation/Views/student/history',

            [

                'payments' =>
                $payments

            ]

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

            'Payment/Presentation/Views/student/show',

            [

                'payment' =>
                $payment

            ]

        );
    }

    private function uploadReceipt(
        array $file
    ): ?string {


        if (
            $file['error'] !== UPLOAD_ERR_OK
        ) {

            return null;
        }



        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png'
        ];



        $extension =
            strtolower(
                pathinfo(
                    $file['name'],
                    PATHINFO_EXTENSION
                )
            );



        if (
            !in_array(
                $extension,
                $allowedExtensions
            )
        ) {

            throw new \Exception(
                'Invalid receipt image format.'
            );
        }




        $uploadDirectory =
            'uploads/payments/';



        if (
            !is_dir($uploadDirectory)
        ) {

            mkdir(
                $uploadDirectory,
                0777,
                true
            );
        }



        $filename =
            uniqid('receipt_')
            .
            '.'
            .
            $extension;



        $path =
            $uploadDirectory
            .
            $filename;



        move_uploaded_file(
            $file['tmp_name'],
            $path
        );



        return $path;
    }
}