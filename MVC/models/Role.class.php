<?php
    class Role extends BaseSQL
    {
        protected $id = null;
        protected $name;
        protected $status;

        public function __construct()
        {
            parent::__construct();
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function updateRoleForm()
        {
            return [
                "config" => [
                    "method" => "POST",
                    "action" => ""
                ],
                "input" => [
                    "name" => [
                        "type" => "text",
                        "placeholder" => "Nom",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ]
                ],
                "button" => [
                    "text" => "VALIDER LES MODIFICATIONS"
                ],
                "captcha" => false
            ];
        }
    }