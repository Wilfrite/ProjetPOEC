<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 29/09/2014
 * Time: 13:26
 */
require_once ROOT.'/models/Commande.php';
class CommandeService {
    protected $dbh;
    function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    public  function  createLinkOrder($id_commande, $array)
    {
        try {
            $valuesSql = null;

            $sql = "INSERT INTO `article_commande`(`quantite`, `id`, `id_commande`) VALUES (:quantite,:id,:id_commande)";
            $stmt = $this->dbh->prepare($sql);
            foreach ($array as $key =>$link)
            {

                $stmt->execute([
                        ':quantite' => $link,
                        ':id' => $key,
                        ':id_commande' =>$id_commande
                    ]);
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function createOrder( $adresse_livraison ,$cp_livraison , $ville_livraison , $adresse_facturation , $cp_facturation ,$ville_facturation , $id_user, $array)
    {
        try {
            $sql = "INSERT INTO `commande`( `statut`, `date_commande`, `date_reception`, `adrersse_livraison`, `cp_livraison`, `ville_livraison`, `adrersse_facturation`, `cp_facturation`, `ville_facturation`, `id_utilisateur`) VALUES ( 'en préparation', CURRENT_TIMESTAMP, (SELECT INTERVAL 2 DAY + CURRENT_TIMESTAMP) , :adrersse_livraison, :cp_livraison, :ville_livraison, :adrersse_facturation, :cp_facturation, :ville_facturation, :id_utilisateur)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([

                    ':adrersse_livraison' => $adresse_livraison,
                    ':cp_livraison' =>$cp_livraison,
                    ':ville_livraison' =>$ville_livraison,
                    ':adrersse_facturation' =>$adresse_facturation,
                    ':cp_facturation' =>$cp_facturation,
                    ':ville_facturation' =>$ville_facturation,
                    ':id_utilisateur' =>$id_user,
                ]);
           $result = $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->createLinkOrder($result,$array);
        return (isset($result) ? $result : null);

    }

    public function selectOrder($id_commande, $id_user)
    {
        try {
            // Sélection des données
            $sql = "SELECT  `commande`.`id`,  `commande`.`statut`,  `commande`.`date_commande`,  `commande`.`date_reception`,  `commande`.`adrersse_livraison`,  `commande`.`cp_livraison`,  `commande`.`ville_livraison`,  `commande`.`adrersse_facturation`,  `commande`.`cp_facturation`,  `commande`.`ville_facturation`,  `commande`.`id_utilisateur`
            FROM `commande`
            WHERE `commande`.`id_utilisateur` = :id_utilisateur AND `commande`.`id` = :id_commande";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':id_commande' =>$id_commande,
                    ':id_utilisateur' =>$id_user,
                ]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Commande");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }

    public function selectListOrders($id_utilisateur)
    {
        try {
            // Sélection des données
            $sql = "SELECT `commande`.`id`, `commande`.`statut`, `commande`.`date_commande`,  `commande`.`id_utilisateur`
            FROM `commande`
            WHERE `commande`.`id_utilisateur` = ?";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($id_utilisateur));
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Commande");
            $stmt->closeCursor();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }
}