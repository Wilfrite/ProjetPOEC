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
    public function createOrder( $adresse_livraison,$cp_livraison,$cp_livraison,$ville_livraison,$adresse_facturation,$cp_facturation,$ville_facturation,$id_user)
    {
        try {
            $sql = "INSERT INTO `commande`( `statut`, `date_commande`, `date_reception`, `adrersse_livraison`, `cp_livraison`, `ville_livraison`, `adrersse_facturation`, `cp_facturation`, `ville_facturation`, `id_utilisateur`) VALUES ( 'en préparation', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP +2, :adrersse_livraison, :cp_livraison, :ville_livraison, :adrersse_facturation, :cp_facturation, :ville_facturation, :id_utilisateur)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                    ':statut' => 'en préparation',
                    ':adrersse_livraison' => $adresse_livraison,
                    ':cp_livraison' =>$cp_livraison,
                    ':ville_livraison' =>$ville_livraison,
                    ':adrersse_facturation' =>$adresse_facturation,
                    ':cp_facturation' =>$cp_facturation,
                    ':ville_facturation' =>$ville_facturation,
                    ':id_utilisateur' =>$id_user,
                ]);
            $stmt = NULL;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return (isset($result) ? $result : null);
    }
}