<?php

namespace App\Payment\Application\Services;


use App\Payment\Domain\Repository\PaymentRepositoryInterface;
use App\Payment\Application\Validators\PaymentValidator;
use App\Notification\Application\Services\NotificationService;
use App\User\Application\Services\UserService;
use App\Shared\Logging\AuditLogger;
use App\Shared\Logging\AuditAction;


class PaymentService
{


    private PaymentRepositoryInterface $repository;
    private PaymentValidator $validator;
    private NotificationService $notificationService;
    private UserService $userService;
    private AuditLogger $auditLogger;

    public function __construct(
        PaymentRepositoryInterface $repository,
        PaymentValidator $validator,
        NotificationService $notificationService,
        UserService $userService,
        AuditLogger $auditLogger
    ) {

        $this->repository = $repository;

        $this->validator = $validator;

        $this->notificationService = $notificationService;

        $this->userService = $userService;

        $this->auditLogger = $auditLogger;
    }

    /**
     * Student Submit Payment
     */
    public function submitPayment(
        array $data
    ): ?int {


        $errors =
            $this->validator
            ->validateCreate(
                $data
            );



        if (!empty($errors)) {

            throw new \Exception(
                implode(
                    ', ',
                    $errors
                )
            );
        }

        /**
         * Prevent duplicate pending payment
         */
        $exists =
            $this->repository
            ->existsPending(

                $data['user_id'],

                $data['club_id']

            );


        if ($exists) {

            return false;
        }






        $paymentId = $this->repository
            ->create(

                $data['user_id'],

                $data['club_id'],

                $data['membership_id'] ?? null,

                $data['amount'],

                $data['payment_method'],

                $data['transaction_number'] ?? null,

                $data['receipt_image'] ?? null

            );

        if (!$paymentId) {
            return false;
        }

        $this->auditLogger->log(
            AuditAction::PAYMENT_CREATE,
            $data['user_id'],
            'Payment',
            $data['club_id'],
            [
                'amount' => $data['amount']
            ]
        );

        $student =
            $this->userService
            ->findById(
                $data['user_id']
            );


        $studentName =
            $student
            ? $student->getName()
            : 'A student';



        $admins =
            $this->userService
            ->getAdmins();



        foreach ($admins as $admin) {

            $this->notificationService->create(

                $admin->getId(),

                'New Payment Request',

                "{$studentName} submitted a payment.",

                'payment_request',

                'payment',

                $paymentId

            );
        }

        return $paymentId;
    }


    /**
     * Get Payment Detail
     */
    public function getPayment(
        int $id
    ): ?array {


        return $this->repository
            ->getById(
                $id
            );
    }
    /**
     * Get Student Payments
     */
    public function getStudentPayments(
        int $userId
    ): array {


        return $this->repository
            ->getByUser(
                $userId
            );
    }

    public function getStatistics(): array
    {
        return $this->repository->getStatistics();
    }

    /**
     * Get Admin Payments
     */
    // public function getPayments(): array
    // {


    //     return $this->repository
    //         ->getAll();
    // }


    /**
     * Get Admin Payments
     */
    public function getPayments(
        int $page,
        int $limit,
        array $filters = []
    ): array {

        $page = max(
            1,
            $page
        );

        $limit = max(
            1,
            min($limit, 100)
        );

        $offset =
            ($page - 1) * $limit;


        $payments =
            $this->repository
            ->getAll(
                $limit,
                $offset,
                $filters
            );


        $total =
            $this->repository
            ->countAll(
                $filters
            );


        $totalPages =
            max(
                1,
                (int) ceil(
                    $total / $limit
                )
            );


        return [

            'payments' =>
            $payments,

            'pagination' => [

                'current_page' =>
                $page,

                'per_page' =>
                $limit,

                'total' =>
                $total,

                'total_pages' =>
                $totalPages,

                'from' =>
                $total > 0
                    ? $offset + 1
                    : 0,

                'to' =>
                min(
                    $offset + $limit,
                    $total
                )

            ]

        ];
    }

    /**
     * Verify Payment
     */ public function verifyPayment(
        int $paymentId,
        int $adminId
    ): bool {


        $payment =
            $this->repository
            ->getById(
                $paymentId
            );



        if (!$payment) {

            throw new \Exception(
                'Payment not found.'
            );
        }



        $verified =
            $this->repository
            ->verify(

                $paymentId,

                $adminId

            );



        if (!$verified) {

            throw new \Exception(
                'Payment verification failed.'
            );
        }

        $this->notificationService->create(

            $payment['user_id'],

            'Payment Approved',

            'Your payment has been verified. Membership approved.',

            'payment',

            $paymentId
        );

        $this->auditLogger->log(

            AuditAction::PAYMENT_VERIFY,

            $adminId,

            'Payment',

            $paymentId,

            [
                'student_id' => $payment['user_id']
            ]
        );

        return true;
    }

    // /**
    //  * Reject Payment
    //  */
    // public function rejectPayment(
    //     int $paymentId,
    //     int $adminId
    // ): bool {

       
    //     return $this->repository
    //         ->reject(

    //             $paymentId,

    //             $adminId

    //         );
    // }

    /**
     * Reject Payment
     */
    public function rejectPayment(
        int $paymentId,
        int $adminId,
        string $reason
    ): bool {


        /*
        Step 1:
        Get payment information
    */
        $payment =
            $this->repository
            ->getById(
                $paymentId
            );


        if (!$payment) {

            throw new \Exception(
                'Payment not found.'
            );
        }
        /*
        Step 2:
        Reject payment
    */

        //$reason = 'Invalid payment receipt';


        $rejected =
            $this->repository
            ->reject(

                $paymentId,

                $adminId,
                $reason

            );



        if (!$rejected) {

            throw new \Exception(
                'Payment rejection failed.'
            );
        }




        /*
        Step 3:
        Notify student
    */
        $this->notificationService
            ->create(

                $payment['user_id'],

                'Payment Rejected',

                "Your payment request has been rejected. Reason: {$reason}",

                'payment_rejected',

                'payment',

                $paymentId

            );
        /*
        Step 4:
        Audit Log
    */
        $this->auditLogger
            ->log(

                AuditAction::PAYMENT_REJECT,

                $adminId,

                'Payment',

                $paymentId,

                [
                    'action' =>
                    'Admin rejected payment'
                ]

            );



        return true;
    }

    /**
     * Create Membership Payment
     */
    public function createMembershipPayment(
        int $userId,
        int $clubId,
        float $amount
    ): bool {


        return $this->repository
            ->create(

                $userId,

                $clubId,

                null,

                $amount,

                'bank_transfer',

                null,

                null

            );
    }








    /**
     * Get Club Payments
     */
    public function getClubPayments(
        int $clubId
    ): array {


        return $this->repository
            ->getByClub(
                $clubId
            );
    }









    /**
     * Pending Payment Count
     */
    public function getPendingPaymentCount(): int
    {


        return $this->repository
            ->getPendingCount();
    }
}
