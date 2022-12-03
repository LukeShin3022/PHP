<?php
    include './dbconfig.php';
    $dbconn = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
    if($dbconn->connect_error){
        die("Connection Failed");
    }else{
        $studentArray=[];
        $classArray=[];
        $studentSelectQry = "SELECT * FROM user_tb WHERE title='student'";
        // $classSelectQry = "SELECT * FROM class_tb";
        $classSelectQry = "SELECT * FROM class_tb INNER JOIN course_tb ON class_tb.course_id = course_tb.course_id";

        $result_studentSelect = $dbconn->query($studentSelectQry);
        while($row = $result_studentSelect->fetch_assoc()){
            // print_r($row);
            array_push($studentArray,$row);
        }
        $result_classSelect = $dbconn->query($classSelectQry);
        while($row = $result_classSelect->fetch_assoc()){
            array_push($classArray,$row);
        }
        $dbconn->close();
    }
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="studentSelect">
            <?php
                foreach($studentArray as $student){
                    echo "<option value='".$student['user_id']."'>".$student['firstName']." ".$student['lastName']."</option>";
                }
            ?>
        </select>
        <select name="classSelect">
            <?php
                foreach($classArray as $class){
                    echo "<option value='".$class['class_id']."'>".$class['class_name']." - ".$class['course_name']."</option>";
                }
            ?>
        </select>
        <button type="submit">Add</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $studentid = $_POST['studentSelect'];
            $classid = $_POST['classSelect'];
            $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
            $insertcmd = "INSERT INTO students_transaction (student_id,class_id) VALUES ($studentid,$classid)";
            if($dbcon->query($insertcmd)){
                echo "<h1>student registered</h1>";
            }else{
                echo "<h1>db error</h1>";
            }
            $dbcon->close();
        }
    ?>
</body>
</html>