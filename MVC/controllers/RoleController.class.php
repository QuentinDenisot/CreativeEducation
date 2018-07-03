<?php
    class RoleController
    {
        public function indexAction($params)
        {
            $role = new Role;
            $roleArray = $role->getAll();
            $v = new View("back-roles", "back");
            $v->assign('roleArray', $roleArray);
        }

        public function addAction($params)
        {
            
        }

        public function updateAction($params)
        {
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin())
                {
                    //si tous les champs sont remplis
                    if(!empty($params['POST']))
                    {
                        $role = new Role();
                        $form = $role->updateRoleForm();
                        $errors = Validator::validate($form, $params['POST']);

                        //s'il y a des erreurs avec les données saisies dans le formulaire on les affiche
                        if(!empty($errors))
                        {
                            $v = new View("back-update", "back");
                            $v->assign("config", $form);
                            $v->assign("errors", $errors);
                            $v->assign("fieldValues", $params['POST']);

                            //alerts
                            foreach($errors as $error)
                            {
                                $alert = new Alert($error, 'error');
                            }
                        }
                        //sinon on renvoie sur la même page avec message de succès + on met à jour le rôle
                        else
                        {
                            //id du rôle à modifier
                            $id = $params['URL'][0];

                            //récupération rôle
                            $queryConditions = [
                                'select'=>[
                                    'role.*'
                                ],
                                'join'=>[
                                    'inner_join'=>[],
                                    'left_join'=>[],
                                    'right_join'=>[]
                                ],
                                'where'=>[
                                    'clause'=>'`role`.`id` = '.$id,
                                    'and'=>[],
                                    'or'=>[]
                                ],
                                'and'=>[
                                    [
                                        'clause'=>'',
                                        'and'=>[],
                                        'or'=>[]
                                    ]
                                ],
                                'or'=>[
                                    [
                                        'clause'=>'',
                                        'and'=>[],
                                        'or'=>[]
                                    ]
                                ],
                                'group_by'=>[],
                                'having'=>[
                                    'clause'=>'',
                                    'and'=>[],
                                    'or'=>[]
                                ],
                                'order_by'=>[
                                    'asc'=>[],
                                    'desc'=>[]
                                ],
                                'limit'=>[
                                    'offset'=>'',
                                    'range'=>''
                                ]
                            ];

                            $role = new Role();
                            $targetedRole = $role->getAll($queryConditions)[0];

                            //attribution nouvelles données
                            $targetedRole->setName($params['POST']['name']);

                            //mise à jour
                            $targetedRole->save();

                            //affichage message succès
                            $v = new View("back-update", "back");
                            $v->assign("config", $form);
                            $v->assign("errors", '');
                            $v->assign("fieldValues", $params['POST']);

                            $alert = new Alert("Modification effectuée", 'success');
                        }
                    }
                    else
                    {
                        //id du rôle à modifier
                        $id = $params['URL'][0];

                        $queryConditions = [
                            'select'=>[
                                'role.*'
                            ],
                            'join'=>[
                                'inner_join'=>[],
                                'left_join'=>[],
                                'right_join'=>[]
                            ],
                            'where'=>[
                                'clause'=>'`role`.`id` = '.$id,
                                'and'=>[],
                                'or'=>[]
                            ],
                            'and'=>[
                                [
                                    'clause'=>'',
                                    'and'=>[],
                                    'or'=>[]
                                ]
                            ],
                            'or'=>[
                                [
                                    'clause'=>'',
                                    'and'=>[],
                                    'or'=>[]
                                ]
                            ],
                            'group_by'=>[],
                            'having'=>[
                                'clause'=>'',
                                'and'=>[],
                                'or'=>[]
                            ],
                            'order_by'=>[
                                'asc'=>[],
                                'desc'=>[]
                            ],
                            'limit'=>[
                                'offset'=>'',
                                'range'=>''
                            ]
                        ];

                        $role = new Role();
                        $targetedRole = $role->getAll($queryConditions)[0];

                        //données à transmettre dans la form afin de pré remplir les champs
                        $fieldValues = [
                            'name' => $targetedRole->getName()
                        ];

                        $form = $role->updateRoleForm();
                        
                        $v = new View("back-update", "back");
                        $v->assign("config", $form);
                        $v->assign("errors", '');
                        $v->assign("fieldValues", $fieldValues);
                    }
                }
                //sinon on le renvoie la home
                else
                {
                    header('Location: '.DIRNAME.'index/home');
                }
            }
            //sinon on renvoie vers la page de login
            else
            {
                header('Location: '.DIRNAME.'index/login');
            }
        }

        public function deleteAction($params)
        {
            //->id du role à supprimer
            $id = $params['URL'][0];

            $queryConditions = [
                'select'=>[
                    'role.*'
                ],
                'join'=>[
                    'inner_join'=>[],
                    'left_join'=>[],
                    'right_join'=>[]
                ],
                'where'=>[
                    'clause'=>'role.id = '.$id,
                    'and'=>[],
                    'or'=>[]
                ],
                'and'=>[
                    [
                        'clause'=>'',
                        'and'=>[],
                        'or'=>[]
                    ]
                ],
                'or'=>[
                    [
                        'clause'=>'',
                        'and'=>[],
                        'or'=>[]
                    ]
                ],
                'group_by'=>[],
                'having'=>[
                    'clause'=>'',
                    'and'=>[],
                    'or'=>[]
                ],
                'order_by'=>[
                    'asc'=>[],
                    'desc'=>[]
                ],
                'limit'=>[
                    'offset'=>'',
                    'range'=>''
                ]
            ];

            $role = new Role;

            $targetedRole = $role->getAll($queryConditions);
            $targetedRole[0]->setStatus('0');
            $targetedRole[0]->save();

            header('Location: '.DIRNAME.'role/index');
        }   
    }