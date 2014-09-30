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
            foreach ($array as $link)
            {

                $stmt->execute([
                        ':quantite' => $link,
                        ':id' =>  key($link),
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
            $sql = "INSERT INTO `commande`( `statut`, `date_commande`, `date_reception`, `adrersse_livraison`, `cp_livraison`, `ville_livraison`, `adrersse_facturation`, `cp_facturation`, `ville_facturation`, `id_utilisateur`) VALUES ( 'en préparation', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP +2, :adrersse_livraison, :cp_livraison, :ville_livraison, :adrersse_facturation, :cp_facturation, :ville_facturation, :id_utilisateur)";
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
           $result = $stmt->lastInsertId();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->createLinkOrder($result,$array);
        return (isset($result) ? $result : null);

    }
}