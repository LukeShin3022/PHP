<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "phonebook_db";
    session_start();


    class uservalid{
        private $userData;

        function __construct($user)
        {
            $this->userData = $user;

        }
        function validateUser(){
            $dbCon = new mysqli("localhost", "root", "", "phonebook_db");
            $uName = $this->userData['userName'];
            if ($dbCon->connect_error){
                echo "DB connection error".$dbCon->connect_error;
            }else{
                $selectQry = "SELECT * FROM admin_tb WHERE userName = '$uName'";
                $result = $dbCon->query($selectQry);
                $userName = $result->fetch_assoc();

                if($userName['userName']==$uName){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
        }
    }

?>