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

} 