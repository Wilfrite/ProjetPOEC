<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 09/09/14
 * Time: 16:06
 */
require_once 'Article.php';
class ArticleService {
    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  findAllArticles()
    {
        try {
            // Sélection des données
            $sql = "SELECT * FROM `article` ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);

    }

}