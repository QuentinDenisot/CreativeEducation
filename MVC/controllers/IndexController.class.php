<?php
    class IndexController
    {
        public function indexAction($params)
        {
            $v = new View("auth-login", "auth");
        }

        public function loginAction($params)
        {
            if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
            {
                $v = new View("auth-login", "auth");
            }
            else
            {
                $v = new View("front-home", "front");
                $v->assign('name', 'Quentin');
                /*print_r($params['POST']);
                echo count($params['POST']).' '.count(array_filter($params['POST']));*/
            }
        }

        public function registerAction($params)
        {
            if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
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