<?php


class Statistique extends BaseSQL
{
    protected $id = null;
    protected $nom;
    protected $valeur;
    protected $date_jour;

    public function __construct()
    {
        parent::__construct();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getValeur(){
        return $this->valeur;
    }

    public function setValeur($valeur){
        $this->valeur = $valeur;
    }

    public function getDateJour(){
        return $this->date_jour;
    }

    public function setDateJour($date_jour){
        $this->date_jour = $date_jour;
    }

}