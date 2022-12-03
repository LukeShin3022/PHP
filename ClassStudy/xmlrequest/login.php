<?php
include '../database/dbconfig.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $pass = $_POST['pass'];
        if(filter_var($email,FILTER_VALIDATE_EMAIL) && $pass!=""){
            $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
            if($dbcon -> connect_error){
                echo "Connection to Database Error";
            }else{
                $select = "SELECT * FROM user_tb WHERE email='$email'";
                $result = $dbcon -> query($select);
                if($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    $dbcon->close();
                    if(password_verify($pass,$user['pass'])){
                        echo json_encode($user);
                    }else{
                        echo "Username/Password not valid";
                        $dbcon->close();
                    }
                }else{ 
                    echo "Username/Password not valid";
                    $dbcon->close();
                }
            }
        }else{
            echo "NOT VALID INPUT";
        }
    }

?>