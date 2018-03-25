<?php
    class RoleController
    {
        public function indexAction($params)
        {
            $v = new View("back-role", "back");
        }

        public function addAction($params)
        {
            /*récupération des variables POST*/
            //->nom du rôle
            $name = $params['POST'][0];
            //->liste des autorisations du rôle
            $authorizations = $params['POST'][1];
            
            $role = new Role;

            $role->setRoleName($role);
            $role->setRoleAuthorizations($authorizations);

            $role->save();
        }

        public function removeAction($params)
        {
            
        }   
    }