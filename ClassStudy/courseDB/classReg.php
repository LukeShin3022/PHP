<?php
    include './dbconfig.php';
    $dbconn = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
    if($dbconn->connect_error){
        die("Connection Error");
    }else{
        $selectQry = "SELECT * FROM course_tb";
        $result = $dbconn->query($selectQry);
        $coursesArray = [];
        while($row = $result->fetch_assoc()){
            array_push($coursesArray,$row);
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="className" required>
        <select name="selectCourse">
            <?php
                foreach($result as $index=>$course){
                    echo "<option value='".$index."'>".$course['course_name']."</option>";
                }
            ?>
        </select>
        <input type="date" name="startDate">
        <button type="submit">Register</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $classname = $_POST['className'];
            $courseIndex = $_POST['selectCourse'];
            $startDate = $_POST['startDate'];
            $length = $coursesArray[$courseIndex]['course_length'];
            $days = 86400 * ($length / 4 * 7) - (4 * 86400);
            $ednDate = date("Y-m-d",strtotime($startDate)+$days);
            $dbconn = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
            if($dbconn->connect_error){
                die("Connection Failed");
            }else{
                $insertQry = "INSERT INTO class_tb(start_date, end_date, class_name, course_id) VALUES('$startDate','$ednDate', '$classname','".$coursesArray[$courseIndex]['course_id']."')";

                if($dbconn->query($insertQry)){
                    echo "SUCCESS INSERTING";
                }else{
                    echo "FAILED INSERTING";
                }
            }
            $dbconn->close();

        }

    ?>
</body>
</html>