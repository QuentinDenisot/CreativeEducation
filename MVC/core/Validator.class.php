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
                    $errorsMsg[] = "<b>".$config['placeholder']."</b> doit être identique à <b>".$form['input'][$config["confirm"]]['placeholder']."</b>";
                }
                elseif(!isset($config["confirm"]))
                {
                    if($config["type"] == "email" && !self::checkEmail($params[$name]))
                    {    
                        $errorsMsg[] = "<b>".$config['placeholder']."</b> n'est pas valide";
                    }
                    elseif($config["type"] == "password" && !self::checkPwd($params[$name]))
                    {
                        $errorsMsg[] = "<b>".$config['placeholder']."</b> est incorrect (6 à 12, min, maj, chiffres)";
                    }
                }

                if(isset($config["required"]) && !self::minLength($params[$name], 1))
                {
                    $errorsMsg[] = "<b>".$config['placeholder']."</b> doit faire plus de 1 caractère";
                }

                if(isset($config["minString"]) && !self::minLength($params[$name], $config["minString"]))
                {
                    $errorsMsg[] = "<b>".$config['placeholder']."</b> doit faire plus de ".$config["minString"]." caractères";
                }

                if(isset($config["maxString"]) && !self::maxLength($params[$name], $config["maxString"]))
                {
                    $errorsMsg[] = "<b>".$config['placeholder']."</b> doit faire moins de ".$config["maxString"]." caractères";
                }

                if($name == 'captcha')
                {
                    if($params[$name] != $_SESSION['captcha'])
                    {
                        $errorsMsg[] = "<b>".$config['placeholder']."</b> est incorrect";
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