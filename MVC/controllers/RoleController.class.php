<?php
    class RoleController
    {
        public function indexAction($params)
        {
            $v = new View("back-roles", "back");
        }

        public function addAction($params)
        {
            /*récupération des variables POST*/

            //->nom du rôle
            $name = $params['POST'][0];
            //->liste des autorisations du rôle
            $authorizations = $params['POST'][1];
            
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