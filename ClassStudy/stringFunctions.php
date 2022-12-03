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
        $name ="Jiwon Lee shin Kim";
        $name_1 = "";
        echo "length: ". strlen($name)."<br>";
        echo "word Count: " . str_word_count($name)."<br>";
        echo "string reverse : " . strrev($name)."<br>";
        echo "Find a position: " . strpos($name,"Lee")."<br>";
        echo "Replacing a string: " . str_replace("Lee","Ken",$name)."<br>";
        echo "Return a substraing: " . substr($name,5,4)."<br>";

        var_dump($name);
        echo "<br>";

        for($i=0; $i<strlen($name); $i++){
            echo $name[$i]."<br>";
        }
    ?>
</body>
</html>