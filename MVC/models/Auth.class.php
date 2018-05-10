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
                            "account_circle",
                            "lock_outline",
                            "keyboard_arrow_right"
                        ],
                "input" => [
                    "accountName" => [
                                        "type" => "text",
                                        "placeholder" => "Nom de compte",
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
                    ]
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
                            "drafts",
                            "lock_outline",
                            "keyboard_arrow_right"
                        ],
                "input" => [
                    "accountName" => [
                                        "type" => "text",
                                        "placeholder" => "Nom de compte",
                                        "required" => true,
                                        "minString" => 2,
                                        "maxString" => 100
                                    ],
                    "email" => [
                                    "type" => "text",
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
                    ]
            ];
        }
    }