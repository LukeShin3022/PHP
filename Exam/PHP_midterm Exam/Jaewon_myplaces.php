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

        //start declare variable
        $firstName ="Luke";
        $lastName ="Shin";
        $destCountry ="CANADA";
        $destCity ="Vancouver";
        //end declare variable

        echo "<h1> I want to go $destCity</h1>";
        echo "<table><thead><tr><th>Name</th><th>Country</th><th>City</th></tr></thead><tbody><tr><td>$firstName $lastName</td><td>$destCountry</td><td>$destCity</td></tr></tbody></table>"; // Making a table
    ?>
</body>
</html>