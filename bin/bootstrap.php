<?php
session_start();

require_once __DIR__ .'\..\vendor\autoload.php';
require_once __DIR__ . '\..\model\Article.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."\..\\");
$dotenv->load();


function getEntityManager(): EntityManager
{
    $paths = [__DIR__ . '\..\model'];
    $isDevMode = true;
    $dbParams = [
        'driver'   => 'pdo_mysql',
        'user'     => $_ENV["DB_USER"],
        'password' => $_ENV["DB_PASSWORD"],
        'dbname'   => $_ENV["DB_NAME"],
    ];
    $config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode,null,null,true);
    $connection = DriverManager::getConnection($dbParams, $config);
    return new EntityManager($connection, $config);
}

function getTwig(): Environment
{
    $loader = new FilesystemLoader(__DIR__ . '\..\templates');
    return new Environment($loader, [
        'cache' =>__DIR__ . '\..\cache',
    ]);
}