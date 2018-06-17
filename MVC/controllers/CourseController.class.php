<?php
    class CourseController
    {
        public function indexAction($params)
        {
            $course = new Course;
            $courseArray = $course->getAll();
            $v = new View("back-courses", "back");
            $v->assign('courseArray', $courseArray);
        }

        public function addAction($params)
        {
            /*récupération des variables POST*/
            
            //->nom de la page
            $name = $params['POST'][0];
            //->liste des rôles qui auront accès à la page
            $roleAccess = $params['POST'][1];
            
            /*=-Déclaration + instanciation de l'objet et exécution de la méthode-=*/

            $role = new Role;

            $role->setName($role);
            $role->setAuthorizations($authorizations);

            $role->save();
        }

        public function updateAction($params)
        {

        }

        public function deleteAction($params)
        {
            //->id du cours à supprimer
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

            $course = new Course;

            $targetedCourse = $course->getAll($queryConditions);
            $targetedCourse[0]->setStatus('0');
            $targetedCourse[0]->save();

            header('Location: '.DIRNAME.'course/index');
        }   
    }