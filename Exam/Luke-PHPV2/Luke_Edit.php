<?php
    include './config.php';

    $userValid = new uservalid($_SESSION['user']);
    if($userValid -> validateUser()){
        echo "Welcome : ".$_SESSION['user']['userName'];
    }else{
        echo "Not valid User";
        header("Location: http://localhost/php/Luke-PHPV2/Luke_Login.php");
    }

    $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if($dbCon->connect_error){
        echo "DB connection error".$dbCon->connect_error;
    }else{
        $selectQry = "SELECT * FROM contacts_tb";
        $contactArray = [];
        $result = $dbCon->query($selectQry);
        while($row = $result->fetch_assoc()){
            array_push($contactArray,$row);
        }
        $dbCon->close();
    }

?>
