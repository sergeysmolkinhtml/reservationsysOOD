<?php

namespace App\Database;

use AllowDynamicProperties;
use App\Config;
use PDO;
use PDOException;


#[AllowDynamicProperties]
final class MySQLDatabase extends DatabaseCore
{

    protected function __construct()
    {
        parent::__construct();
        try {
            parent::$connection = new PDO('mysql:host=reserv;dbname=reservDB', 'root', '');
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
    }



}