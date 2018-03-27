<?php
	class UserController
	{
		public function indexAction($params)
		{
			//vérifier que l'utilisateur soit connecté avant de le renvoyer sur la page d'accueil
			$v = new View("back-user", "back");
		}

		public function addAction($params)
		{
			/*=-Récupération des variables POST-=*/

			//prénom de l'utilisateur
			$firstname = $params['POST'][0];
			//nom de l'utilisateur
			$lastname = $params['POST'][1];
			//email de l'utilisateur
			$email = $params['POST'][2];
			//mot de passe de l'utilisateur
			$password = $params['POST'][3];
			//statut
			$status = $params['POST'][4];

			/*=-Déclaration + instanciation de l'objet et exécution de la méthode-=*/

			$user = new User;

			$user->setFirstname($firstname);
			$user->setLastname($lastname);
			$user->setemail($email);
			$user->setPwd($password);
			$user->setStatus($status);
			$user->setToken("iue6484zgfi65sgv89csGVIUZEG8645");

			$user->save();
		}

		public function updateAction($params)
		{

		}

		public function removeAction($params)
		{
			/*récupération des variables POST*/
            //->id du user à supprimer
            $id = $params['POST'][0];

            $user = new Role;

			$user->delete($id); //réfléchir à comment correctement mettre en place la suppression
		}	
	}