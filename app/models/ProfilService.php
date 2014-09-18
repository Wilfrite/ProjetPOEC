<?php
require_once ROOT.'/models/Profil.php';

class ProfilService {

    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  insertNewProfil($idNewUser)
    {
        try {
            // Sélection des données
            $sql = "INSERT INTO `profil` (`id`, `nom`, `prenom`,`id_utilisateur`, `id_adresse`) VALUES
            (:id, :nom, :prenom, :id_utilisateur ,:id_adresse)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id' => null,
                    ':nom' => null,
                    ':prenom' => null,
                    ':id_utilisateur' => $idNewUser,
                    ':id_adresse' => null,
                ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return null;
    }

    public function  viewProfil($idUser)
    {
        try {
            // Sélection des données
            $sql = "SELECT *
            FROM  `profil`
            JOIN `utilisateur` ON `profil`.`id_utilisateur` = `utilisateur`.`id`
            JOIN `adresse` ON `profil`.`id_adresse` = `adresse`.`id`
            Where `profil`.`id_utilisateur`=?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($idUser));
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }





} 