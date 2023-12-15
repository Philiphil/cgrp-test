<?php

require_once '../bin/bootstrap.php';
require_once '../model/Article.php';
use Model\Article;

if(!isset($_SESSION["login"]) ){
    http_response_code(500);
    die();
}


$entityManager = getEntityManager();
$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

try {
    $article = $entityManager->find(Article::class, $data["id"]);
    $entityManager->remove($article);
    $entityManager->flush();
} catch (\Exception $e) {
    http_response_code(500);
    die();
}