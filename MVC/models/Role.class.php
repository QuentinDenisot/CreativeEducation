<?php
    class User extends BaseSQL
    {
        protected $id = null;
        protected $name;
        protected $authorizations;

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
            return $this->name;
        }

        public function setAuthorizations($authorizations)
        {
            return $this->authorizations;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getAuthorizations()
        {
            return $this->authorizations;
        }
    }