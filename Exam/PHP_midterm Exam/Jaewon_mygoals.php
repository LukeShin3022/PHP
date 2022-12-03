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

        $myGoal = "I want to be a good programer\nI will go to USA\nI will go to Google\nI try to study about programing every day\nI'm gonna make a lot of money\n";

        $fp = fopen("./mygoals.txt","w"); //open the file

            fwrite($fp, $myGoal); //Writing myGoal in a file.
            

        fclose($fp); //close the file
    ?>
</body>
</html>