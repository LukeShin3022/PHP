<?php
    include './config.php';
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
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="uname" placeholder="Write Username">
        <input type="password" name="pass" placeholder="Write Password">
        <button type="submit">Login</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $uName = $_POST['uname'];
            $pass = $_POST['pass'];

            $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if($dbCon->connect_error){
                die("DB connection error".$dbCon->connect_error);
            }else{
                $selectQry = "SELECT * FROM user_tb WHERE userName='$uName';";
                $result = $dbCon->query($selectQry);
                if($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    $hashedPass = $user['password'];
                    if(password_verify($pass,$hashedPass)){
                        $_SESSION['user'] = $user;
                        $userName=$user['userName'];
                        $date = date('Y-m-d H:i:s',time());
                        $updateQry = $dbCon->prepare("UPDATE admin_tb SET lastLogin = ? WHERE userName = '$userName';");
                        $updateQry->bind_param("s",$date);
                        $updateQry->execute();
                        $updateQry->close();
                        header("Location: http://localhost/php/Luke-PHPV2/Luke_JStoDB.php");
                        $dbCon->close();
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