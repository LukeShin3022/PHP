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
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $grade = $_POST['grade'];

        if(isset($_GET['idx'])){
            $idx = $_GET['idx'];
            $filehandler = fopen('./MOCK_DATA.json','r');
            $studentData = json_decode(fread($filehandler,filesize('./MOCK_DATA.json')));
            fclose($filehandler);
            $studentData[$idx]->first_name = $fname;
            $studentData[$idx]->last_name = $lname;
            $studentData[$idx]->grade = $grade;
            $filehandler = fopen('./MOCK_DATA.json','w');
            $stringData = json_encode($studentData);
            fwrite($filehandler,$stringData);
            fclose($filehandler);
            header("Location: http://localhost/php/Jaewon_CW3_PHP/json.php");
        }
        elseif(isset($_GET['del'])){
            $idx = $_GET['del'];
            $filehandler = fopen('./MOCK_DATA.json','r');
            $studentData = json_decode(fread($filehandler,filesize('./MOCK_DATA.json')));
            fclose($filehandler);
            unset($studentData[$idx]);
            $studentData = array_values($studentData);
            $filehandler = fopen('./MOCK_DATA.json','w');
            $stringData = json_encode($studentData);
            fwrite($filehandler,$stringData);
            fclose($filehandler);
            header("Location: http://localhost/php/Jaewon_CW3_PHP/json.php");
        }
    }
    
    if(isset($_GET['idx'])){
        $idx = $_GET['idx'];
        $filehandler = fopen('./MOCK_DATA.json','r');
        $studentData = json_decode(fread($filehandler,filesize('./MOCK_DATA.json')));
        fclose($filehandler);
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?idx=$idx'>";
        echo "<input name='fname' value='".$studentData[$idx]->first_name."'/>";
        echo "<input name='lname' value='".$studentData[$idx]->last_name."'/>";
        echo "<input name='grade' value='".$studentData[$idx]->grade."'/>";
        echo "<button type='submit'>Save</button>";
        echo "</form>";
    }

    if(isset($_GET['del'])){
        $idx = $_GET['del'];
        $filehandler = fopen('./MOCK_DATA.json','r');
        $studentData = json_decode(fread($filehandler,filesize('./MOCK_DATA.json')));
        fclose($filehandler);
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?del=$idx'>";
        echo "<input name='fname' value='".$studentData[$idx]->first_name."'/>";
        echo "<input name='lname' value='".$studentData[$idx]->last_name."'/>";
        echo "<input name='grade' value='".$studentData[$idx]->grade."'/>";
        echo "<button type='submit'>Delete</button>";
        echo "</form>";
    }
        
    ?>
</body>
</html>