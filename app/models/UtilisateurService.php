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
            $result=(int)($this->dbh->lastInsertId());
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return $result;

    }

    public function  updatePassword($idUser, $password)
    {
        try {
            // Sélection des données
            $sql = "UPDATE utilisateur
            SET mot_de_passe = :password
            WHERE  id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id' => $idUser,
                    ':password' => $password
                ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return $stmt;

    }

    public function  updateMail($idUser, $email)
    {
        try {
            // Sélection des données
            $sql = "UPDATE utilisateur
            SET adresse_mail = :email
            WHERE  id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id' => $idUser,
                    ':email' => $email
                ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return $stmt;

    }

    public function checkUser($email, $password)
    {
        try {
            // Sélection des données
            $sql = "SELECT * FROM utilisateur WHERE adresse_mail = :email AND mot_de_passe = :password ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':email' => $email,
                    ':password' => $password
                ]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

    public function checkModifUser($idUser, $password)
    {
        try {
            // Sélection des données
            $sql = "SELECT * FROM utilisateur WHERE id = :id AND mot_de_passe = :password ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id' => $idUser,
                    ':password' => $password
                ]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            return ('Erreur : ' . $e->getMessage());
            //die('Erreur : ' . $e->getMessage());
        }

        return (isset($result) ? $result : null);
    }

}