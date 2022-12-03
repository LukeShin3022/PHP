<?php include './config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="username" placeholder="Write Username" required>
        <input type="password" name="pass">
        <button type="submit">Login</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $username = filter_var($username,FILTER_SANITIZE_EMAIL);
            if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
                echo "Please Check the email address";
            }
            $dbconn = new mysqli($dbHost, $dbUser, $dbpass, $dbName);
            if($dbconn->connect_error){
                
            }else{
                $select = "SELECT * FROM customers_tb WHERE email='$username';";
                $result = $dbconn->query($select);
                if($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    $hashedPass = $user['password'];
                    $dbconn->close();
                    if(password_verify($pass,$hashedPass)){
                        $_SESSION['user'] = $user;
                        header("Location: http://localhost/php/jsonTodb/shoopingPage.php");
                        exit();
                    }else{
                        echo "User not valid";
                    }
                }else{
                    echo "User not valid";
                }
            }
        }
    ?>
</body>
</html>