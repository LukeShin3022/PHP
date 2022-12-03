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
        <input type="text" name="fname" placeholder="write firstname"/>
        <input type="text" name="lname" placeholder="write lastname"/>
        <input type="text" name="score" placeholder="write the score"/>
        <button type="submit">Add/Save</button>
    </form>
    <?php
        // $students = [
        //     ["Henry"=>"Korea","Mamiko"=>"Japan","Mat"=>"brazil"],
        //     ["Marcelo"=>"Brazil","Haruka"=>"Japan","Kathleen"=>"Austrila"]
        // ];
        // echo json_encode($students);
        // $jsonObj = '[{"first_name":"Wyndham","last_name":"Gecke"},
        // {"first_name":"Hank","last_name":"Clavering"}]';
        // $obj = json_decode($jsonObj);
        // print_r($obj);
        // echo $obj[0]->last_name;
        function loadData($studentData){
            $sum = 0;
            $max = 0;
            $min = 100;
            echo "<table><tr><th>FirstName</th><th>lastName</th><th>Score</th></tr>";
            foreach($studentData as $idx=>$student){
                echo "<tr><td>$student->first_name</td><td>$student->last_name</td><td>$student->grade</td><td><a href='./editUser.php?idx=$idx'>Edit</a></td><td><a href='./editUser.php?del=$idx'>Delete</a></td></tr>";
                $sum += $student->grade;
                if($max<=$student->grade){
                    $max = $student->grade;
                    $maxStudent = $student->first_name . " " . $student->last_name;
                }
                if($min>$student->grade){
                    $min = $student->grade;
                    $minStudent = $student->first_name . " " . $student->last_name;
                }
            }
            echo "</table>";
            $avg = $sum / count($studentData);
            echo "<h1>Average is: $avg, Max is: $max, Min is: $min</h1>";
            echo "<h1>Max student is: $maxStudent, Min student is: $minStudent</h1>";
        }
        $fileHandler = fopen('./MOCK_DATA.json','r');
        $data = fread($fileHandler,filesize('./MOCK_DATA.json'));
        fclose($fileHandler);
        $studentData = json_decode($data);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $tmpStudent['first_name'] = $_POST['fname'];
            $tmpStudent['last_name'] = $_POST['lname'];
            $tmpStudent['grade'] = (float)$_POST['score'];
            array_push($studentData,$tmpStudent);
            $newData = json_encode($studentData);
            $fileHandler = fopen('./MOCK_DATA.json','w');
            fwrite($fileHandler,$newData);
            fclose($fileHandler);
            loadData(json_decode($newData));
        }else{
            loadData($studentData);
        }
    ?>
</body>
</html>