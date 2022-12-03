<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luke-Travels</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="name" placeholder="Write your Name">
        <input type="text" name="place" placeholder="Write your Place">
        <button type="submit">Send</button>
    </form>

    <?php
        
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $myName = $_POST['name'];
            $myPlace = $_POST['place'];
            $dir = "./".$myName;
            $fileName = $dir."/MyPlaces.txt";


            if(!is_dir($dir)){
                mkdir($dir,true);
                $fp = fopen($fileName,"w");
                fwrite($fp, $myPlace);
                fclose($fp);
                echo "done";
            }else{
                $fp = fopen($fileName,"a");
                fwrite($fp, $myPlace."\r\n");
                fclose($fp);
                echo "done";
            }
                      
            
        }
    ?>
</body>
</html>