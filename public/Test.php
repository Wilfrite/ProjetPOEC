<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 09/09/14
 * Time: 16:08
 */

require_once 'ArticleService.php';

$host = 'localhost';  // NOM DU SERVEUR SQL
$user = 'root';   // VOTRE NOM D'UTILISATEUR SQL
$pass = '';    // VOTRE MOT DE PASSE SQL
$database = 'poecstore';  // NOM DE VOTRE BASE DE DONNEES
$objetArticle = new Article();

$dsn = "mysql:host=$host;dbname=$database";

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    $dbh = new PDO($dsn, $user, $pass, $pdo_options);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$articleService = new ArticleService($dbh);

$tableauDArticles = $articleService->findAllArticles();

var_dump($tableauDArticles);