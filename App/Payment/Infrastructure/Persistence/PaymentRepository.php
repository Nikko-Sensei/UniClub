<?php

namespace App\Payment\Infrastructure\Persistence;


use App\Payment\Domain\Repository\PaymentRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use PDO;



class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(
            Database::getConnection()
        );
    }



    /**
     * Create Payment
     */
    public function create(
        int $userId,
        int $clubId,
        ?int $membershipId,
        float $amount,
        string $paymentMethod,
        ?string $transactionNumber,
        ?string $receiptImage
    ): int {


        $stmt = $this->db->prepare(

            "CALL sp_payment_create(
                :user_id,
                :club_id,
                :membership_id,
                :amount,
                :payment_method,
                :transaction_number,
                :receipt_image
            )"

        );


        $stmt->execute([

            'user_id' =>
            $userId,

            'club_id' =>
            $clubId,

            'membership_id' =>
            $membershipId,

            'amount' =>
            $amount,

            'payment_method' =>
            $paymentMethod,

            'transaction_number' =>
            $transactionNumber,

            'receipt_image' =>
            $receiptImage

        ]);



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return (int)(
            $result['payment_id'] ?? 0
        );
    }






    /**
     * Find Payment By ID
     */
    public function getById(
        int $id
    ): ?array {


        $stmt = $this->db->prepare(

            "CALL sp_payment_find_by_id(
                :id
            )"

        );


        $stmt->execute([

            'id' =>
            $id

        ]);



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return $result ?: null;
    }







    /**
     * Student Payment History
     */
    public function getByUser(
        int $userId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_payment_find_by_user(
                :user_id
            )"

        );


        $stmt->execute([

            'user_id' =>
            $userId

        ]);



        $payments =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return $payments;
    }







    /**
     * Check Existing Pending Payment
     */
    public function existsPending(
        int $userId,
        int $clubId
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_payment_exists_pending(
                :user_id,
                :club_id
            )"

        );


        $stmt->execute([

            'user_id' =>
            $userId,

            'club_id' =>
            $clubId

        ]);



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return (int)(
            $result['total'] ?? 0
        ) > 0;
    }


    public function getStatistics(): array
    {
        $stmt = $this->db->prepare(
            "CALL sp_payment_statistics()"
        );

        $stmt->execute();

        $statistics = $stmt->fetch(\PDO::FETCH_ASSOC);

        while ($stmt->nextRowset()) {
            // Consume remaining result sets
        }

        return [
            'pending_count' => (int) ($statistics['pending_count'] ?? 0),

            'verified_count' => (int) ($statistics['verified_count'] ?? 0),

            'rejected_count' => (int) ($statistics['rejected_count'] ?? 0),

            'verified_amount' => (float) ($statistics['verified_amount'] ?? 0),
        ];
    }





    /**
     * Get All Payments
     * Admin Payment Management
     */
    // public function getAll(): array
    // {


    //     $stmt = $this->db->prepare(

    //         "CALL sp_payment_find_all()"

    //     );


    //     $stmt->execute();



    //     $payments =
    //         $stmt->fetchAll(
    //             PDO::FETCH_ASSOC
    //         );


    //     $stmt->closeCursor();



    //     return $payments;
    // }



    /**
     * Get All Payments
     * Admin Payment Management
     */
    public function getAll(
        int $limit,
        int $offset,
        array $filters
    ): array {

        $search =
            trim(
                $filters['search'] ?? ''
            );

        $status =
            trim(
                $filters['status'] ?? ''
            );

        $paymentMethod =
            trim(
                $filters['payment_method'] ?? ''
            );


        $stmt = $this->db->prepare(

            "CALL sp_payment_find_all(
            :search,
            :status,
            :payment_method,
            :limit,
            :offset
        )"

        );


        $stmt->execute([

            'search' =>
            $search,

            'status' =>
            $status,

            'payment_method' =>
            $paymentMethod,

            'limit' =>
            $limit,

            'offset' =>
            $offset

        ]);


        $payments =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return $payments;
    }


    /**
     * Count Payments
     * Used for pagination
     */
    public function countAll(
        array $filters
    ): int {

        $search =
            trim(
                $filters['search'] ?? ''
            );

        $status =
            trim(
                $filters['status'] ?? ''
            );

        $paymentMethod =
            trim(
                $filters['payment_method'] ?? ''
            );


        $stmt = $this->db->prepare(

            "CALL sp_payment_count_all(
            :search,
            :status,
            :payment_method
        )"

        );


        $stmt->execute([

            'search' =>
            $search,

            'status' =>
            $status,

            'payment_method' =>
            $paymentMethod

        ]);


        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return (int) (
            $result['total'] ?? 0
        );
    }




    /**
     * Verify Payment
     */
    public function verify(
        int $paymentId,
        int $adminId
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_payment_verify(
                :payment_id,
                :admin_id
            )"

        );


        $stmt->execute([

            'payment_id' =>
            $paymentId,

            'admin_id' =>
            $adminId

        ]);



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return (int)(
            $result['affected'] ?? 0
        ) > 0;
    }








    /**
     * Reject Payment
     */
    // public function reject(
    //     int $paymentId,
    //     int $adminId,
    //     string $reason
    // ): bool {


    //     $stmt = $this->db->prepare(

    //         "CALL sp_payment_reject(
    //             :payment_id,
    //             :admin_id,
    //             :reason
    //         )"

    //     );



    //     $stmt->execute([

    //         'payment_id' =>
    //         $paymentId,

    //         'admin_id' =>
    //         $adminId

    //         'reason' =>
    // $reason

    //     ]);



    //     $result =
    //         $stmt->fetch(
    //             PDO::FETCH_ASSOC
    //         );


    //     $stmt->closeCursor();



    //     return (int)(
    //         $result['affected'] ?? 0
    //     ) > 0;
    // }



    public function reject(
        int $paymentId,
        int $adminId,
        string $reason
    ): bool {



        $stmt = $this->db->prepare(

            "CALL sp_payment_reject(
            :payment_id,
            :admin_id,
            :reason
        )"

        );


        $stmt->execute([

            'payment_id' =>
            $paymentId,

            'admin_id' =>
            $adminId,

            'reason' =>
            $reason

        ]);


        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();


        return (int)(
            $result['affected'] ?? 0
        ) > 0;
    }






    /**
     * Get Payments By Club
     */
    public function getByClub(
        int $clubId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_payment_find_by_club(
                :club_id
            )"

        );



        $stmt->execute([

            'club_id' =>
            $clubId

        ]);



        $payments =
            $stmt->fetchAll(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return $payments;
    }






    /**
     * Count Pending Payments
     */
    public function getPendingCount(): int
    {


        $stmt = $this->db->prepare(

            "CALL sp_payment_pending_count()"

        );


        $stmt->execute();



        $result =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );


        $stmt->closeCursor();



        return (int)(
            $result['total'] ?? 0
        );
    }
}
