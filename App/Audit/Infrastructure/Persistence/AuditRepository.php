<?php

namespace App\Audit\Infrastructure\Persistence;


use App\Audit\Domain\Repository\AuditRepositoryInterface;
use App\Shared\Database\Database;
use App\Shared\Infrastructure\Persistence\BaseRepository;


class AuditRepository extends BaseRepository implements AuditRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function findAll(
        int $limit,
        int $offset,
        array $filters = []
    ): array {


        $where = [];

        $params = [];



        /*
        |--------------------------------------------------------------------------
        | Search Filter
        |--------------------------------------------------------------------------
        */

        if (
            !empty($filters['search'])
        ) {


            $where[] = "

                (
                    a.action LIKE :action_search

                    OR

                    a.entity LIKE :entity_search

                    OR

                    u.name LIKE :user_search

                )

            ";


            $search =
                "%" .
                $filters['search'] .
                "%";


            $params['action_search'] =
                $search;


            $params['entity_search'] =
                $search;


            $params['user_search'] =
                $search;

        }




        /*
        |--------------------------------------------------------------------------
        | Action Filter
        |--------------------------------------------------------------------------
        */

        if (
            !empty($filters['action'])
        ) {


            $where[] =
                "a.action = :action";


            $params['action'] =
                $filters['action'];

        }





        /*
        |--------------------------------------------------------------------------
        | Query
        |--------------------------------------------------------------------------
        */

        $sql = "

            SELECT

                a.*,

                u.name AS user_name,

                u.profile_image AS user_profile_image


            FROM audit_logs a


            LEFT JOIN users u

                ON u.id = a.user_id

        ";




        if (!empty($where)) {


            $sql .= "

                WHERE

            " .
            implode(
                " AND ",
                $where
            );

        }




        $sql .= "

            ORDER BY

                a.created_at DESC


            LIMIT :limit

            OFFSET :offset

        ";





        $statement =
            $this->db->prepare($sql);





        foreach (
            $params as $key => $value
        ) {


            $statement->bindValue(
                ":" . $key,
                $value,
                \PDO::PARAM_STR
            );

        }





        $statement->bindValue(
            ':limit',
            $limit,
            \PDO::PARAM_INT
        );



        $statement->bindValue(
            ':offset',
            $offset,
            \PDO::PARAM_INT
        );





        $statement->execute();




        return $statement->fetchAll(
            \PDO::FETCH_ASSOC
        );

    }







    public function count(
        array $filters = []
    ): int {


        $where = [];

        $params = [];





        /*
        |--------------------------------------------------------------------------
        | Search Filter
        |--------------------------------------------------------------------------
        */

        if (
            !empty($filters['search'])
        ) {


            $where[] = "

                (
                    a.action LIKE :action_search

                    OR

                    a.entity LIKE :entity_search

                    OR

                    u.name LIKE :user_search

                )

            ";



            $search =
                "%" .
                $filters['search'] .
                "%";



            $params['action_search'] =
                $search;


            $params['entity_search'] =
                $search;


            $params['user_search'] =
                $search;

        }






        /*
        |--------------------------------------------------------------------------
        | Action Filter
        |--------------------------------------------------------------------------
        */

        if (
            !empty($filters['action'])
        ) {


            $where[] =
                "a.action = :action";


            $params['action'] =
                $filters['action'];

        }







        /*
        |--------------------------------------------------------------------------
        | Count Query
        |--------------------------------------------------------------------------
        */

        $sql = "

            SELECT COUNT(*)


            FROM audit_logs a


            LEFT JOIN users u

                ON u.id = a.user_id

        ";






        if (!empty($where)) {


            $sql .= "

                WHERE

            " .
            implode(
                " AND ",
                $where
            );

        }






        $statement =
            $this->db->prepare($sql);






        foreach (
            $params as $key => $value
        ) {


            $statement->bindValue(
                ":" . $key,
                $value,
                \PDO::PARAM_STR
            );

        }






        $statement->execute();





        return (int)
            $statement->fetchColumn();

    }

}