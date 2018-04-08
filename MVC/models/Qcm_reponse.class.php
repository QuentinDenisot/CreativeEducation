<?php


class Qcm_reponse extends BaseSQL
{
    protected $id=null;
    protected $intitule;
    protected $vrai_faux;


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

    public function getIntitule(){
        return $this->intitule;
    }

    public function setIntitule($intitule){
        $this->intitule = ucfirst(strtoupper($intitule));
    }

    public function getVraiFaux(){
        return $this->vrai_faux;
    }

    public function setVraiFaux($vrai_faux){
        $this->vrai_faux = $vrai_faux;
    }

}