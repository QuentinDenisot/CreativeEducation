<?php


class Documentation extends BaseSQL
{

    protected $id = null;
    protected $titre;
    protected $contenu;
    protected $date_creation;

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

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre($titre){
        $this->titre = ucfirst(strtoupper($titre));
    }

    public function getContenu(){
        return $this->contenu;
    }

    public function setContenu($contenu){
        $this->contenu = $contenu;
    }

    public function getDateCreation(){
        return $this->date_creation;
    }

    public function setDateCreation($date_creation){
        $this->date_creation = $date_creation;
    }
}