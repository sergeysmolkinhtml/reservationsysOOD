<?php

declare(strict_types = 1);

use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'],
];

$conn = DriverManager::getConnection($connectionParams);
$stmt = $conn->prepare("SELECT * FROM reservDB.hotels");
$result = $stmt->executeQuery();

var_dump($result->fetchAllAssociative());
