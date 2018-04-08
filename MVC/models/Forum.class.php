<?php
    class Forum extends BaseSQL
    {
        protected $id = null;
        protected $firstname;
        protected $lastname;
        protected $email;
        protected $pwd;
        protected $status;
        protected $token;

        public function __construct()
        {
            parent::__construct();
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setFirstname($firstname)
        {
            $this->firstname = ucfirst(strtoupper(trim($firstname)));
        }

        public function setLastname($lastname)
        {
            $this->lastname = strtoupper(trim($lastname));
        }

        public function setEmail($email)
        {
            $this->email = strtolower($email);
        }

        public function setPwd($pwd)
        {
            $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function setToken($token = null)
        {
            if($token)
            {
                $this->token = $token;    
            }
            elseif(!empty($this->email))
            {
                $this->token = substr(sha1("SijMfzD5796".substr(time(), 5).uniqid()."onlmk"), 2, 10);
            }
            else
            {
                die("Veuillez préciser un email");
            }
        }
    }