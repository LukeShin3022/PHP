<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="fname" placeholder="Write your Name">
        <input type="text" name="lname" placeholder="Write your Last Name">
        <input type="text" name="desire" placeholder="Write your Desire">
        <button type="submit">Write your wish</button>
    </form>
    <?php

        class dummyUser{
            private $fname;
            private $lname;
            private $desire;
            function __construct($fname, $lname, $desire)
            {   
                $this -> fname = $fname;
                $this -> lname = $lname;
                $this -> desire = $desire;
            }
        }

        function fileHandle($fAddr, $fOption, $desire, $fileName){
            $fp = fopen($fAddr."/".$fileName,$fOption) or die("error code: 1, location: second fopen");
            fwrite($fp,"Your Desire is : $desire\n");
            fclose($fp);
        }

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $desire = $_POST['desire'];
            $fileAddr = "../files/".$fname."_".$lname;
            $fileName = "$fname$lname.txt";
            
            if(file_exists($fileAddr)){
                fileHandle($fileAddr,"a",$desire,$fileName);
            }else{
                if(mkdir($fileAddr)){
                    fileHandle($fileAddr,"w",$desire,$fileName);

                }else{
                    echo "Error";
                }
            }

           
        }
    ?>
    
</body>
</html>