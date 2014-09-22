<?php
require_once ROOT.'/models/Profil.php';

class ProfilService {

    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    // Ajout d'un profil pour un nouvel utilisateur
    public function  insertNewProfil($idNewUser, $idNewAdresse)
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
                    ':id_adresse' => $idNewAdresse,
                ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return null;
    }

    // recuperation des informations de l'utilisateur connecté
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
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Profil");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }

    // Misa a jour des informations de l'utilisateur connecté
    public function  updateProfil($idUser, $prenom, $nom, $adresse, $codePostal, $ville)
    {

        try {
            // Sélection des données
            $sql = "UPDATE `profil`
            JOIN `adresse`
            ON `profil`.`id_adresse` = `adresse`.`id`
            SET `profil`.`nom` = :nom, `profil`.`prenom` = :prenom, `adresse`.`adresse` = :adresse, `adresse`.`cp` = :codePostal, `adresse`.`ville` = :ville
            WHERE  `id_utilisateur` = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                        ':id' => $idUser,
                        ':prenom' => $prenom,
                        ':nom' => $nom,
                        ':adresse' => $adresse,
                        ':codePostal' => $codePostal,
                        ':ville' => $ville
                    ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }
        return (isset($stmt) ? $stmt : null);
    }


}