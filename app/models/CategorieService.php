<?php
require_once ROOT.'/models/Categorie.php';


class CategorieService {
    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  findAllCategories()
    {
        try {
            // Sélection des données
            $sql = "SELECT * FROM `categorie` ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Categorie");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);

    }

}
