<?php
    class IndexController
    {
        public function indexAction($params)
        {
            //si session existante on renvoie vers la page d'accueil
            if(isset($_SESSION['user']))
            {
                $v = new View("front-home", "front");
                $v->assign('name', $_SESSION['user']['firstname']);
            }
            //sinon affichage page login
            else
            {
                $form = Auth::loginForm();
                $v = new View("auth-login", "auth");
                $v->assign("config", $form);
                $v->assign("errors", '');
            }
        }

        public function loginAction($params)
        {
            //si session existante on renvoie vers la page d'accueil
            if(isset($_SESSION['user']))
            {
                header('Location: '.DIRNAME.'index/home');
            }
            //sinon affichage page login
            else
            {
                //si tous les champs sont remplis
                if(!empty($params['POST']))
                {
                    //récupération user via email
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
                            "clause"=>"LOWER(user.email) = '".strtolower($params['POST']['email'])."'",
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

                    $user = new User;
                    $targetedUser = $user->getAll($queryConditions);

                    //si l'utilisateur est trouvé et que le mot de passe est correct
                    if(count($targetedUser) == 1 && password_verify($params['POST']['password'], $targetedUser[0]->getPwd()))
                    {
                        //si le rôle de l'utilisateur n'est pas "en attente de validation mail" : on continue la vérification
                        if($targetedUser[0]->getId_role() != 5)
                        {
                            //si le rôle de l'utilisateur n'est pas "en attente d'attribution de rôle" : connexion
                            if($targetedUser[0]->getId_role() != 3)
                            {
                                $_SESSION['user']['id'] = $targetedUser[0]->getId();
                                $_SESSION['user']['firstname'] = $targetedUser[0]->getFirstname();
                                $_SESSION['user']['lastname'] = $targetedUser[0]->getLastname();
                                $_SESSION['user']['email'] = $targetedUser[0]->getEmail();
                                $_SESSION['user']['status'] = $targetedUser[0]->getStatus();
                                $_SESSION['user']['token'] = $targetedUser[0]->getToken();
                                $_SESSION['user']['profilePicPath'] = $targetedUser[0]->getProfilePicPath();
                                $_SESSION['user']['insertedDate'] = $targetedUser[0]->getInsertedDate();
                                $_SESSION['user']['updatedDate'] = $targetedUser[0]->getUpdatedDate();
                                $_SESSION['user']['id_role'] = $targetedUser[0]->getId_role();

                                //redirection vers la page d'accueil
                                header('Location: '.DIRNAME.'index/home');
                            }
                            //affichage message erreur
                            else
                            {
                                $form = Auth::loginForm();
                                $v = new View("auth-login", "auth");
                                $v->assign("config", $form);
                                $v->assign("errors", "Compte en attente d'attribution de rôle");
                            }
                        }
                        //affichage message erreur
                        else
                        {
                            $form = Auth::loginForm();
                            $v = new View("auth-login", "auth");
                            $v->assign("config", $form);
                            $v->assign("errors", "Compte en attente de validation mail");
                        }
                        
                    }
                    //sinon affichage message erreur
                    else
                    {
                        $form = Auth::loginForm();
                        $v = new View("auth-login", "auth");
                        $v->assign("config", $form);
                        $v->assign("errors", "Identifiants incorrects, veuillez réessayer");
                    }
                }
                //si aucun champ n'est envoyé via post (accès à la page pour la 1ère fois)
                else
                {
                    $form = Auth::loginForm();
                    $v = new View("auth-login", "auth");
                    $v->assign("config", $form);
                    $v->assign("errors", '');
                }
            }
        }

        public function registerAction($params)
        {
            //si session existante on renvoie vers la page d'accueil
            if(isset($_SESSION['user']))
            {
                header('Location: '.DIRNAME.'index/home');
            }
            //sinon affichage page register
            else
            {
                //si tous les champs sont remplis
                if(!empty($params['POST']))
                {
                    $form = Auth::registerForm();
                    $errors = Validator::validate($form, $params['POST']);

                    //s'il y a des erreurs avec les données saisies dans le formulaire on les affiche
                    if(!empty($errors))
                    {
                        $v = new View("auth-register", "auth");
                        $v->assign("config", $form);
                        $v->assign("errors", $errors);
                    }
                    //sinon on renvoie sur la même page avec message de succès + on enregistre l'utilisateur
                    else
                    {
                        //vérification existence adresse mail
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
                                "clause"=>"LOWER(user.email) = '".strtolower($params['POST']['email'])."'",
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

                        $user = new User;
                        $targetedUser = $user->getAll($queryConditions);

                        //si l'adresse email est déjà utilisée : erreur
                        if(count($targetedUser) > 0)
                        {
                            $form = Auth::registerForm();
                            $v = new View("auth-register", "auth");
                            $v->assign("config", $form);
                            $v->assign("errors", "Adresse mail déjà utilisée");
                        }
                        //sinon succès
                        else
                        {
                            $form = Auth::registerForm();
                            $v = new View("auth-register", "auth");
                            $v->assign("config", $form);
                            $v->assign("errors", "Inscription terminée, veuillez consulter vos mails");

                            $user = new User;
                            $user->setFirstname($params['POST']['firstname']);
                            $user->setLastname($params['POST']['lastname']);
                            $user->setPwd($params['POST']['password']);
                            $user->setemail($params['POST']['email']);
                            $user->setStatus('1');
                            $user->setToken("iue6484zgfi65sgv89csGVIUZEG8645");
                            $user->setId_role('5');
                            $user->save();
                        }
                    }
                }
                //si aucun champ n'est envoyé via post (accès à la page pour la 1ère fois)
                else
                {
                    $form = Auth::registerForm();
                    $v = new View("auth-register", "auth");
                    $v->assign("config", $form);
                    $v->assign("errors", '');
                }
            }
        }

        public function logoutAction($params)
        {
            //si session existante on détruit la session
            if(isset($_SESSION['user']))
            {
                session_unset();
                session_destroy();
            }

            //on renvoie vers la page de login, que l'utilisateur soit connecté ou non
            header('Location: '.DIRNAME.'index/login');
        }

        public function homeAction($params)
        {
            //si session existante on affiche la page d'accueil
            if(isset($_SESSION['user']))
            {
                $v = new View("front-home", "front");
                $v->assign('name', $_SESSION['user']['firstname']);
            }
            //sinon on renvoie vers la page de login
            else
            {
                header('Location: '.DIRNAME.'index/login');
            }
        }

        public function dashboardAction($params)
        {

        }

        public function frontAction($params)
        {
            $v = new View('front-home', 'front');
            $v->assign('name', 'Quentin');
        }

        public function backAction($params)
        {
            $v = new View('back-dashboard', 'back');
        }
    }