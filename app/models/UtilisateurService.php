<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 11/09/14
 * Time: 08:38
 */

require_once ROOT.'/models/Utilisateur.php';

class UtilisateurService {
    protected $dbh;

    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function  insertNewUser($email, $password)
    {
        try {
            // Sélection des données
            $sql = "INSERT INTO `utilisateur` (`id`, `adresse_mail`, `mot_de_passe`, `id_authorisation`) VALUES
            (null, :email, :password, 1)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':email' => $email,
                    ':password' => $password
            ]);
            $stmt->closeCursor();
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return null;

    }

}