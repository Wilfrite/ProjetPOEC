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
            $sql = "SELECT *
            FROM `article`
            WHERE `article`.etat = 'Nouveauté'
            ORDER BY `article`.id DESC";
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


    public function  findByMotCle($id_mot_cle)
    {
        try {
            // Sélection des données
            $sql = "SELECT `article`.`id` , `article`.`nom` , `image` , `description` , `etat` , `date_edition` , `editeur` , `auteur` , `seuil` , `quantite_stock` , `prix` , `id_categorie` , `mot_cle`.`id` AS id_mot_cle, `mot_cle`.`nom` AS nom_mot_cle
            FROM `article_mot_cle`
            JOIN `article` ON `article`.`id` = `article_mot_cle`.`id_article`
            JOIN `mot_cle` ON `mot_cle`.`id` = `article_mot_cle`.`id`
            WHERE `mot_cle`.`id` =?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($id_mot_cle));
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

    public function  findBySearch($id_category,$id_mot_cle)
    {
        try {
            // Sélection des données
            $sql = "SELECT `article`.`id` , `article`.`nom` , `image` , `description` , `etat` , `date_edition` , `editeur` , `auteur` , `seuil` , `quantite_stock` , `prix` , `id_categorie` , `mot_cle`.`id` AS id_mot_cle, `mot_cle`.`nom` AS nom_mot_cle, `categorie`.`nom` AS nom_category
            FROM `article_mot_cle`
            JOIN `article` ON `article`.`id` = `article_mot_cle`.`id_article`
            JOIN `mot_cle` ON `mot_cle`.`id` = `article_mot_cle`.`id`
            JOIN `categorie` ON `categorie`.`id` = `article`.`id_categorie`
            WHERE `mot_cle`.`id` =:mot_cle
            AND  `categorie`.`id`=:category";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':category' => $id_category,
                    ':mot_cle' => $id_mot_cle
                ]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

    public function  findBySearchWithNews($id_mot_cle)
    {
        try {
            // Sélection des données
            $sql = "SELECT `article`.`id` , `article`.`nom` , `image` , `description` , `etat` , `date_edition` , `editeur` , `auteur` , `seuil` , `quantite_stock` , `prix` , `id_categorie` , `mot_cle`.`id` AS id_mot_cle, `mot_cle`.`nom` AS nom_mot_cle, `categorie`.`nom` AS nom_category
            FROM `article_mot_cle`
            JOIN `article` ON `article`.`id` = `article_mot_cle`.`id_article`
            JOIN `mot_cle` ON `mot_cle`.`id` = `article_mot_cle`.`id`
            JOIN `categorie` ON `categorie`.`id` = `article`.`id_categorie`
            WHERE `mot_cle`.`id` =:mot_cle
            AND `article`.etat = 'Nouveauté'" ;
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':mot_cle' => $id_mot_cle
                ]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");;
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

}


