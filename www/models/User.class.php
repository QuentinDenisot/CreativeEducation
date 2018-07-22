<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'D:/wamp/www'.DIRNAME.'public/PHPMailer/src/Exception.php';
    require 'D:/wamp/www'.DIRNAME.'public/PHPMailer/src/PHPMailer.php';
    require 'D:/wamp/www'.DIRNAME.'public/PHPMailer/src/SMTP.php';

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
            $this->firstname = ucfirst(mb_strtoupper(trim($firstname)));
        }

        public function setLastname($lastname)
        {
            $this->lastname = mb_strtoupper(trim($lastname));
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

        public function setToken()
        {
            $this->token = substr(sha1("SijMfzD5796".substr(time(), 5).uniqid()."onlmk"), 10, 20);
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

        public function sendMail($subject, $body)
        {
            $mail = new PHPMailer(true);
            $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
            try
            {
                //Server settings
                //$mail->SMTPDebug = 4;
                $mail->isSMTP();
                $mail->Host = 'tls://smtp.gmail.com:587';
                $mail->SMTPAuth = true;
                $mail->Username = 'contact.creativeeducation@gmail.com';
                $mail->Password = 'tot-*32fRe';
                $mail->setFrom('contact.creativeeducation@gmail.com', 'Support CreativeEducation');
                $mail->addAddress($this->getEmail());

                //Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;

                $mail->send();
            }
            catch(Exception $e)
            {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                $alert = new Alert("Le mail n'a pas pu être envoyé", 'error');
            }
        }

        //permet de définir si le user est connecté
        public function isConnected()
        {
            //vérification existence session
            if(isset($_SESSION['user']['id']))
            {
                //récupération utilisateur en cours
                $queryConditions = [
                    "select"=>[
                        "user.*"
                    ],
                    "join"=>[
                        "inner_join"=>[],
                        "left_join"=>[],
                        "right_join"=>[]
                    ],
                    "where"=>[
                        "clause"=>"`user`.`id` = '".$_SESSION['user']['id']."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $user = new User();
                $targetedUser = $user->getAll($queryConditions);

                //si récupération utilisateur effectuée
                if(count($targetedUser) == 1)
                {
                    $token = $_SESSION['user']['token'];

                    //comparaison token en session et token bdd
                    if($targetedUser[0]->getToken() == $token)
                    {
                        //mise à jour token bdd
                        $targetedUser[0]->setToken();
                        $targetedUser[0]->save();

                        //mise à jour token session
                        $_SESSION['user']['token'] = $targetedUser[0]->getToken();

                        return true;
                    }
                    //si token bdd et session différents : utilisateur non connecté
                    else
                    {
                        return false;
                    }
                }
                //si pas de récupération : utilisateur non connecté
                else
                {
                    return false;
                }
            }
            //si pas de session : utilisateur non connecté
            else
            {
                return false;
            }
        }

        //permet de définir si le user est désactivé ou non
        public function isDeactivated($idUser = null)
        {
            //si le paramètre n'est pas renseigné, on se base sur l'id du user connecté, sinon sur celui renseigné
            $idUser = ($idUser === null) ? $_SESSION['user']['id'] : $idUser;

            //récupération utilisateur selon id
            $queryConditions = [
                "select"=>[
                    "user.*"
                ],
                "join"=>[
                    "inner_join"=>[],
                    "left_join"=>[],
                    "right_join"=>[]
                ],
                "where"=>[
                    "clause"=>"`user`.`id` = '".$idUser."'",
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
                    "asc"=>[],
                    "desc"=>[]
                ],
                "limit"=>[
                    "offset"=>"",
                    "range"=>""
                ]
            ];

            $user = new User();
            $targetedUser = $user->getAll($queryConditions);

            //si récupération utilisateur effectuée
            if(count($targetedUser) == 1)
            {
                //vérification que le status du user est 0 (Désactivé / Supprimé)
                if($targetedUser[0]->getStatus() == 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            //si pas de récupération : utilisateur non connecté
            else
            {
                return false;
            }
        }

        //permet de définir si le rôle du user est autorisé à la connexion
        public function allowedRole($idUser = null)
        {
            //si le paramètre n'est pas renseigné, on se base sur l'id du user connecté, sinon sur celui renseigné
            $idUser = ($idUser === null) ? $_SESSION['user']['id'] : $idUser;

            //récupération utilisateur selon id
            $queryConditions = [
                "select"=>[
                    "user.*"
                ],
                "join"=>[
                    "inner_join"=>[],
                    "left_join"=>[],
                    "right_join"=>[]
                ],
                "where"=>[
                    "clause"=>"`user`.`id` = '".$idUser."'",
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
                    "asc"=>[],
                    "desc"=>[]
                ],
                "limit"=>[
                    "offset"=>"",
                    "range"=>""
                ]
            ];

            $user = new User();
            $targetedUser = $user->getAll($queryConditions);

            //si récupération utilisateur effectuée
            if(count($targetedUser) == 1)
            {
                //liste des roles autorisés (admin / apprenant / professeur)
                $allowedRoles = [
                    1,
                    2,
                    4
                ];

                //vérification que le role du user fasse partie des la liste des roles autorisés
                if(in_array($targetedUser[0]->getId_role(), $allowedRoles))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            //si pas de récupération : utilisateur non connecté
            else
            {
                return false;
            }
        }

        //permet de définir si le user est admin
        public function isAdmin()
        {
            //vérification existence session
            if(isset($_SESSION['user']['id']))
            {
                //récupération utilisateur en cours
                $queryConditions = [
                    "select"=>[
                        "user.*"
                    ],
                    "join"=>[
                        "inner_join"=>[],
                        "left_join"=>[],
                        "right_join"=>[]
                    ],
                    "where"=>[
                        "clause"=>"`user`.`id` = '".$_SESSION['user']['id']."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $user = new User();
                $targetedUser = $user->getAll($queryConditions);

                //si récupération utilisateur effectuée
                if(count($targetedUser) == 1)
                {
                    //vérification que l'id_role du user connecté est bien 1 (admin)
                    if($targetedUser[0]->getId_role() == 1)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                //si pas de récupération : utilisateur non connecté
                else
                {
                    return false;
                }
            }
            //si pas de session : utilisateur non connecté
            else
            {
                return false;
            }
        }

        //permet de définir si le user est professeur
        public function isProfessor()
        {
            //vérification existence session
            if(isset($_SESSION['user']['id']))
            {
                //récupération utilisateur en cours
                $queryConditions = [
                    "select"=>[
                        "user.*"
                    ],
                    "join"=>[
                        "inner_join"=>[],
                        "left_join"=>[],
                        "right_join"=>[]
                    ],
                    "where"=>[
                        "clause"=>"`user`.`id` = '".$_SESSION['user']['id']."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $user = new User();
                $targetedUser = $user->getAll($queryConditions);

                //si récupération utilisateur effectuée
                if(count($targetedUser) == 1)
                {
                    //vérification que l'id_role du user connecté est bien 4 (professeur)
                    if($targetedUser[0]->getId_role() == 4)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                //si pas de récupération : utilisateur non connecté
                else
                {
                    return false;
                }
            }
            //si pas de session : utilisateur non connecté
            else
            {
                return false;
            }
        }

        //permet de définir si le user est apprenant
        public function isStudent()
        {
            //vérification existence session
            if(isset($_SESSION['user']['id']))
            {
                //récupération utilisateur en cours
                $queryConditions = [
                    "select"=>[
                        "user.*"
                    ],
                    "join"=>[
                        "inner_join"=>[],
                        "left_join"=>[],
                        "right_join"=>[]
                    ],
                    "where"=>[
                        "clause"=>"`user`.`id` = '".$_SESSION['user']['id']."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $user = new User();
                $targetedUser = $user->getAll($queryConditions);

                //si récupération utilisateur effectuée
                if(count($targetedUser) == 1)
                {
                    //vérification que l'id_role du user connecté est bien 2 (apprenant)
                    if($targetedUser[0]->getId_role() == 2)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                //si pas de récupération : utilisateur non connecté
                else
                {
                    return false;
                }
            }
            //si pas de session : utilisateur non connecté
            else
            {
                return false;
            }
        }

        public function addUserForm()
        {
            //récupération des rôles que l'on peut attribuer lors de la création d'un nouvel utilisateur (apprenant / professeur)
            $queryConditions = [
                "select"=>[
                    "role.*"
                ],
                "join"=>[
                    "inner_join"=>[],
                    "left_join"=>[],
                    "right_join"=>[]
                ],
                "where"=>[
                    "clause"=>"`role`.`id` = '2'",
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
                        "clause"=>"`role`.`id` = '4'",
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
                        "`role`.`name`"
                    ],
                    "desc"=>[]
                ],
                "limit"=>[
                    "offset"=>"",
                    "range"=>""
                ]
            ];

            $role = new Role();
            $roles = $role->getAll($queryConditions);

            foreach($roles as $role)
            {
                $options[$role->getId()] = $role->getName();
            }

            return [
                "config" => [
                    "method" => "POST",
                    "action" => ""
                ],
                "input" => [
                    "firstname" => [
                        "type" => "text",
                        "placeholder" => "Prénom",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100,
                        "icon" => "account_circle"
                    ],
                    "lastname" => [
                        "type" => "text",
                        "placeholder" => "Nom",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100,
                        "icon" => "account_circle"
                    ],
                    "email" => [
                        "type" => "email",
                        "placeholder" => "Adresse mail",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100,
                        "icon" => "drafts"
                    ]
                ],
                "select" => [
                    "role" => [
                        "placeholder" => "Rôle",
                        "emptyOption" => true,
                        "options" => $options,
                        "required" => true
                    ]
                ],
                "button" => [
                    "text" => "Ajouter",
                    "icon" => "keyboard_arrow_right"
                ],
                "captcha" => false
            ];
        }

        public function updateUserForm()
        {
            //récupération de tous les rôles pour alimenter la liste déroulante
            $queryConditions = [
                "select"=>[
                    "role.*"
                ],
                "join"=>[
                    "inner_join"=>[],
                    "left_join"=>[],
                    "right_join"=>[]
                ],
                "where"=>[
                    "clause"=>"`role`.`status` = '1'",
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
                        "`role`.`name`"
                    ],
                    "desc"=>[]
                ],
                "limit"=>[
                    "offset"=>"",
                    "range"=>""
                ]
            ];

            $role = new Role();
            $roles = $role->getAll($queryConditions);

            foreach($roles as $role)
            {
                $options[$role->getId()] = $role->getName();
            }

            return [
                "config" => [
                    "method" => "POST",
                    "action" => ""
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
                    "email" => [
                        "type" => "email",
                        "placeholder" => "Adresse mail",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ]
                ],
                "select" => [
                    "role" => [
                        "placeholder" => "Rôle",
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

        public function listUserTable()
        {
            //récupération de tous les users
            $user = new User();
            $users = $user->getAll();

            //création tableau à fournir au modal
            $arrayUsers = [];

            foreach($users as $user)
            {
                //récupération du status
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
                        "clause"=>"`status`.`id` = '".$user->getStatus()."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $status = new Status();
                $targetedStatus = $status->getAll($queryConditions)[0];

                //récupération du role
                $queryConditions = [
                    "select"=>[
                        "role.*"
                    ],
                    "join"=>[
                        "inner_join"=>[],
                        "left_join"=>[],
                        "right_join"=>[]
                    ],
                    "where"=>[
                        "clause"=>"`role`.`id` = '".$user->getId_role()."'",
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
                        "asc"=>[],
                        "desc"=>[]
                    ],
                    "limit"=>[
                        "offset"=>"",
                        "range"=>""
                    ]
                ];

                $role = new Role();
                $targetedRole = $role->getAll($queryConditions)[0];

                $idUser = $user->getId();
                $arrayUsers[$idUser]['lastname'] = Helpers::cleanLastname($user->getLastname());
                $arrayUsers[$idUser]['firstname'] = Helpers::cleanFirstname($user->getFirstname());
                $arrayUsers[$idUser]['email'] = $user->getEmail();
                $arrayUsers[$idUser]['insertedDate'] = Helpers::europeanDateFormat($user->getInsertedDate());
                $arrayUsers[$idUser]['status'] = $targetedStatus->getName();
                $arrayUsers[$idUser]['role'] = $targetedRole->getName();
                $arrayUsers[$idUser]['actions']['edit']['path'] = 'user/update/'.$idUser;
                $arrayUsers[$idUser]['actions']['edit']['icon'] = 'build';
                $arrayUsers[$idUser]['actions']['edit']['color'] = 'blue';

                //changement du bouton en fonction du statut du user : si activé, on affiche le bouton de désactivation
                if($user->getStatus() == 1)
                {
                    $arrayUsers[$idUser]['actions']['delete']['path'] = 'user/delete/'.$idUser;
                    $arrayUsers[$idUser]['actions']['delete']['icon'] = 'close';
                    $arrayUsers[$idUser]['actions']['delete']['color'] = 'red';
                }
                //sinon on affiche le bouton d'activation
                elseif($user->getStatus() == 0)
                {
                    $arrayUsers[$idUser]['actions']['delete']['path'] = 'user/activate/'.$idUser;
                    $arrayUsers[$idUser]['actions']['delete']['icon'] = 'check';
                    $arrayUsers[$idUser]['actions']['delete']['color'] = 'green';
                }
            }

            return [
                "thead" => [
                    "Nom",
                    "Prénom",
                    "Email",
                    "Date d'inscription",
                    "Statut",
                    "Rôle",
                    "Actions"
                ],
                "content" => $arrayUsers
            ];
        }
    }