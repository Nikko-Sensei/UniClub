<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\User\Domain\Entity\User;

$user = new User();

var_dump($user);