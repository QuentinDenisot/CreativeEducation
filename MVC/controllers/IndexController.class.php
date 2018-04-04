<?php
    class IndexController
    {
        public function indexAction($params)
        {
            //Gérer la connexion ici

            //$name = $_SESSION['username'];

            /*$v = new View('front-home', 'front');
            //$v->assign('name', $name);
            $v->assign('name', 'Quentin');*/

            $v = new View("auth-login", "auth");
        }

        public function loginAction($params)
        {
            if(empty(array_filter($params)))
            {
                $v = new View("auth-login", "auth"); 
            }
        }

        public function registerAction($params)
        {
            if(empty(array_filter($params)))
            {
                $v = new View("auth-register", "auth"); 
            }
        }

        public function logoutAction($params)
        {

        }

        public function frontAction($params)
        {
            $v = new View('front-home', 'front');
            $v->assign('name', 'Quentin');
        }

        public function backAction($params)
        {
            $v = new View('back-dashboard', 'back');
        }
    }