<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 09/09/14
 * Time: 16:06
 */
require_once ROOT.'/models/Article.php';
class ArticleService {
    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  findAllArticles()
    {
        try {
            // Sélection des données
            $sql = "SELECT * FROM `article`
            ORDER BY `article`.id DESC  LIMIT 3";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);

    }
    public function findOneArticle($id_article) {
        try {
            // Sélection des données
            $sql = "SELECT * FROM `article` WHERE `id`=?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($id_article));
            $result = $stmt->fetchObject("Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }

    public function  findByCategory($id_category)
    {
        try {
            // Sélection des données
            $sql = "SELECT `article`.`id`, `article`.`nom` , `image` , `description` , `etat` , `date_edition` , `editeur` , `auteur` , `seuil` , `quantite_stock` , `prix` , `id_categorie` , `categorie`.`nom` as nom_category
            FROM `article`
            JOIN `categorie` ON `article`.`id_categorie` = `categorie`.`id`
            WHERE  `id_categorie`=?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($id_category));
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

    public function findAllArticlesById($tab_ids)
    { // $id == tableau d'id
        try {
            // mapping du tableau
            $string_ids = implode(",",$tab_ids);
            // Sélection des données
            $sql = "SELECT * FROM `article` WHERE `id` IN ($string_ids) ORDER BY `nom`";
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


