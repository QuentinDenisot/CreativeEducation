<?php
    class BaseSQL
    {
        private $pdo;
        private $table;
        private $columns;

        public function __construct()
        {
            try
            {
                $this->pdo = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
            }
            catch(Exception $e)
            {
                die("Erreur SQL : ".$e->getMessage());
            }

            $this->table = strtolower(get_called_class());
        }

        public function setColumns()
        {
            $this->columns = array_diff_key(get_object_vars($this), get_class_vars(get_class()));
        }

        public function save()
        {
            $this->setColumns();

            if($this->id)
            {
                //update
            }
            else
            {
                //var_dump($this->columns);
                //insert
                $query = $this->pdo->prepare("INSERT INTO ".$this->table."(".implode(", ", array_keys($this->columns)).") 
                                              VALUES (:".implode(", :", array_keys($this->columns)).")");
                $query->execute($this->columns);

                print_r($query);
            }
        }

        public function delete()
        {
            
        }
    }