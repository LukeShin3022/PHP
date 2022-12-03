<?php
    session_start();
    if ($_SESSION['session_timeout'] > time()){
        if(!isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            header("Location: http://localhost/PHP/datapase/login.php");
        }else{
            $fname = $_SESSION['user']['firstName'];
            $lname = $_SESSION['user']['lastName'];
        }
    }else{
        session_unset();
        session_destroy();
        header("Location: http://localhost/PHP/database/login.php");
    }
    if($_SERVER[$_GET['action']]){
        header("Location: http://localhost/PHP/database/login.php");
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
    <?php
        // print_r($_SESSION['user']);
        echo "<h1>Welcome ".$fname." ".$lname."</h1>";
        echo "<a href=".$_SERVER['PHP_SELF']."?action=exit>LOGOUT</a>"
    ?>
</body>
</html>