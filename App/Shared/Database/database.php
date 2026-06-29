<?php

namespace App\Shared\Database;

use PDO;
use PDOException;

final class Database
{
    private static ?PDO $connection = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$connection !== null) {
            return self::$connection;
        }

        $config = require BASE_PATH .
            '/Config/database.php';

        try {

            $dsn = sprintf(
                'mysql:host=%s;port=%d;dbname=%s;charset=%s',
                $config['host'],
                $config['port'],
                $config['dbname'],
                $config['charset']
            );

            self::$connection = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE =>
                    PDO::ERRMODE_EXCEPTION,

                    PDO::ATTR_DEFAULT_FETCH_MODE =>
                    PDO::FETCH_ASSOC,

                    PDO::ATTR_EMULATE_PREPARES =>
                    false
                ]
            );

            return self::$connection;
        } catch (PDOException $exception) {

            die('Database Connection Failed');
        }
    }
}
