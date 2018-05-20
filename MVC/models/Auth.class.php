<?php
    class Auth
    {
        public static function loginForm()
        {
            return [
                "config" => [
                    "method" => "POST",
                    "action" => "index/login",
                    "button" => "CONNEXION"
                ],
                "icon" => [
                    "drafts",
                    "lock_outline",
                    "keyboard_arrow_right"
                ],
                "input" => [
                    "email" => [
                        "type" => "email",
                        "placeholder" => "Adresse mail",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ],
                    "password" => [
                        "type" => "password",
                        "placeholder" => "Mot de passe",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ]
                ],
                "captcha" => false
            ];
        }

        public static function registerForm()
        {
            return [
                "config" => [
                    "method" => "POST",
                    "action" => "index/register",
                    "button" => "INSCRIPTION"
                ],
                "icon" => [
                    "account_circle",
                    "account_circle",
                    "drafts",
                    "lock_outline",
                    "check_circle_outline",
                    "spellcheck",
                    "keyboard_arrow_right"
                ],
                "input" => [
                    "firstname" => [
                        "type" => "text",
                        "placeholder" => "Prénom",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ],
                    "lastname" => [
                        "type" => "text",
                        "placeholder" => "Nom",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ],
                    "email" => [
                        "type" => "email",
                        "placeholder" => "Adresse mail",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ],
                    "password" => [
                        "type" => "password",
                        "placeholder" => "Mot de passe",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100
                    ],
                    "passwordConfirm" => [
                        "type" => "password",
                        "placeholder" => "Confirmation mot de passe",
                        "required" => true,
                        "minString" => 2,
                        "maxString" => 100,
                        "confirm" => "password"
                    ],
                    "captcha" => [
                        "type" => "text",
                        "placeholder" => "Code de sécurité",
                        "required" => true,
                    ]
                ],
                "captcha" => true
            ];
        }
    }