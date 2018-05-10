<?php
    class IndexController
    {
        public function indexAction($params)
        {
            $form = Auth::loginForm();
            $v = new View("auth-login", "auth");
            $v->assign("config", $form);
            $v->assign("errors", 'testErrors');
        }

        public function loginAction($params)
        {
            if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
            {
                $form = Auth::loginForm();
                $v = new View("auth-login", "auth");
                $v->assign("config", $form);
                $v->assign("errors", 'testErrors');
            }
            else
            {
                $v = new View("front-home", "front");
                $v->assign('name', 'Quentin');
            }
        }

        public function registerAction($params)
        {
            if(count($params['POST']) != count(array_filter($params['POST'])) || empty($params['POST']))
            {
                $form = Auth::registerForm();
                $v = new View("auth-register", "auth");
                $v->assign("config", $form);
                $v->assign("errors", 'testErrors');
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