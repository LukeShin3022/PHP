<?php include './config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
</head>
<body>
        <form class="d-flex" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="col">
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control" name="email" id="email" placeholder="write">
                  <label for="floatingLabel">Write your email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="password"
                    class="form-control" name="pass" id="pass" placeholder="write">
                  <label for="floatingLabel">Write your password</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        
        
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    echo Display_error("Invalid Email","Please Check the email address.");
                }else{
                    $dbcon = new mysqli($dbHost,$dbUser,$dbpass,$dbName);
                    if($dbcon->connect_error){
                        die("Error connection");
                    }else{
                        $select = "SELECT * FROM customers_tb WHERE email='$email'";
                        $result = $dbcon->query($select);
                        if($result->num_rows>0){
                            $user = $result->fetch_assoc();
                            $dbcon->close();    
                            if(password_verify($pass,$user['password'])){
                                $_SESSION['user'] = $user;
                                header("Location: http://localhost/webdev/shoppingPage.php");
                                exit();
                            }else{
                                echo Display_error("Invalid Email/Password","Submitted email/password is not valid.");
                            }
                        }else{
                            echo Display_error("Invalid Email/Password","Submitted email/password is not valid.");
                        }
                    }
                }
            }
        ?>
</body>
    <script src="./js/bootstrap.bundle.min.js"></script>
</html>