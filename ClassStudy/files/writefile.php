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
        $fp = fopen('../files/name.txt','w');
        fwrite($fp,"First Write \n");
        fwrite($fp,"Second Write \n");
        fclose($fp);

        // rewind($fp);
        $fp2 = fopen('../files/name.txt','r');
        // chmod($fp,0744);
        while(!feof($fp2)){
            echo fgets($fp2)."<br>";
        }
        fclose($fp2);
    ?>
</body>
</html>