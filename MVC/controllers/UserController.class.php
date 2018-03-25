<?php
	class UserController
	{
		public function indexAction($params)
		{
			$v = new View("back-user", "front");
		}

		public function connectAction($params)
		{

		}

		public function addAction($params)
		{
			/*récupération des variables POST*/
			$firstname = $params['POST'][0];
			$lastname = $params['POST'][1];
			$email = $params['POST'][2];
			$password = $params['POST'][3];
			$status = $params['POST'][4];

			$user = new User;

			$user->setFirstname($firstname);
			$user->setLastname($lastname);
			$user->setemail($email));
			$user->setPwd($password);
			$user->setStatus($status);
			$user->setToken("iue6484zgfi65sgv89csGVIUZEG8645");

			$user->save();
		}

		public function removeAction($params)
		{
			/*echo "Action de suppression d'un user";
			echo "<pre>";
			print_r($params);*/
			$v = new View("removeUser", "front");
		}	
	}