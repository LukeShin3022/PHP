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
        <input type="text" name="cname">
        <input type="email" name="email">
        <input type="password" name="pass">
        <textarea name="addr"></textarea>
        <button type="submit">Register</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $CNAME = $_POST['cname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $addr = $_POST['addr'];
            $email = filter_var($email,FILTER_SANITIZE_EMAIL);
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $hashPass = password_hash($pass,PASSWORD_BCRYPT,['cost'=>9]);
                $dbcon = new mysqli($dbHost,$dbUser,$dbpass,$dbName);
                if($dbcon->connect_error){

                }else{
                    $select = "select * from customers_tb where email='$email'";
                    $result = $dbcon->query($select);
                    if($result->num_rows > 0){
                        echo "User Already exists";
                    }else{
                        $insert = $dbcon -> prepare("INSERT INTO customers_tb (customerName, email, password,customerAddress) VALUES(?,?,?,?)");
                        $insert->bind_param("ssss",$CNAME,$email,$hashPass,$addr);
                        if($insert->execute()){
                            echo "User registered";
                        }else{
                            echo "User not registered";
                        }
                        $insert->close();
                        $dbcon->close();
                    }
                }
            }
        }
    ?>
</body>
</html>