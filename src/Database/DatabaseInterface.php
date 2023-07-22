<?php

namespace App\Database;

interface DatabaseInterface
{
    public function connect($host, $database, $username, $password);
    public function query($statement, array $params = []);
}