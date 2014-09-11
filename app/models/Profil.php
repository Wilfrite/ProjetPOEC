<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 11/09/14
 * Time: 08:38
 */

class Profil {

    protected $id;
    protected $nom;
    protected $prenom;
    protected $id_utlisateur;
    protected $id_adresse;

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
     * @param mixed $id_adresse
     */
    public function setIdAdresse($id_adresse)
    {
        $this->id_adresse = $id_adresse;
    }

    /**
     * @return mixed
     */
    public function getIdAdresse()
    {
        return $this->id_adresse;
    }

    /**
     * @param mixed $id_utlisateur
     */
    public function setIdUtlisateur($id_utlisateur)
    {
        $this->id_utlisateur = $id_utlisateur;
    }

    /**
     * @return mixed
     */
    public function getIdUtlisateur()
    {
        return $this->id_utlisateur;
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
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }



} 