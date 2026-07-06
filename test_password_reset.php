<?php

require "vendor/autoload.php";


use App\Auth\Domain\Entity\PasswordResetToken;
use App\Auth\Infrastructure\Persistence\PasswordResetRepository;
use App\Shared\Database\Database;


$db = Database::getConnection();


$repo = new PasswordResetRepository($db);



$token = new PasswordResetToken(

    null,

    1,

    bin2hex(random_bytes(32)),

    date(
        'Y-m-d H:i:s',
        strtotime('+30 minutes')
    )

);



$result = $repo->create($token);



var_dump($result);