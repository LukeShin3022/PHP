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
        <select name="country">
            <option value="" selected>Select Country</option>
            <option>Korea</option>
            <option>Canada</option>
            <option>USA</option>
            <option>Japan</option>
        </select>
        <input type="submit" value="SEND">
    </form>
    
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $country = $_POST["country"];
                if($fname!="" && $lname!="" && $country!=""){
                    echo "<table><thead><tr>";
                    echo "<td>First Name</td>";
                    echo "<td>Last Name</td>";
                    echo "<td>Origing Country</td>";
                    echo "</tr></thead><tbody>";
                    echo "<tr>";
                    echo "<td>$fname</td>";
                    echo "<td>$lname</td>";
                    echo "<td>$country</td>";
                }else{
                    echo "<h2 style='color : red;'>All Fields should be filled</h2>";
                }
            }else{
                echo "<h1>Welcome</h1>";
            }
            echo "</tr>";
        ?>
        </tbody>
    </table>
</body>
</html>