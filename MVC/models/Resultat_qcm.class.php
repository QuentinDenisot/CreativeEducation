<?php


class Resultat_qcm extends BaseSQL
{
    protected $id=null;
    protected $user;
    protected $qcm;
    protected $resultat;

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

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function getQcm(){
        return $this->qcm;
    }

    public function setQcm($qcm){
        $this->qcm = $qcm;
    }

    public function getResultat(){
        return $this->resultat;
    }

    public function setResultat($resultat){
        $this->resultat = $resultat;
    }

}