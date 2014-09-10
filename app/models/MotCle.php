<?php
/**
 * Created by PhpStorm.
 * User: poec
 * Date: 10/09/14
 * Time: 16:31
 */

class MotCle {
    protected $id;
    protected $nom;

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


} 