<?php
    include './config.php';

    $userValid = new uservalid($_SESSION['user']);
    if($userValid -> validateUser()){
        echo "Welcome : ".$_SESSION['user']['userName'];
    }else{
        echo "Not valid User";
        header("Location: http://localhost/php/Luke-PHPV2/Luke_Login.php");
    }

    $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if($dbCon->connect_error){
        echo "DB connection error".$dbCon->connect_error;
    }else{
        $selectQry = "SELECT * FROM contacts_tb";
        $contactArray = [];
        $result = $dbCon->query($selectQry);
        while($row = $result->fetch_assoc()){
            array_push($contactArray,$row);
        }
        // $dbCon->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $deleteQry = "DELETE FROM contacts_tb WHERE contactId= '$id'";
                        $dbCon->query($deleteQry);
                        header("Location: http://localhost/php/Luke-PHPV2/Luke_ShowAll.php");

                    }
                    foreach($contactArray as $contact){
                        echo "<tr>";
                        echo "<td>".$contact['firstname']."</td><td>".$contact['lastname']."</td><td>".$contact['email']."</td><td>".$contact['phonenumber']."</td>";
                        echo "<td><a href='./Luke_Edit.php'>Edit</a></td><td><a href='".$_SERVER['PHP_SELF']."?id=".$contact['contactId']."'>Delete</a></td>";
                        echo "</tr>";
                    }
                    $dbCon->close();
                    
                ?>
            </tbody>
        </table>
    </form>