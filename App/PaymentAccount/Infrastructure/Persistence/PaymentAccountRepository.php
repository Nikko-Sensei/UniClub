<?php

namespace App\PaymentAccount\Infrastructure\Persistence;


use App\PaymentAccount\Domain\Entities\PaymentAccount;
use App\PaymentAccount\Domain\Repository\PaymentAccountRepositoryInterface;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use PDO;



class PaymentAccountRepository
extends BaseRepository
implements PaymentAccountRepositoryInterface
{


    public function __construct()
    {

        parent::__construct(
            Database::getConnection()
        );

    }





    /**
     * Create Payment Account
     */
    public function create(
        PaymentAccount $account
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_create(?,?,?,?,?,?,?)"

        );



        $stmt->execute([


            $account->getClubId(),

            $account->getPaymentMethod(),

            $account->getAccountName(),

            $account->getAccountNumber(),

            $account->getQrImage(),

            $account->getDescription(),

            $account->getCreatedBy()


        ]);



        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );


        $stmt->closeCursor();



        return isset($result['affected'])
            && $result['affected'] > 0;

    }








    /**
     * Update Payment Account
     */
    public function update(
        PaymentAccount $account
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_update(?,?,?,?,?,?,?)"

        );



        $stmt->execute([


            $account->getId(),

            $account->getPaymentMethod(),

            $account->getAccountName(),

            $account->getAccountNumber(),

            $account->getQrImage(),

            $account->getDescription(),

            $account->getStatus()


        ]);



        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );


        $stmt->closeCursor();



        return isset($result['affected'])
            && $result['affected'] > 0;

    }








    /**
     * Delete Payment Account
     */
    public function delete(
        int $id
    ): bool {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_delete(?)"

        );



        $stmt->execute([

            $id

        ]);



        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );


        $stmt->closeCursor();



        return isset($result['affected'])
            && $result['affected'] > 0;

    }








    /**
     * Find Payment Account By ID
     */
    public function findById(
        int $id
    ): ?PaymentAccount {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_find_by_id(?)"

        );



        $stmt->execute([

            $id

        ]);



        $row = $stmt->fetch(
            PDO::FETCH_ASSOC
        );


        $stmt->closeCursor();



        if(!$row){

            return null;

        }



        return $this->mapToEntity($row);

    }








    /**
     * Find All Payment Accounts
     */
    public function findAll(): array
    {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_find_all()"

        );



        $stmt->execute();



        $accounts = [];



        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


            $accounts[] = $this->mapToEntity($row);


        }



        $stmt->closeCursor();



        return $accounts;

    }








    /**
     * Find Active Payment Accounts By Club
     */
    public function findByClub(
        int $clubId
    ): array {


        $stmt = $this->db->prepare(

            "CALL sp_payment_account_find_by_club(?)"

        );



        $stmt->execute([

            $clubId

        ]);



        $accounts = [];



        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


            $accounts[] = $this->mapToEntity($row);


        }



        $stmt->closeCursor();



        return $accounts;

    }








    /**
     * Convert Database Row To Entity
     */
    private function mapToEntity(
        array $row
    ): PaymentAccount {


        return new PaymentAccount(


            id: (int)$row['id'],

            clubId: $row['club_id'] 
                ? (int)$row['club_id'] 
                : null,

            paymentMethod: $row['payment_method'],

            accountName: $row['account_name'],

            accountNumber: $row['account_number'],

            qrImage: $row['qr_image'],

            description: $row['description'],

            status: $row['status'],

            createdBy: (int)$row['created_by'],

            createdAt: $row['created_at'],

            updatedAt: $row['updated_at']

        );

    }


}