<?php

namespace App\PaymentAccount\Presentation\Controllers;


use App\Shared\Core\BaseController;
use App\Shared\Core\Response;
use App\Shared\Helpers\Flash;

use App\PaymentAccount\Application\Services\PaymentAccountService;
use App\PaymentAccount\Domain\Entities\PaymentAccount;



class AdminPaymentAccountController extends BaseController
{


    private PaymentAccountService $paymentAccountService;



    public function __construct(
        PaymentAccountService $paymentAccountService
    ) {

        parent::__construct();


        $this->paymentAccountService =
            $paymentAccountService;

    }





    /**
     * Payment Account List
     */
    public function index()
    {


        $accounts =
            $this->paymentAccountService
            ->getAccounts();



        $this->view(

            'PaymentAccount/Presentation/Views/admin/index',

            [

                'title' => 'Manage Payment Accounts',

                'accounts' => $accounts

            ],

            'admin'

        );

    }







    /**
     * Create Page
     */
    public function create()
    {


        $this->view(

            'PaymentAccount/Presentation/Views/admin/create',

            [

                'title' => 'Create Payment Account'

            ],

            'admin'

        );

    }








    /**
     * Store Payment Account
     */
    public function store()
    {


        try {


            $qrImage =
                $this->uploadQrImage();



            $account = new PaymentAccount(

                null,


                !empty($_POST['club_id'])
                    ? (int) $_POST['club_id']
                    : null,


                $_POST['payment_method'],


                $_POST['account_name'],


                $_POST['account_number']
                    ?? null,


                $qrImage,


                $_POST['description']
                    ?? null,


                $_POST['status']
                    ?? 'active',


                (int) $_SESSION['user']['id'],


                null,


                null

            );



            $this->paymentAccountService
                ->create(
                    $account
                );



            Flash::set(

                'success',

                'Payment account created successfully.'

            );


        } catch(\Exception $e){


            Flash::set(

                'error',

                $e->getMessage()

            );

        }



        return Response::redirect(

            '/admin/payment-accounts'

        );

    }










    /**
     * Edit Page
     */
    public function edit(
        int $id
    )
    {


        $account =
            $this->paymentAccountService
            ->getAccount(
                $id
            );



        if(!$account){


            Flash::set(

                'error',

                'Payment account not found.'

            );


            return Response::redirect(

                '/admin/payment-accounts'

            );

        }




        $this->view(

            'PaymentAccount/Presentation/Views/admin/edit',

            [

                'title' => 'Edit Payment Account',

                'account' => $account

            ],

            'admin'

        );

    }









    /**
     * Update Payment Account
     */
    public function update(
        int $id
    )
    {


        try {


            $oldAccount =
                $this->paymentAccountService
                ->getAccount(
                    $id
                );



            if(!$oldAccount){

                throw new \Exception(
                    'Payment account not found.'
                );

            }




            $qrImage =
                $oldAccount->getQrImage();



            $newImage =
                $this->uploadQrImage();



            if($newImage){

                $qrImage = $newImage;

            }




            $account = new PaymentAccount(


                $id,


                !empty($_POST['club_id'])
                    ? (int) $_POST['club_id']
                    : null,


                $_POST['payment_method'],


                $_POST['account_name'],


                $_POST['account_number']
                    ?? null,


                $qrImage,


                $_POST['description']
                    ?? null,


                $_POST['status']
                    ?? 'active',


                $oldAccount->getCreatedBy(),


                $oldAccount->getCreatedAt(),


                $oldAccount->getUpdatedAt()

            );




            $this->paymentAccountService
                ->update(
                    $account
                );



            Flash::set(

                'success',

                'Payment account updated successfully.'

            );


        } catch(\Exception $e){


            Flash::set(

                'error',

                $e->getMessage()

            );

        }





        return Response::redirect(

            '/admin/payment-accounts'

        );

    }










    /**
     * Delete Payment Account
     */
    public function delete(
        int $id
    )
    {


        try {


            $this->paymentAccountService
                ->delete(
                    $id
                );



            Flash::set(

                'success',

                'Payment account deleted successfully.'

            );


        } catch(\Exception $e){


            Flash::set(

                'error',

                $e->getMessage()

            );

        }




        return Response::redirect(

            '/admin/payment-accounts'

        );

    }








    /**
     * Upload QR Image
     */
    private function uploadQrImage(): ?string
    {


        if(

            !isset($_FILES['qr_image'])

            ||

            $_FILES['qr_image']['error']
            !== UPLOAD_ERR_OK

        ){

            return null;

        }



        $allowed = [

            'jpg',
            'jpeg',
            'png',
            'webp'

        ];



        $extension =
            strtolower(
                pathinfo(

                    $_FILES['qr_image']['name'],

                    PATHINFO_EXTENSION

                )
            );



        if(!in_array($extension,$allowed)){


            throw new \Exception(
                'Invalid QR image format.'
            );

        }




        $folder =
            'uploads/payment_accounts';




        if(!is_dir($folder)){


            mkdir(

                $folder,

                0777,

                true

            );

        }




        $filename =
            uniqid()
            . '.'
            . $extension;



        $path =
            $folder
            . '/'
            . $filename;




        move_uploaded_file(

            $_FILES['qr_image']['tmp_name'],

            $path

        );



        return $path;

    }


}