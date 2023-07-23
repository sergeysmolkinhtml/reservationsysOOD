<?php

namespace App\Database;

use App\Config;
use PDO;
use PDOException;


final class MySQLDatabase extends DatabaseCore
{

    protected function __construct()
    {
        parent::__construct();
        try {
            parent::$connection = new PDO('mysql:host=reserv;dbname=reservDB',
                Config::get('mysql.host'),
                '');
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
    }



}