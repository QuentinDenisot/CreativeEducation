<?php
    class IndexController
    {
        public function indexAction($params)
        {
            //$name = $_SESSION['username'];

    		$v = new View("front-home", "front");
            //$v->assign('name', $name);
            $v->assign('name', 'Quentin');
    	}
    }