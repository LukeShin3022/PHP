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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="uname" placeholder="Write Username">
        <input type="password" name="pass" placeholder="Write Password">
        <button type="submit">Register</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $uName = $_POST['uname'];
            $pass = $_POST['pass'];
            $pass = password_hash($pass,PASSWORD_BCRYPT,["cost"=>8]);

            $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if($dbCon->connect_error){
                die("DB connection error".$dbCon->connect_error);
            }else{
                $selectQry = "SELECT * FROM admin_tb WHERE userName = '$uName'";
                $result = $dbCon->query($selectQry);
                if($result->num_rows > 0){
                    echo "User Name does exist";
                    $dbCon->close();
                }else{
                    $insertQry = $dbCon->prepare("INSERT INTO admin_tb(userName,password,lastLogin) VALUES(?,?,?);");
                    $date = date('Y-m-d H:i:s',time());
                    $insertQry->bind_param("sss",$uName,$pass,$date);
                    $insertQry->execute();
                    $insertQry->close();
                    $dbCon->close();
                }
            }
        }
    ?>
</body>
</html>