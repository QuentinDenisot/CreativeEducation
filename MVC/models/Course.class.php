<?php
    class Course extends BaseSQL
    {
        protected $id = null;
        protected $title;
        protected $description;
        protected $filePath;
        protected $status;
        protected $insertedDate;
        protected $updatedDate;
        protected $id_user;

        public function __construct()
        {
            parent::__construct();
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        public function setFilePath($filePath)
        {
            $this->filePath = $filePath;
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function setId_user($id_user)
        {
            $this->id_user = $id_user;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getFilePath()
        {
            return $this->filePath;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function getInsertedDate()
        {
            return $this->insertedDate;
        }

        public function getUpdatedDate()
        {
            return $this->updatedDate;
        }

        public function getId_user()
        {
            return $this->id_user;
        }

        public function updateCourseForm()
        {
            //récupération de tous les status pour alimenter la liste déroulante
            $queryConditions = [
                "select"=>[
                    "status.*"
                ],
                "join"=>[
                    "inner_join"=>[],
                    "left_join"=>[],
                    "right_join"=>[]
                ],
                "where"=>[
                    "clause"=>"`status`.`id` != '-1'",
                    "and"=>[],
                    "or"=>[]
                ],
                "and"=>[
                    [
                        "clause"=>"",
                        "and"=>[],
                        "or"=>[]
                    ]
                ],
                "or"=>[
                    [
                        "clause"=>"",
                        "and"=>[],
                        "or"=>[]
                    ]
                ],
                "group_by"=>[],
                "having"=>[
                    "clause"=>"",
                    "and"=>[],
                    "or"=>[]
                ],
                "order_by"=>[
                    "asc"=>[
                        "`status`.`name`"
                    ],
                    "desc"=>[]
                ],
                "limit"=>[
                    "offset"=>"",
                    "range"=>""
                ]
            ];

            $status = new Status();
            $statuses = $status->getAll($queryConditions);

            foreach($statuses as $status)
            {
                $options[$status->getId()] = $status->getName();
            }

            return [
                "config" => [
                    "method" => "POST",
                    "action" => ""
                ],
                "input" => [
                    "title" => [
                        "type" => "text",
                        "placeholder" => "Titre",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 250
                    ]
                ],
                "select" => [
                    "status" => [
                        "placeholder" => "Statut",
                        "emptyOption" => false,
                        "options" => $options,
                        "required" => true
                    ]
                ],
                "button" => [
                    "text" => "VALIDER LES MODIFICATIONS"
                ],
                "captcha" => false
            ];
        }
    }