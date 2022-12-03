<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="fname" placeholder="Write your first name">
        <input type="text" name="lname" placeholder="Write your last name">
        <input type="submit" value="SEND">
    </form>

    <?php
    
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            if($fname!="" && $lname!=""){
                echo "your name is $fname $lname";

            }else{

            }
        }elseif($_SERVER['REQUEST_METHOD']=="GET"){
            echo "WELCOME";
        }

        switch($_SERVER['REQUEST_METHOD']){
            case "POST":
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                if($fname!="" && $lname!=""){
                    echo "<br> your name is $fname $lname";

                }else{

                }
            break;
            case "GET":
                echo "WELCOME";
            break;

        }
    ?>
</body>
</html>