<?php
    class Validator
    {
        public static function validate($form, $params)
        {
            //initialisation tableau erreurs
            $errorsMsg = [];

            //parcours des inputs
            foreach($form["input"] as $name => $config)
            {
                if(isset($config["confirm"]) && $params[$name] !== $params[$config["confirm"]])
                {
                    $errorsMsg[] = $config['placeholder']." doit être identique à ".$form['input'][$config["confirm"]]['placeholder']."";
                }
                elseif(!isset($config["confirm"]))
                {
                    if($config["type"] == "email" && !self::checkEmail($params[$name]))
                    {    
                        $errorsMsg[] = $config['placeholder']." n'est pas valide";
                    }
                    elseif($config["type"] == "password" && !self::checkPwd($params[$name]))
                    {
                        $errorsMsg[] = $config['placeholder']." est incorrect (6 à 12, min, maj, chiffres)";
                    }
                }

                if(isset($config["required"]) && !self::minLength($params[$name], 1))
                {
                    $errorsMsg[] = $config['placeholder']." doit faire plus de 1 caractère";
                }

                if(isset($config["minString"]) && !self::minLength($params[$name], $config["minString"]))
                {
                    $errorsMsg[] = $config['placeholder']." doit faire plus de ".$config["minString"]." caractères";
                }

                if(isset($config["maxString"]) && !self::maxLength($params[$name], $config["maxString"]))
                {
                    $errorsMsg[] = $config['placeholder']." doit faire moins de ".$config["maxString"]." caractères";
                }

                if($name == 'captcha')
                {
                    if($params[$name] != $_SESSION['captcha'])
                    {
                        $errorsMsg[] = $config['placeholder']." est incorrect";
                    }
                }
            }

            //parcours des selects
            if(isset($form['select']))
            {
                foreach($form['select'] as $name => $config)
                {
                    if(isset($config["required"]) && $config["required"] && !self::minLength($params[$name], 1))
                    {
                        $errorsMsg[] = $config['placeholder']." est requis";
                    }
                }
            }

            return $errorsMsg;
        }

        public static function checkEmail($email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public static function checkPwd($pwd)
        {
            return strlen($pwd) > 6 && strlen($pwd) < 12 && preg_match("/[A-Z]/", $pwd) && preg_match("/[a-z]/", $pwd) && preg_match("/[0-9]/", $pwd);
        }

        public static function minLength($value, $length)
        {
            return strlen(trim($value)) >= $length;
        }

        public static function maxLength($value, $length)
        {
            return strlen(trim($value)) <= $length;
        }
    }