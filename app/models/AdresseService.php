<?php
/**
 * Created by PhpStorm.
 * User: Willy
 * Date: 18/09/14
 * Time: 10:55
 */
require_once ROOT.'/models/Adresse.php';

class AdresseService {

    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    // Ajout d'une adresse pour un nouvel utilisateur
    public function insertNewAdresse()
    {
        try {
            // Sélection des données
            $sql = "INSERT INTO adresse (id, adresse, cp, ville) VALUES
            (:id, :adresse, :cp, :ville)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id' => null,
                    ':adresse' => null,
                    ':cp' => null,
                    ':ville' => null,
                ]);
            $stmt = NULL;
            $result=(int)($this->dbh->lastInsertId());
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return $result;
    }

}