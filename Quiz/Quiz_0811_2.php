<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="fname" placeholder="Write your first name">
        <input type="text" name="lname" placeholder="Write your last name">
        <input type="text" name="mark" placeholder="Write your 4 marks(separately with / )" style='width:30vh;'>
        <select name="program">
            <option value="" selected>Select Program</option>
            <option>PHP</option>
            <option>HTML</option>
            <option>CSS</option>
            <option>JAVA</option>
        </select>
        <input type="submit" value="SEND">
    </form>
    
    <?php
        class student{
            public $fname;
            public $lname;
            public $marks;
            public $program;
            function __construct($fname,$lname,$marks,$program)
            {
                $this->fname=$fname;
                $this->lname=$lname;
                $this->marks=$marks;
                $this->program=$program;
            }

            function calcAvg(){
                $sum = 0;
                $avg = 0;
                foreach($this -> marks as $mark){
                    // echo $mark;
                    $sum += $mark;
                }
                $avg = $sum / 4;

                return $avg;
               
            }

            function calcMaxMin(){
                $max = 0;
                $min = 100;
                

                foreach($this -> marks as $mark){
                    if($mark >= $max){
                        $max = $mark;
                    }
                    
                    if($mark <= $min){
                        $min = $mark;
                    }
                }

                return array($max, $min);
            }

            function display(){
                $totalAvg = $this -> calcAvg();
                $totalMax = $this -> calcMaxMin()[0];
                $totalMim = $this -> calcMaxMin()[1];
                echo "Student Name :  ".$this->fname .$this->lname."<br>"."Enroll Program : ".$this->program."<br>"."Score are : ".$this-> marks[0]. ", ".$this-> marks[1]. ", ".$this-> marks[2]. ", ".$this-> marks[3]."<br>";
                echo "Avrage is : ". $this -> calcAvg()."<br>";
                echo "Max score is : ".$this -> calcMaxMin()[0]."<br>";
                echo "Min score is : ".$this -> calcMaxMin()[1];
            }
        }
        $marks = array();
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $mark = $_POST["mark"];
            $program = $_POST["program"];

            $marks = explode("/", $mark);
            // $kkk=array();

            

            if($fname!="" && $lname!=""){
                $Luke = new student($fname, $lname, $marks, $program);
                $Luke -> display();

            }else{
                echo "<h2 style='color : red;'>All Fields should be filled</h2>";
            }
        }else{
            echo "<h1>Error</h1>";
        }

    ?>
</body>
</html>