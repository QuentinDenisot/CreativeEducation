<?php
    class CourseController
    {
        public function indexAction($params)
        {
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin() || $user->isProfessor())
                {
                    $course = new Course();
                    $courseArray = $course->getAll();
                    $v = new View("back-courses", "back");
                    $v->assign('courseArray', $courseArray);
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

        public function addAction($params)
        {
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin() || $user->isProfessor())
                {
                    //si tous les champs sont remplis
                    if(!empty($params['POST']) && !empty($params['FILES']))
                    {
                        $course = new Course();
                        $form = $course->addCourseForm();
                        $errors = Validator::validate($form, $params['POST'], $params['FILES']);

                        //s'il y a des erreurs avec les données saisies dans le formulaire on les affiche
                        if(!empty($errors))
                        {
                            $v = new View("back-add", "back");
                            $v->assign("config", $form);
                            $v->assign("errors", $errors);
                            $v->assign("fieldValues", $params['POST']);

                            //alerts
                            foreach($errors as $error)
                            {
                                $alert = new Alert($error, 'error');
                            }
                        }
                        //sinon on renvoie sur la même page avec message de succès + on enregistre le cours
                        else
                        {
                            //variables fichier
                            $file = $params['FILES']['file'];
                            $filename = $file['name'];
                            $filenameTmp = $file['tmp_name'];
                            $extension = pathinfo($filename, PATHINFO_EXTENSION);
                            $nameToSave = $_SESSION['user']['id'].'_'.uniqid();
                            $target = 'public/courses/'.$nameToSave.'.'.$extension;

                            //var_dump($file);

                            //si enregistrement du fichier on enregistre le cours en bdd
                            if(move_uploaded_file($filenameTmp, $target))
                            {
                                //création du cours
                                $course = new Course();
                                $course->setTitle($params['POST']['title']);
                                $course->setDescription($params['POST']['description']);
                                $course->setFilePath($target);
                                $course->setFileName($filename);
                                $course->setStatus('1');
                                $course->setId_user($_SESSION['user']['id']);
                                $course->save();

                                $v = new View("back-add", "back");
                                $v->assign("config", $form);
                                $v->assign("errors", '');
                                $v->assign("fieldValues", null);

                                $alert = new Alert("Le cours a été enregistré avec succès", 'success');
                            }
                            //sinon erreur
                            else
                            {
                                $alert = new Alert("Un problème est survenu lors de l'enregistrement du fichier", 'error');
                            }
                        }
                    }
                    //sinon, premier chargement de la page
                    else
                    {
                        $course = new Course();
                        $form = $course->addCourseForm();
                        
                        $v = new View("back-add", "back");
                        $v->assign("config", $form);
                        $v->assign("errors", '');
                        $v->assign("fieldValues", null);
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

        public function updateAction($params)
        {
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin() || $user->isProfessor())
                {
                    //si tous les champs sont remplis
                    if(!empty($params['POST']))
                    {
                        $course = new Course();
                        $form = $course->updateCourseForm();
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
                        //sinon on renvoie sur la même page avec message de succès + on met à jour le cours
                        else
                        {
                            //id du cours à modifier
                            $id = $params['URL'][0];

                            //récupération cours
                            $queryConditions = [
                                'select'=>[
                                    'course.*'
                                ],
                                'join'=>[
                                    'inner_join'=>[],
                                    'left_join'=>[],
                                    'right_join'=>[]
                                ],
                                'where'=>[
                                    'clause'=>'`course`.`id` = '.$id,
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

                            $course = new Course();
                            $targetedCourse = $course->getAll($queryConditions)[0];

                            //attribution nouvelles données
                            $targetedCourse->setTitle($params['POST']['title']);
                            $targetedCourse->setStatus($params['POST']['status']);

                            //mise à jour
                            $targetedCourse->save();

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
                        //id du cours à modifier
                        $id = $params['URL'][0];

                        $queryConditions = [
                            'select'=>[
                                'course.*'
                            ],
                            'join'=>[
                                'inner_join'=>[],
                                'left_join'=>[],
                                'right_join'=>[]
                            ],
                            'where'=>[
                                'clause'=>'`course`.`id` = '.$id,
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

                        $course = new Course();
                        $targetedCourse = $course->getAll($queryConditions)[0];

                        //données à transmettre dans la form afin de pré remplir les champs
                        $fieldValues = [
                            'title' => $targetedCourse->getTitle(),
                            'status' => $targetedCourse->getStatus()
                        ];

                        $form = $course->updateCourseForm();
                        
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
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin() || $user->isProfessor())
                {
                    //id du cours à supprimer
                    $id = $params['URL'][0];

                    //si l'id est renseigné et qu'il s'agit d'un nombre
                    if(trim($id) != '' && is_numeric($id))
                    {
                        $queryConditions = [
                            'select'=>[
                                'course.*'
                            ],
                            'join'=>[
                                'inner_join'=>[],
                                'left_join'=>[],
                                'right_join'=>[]
                            ],
                            'where'=>[
                                'clause'=>'course.id = '.$id,
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

                        $course = new Course();

                        $targetedCourse = $course->getAll($queryConditions);
                        $targetedCourse[0]->setStatus('0');
                        $targetedCourse[0]->save();

                        header('Location: '.DIRNAME.'course/index');
                    }
                    //sinon 404
                    else
                    {
                        header('Location: '.DIRNAME.'error/404');
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

        public function activateAction($params)
        {
            $user = new User();

            //vérification user connecté
            if($user->isConnected())
            {
                //vérification user admin
                if($user->isAdmin() || $user->isProfessor())
                {
                    //id du cours à supprimer
                    $id = $params['URL'][0];

                    //si l'id est renseigné et qu'il s'agit d'un nombre
                    if(trim($id) != '' && is_numeric($id))
                    {
                        $queryConditions = [
                            'select'=>[
                                'course.*'
                            ],
                            'join'=>[
                                'inner_join'=>[],
                                'left_join'=>[],
                                'right_join'=>[]
                            ],
                            'where'=>[
                                'clause'=>'`course`.`id` = '.$id,
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

                        $course = new Course();

                        $targetedCourse = $course->getAll($queryConditions);
                        $targetedCourse[0]->setStatus('1');
                        $targetedCourse[0]->save();

                        header('Location: '.DIRNAME.'course/index');
                    }
                    //sinon 404
                    else
                    {
                        header('Location: '.DIRNAME.'error/404');
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
    }