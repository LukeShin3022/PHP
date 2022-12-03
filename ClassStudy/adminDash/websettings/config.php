<?php

$GLOBALS['dbSeverrname'] = "localhost";
$GLOBALS['dbUsername'] = "root";
$GLOBALS['dbPass'] = "";
$GLOBALS['dbName'] = "students_db";
session_start();
if(isset($_GET['action'])){
    switch($_GET['action']){
        case "logout":
            session_unset();
            session_destroy();
            header("Location: ".parse_url($_SERVER['REQUEST_URI'],PHP_URL_HOST)."/");
            break;
    }
}
function db_connect($databaseName ='students_db'){
    $dbCon = new mysqli($GLOBALS['dbSeverrname'], $GLOBALS['dbUsername'], $GLOBALS['dbPass'], $databaseName);

    if($dbCon -> connect_error){
        echo "Connection Error";
        return false;
    }
}


function find_username($tableName, $fieldname, $username){
    $dbCon = db_connect();
    if ($dbCon !== false){

    }else{

    }
}
    function Sanitize_input($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        return $value;
    }


?>