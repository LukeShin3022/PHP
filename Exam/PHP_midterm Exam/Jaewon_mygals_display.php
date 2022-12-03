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

        $fileAddr = "./mygoals.txt"; //Declare file directory and name
        if(file_exists($fileAddr)){//Check the file is here or not
            $fp = fopen("./mygoals.txt","r");

            echo "<ol>";
            while(!feof($fp)){
                $myGoal = fgets($fp);//taking data from the file, line by line
                if(!$myGoal==""){
                    echo "<li>".$myGoal."</li>";
                }
            }
            echo "</ol>";
    
            fclose($fp);
        }else{
            echo "<h1 style='color:red;'>No goals listed</h1>"; 
        }
    ?>
</body>
</html>