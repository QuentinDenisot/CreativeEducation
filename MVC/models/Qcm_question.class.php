<?php


class Qcm_question extends BaseSQL
{
    protected $id=null;
    protected $intitule;
    protected $reponses;
    protected $type_reponse;

    public function __construct()
    {
        parent::__construct();
        $this->reponses = [];
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

    public function getTypeReponse(){
        return $this->type_reponse;
    }

    public function setTypeReponse($type_reponse){
        $this->type_reponse = $type_reponse;
    }


}