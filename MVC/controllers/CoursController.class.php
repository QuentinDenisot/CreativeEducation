<?php

class CoursController
{

    public function indexAction($params)
    {
        if (isset($params["URL"][0])) {
            $id=$params["URL"][0];
            $pdo = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
            $sql = $pdo->prepare('select * from cours where categorie=:categorie and id=:id');
            $sql->execute(['categorie'=>$_SESSION["Categorie"] , 'id'=>$id]);
            print_r($sql[0]);
        } else {
            $pdo = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
            $sql = $pdo->prepare('select * from cours where categorie=:categorie');
            $sql->execute(['categorie'=>$_SESSION["Categorie"]]);
            foreach ($sql as $cours)
            print_r($cours);
        }


    }

    public function addAction($params)
    {

    }

    public function updateAction($params)
    {

    }

    public function removeAction($params)
    {

    }

}