<?php


class Forum_reponse extends BaseSQL
{

    protected $id = null;
    protected $contenu;
    protected $position;
    protected $auteur;

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

    public function getContenu(){
        return $this->contenu;
    }

    public function setContenu($contenu){
        $this->contenu = $contenu;
    }

    public function getPosition(){
        return $this->position;
    }

    public function setPosition($position){
        $this->position = $position;
    }

    public function getAuteur(){
        return $this->auteur;
    }

    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }
}