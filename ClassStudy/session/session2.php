<?php
    session_start();
    if ($_SESSION['session_timeout'] > time()){
        if(isset($_SESSION['fname']) && isset($_SESSION['lname'])){
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
        }else{
            header("Location: http://localhost/PHP/session1.php");
        }
    }else{
        header("Location: http://localhost/PHP/session1.php");
    }
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
    <a href="<?php echo $_SERVER['PHP_SELF'].'?action=exit'; ?>">EXIT</a>
    <?php
        echo "<h1>$fname $lname</h1>";
    
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            switch($action){
                case "exit":
                    session_unset();
                    session_destroy();
                    header("Location: http://localhost/PHP/session1.php");
                break;
            }
        }
    ?>
</body>
</html>
