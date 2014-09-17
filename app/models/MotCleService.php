<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 10/09/14
 * Time: 16:31
 */
require_once ROOT.'/models/MotCle.php';
class MotCleService {
    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  findAllMotCles()
    {
        try {
            // Sélection des données
            $sql = "SELECT `mot_cle`.`id`,count( `mot_cle`.`id` ) as nb_art, `mot_cle`.`nom`
            FROM `article_mot_cle`
            JOIN `article` ON `article`.`id` = `article_mot_cle`.`id_article`
            JOIN `mot_cle` ON `mot_cle`.`id` = `article_mot_cle`.`id`
            GROUP BY `mot_cle`.`id`";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"MotCle");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);

    }

}
