<?php

require_once '../bin/bootstrap.php';
require_once '../model/Article.php';
use Model\Article;

if(!isset($_SESSION["login"]) ){
    http_response_code(500);
    die();
}

$entityManager = getEntityManager();
$twig = getTwig();

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

if($data["id"]===0){//new entity
    $article = new Article();
}else{//existing entity
    try {
        $article = $entityManager->find(Article::class,$data["id"]);
    } catch (\Exception $e) {
        http_response_code(500);
        die();
    }
}
$article->setName($data["title"]);
$article->setDescription($data["description"]);

try {
    $entityManager->persist($article);
    $entityManager->flush();
} catch (\Exception $e) {
    http_response_code(500);
    die();
}

//I'd prefered to send back json and let the front handle the element
//since only twig is allowed, i'm doing it this way.
echo $twig->render('admin_article_mini.html', ["article"=>$article]);