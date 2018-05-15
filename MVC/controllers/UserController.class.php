<?php
	class UserController
	{
		public function indexAction($params)
		{
			//vérifier que l'utilisateur soit connecté avant de le renvoyer sur la page d'accueil
			$v = new View("back-users", "back");
		}

		public function showAction($params)
		{

		}

		public function addAction($params)
		{
			if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
            {
            	$user = new User;
				$form = $user->addForm();
                $v = new View("front-adduser", "front");
                $v->assign("config", $form);
                $v->assign("errors", '');
                $v->assign('name', 'Quentin');
			}
			else
			{
				$user = new User;

				$user->setFirstname($params['POST']['firstname']);
				$user->setLastname($params['POST']['lastname']);
				$user->setPwd($params['POST']['password']);
				$user->setemail($params['POST']['email']);
				$user->setStatus($params['POST']['status']);
				$user->setToken("iue6484zgfi65sgv89csGVIUZEG8645");
				//$user->setProfilePicPath();
				$user->setId_role();

				$user->save();
			}
		}

		public function updateAction($params)
		{
			$v = new View("back-form", "back");
		}

		public function deleteAction($params)
		{
            //->id du user à supprimer
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
					'clause'=>'user.id = '.$id,
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

			$user = new User;

			$targetedUser = $user->getAll($queryConditions);
			$targetedUser[0]->setStatus('0');
			$targetedUser[0]->save();

			header('Location: '.DIRNAME.'user/index');
		}	
	}