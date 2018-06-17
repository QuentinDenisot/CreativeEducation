<?php
	class UserController
	{
		public function indexAction($params)
		{
			$user = new User();

			//vérification user connecté
            if($user->isConnected())
            {
            	//vérification user admin
            	if($user->isAdmin())
            	{
            		$userArray = $user->getAll();
					//vérifier que l'utilisateur soit connecté avant de le renvoyer sur la page d'accueil
					$v = new View("back-users", "back");
					$v->assign('userArray', $userArray);
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

		public function showAction($params)
		{
			

			/*$v->assign('lastname', $targetedUser[0]->getLastname());
			$v->assign('firstname', $targetedUser[0]->getFirstname());
			$v->assign('email', $targetedUser[0]->getEmail());
			$v->assign('role', $targetedUser[0]->getId_role());*/
		}

		public function addAction($params)
		{
			if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
            {
            	$user = new User();
				$form = $user->addForm();
                $v = new View("front-adduser", "front");
                $v->assign("config", $form);
                $v->assign("errors", '');
                $v->assign('name', 'Quentin');
			}
			else
			{
				$user = new User();

				$user->setFirstname($params['POST']['firstname']);
				$user->setLastname($params['POST']['lastname']);
				$user->setPwd($params['POST']['password']);
				$user->setemail($params['POST']['email']);
				$user->setStatus($params['POST']['status']);
				$user->setToken("iue6484zgfi65sgv89csGVIUZEG8645");
				$user->setId_role();

				$user->save();
			}
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
	                	//print_r($params['POST']);
	                	$form = $user->updateUserForm();
	                	$errors = Validator::validate($form, $params['POST']);

	                	//s'il y a des erreurs avec les données saisies dans le formulaire on les affiche
	                    if(!empty($errors))
	                    {
	                        $v = new View("back-update", "back");
	                        $v->assign("config", $form);
	                        $v->assign("errors", $errors);
	                        $v->assign("fieldValues", $params['POST']);
	                    }
	                    //sinon on renvoie sur la même page avec message de succès + on met à jour l'utilisateur
	                    else
	                    {
	                    	//id du user à modifier
							$id = $params['URL'][0];

							//récupération user
							$queryConditions = [
								'select'=>[
									'user.*'
								],
								'join'=>[
									'inner_join'=>[],
									'left_join'=>[],
									'right_join'=>[]
								],
								'where'=>[
									'clause'=>'`user`.`id` = '.$id,
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

							$user = new User();
							$targetedUser = $user->getAll($queryConditions)[0];

							//attribution nouvelles données
							$targetedUser->setFirstname($params['POST']['firstname']);
							$targetedUser->setLastname($params['POST']['lastname']);
							$targetedUser->setEmail($params['POST']['email']);
							$targetedUser->setId_role($params['POST']['role']);

							//mise à jour
							$targetedUser->save();

							//affichage message succès
							$v = new View("back-update", "back");
	                        $v->assign("config", $form);
	                        $v->assign("errors", 'La modification de l\'utilisateur a été prise en compte');
	                        $v->assign("fieldValues", $params['POST']);
	                    }
	                }
	                else
	                {
	                	//id du user à modifier
						$id = $params['URL'][0];

						$queryConditions = [
							'select'=>[
								'user.*'
							],
							'join'=>[
								'inner_join'=>[],
								'left_join'=>[],
								'right_join'=>[]
							],
							'where'=>[
								'clause'=>'`user`.`id` = '.$id,
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

						$user = new User();
						$targetedUser = $user->getAll($queryConditions)[0];

						//données à transmettre dans la form afin de pré remplir les champs
						$fieldValues = [
							'firstname' => Helpers::cleanFirstname($targetedUser->getFirstname()),
							'lastname' => Helpers::cleanLastname($targetedUser->getLastname()),
							'email' => $targetedUser->getEmail(),
							'role' => $targetedUser->getId_role()
					    ];

						$form = $user->updateUserForm();
			            
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
            //id du user à supprimer
            $id = $params['URL'][0];

			$queryConditions = [
				'select'=>[
					'user.*'
				],
				'join'=>[
					'inner_join'=>[],
					'left_join'=>[],
					'right_join'=>[]
				],
				'where'=>[
					'clause'=>'`user`.`id` = '.$id,
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

			$user = new User();

			$targetedUser = $user->getAll($queryConditions);
			$targetedUser[0]->setStatus('0');
			$targetedUser[0]->save();

			header('Location: '.DIRNAME.'user/index');
		}	
	}