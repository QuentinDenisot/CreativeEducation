<?php
    class Validator
    {
        public static function validate($form, $params)
        {
            $errorsMsg = [];

            foreach ($form["input"] as $name => $config)
            {    
                if(isset($config["confirm"]) && $params[$name] !== $params[$config["confirm"]])
                {
                    $errorsMsg[] = $name." doit être identique à ".$config["confirm"];
                }
                elseif(!isset($config["confirm"]))
                {
                    if($config["type"] == "email" && !self::checkEmail($params[$name]))
                    {    
                        $errorsMsg[] = "L'email n'est pas valide";
                    }
                    elseif($config["type"] == "password" && !self::checkPwd($params[$name]))
                    {
                        $errorsMsg[] = "Le mot de passe est incorrect (6 à 12, min, maj, chiffres)";
                    }
                }

                if(isset($config["required"]) && !self::minLength($params[$name], 1))
                {
                    $errorsMsg[] = $name." doit faire plus de 1 caractère";
                }

                if(isset($config["minString"]) && !self::minLength($params[$name], $config["minString"]))
                {
                    $errorsMsg[] = $name." doit faire plus de ".$config["minString"]." caractères";
                }

                if(isset($config["maxString"]) && !self::maxLength($params[$name], $config["maxString"]))
                {
                    $errorsMsg[] = $name." doit faire moins de ".$config["maxString"]." caractères";
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