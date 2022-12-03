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
        $empid = $_POST['empid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if(isset($_GET['idx'])){
            $idx = $_GET['idx'];
            $filehandler = fopen('./employeeData.json','r');
            $employeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
            fclose($filehandler);
            $employeeData[$idx]->EmployeeID = $empid;
            $employeeData[$idx]->first_name = $fname;
            $employeeData[$idx]->last_name = $lname;
            $employeeData[$idx]->Department = $department;
            $employeeData[$idx]->Salary = $salary;
            $employeeData[$idx]->email = $email;
            $employeeData[$idx]->Phone = $phone;
            $employeeData[$idx]->Address = $address;
            $filehandler = fopen('./employeeData.json','w');
            $stringData = json_encode($employeeData);
            fwrite($filehandler,$stringData);
            fclose($filehandler);
            header("Location: http://localhost/php/Jaewon_CW3_PHP/json.php");
        }
        elseif(isset($_GET['del'])){
            $idx = $_GET['del'];
            $filehandler = fopen('./employeeData.json','r');
            $employeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
            fclose($filehandler);
            unset($employeeData[$idx]);
            $employeeData = array_values($employeeData);
            $filehandler = fopen('./employeeData.json','w');
            $stringData = json_encode($employeeData);
            fwrite($filehandler,$stringData);
            fclose($filehandler);
            header("Location: http://localhost/php/Jaewon_CW3_PHP/json.php");
        }
    }
    
    if(isset($_GET['idx'])){
        $idx = $_GET['idx'];
        $filehandler = fopen('./employeeData.json','r');
        $employeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
        fclose($filehandler);
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?idx=$idx'>";
        echo "Employee ID: <input name='empid' value='".$employeeData[$idx]->EmployeeID."'/><br>";
        echo "FirstName: <input name='fname' value='".$employeeData[$idx]->first_name."'/><br>";
        echo "LastName: <input name='lname' value='".$employeeData[$idx]->last_name."'/><br>";
        echo "Department: <input name='department' value='".$employeeData[$idx]->Department."'/><br>";
        echo "Salary: <input name='salary' value='".$employeeData[$idx]->Salary."'/><br>";
        echo "E-mail: <input name='email' value='".$employeeData[$idx]->email."'/><br>";
        echo "Phone: <input name='phone' value='".$employeeData[$idx]->Phone."'/><br>";
        echo "Address: <input name='address' value='".$employeeData[$idx]->Address."'/><br>";
        echo "<button type='submit'>Save</button>";
        echo "</form>";
    }

    if(isset($_GET['del'])){
        $idx = $_GET['del'];
        $filehandler = fopen('./employeeData.json','r');
        $employeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
        fclose($filehandler);
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?del=$idx'>";
        // echo "Employee ID: <input name='empid' value='".$employeeData[$idx]->EmployeeID."'/><br>";
        // echo "FirstName: <input name='fname' value='".$employeeData[$idx]->first_name."'/><br>";
        // echo "LastName: <input name='lname' value='".$employeeData[$idx]->last_name."'/><br>";
        // echo "Department: <input name='department' value='".$employeeData[$idx]->Department."'/><br>";
        // echo "Salary: <input name='salary' value='".$employeeData[$idx]->Salary."'/><br>";
        // echo "E-mail: <input name='email' value='".$employeeData[$idx]->email."'/><br>";
        // echo "Phone: <input name='phone' value='".$employeeData[$idx]->Phone."'/><br>";
        // echo "Address: <input name='address' value='".$employeeData[$idx]->Address."'/><br>";
        echo "<h1>Are you sure you want to delete this data?</h1>";
        echo "Employee ID: ".$employeeData[$idx]->EmployeeID.", FirstName: ".$employeeData[$idx]->first_name.", LastName: ".$employeeData[$idx]->last_name."<br><br>";
        echo "<button type='submit'>Delete</button>";
        echo "</form>";
    }
        
    ?>
</body>
</html>