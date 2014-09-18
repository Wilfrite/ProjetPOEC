<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 11/09/14
 * Time: 08:37
 */

class Utilisateur {

        protected $id;
        protected $adresse_mail;
        protected $mot_de_passe;
        protected $id_authorisation;

    /**
     * @param mixed $adresse_mail
     */
    public function setAdresseMail($adresse_mail)
    {
        $this->adresse_mail = $adresse_mail;
    }

    /**
     * @return mixed
     */
    public function getAdresseMail()
    {
        return $this->adresse_mail;
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
     * @param mixed $id_authorisation
     */
    public function setIdAuthorisation($id_authorisation)
    {
        $this->id_authorisation = $id_authorisation;
    }

    /**
     * @return mixed
     */
    public function getIdAuthorisation()
    {
        return $this->id_authorisation;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }



} 