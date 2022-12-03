<?php

    include "./config.php";
    if(!isset($_COOKIE['firstname'])){
        createCooke("firstname","Luke", 2);
        createCooke("lastname","Shin", 2);
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
        if(isset($_COOKIE['firstname'])){
            echo "<h1>".$_COOKIE['firstname']." ".$_COOKIE['lastname']."</h1>";
        }else{
            echo "<h1>WELCOME</h1>";
        }

    ?>
</body>
</html>