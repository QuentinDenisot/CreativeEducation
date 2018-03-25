 <?php
    define("DBUSER", "root");
    define("DBHOST", "localhost");
    define("DBNAME", "creativeEdu");
    define("DBPWD", "");
    define("DBPORT", "3306");
    define("DBDRIVER", "mysql");

    define("DS", "/");
    $scriptName = (dirname($_SERVER["SCRIPT_NAME"]) == "/")?"":dirname($_SERVER["SCRIPT_NAME"]);
    define("DIRNAME", $scriptName.DS);