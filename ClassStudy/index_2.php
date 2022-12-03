<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
        <?Php

            $name = "Luke";
            $country = "Korea";
            $hobby = "Snow Boarding";
            $mark = 60;
            $bool = false;
            $fval = 5.5;

            
            $sumno = 50;
            $num1 = 40;

            $stringsum = "";



            echo "<h1> Hello World </h1>";
            $stringsum = "<h2>My name is : $name</h2>";
            echo "<h3>I am from : $country</h3>";
            echo "<h4>My hobby is : $hobby</h4>";
            echo $mark+$fval;

            echo $stringsum;

            // $sumno += $num1;
            // $avg = $sumno / 2;

            $avg = $num1 % 19;

            echo "<h1>Total : $sumno</h1>";
            echo "<h1>Average : $avg</h1>";






        ?>
</body>
</html>