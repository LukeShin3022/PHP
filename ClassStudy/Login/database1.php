<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input name="fname" require/>
        <input name="lname" require/>
        <input type="date" name="dob" require/>
        <input type="email" name="email" require/>
        <input type="password" name="pass" require/>
        <input name="phone" require/>
        <input name="addr" require/>
        <button type="submit">Register</button>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $dbUsername = "root";
            $dbServername = "localhost";
            $dbPass = "";
            $dbname = "students_db";
            $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
            if($dbCon->connect_error){
                die("Connection error ".$dbCon->connect_error);
            }else{
                $pass = password_hash($_POST['pass'],PASSWORD_BCRYPT,["cost"=>9]);
                $insertCmd = "INSERT INTO user_tb (firstName,lastName,email,pass,dob,phone,addr) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$pass."','".$_POST['dob']."','".$_POST['phone']."','".$_POST['addr']."')";
                $result = $dbCon->query($insertCmd);
                if($result === true){
                    echo "<h1 style='color: green;'>DONE!!!!!</h1>";
                }else{
                    echo "<h1 style='color: red;'>".$dbCon->error."</h1>";
                }
                $dbCon->close();
            }
        }
    ?>
</body>
</html>