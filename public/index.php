<?php
session_start();
define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR.'app');

require_once ROOT.'/autoload.php';
require_once ROOT.'/models/ArticleService.php';

$config ['href'] = 'http://localhost/ProjetPOEC/public/';
$config ['href_image'] = 'http://localhost/ProjetPOEC/public/images/article/';
$config ['admin_email']='admin@gmail.com';

$host = 'localhost';  // NOM DU SERVEUR SQL
$user = 'root';   // VOTRE NOM D'UTILISATEUR SQL
$pass = '';    // VOTRE MOT DE PASSE SQL
$database = 'poecstore';  // NOM DE VOTRE BASE DE DONNEES


$dsn = "mysql:host=$host;dbname=$database";

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    $dbh = new PDO($dsn, $user, $pass, $pdo_options);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$pagesController = new PagesController($config,$dbh);

$id_article= isset($_GET['p'])? $_GET['p'] : null;

switch(isset($_GET['a'])? $_GET['a'] : 'index')
{
    case 'index' :

        $pagesController->index();
        break;
    case 'article' :
        $pagesController->detailArticle($id_article);
        break;
    case 'login' :
        $pagesController->login();
        break;
   /* case 'comment' :
        $pagesController->comment($id_post);
        break;
    case 'about' :
        $pagesController->about();
        break;
    case 'contact' :
        $pagesController->contact();
        break;*/
    case 'error404' :
        $pagesController->error404();
        break;
    case 'panier' :
    $pagesController->panier();
    break;
    default:
        $pagesController->error404();
        break;
}
