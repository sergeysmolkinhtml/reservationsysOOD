<?php


use App\Database\MySQLDatabase;

require_once '../vendor/autoload.php';

$database = MySQLDatabase::getInstance();
$database2 = MySQLDatabase::getInstance();
$database3 = (new MySQLDatabase())->getConnection();

var_dump($database3);
var_dump($database);
var_dump($database2);
