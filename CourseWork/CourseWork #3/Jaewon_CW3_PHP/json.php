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
        <input type="text" name="department" placeholder="write department"/>
        <input type="text" name="salary" placeholder="write the salary"/>
        <input type="text" name="email" placeholder="write the email"/>
        <input type="text" name="phone" placeholder="write the phone"/>
        <input type="text" name="address" placeholder="write the address"/>
        <button type="submit">Add/Save</button>
    </form>
    <?php
        function maxEmId($employeeData){
            $maxID = 0;
            foreach($employeeData as $idx=>$employee){
                if($maxID<=$employee->EmployeeID){
                    $maxID = $employee->EmployeeID;
                }
            }
            return $maxID;
        }

        function loadData($employeeData){
            $sum = 0;
            $max = 0;
            $min = 5000;
            echo "<table><tr><th>EmployeeID</th><th>FirstName</th><th>lastName</th><th>Department</th><th>Salary</th><th>Email</th><th>phone</th><th>Address</th></tr>";
            foreach($employeeData as $idx=>$employee){
                echo "<tr><td>$employee->EmployeeID</td><td>$employee->first_name</td><td>$employee->last_name</td><td>$employee->Department</td><td>$employee->Salary</td><td>$employee->email</td><td>$employee->Phone</td><td>$employee->Address</td><td><a href='./editUser.php?idx=$idx'>Edit</a></td><td><a href='./editUser.php?del=$idx'>Delete</a></td></tr>";
                $sum += $employee->Salary;
                
                if($max<=$employee->Salary){
                    $max = $employee->Salary;
                    $maxemployee = $employee->first_name . " " . $employee->last_name;
                }
                if($min>$employee->Salary){
                    $min = $employee->Salary;
                    $minemployee = $employee->first_name . " " . $employee->last_name;
                }
            }
            echo "</table>";
            $avg = $sum / count($employeeData);
            echo "<h1>Average Salary is: $avg, Max Salary is: $max, Min Salary is: $min</h1>";
            echo "<h1>Max salary employee is: $maxemployee, Min salary employee is: $minemployee</h1>";
        }
        $fileHandler = fopen('./employeeData.json','r');
        $data = fread($fileHandler,filesize('./employeeData.json'));
        fclose($fileHandler);
        $employeeData = json_decode($data);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $newData = json_encode($employeeData);
            $employeeID=maxEmId(json_decode($newData));
            $tmpemployee['EmployeeID'] = $employeeID+1;
            $tmpemployee['first_name'] = $_POST['fname'];
            $tmpemployee['last_name'] = $_POST['lname'];
            $tmpemployee['Department'] = $_POST['department'];
            $tmpemployee['Salary'] = (float)$_POST['salary'];
            $tmpemployee['email'] = $_POST['email'];
            $tmpemployee['Phone'] = $_POST['phone'];
            $tmpemployee['Address'] = $_POST['address'];
            array_push($employeeData,$tmpemployee);
            $newData = json_encode($employeeData);
            $fileHandler = fopen('./employeeData.json','w');
            fwrite($fileHandler,$newData);
            fclose($fileHandler);
            loadData(json_decode($newData));
        }else{
            loadData($employeeData);
        }
    ?>
</body>
</html>