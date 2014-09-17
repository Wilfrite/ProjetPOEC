<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 09/09/14
 * Time: 16:06
 */

class Article {
        protected $id;
        protected $nom;
        protected $image;
        protected $description;
        protected $etat;
        protected $date_edition;
        protected $editeur;
        protected $auteur;
        protected $seuil;
        protected $quantite_stock;
        protected $prix;
        protected $id_categorie;


    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $date_edition
     */
    public function setDateEdition($date_edition)
    {
        $this->date_edition = $date_edition;
    }

    /**
     * @return mixed
     */
    public function getDateEdition()
    {
        return $this->date_edition;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $editeur
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;
    }

    /**
     * @return mixed
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Attribution d'une tva
     * todo : gestion de tva via bdd
     * @return mixed
     */
    public function getPrixTVA()
    {
        $tva = .2;
        return $this->prix * (1+$tva);
    }

    /**
     * @param mixed $quantite_stock
     */
    public function setQuantiteStock($quantite_stock)
    {
        $this->quantite_stock = $quantite_stock;
    }

    /**
     * @return mixed
     */
    public function getQuantiteStock()
    {
        return $this->quantite_stock;
    }

    /**
     * @param mixed $seuil
     */
    public function setSeuil($seuil)
    {
        $this->seuil = $seuil;
    }

    /**
     * @return mixed
     */
    public function getSeuil()
    {
        return $this->seuil;
    }


}
