<?php
require_once __DIR__ . '/bin/bootstrap.php';
use Model\Article;

$twig = getTwig();

if( isset($_POST["username"]) &&  isset($_POST["password"])){
    if($_POST["username"] === $_ENV["USER"] && md5($_POST["password"].$_ENV["SALT"])=== $_ENV["PASSWORD"]){
        $_SESSION["login"]=true;
    }else{
        echo $twig->render('admin_login.html', ["err"=>true]);
        return;
    }
}

if ( isset($_GET["logout"]) ){
    session_destroy();
}
if (isset($_SESSION) && isset($_SESSION["login"])){
    $entityManager = getEntityManager();
    $articles = $entityManager->getRepository(Article::class)->findAll();
    echo $twig->render('admin_page.html', ["articles"=>$articles]);
    return;
}

echo $twig->render('admin_login.html', ["err"=>"false"]);