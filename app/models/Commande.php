<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 29/09/2014
 * Time: 13:26
 */

class Commande {
    protected $id;
    protected $statut;
    protected $date_commande;
    protected $date_reception;
    protected $adresse_livraison;
    protected $cp_livraison;
    protected $ville_livraison;
    protected $adresse_facturation;
    protected $cp_facturation;
    protected $ville_facturation;
    protected $id_user;

    /**
     * @return mixed
     */
    public function getAdresseFacturation()
    {
        return $this->adresse_facturation;
    }

    /**
     * @param mixed $adresse_facturation
     */
    public function setAdresseFacturation($adresse_facturation)
    {
        $this->adresse_facturation = $adresse_facturation;
    }

    /**
     * @return mixed
     */
    public function getAdresseLivraison()
    {
        return $this->adresse_livraison;
    }

    /**
     * @param mixed $adresse_livraison
     */
    public function setAdresseLivraison($adresse_livraison)
    {
        $this->adresse_livraison = $adresse_livraison;
    }

    /**
     * @return mixed
     */
    public function getCpFacturation()
    {
        return $this->cp_facturation;
    }

    /**
     * @param mixed $cp_facturation
     */
    public function setCpFacturation($cp_facturation)
    {
        $this->cp_facturation = $cp_facturation;
    }

    /**
     * @return mixed
     */
    public function getCpLivraison()
    {
        return $this->cp_livraison;
    }

    /**
     * @param mixed $cp_livraison
     */
    public function setCpLivraison($cp_livraison)
    {
        $this->cp_livraison = $cp_livraison;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->date_commande;
    }

    /**
     * @param mixed $date_commande
     */
    public function setDateCommande($date_commande)
    {
        $this->date_commande = $date_commande;
    }

    /**
     * @return mixed
     */
    public function getDateReception()
    {
        return $this->date_reception;
    }

    /**
     * @param mixed $date_reception
     */
    public function setDateReception($date_reception)
    {
        $this->date_reception = $date_reception;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getVilleFacturation()
    {
        return $this->ville_facturation;
    }

    /**
     * @param mixed $ville_facturation
     */
    public function setVilleFacturation($ville_facturation)
    {
        $this->ville_facturation = $ville_facturation;
    }

    /**
     * @return mixed
     */
    public function getVilleLivraison()
    {
        return $this->ville_livraison;
    }

    /**
     * @param mixed $ville_livraison
     */
    public function setVilleLivraison($ville_livraison)
    {
        $this->ville_livraison = $ville_livraison;
    }


} 