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
                //UPDATE
                foreach($this->columns as $key => $value)
                {
                    $sqlSet[] = $key."=:".$key;
                }

                $query = $this->pdo->prepare(" UPDATE ".$this->table." SET ".implode(", ", $sqlSet)." WHERE id=:id ");
                
                $query->execute($this->columns);
            }
            else
            {
                //INSERT
                unset($this->columns['id']);
                $query = $this->pdo->prepare("INSERT INTO ".$this->table." (`". implode("`, `", array_keys($this->columns)) ."`)
                                              VALUES (:". implode(", :", array_keys($this->columns)) .")");

                $query->execute($this->columns);
                /*echo '<pre>';
                    print_r($query);
                echo '</pre>';*/
            }
        }

        public function delete($id)
        {
            $query = $this->pdo->prepare("DELETE FROM ".$this->table." 
                                          WHERE `".$this->table."`.`id` = '".$id."'");

            $query->execute();
        }

        public function getAll($conditions = null)
        {
            //dans le cas où l'on souhaite récupérer tout le contenu de la table
            if($conditions === null)
            {
                $query = $this->pdo->prepare("SELECT *
                                              FROM ".$this->table);
            }
            //dans le cas où on veut seulement certaines données via clauses WHERE etc
            else
            {
                //SELECT
                $sqlSet = "SELECT ".implode(', ', $conditions['select']);
                //FROM
                $sqlSet .= " FROM ".$this->table." ";
                //INNER JOIN - LEFT JOIN - RIGHT JOIN
                foreach($conditions['join'] as $type => $joinsByType)
                {
                    if(count($conditions['join'][$type]) > 0)
                    {
                        foreach($joinsByType as $join)
                        {
                            $sqlSet .= strtoupper(preg_replace('/_/', ' ', $type))." ".$join." ";
                        }
                    }
                }
                //WHERE
                if($conditions['where']['clause'] != '')
                {
                    $sqlSet .= "WHERE (".$conditions['where']['clause'];
                    if(count($conditions['where']['and']) > 0)
                    {
                        foreach($conditions['where']['and'] as $andCondition)
                        {
                            $sqlSet .= " AND ".$andCondition;
                        }
                    }
                    if(count($conditions['where']['or']) > 0)
                    {
                        foreach($conditions['where']['or'] as $orCondition)
                        {
                            $sqlSet .= " OR ".$orCondition;
                        }
                    }
                    $sqlSet .= ")";
                }
                //AND
                if($conditions['and'][0]['clause'] != '')
                {
                    foreach($conditions['and'] as $andClause)
                    {
                        $sqlSet .= " AND (".$andClause['clause'];
                        if(count($andClause['and']) > 0)
                        {
                            foreach($andClause['and'] as $andCondition)
                            {
                                $sqlSet .= " AND ".$andCondition;
                            }
                        }
                        if(count($andClause['or']) > 0)
                        {
                            foreach($andClause['or'] as $orCondition)
                            {
                                $sqlSet .= " OR ".$orCondition;
                            }
                        }
                        $sqlSet .= ")";
                    }
                }
                //OR
                if($conditions['or'][0]['clause'] != '')
                {
                    foreach($conditions['or'] as $orClause)
                    {
                        $sqlSet .= " OR (".$orClause['clause'];
                        if(count($orClause['and']) > 0)
                        {
                            foreach($orClause['and'] as $andCondition)
                            {
                                $sqlSet .= " AND ".$andCondition;
                            }
                        }
                        if(count($orClause['or']) > 0)
                        {
                            foreach($orClause['or'] as $orCondition)
                            {
                                $sqlSet .= " OR ".$orCondition;
                            }
                        }
                        $sqlSet .= ")";
                    }
                }
                //GROUP BY
                if(count($conditions['group_by']) > 0)
                {
                    $sqlSet .= " GROUP BY ".implode(', ', $conditions['group_by']);
                }
                //HAVING
                if($conditions['having']['clause'] != '')
                {
                    $sqlSet .= " HAVING ".$conditions['having']['clause'];
                    if(count($conditions['having']['and']) > 0)
                    {
                        foreach($conditions['having']['and'] as $andCondition)
                        {
                            $sqlSet .= " AND ".$andCondition;
                        }
                    }
                    if(count($conditions['having']['or']) > 0)
                    {
                        foreach($conditions['having']['or'] as $orCondition)
                        {
                            $sqlSet .= " OR ".$orCondition;
                        }
                    }
                }
                //ORDER BY
                if(count($conditions['order_by']['asc']) > 0)
                {
                    $sqlSet .= " ORDER BY ".implode(' ASC, ', $conditions['order_by']['asc'])." ASC";
                }
                if(count($conditions['order_by']['desc']) > 0)
                {
                    if(count($conditions['order_by']['asc']) == 0)
                    {
                        $sqlSet .= " ORDER BY ";
                    }
                    else
                    {
                        $sqlSet .= ", ";
                    }
                    $sqlSet .= implode(' DESC, ', $conditions['order_by']['desc'])." DESC";
                }
                //LIMIT
                if($conditions['limit']['offset'] != '' || $conditions['limit']['range'] != '')
                {
                    $sqlSet .= " LIMIT ";
                    if($conditions['limit']['offset'] != '')
                    {
                        $sqlSet .= $conditions['limit']['offset'];
                    }
                    if($conditions['limit']['range'] != '')
                    {
                        $sqlSet .= ", ".$conditions['limit']['range'];
                    }
                }

                $query = $this->pdo->prepare($sqlSet);

                /*echo '<pre>';
                    print_r($conditions);
                echo '</pre>';*/
            }

            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_CLASS, $this->table);

            //print_r($query);

            return $result;
        }
    }