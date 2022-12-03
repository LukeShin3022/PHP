<?php
    include './config.php';

    $userValid = new uservalid($_SESSION['user']);
    if($userValid -> validateUser()){
        echo "Welcome : ".$_SESSION['user']['userName'];
    }else{
        echo "Not valid User";
        header("Location: http://localhost/php/Luke-PHPV2/Luke_Login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json to DB</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <button type="submit">Insert json data to DB</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if($dbCon->connect_error){
                echo "DB connection error".$dbCon->connect_error;
            }else{
                $selectQry = "SELECT * FROM contacts_tb;";
                $result = $dbCon->query($selectQry);
                if($result->num_rows > 0){
                    header("Location: http://localhost/php/Luke-PHPV2/Luke_ShowAll.php");
                }else{
                    $fileHandler = fopen('./Contacts.json','r');
                    $jsonString = fread($fileHandler,filesize('./Contacts.json'));
                    fclose($fileHandler);
                    $jsonData = json_decode($jsonString,true);

                    $insertQry = $dbCon->prepare("INSERT INTO contacts_tb(firstname,lastname,email,phonenumber) VALUES(?,?,?,?);");
                    $insertQry->bind_param("ssss",$firstName,$lastName,$email,$phoneNumber);
                    foreach($jsonData as $contactDetails){
                        $firstName = $contactDetails['first_name'];
                        $lastName = $contactDetails['last_name'];
                        $email = $contactDetails['email'];
                        $phoneNumber = $contactDetails['Phone'];
                        $insertQry->execute();
                    }
                    echo "Done!!!";
                    $insertQry->close();
                    $dbCon->close();
                    header("Location: http://localhost/php/Luke-PHPV2/Luke_ShowAll.php");
                }
            }
        }
    ?>
</body>
</html>