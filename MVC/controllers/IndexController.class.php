<?php
    class IndexController
    {
        public function indexAction($params)
        {
            //Gérer la connexion ici

            //$name = $_SESSION['username'];

            $v = new View('front-home', 'front');
            //$v->assign('name', $name);
            $v->assign('name', 'Quentin');

            /*$v = new View("auth-login", "auth");
            
            */
        }

        public function loginAction($params)
        {

        }

        public function logoutAction($params)
        {

        }

        public function backAction($params)
        {
            $v = new View('back-dashboard', 'back');
        }
    }