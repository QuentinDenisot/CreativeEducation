<?php
    class PageController
    {
        public function indexAction($params)
        {
            $v = new View("back-page", "back");
        }

        public function addAction($params)
        {
            /*récupération des variables POST*/
            //->nom de la page
            $name = $params['POST'][0];
            //->liste des rôles qui auront accès à la page
            $roleAccess = $params['POST'][1];
            
            $role = new Role;

            $role->setRoleName($role);
            $role->setRoleAuthorizations($authorizations);

            $role->save();
        }

        public function removeAction($params)
        {
            /*récupération des variables POST*/
            //->id de la page à supprimer
            $id = $params['POST'][0];

            $role = new Role;

            $role->delete();
        }   
    }