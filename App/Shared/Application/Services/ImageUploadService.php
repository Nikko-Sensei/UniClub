<?php

namespace App\Shared\Application\Services;


class ImageUploadService
{

    public function upload(
        array $file,
        string $folder
    ): ?string {

        if (
            !isset($file['tmp_name']) ||
            $file['error'] !== UPLOAD_ERR_OK
        ) {
            return null;
        }


        $uploadDir =
            __DIR__
            . '/../../../../public/uploads/'
            . $folder
            . '/';


        if (!is_dir($uploadDir)) {

            mkdir(
                $uploadDir,
                0777,
                true
            );
        }


        $extension = strtolower(
            pathinfo(
                $file['name'],
                PATHINFO_EXTENSION
            )
        );


        $filename =
            uniqid()
            . '.'
            . $extension;


        move_uploaded_file(
            $file['tmp_name'],
            $uploadDir . $filename
        );


        return $filename;
    }
}