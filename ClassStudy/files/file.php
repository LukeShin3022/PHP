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
        $fileHendler = fopen('../files/name.txt','a+') or die('Unable to open the file!!');
        // echo fread($fileHendler,filesize('../files/name.txt'));
        // fwrite($fileHendler,"test1234<br>");
        // rewind($fileHendler);
        while(!feof($fileHendler)){
            echo fgets($fileHendler)."<br>";
        }
        fclose($fileHendler);

    ?>
</body>
</html>