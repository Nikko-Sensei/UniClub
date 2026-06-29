<?php

namespace App\Shared\Core;

use PDO;
use App\Shared\Database\Database;

abstract class Repository
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
}