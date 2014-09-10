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
            $sql = "SELECT * FROM `mot_cle` ";
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
