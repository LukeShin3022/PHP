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
        $actor = array("Rock"=>"USA", "Angelina"=>"USA", "Jiwon"=>"Korea",  "Changjung"=>"Korea", "Jackie"=>"HongKong"); //make a Associate array

        echo "<ol>";
        foreach($actor as $name=>$nation){//Execute from first of array to end of array
            echo "<li>Famous Acotor $name is come from $nation</li>";
        }
        echo "</ol>";
    ?>
</body>
</html>