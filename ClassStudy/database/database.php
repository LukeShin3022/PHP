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
        <input type="text" name="fname" require>
        <input type="text" name="lname" require>
        <input type="email" name="email" require>
        <input type="password" name="pass" require>
        <input type="date" name="dob" require>
        <input type="text" name="phone" require>
        <input type="text" name="addr" require>
        <button type="submit">Register</button>
    </form>
    <?php
        $dbusername ="root";
        $dbServername ="localhost";
        $dbPass="";
        $dbName="students_db";
        $tbName="user_tb";
        $dbCon = new mysqli($dbServername,$dbusername,$dbPass,$dbName);
        if($dbCon->connect_error){
            die("Connection error ".$dbcon->connect_error);
        }else{
            echo "Connected";
            if(isset($_POST['fname'])){
                $insertQry = "INSERT INTO $tbName(firstName,lastName,email,password,dob,phone,addr,salt) VALUES('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['pass']."','".$_POST['dob']."','".$_POST['phone']."','".$_POST['addr']."','salt')";
                // echo $insertQry;
                $result = mysqli_query($dbCon,$insertQry);
                var_dump($result);
                if($result === true){
                    echo "<h1>Done!!</h1>";
                }else{
                    echo "<h1>Done!!".$dbcon->error."</h1>";
                }
                $dbCon -> close();
            }else{
                echo "Put in the data at the form!";
            }
        }



    ?>
</body>
</html>