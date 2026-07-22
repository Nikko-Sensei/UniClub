<?php

namespace App\Audit\Application\Services;

use App\Admin\UserManagement\Domain\Repository\UserManagementRepositoryInterface;
use App\Audit\Domain\Repository\AuditRepositoryInterface;


class AuditService
{

    private AuditRepositoryInterface $repository;
    



    public function __construct(
        AuditRepositoryInterface $repository
        
    ){

        $this->repository = $repository;

        

    }



    public function getLogs(
        int $page,
        array $filters = []
    ): array {


        $limit = 20;


        $offset =
            ($page - 1)
            * $limit;



        $logs =
            $this->repository
            ->findAll(
                $limit,
                $offset,
                $filters
            );



        $total =
            $this->repository
            ->count(
                $filters
            );



        return [

            'logs'=>$logs,


            'pagination'=>[

                'current_page'=>$page,

                'per_page'=>$limit,

                'total'=>$total,

                'total_pages'=>
                    ceil(
                        $total/$limit
                    )

            ]

        ];

    }

}