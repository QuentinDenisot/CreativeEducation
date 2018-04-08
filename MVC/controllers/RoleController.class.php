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
            
            /*=-Déclaration + instanciation de l'objet et exécution de la méthode-=*/

            $role = new Role;

            $role->setName($role);
            $role->setAuthorizations($authorizations);

            $role->save();
        }

        public function updateAction($params)
        {

        }

        public function removeAction($params)
        {
            /*récupération des variables POST*/
            //->id du rôle à supprimer
            $id = $params['POST'][0];

            $role = new Role;

            $role->delete($id); //réfléchir à comment correctement mettre en place la suppression
        }   
    }