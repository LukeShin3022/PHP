<?php
    include "./dbconfig.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?>>
        <input type="email" name="username">
        <input type="password" name="pass">
        <button type="submit">Login</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $dbconn = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
            if($dbconn->connect_error){
                die("Error: ".$dbconn->connect_error);
            }else{
                $selectCmd = "SELECT * FROM user_tb WHERE email='$username';";
                // $selectCmd = "SELECT * FROM `user_tb` WHERE email='$username' and password='$pass';";
                $result = $dbconn->query($selectCmd);
                // print_r($result);
                if($result->num_rows > 0){
                    echo "User valid";
                    $user = $result->fetch_assoc();
                    $hashedPass = $user['password'];
                    $pass = password_hash($pass,PASSWORD_BCRYPT,["cost" => 8]);
                    
                    $hashedPass = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 9]);
                    if(password_verify($pass,$hashedPass)){
                        $_SESSION['user'] = $user;
                        $_SESSION['session_timeout'] = time() + 30;
                        $dbconn->close();
                        header("Location: http://localhost/php/database/welcome.php");
                    }else{
                        echo "User not valid";
                    }
                }else{
                    echo "User not valid";
                }
            }
            $dbconn->close();
        }
    ?>
     
</body>
</html>