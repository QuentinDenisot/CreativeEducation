 <?php
    define("DBUSER", "root");
    define("DBHOST", "db");
    define("DBNAME", "myDb");
    define("DBPWD", "test");
    define("DBPORT", "3306");
    define("DBDRIVER", "mysql");
    
    define("DS", "/");
    $scriptName = (dirname($_SERVER["SCRIPT_NAME"]) == "/") ? "" : dirname($_SERVER["SCRIPT_NAME"]);
    define("DIRNAME", $scriptName.DS);