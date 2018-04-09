<?php


class Forum_sujet extends BaseSQL
{
    protected $id=null;
    protected $nom;
    protected $reponse;
    protected $acces;
    protected $createur;

    public function __construct()
    {
        parent::__construct();
        $this->reponse = [];
        $this->acces = [];
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
        $this->nom = ucfirst(strtoupper($nom));
    }

    public function getReponse(){
        return $this->reponse;
    }

    public function addReponse($reponse){
        $this->reponse[]=$reponse;
    }

    public function removeReponse($reponse){
        $cle = array_search($reponse, $this->reponse);
        unset($this->reponse[$cle]);
        $this->reponse = array_values($this->reponse);
    }

    public function getAcces(){
        return $this->acces;
    }

    public function addAcces($acces){
        $this->acces[]=$acces;
    }

    public function removeAcces($acces){
        $cle = array_search($acces, $this->acces);
        unset($this->acces[$cle]);
        $this->acces = array_values($this->acces);
    }


    public function getCreateur(){
        return $this->createur;
    }

    public function setCreateur($createur){
        $this->createur = $createur;
    }


}