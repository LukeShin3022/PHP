<?php
    include './dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <input type="text" name="cName" placeholder="course Name" required>
        <input type="number" name="length" max="127" placeholder="Length" required>
        <input type="file" name="cImg">
        <button type="submit">Register</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $cName = $_POST['cName'];
            $length = $_POST['length'];
            $sourceImg = $_FILES['cImg'];
            $imgExtension = pathinfo($sourceImg['name'])['extension'];
            $imgDest = "./files/cimg/".str_replace(" ","_",$cName)."img.".$imgExtension;
            $sourceImgDetail = pathinfo($sourceImg['name']);
            if($imgExtension == "jpg" && getimagesize($sourceImg['tmp_name'])){
                if($sourceImg['size']<400000){
                    if(move_uploaded_file($sourceImg['tmp_name'],$imgDest)){
                        $dbconn = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
                        if($dbconn->connect_error){
                            die("Error: ".$dbconn->connect_error);
                        }else{
                            $insertQry ="INSERT INTO course_tb(course_name, course_length, course_img) VALUES('$cName','$length','$imgDest')";
                            if($dbconn->query($insertQry)===TRUE){
                                echo "Success";
                            }else{
                                echo "Fail";
                                $dbconn->error;
                            }
                        }
                        $dbconn->close();
                    }
                }
            }else{
                echo "Please check the file";
            }
        }
    ?>
</body>
</html>