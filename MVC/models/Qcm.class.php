<?php


class Qcm extends BaseSQL
{

    protected $id=null;
    protected $nom;
    protected $acces;
    protected $questions;

    public function __construct()
    {
        parent::__construct();
        $this->acces = [];
        $this->questions = [];
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

    public function getQuestions(){
        return $this->questions;
    }

    public function addQuestions($questions){
        $this->questions[]=$questions;
    }

    public function removeQuestions($questions){
        $cle = array_search($questions, $this->questions);
        unset($this->questions[$cle]);
        $this->questions = array_values($this->questions);

    }

}