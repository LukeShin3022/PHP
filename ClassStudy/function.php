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

        $str ="";
        function nameDisplayer(){
            $word = "I am a function2<br>";
            echo $word;

            return $word;
        }
        $str = nameDisplayer();

        echo "2222".$str;

        function nameDisplayer2($fName, $lName, $country = "Universe"){
            echo "Welcome ". $fName . $lName . $country;
        }

        nameDisplayer2("Jaewon","Shin");
    ?>
</body>
</html>