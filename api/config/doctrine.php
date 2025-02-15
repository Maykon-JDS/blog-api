<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$driver = [
    'mysql' => 'pdo_mysql',
];

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [ROOT_PATH . '/Entities'],
    isDevMode: true,
);
// or if you prefer XML
// $config = ORMSetup::createXMLMetadataConfiguration(
//    paths: [__DIR__ . '/config/xml'],
//    isDevMode: true,
//);

// configuring the database connection
$connection = DriverManager::getConnection([
    'driver' => $driver[$_ENV['DB_DRIVER']],
    'host'     => $_ENV['DB_HOST'],
    'user'     => $_ENV['DB_USERNAME'],
    'port'     => $_ENV['DB_PORT'],
    'password' => $_ENV['DB_PASSWORD'],
    'dbname'   => $_ENV['DB_DATABASE']
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);