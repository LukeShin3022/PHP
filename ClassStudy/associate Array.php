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
        $friends = array("Henry","Akane","Milad","Mamiko");
        $students = array("Nak"=>80, "Jun"=>87,"Jiwon"=>99, "Marcelo"=>87);
        $students["aaa"] = 55;
        echo "<h3> Jun score is : ".$students['Jun']."</h3>";

        foreach($students as $key=>$value){
            echo "<h4>$key : $value</h4>";

        }

        foreach($friends as $key=>$value){
            echo "<h4>$key : $value</h4>";
        }

        // var_dump($students);
        echo "<br>";
        // print_r($students);

        $song = array("Neyo"=>"So Sick", "A"=>"song1", "B"=>"song2", "C"=>"song3", "D"=>"song4");

        $song["E"] = "song5";

        foreach($song as $key=>$value){
            echo "<h4>$key : $value</h4>";
        }


        $students = array("Nak"=>[80,79,66], "Jun"=>[80,79,66],"Jiwon"=>[80,79,66], "Marcelo"=>[80,79,66]);
        $students["milad"] = [60,77,88];

        foreach($students as $key=>$value){
            echo "<h3>$key : ";
            foreach($value as $a){
                echo "$a ";
            }
            echo "</h3>";
        }





    ?>
</body>
</html>