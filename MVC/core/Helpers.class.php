<?php
    class Helpers
    {
        public static function cleanFirstname($firstname)
        {
            return ucfirst(mb_strtolower($firstname));
        }

        public static function cleanLastname($lastname)
        {
            return mb_strtoupper($lastname);
        }

        public static function europeanDateFormat($date)
        {
            $date = substr($date, 0, 10);

            return date('d/m/Y', strtotime($date));
        }
    }