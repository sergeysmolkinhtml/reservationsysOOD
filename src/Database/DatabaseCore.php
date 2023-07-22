<?php

namespace App\Database;

use PDO;

abstract class DatabaseCore implements DatabaseInterface
{
    protected static ?PDO $connection = null;

    public static function getInstance() : ?PDO
    {
        if(self::$connection === null) {
            self::$connection === new class() {}; #TODo
        }
        return self::$connection;
    }

    public function connect($host, $database, $username, $password)
    {
        // TODO: Implement connect() method.
    }

    public function query($statement, array $params = [])
    {
        // TODO: Implement query() method.
    }


}