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
        $friends = array("Jun","J","Sam","Marcelo","Nak");
        $count = count($friends);
        echo "<h3> How many Friends : $count </h3>";
        
        for($i = 0; $i < $count; $i++){
            if($i == 0){
                echo "<ul>";
                echo "<li>for:   $friends[$i] </li>";

            }else if($i == 4){
                echo "<li>for:   $friends[$i] </li>";
                echo "</ul>";
                echo "<br>";
            }
            else{
                echo "<li>for:   $friends[$i] </li>";

            }
        }
        
        $i = 0;
        while($i < $count){
            if($i == 0){
                echo "<ul>";
                echo "<li>while:   $friends[$i] </li>";

            }else if($i == 4){
                echo "<li>while:   $friends[$i] </li>";
                echo "</ul>";
                echo "<br>";
            }
            else{
                echo "<li>while:   $friends[$i] </li>";

            }
            $i++;
        }

    ?>
</body>
</html>