<?php

namespace App\Database;

use AllowDynamicProperties;
use App\Config;
use PDO;
use PDOException;


#[AllowDynamicProperties]
final class MySQLDatabase extends DatabaseCore
{
    protected static ?PDO $connection;

    public function __construct()
    {
        try {
            self::$connection = new PDO('mysql:host=reserv;dbname=reservDB', 'root', '');
        } catch (PDOException $exception){
            die($exception->getMessage());
        }

    }

    public function getConnection() : ?PDO
    {
        return self::$connection;
    }


}