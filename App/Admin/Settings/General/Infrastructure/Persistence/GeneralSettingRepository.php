<?php

namespace App\Admin\Settings\General\Infrastructure\Persistence;


use App\Shared\Infrastructure\Persistence\BaseRepository;
use App\Shared\Database\Database;
use App\Admin\Settings\General\Domain\Entities\GeneralSetting;
use App\Admin\Settings\General\Domain\Repository\GeneralSettingRepositoryInterface;



class GeneralSettingRepository
    extends BaseRepository
    implements GeneralSettingRepositoryInterface
{


    public function __construct()
    {
        parent::__construct(
            Database::getConnection()
        );
    }



    public function find(): ?GeneralSetting
    {

        $stmt =
            $this->db->prepare(
                "CALL sp_general_setting_find()"
            );


        $stmt->execute();


        $row =
            $stmt->fetch();


        $stmt->closeCursor();


        if (!$row) {

            return null;

        }


        return $this->mapToEntity(
            $row
        );

    }




    public function update(
        array $data
    ): bool {


        $stmt =
            $this->db->prepare(
                "CALL sp_general_setting_update(?,?,?,?,?,?,?,?)"
            );


        $result =
            $stmt->execute([

                $data['site_name'],

                $data['university_name'],

                $data['address'],

                $data['email'],

                $data['phone'],

                $data['logo'],

                $data['favicon'],

                $data['timezone']

            ]);


        $stmt->closeCursor();


        return $result;

    }




    private function mapToEntity(
        array $row
    ): GeneralSetting {


        return new GeneralSetting(

            (int)$row['id'],

            $row['site_name'],

            $row['university_name'],

            $row['address'],

            $row['email'],

            $row['phone'],

            $row['logo'],

            $row['favicon'],

            $row['timezone']

        );

    }


}