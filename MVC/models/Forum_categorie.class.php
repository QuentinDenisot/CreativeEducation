<?php


class Forum_categorie extends BaseSQL
{

    protected $id=null;
    protected $nom;
    protected $acces;
    protected $sujets;

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
        $this->nom = ucfirst(strtoupper($nom));
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

    public function getSujets(){
        return $this->sujets;
    }

    public function addSujets($sujets){
        $this->sujets[]=$sujets;
    }

    public function removeSujets($sujets){
        $cle = array_search($sujets, $this->sujets);
        unset($this->sujets[$cle]);
        $this->sujets = array_values($this->sujets);

    }

}