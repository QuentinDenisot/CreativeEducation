<?php
    class User extends BaseSQL
    {
        protected $id = null;
        protected $firstname;
        protected $lastname;
        protected $pwd;
        protected $email;
        protected $status;
        protected $token;
        /*protected $profilePicPath;
        protected $insertedDate;
        protected $updatedDate;*/
        protected $id_role;

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

        public function setPwd($pwd)
        {
            $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
        }

        public function setEmail($email)
        {
            $this->email = strtolower($email);
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

        public function setProfilePicPath($profilePicPath = null)
        {
            $this->profilePicPath = $profilePicPath;
        }

        public function setId_role($id_role = 0)
        {
            $this->id_role = $id_role;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getFirstname()
        {
            return $this->firstname;
        }

        public function getLastname()
        {
            return $this->lastname;
        }

        public function getPwd()
        {
            return $this->pwd;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function getToken()
        {
            return $this->token;
        }

        public function getProfilePicPath()
        {
            return $this->profilePicPath;
        }

        public function getInsertedDate()
        {
            return $this->insertedDate;
        }

        public function getUpdatedDate()
        {
            return $this->updatedDate;
        }

        public function getId_role()
        {
            return $this->id_role;
        }

        public function addForm()
        {
            return [
                "config" => [
                                "method" => "POST",
                                "action" => "user/add",
                                "button" => "AJOUTER"
                            ],
                "icon" => [
                            "account_circle",
                            "account_circle",
                            "lock_outline",
                            "drafts",
                            "drafts",
                            "keyboard_arrow_right"
                        ],
                "input" => [
                    "firstname" => [
                                        "type" => "text",
                                        "placeholder" => "Prénom",
                                        "required" => true,
                                        "minString" => 2,
                                        "maxString" => 100
                                    ],
                    "lastname" => [
                                        "type" => "text",
                                        "placeholder" => "Nom",
                                        "required" => true,
                                        "minString" => 2,
                                        "maxString" => 100
                                    ],
                    "password" => [
                                    "type" => "password",
                                    "placeholder" => "Mot de passe",
                                    "required" => true,
                                    "minString" => 2,
                                    "maxString" => 100
                                ],
                    "email" => [
                                    "type" => "text",
                                    "placeholder" => "Adresse mail",
                                    "required" => true,
                                    "minString" => 2,
                                    "maxString" => 100
                                ],
                    "status" => [
                                    "type" => "text",
                                    "placeholder" => "Statut",
                                    "required" => true,
                                    "minString" => 2,
                                    "maxString" => 100
                                ]   
                    ]
            ];
        }
    }