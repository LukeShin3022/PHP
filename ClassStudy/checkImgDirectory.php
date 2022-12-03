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
        $dir = "./files/img";
        // $fileList = array();
        // $fileOpen = opendir($dir);

        $images = scandir($dir);
        $flag = false;
        foreach($images as $img){
            if($img == '.' || $img=='..'){
                continue;
            }
            $imgAddr = "$dir/$img";
            if(getimagesize($imgAddr)){
                $flag=true;
                echo "<img src='$imgAddr'/>";
            }
        }

    ?>
</body>
</html>