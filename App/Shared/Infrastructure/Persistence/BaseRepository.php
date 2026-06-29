<?php

namespace App\Shared\Infrastructure\Persistence;

use PDO;

abstract class BaseRepository
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}