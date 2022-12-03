<?php
    include './config.php';
    $dbcon = new mysqli($dbHost,$dbUser,$dbpass,$dbName);
    if($dbcon->connect_error){
        die("connection error");
    }else{
        $select = "SELECT * FROM product_tb LIMIT 20";
        $productArray = [];
        $result = $dbcon->query($select);
        while($row = $result->fetch_assoc()){
            array_push($productArray,$row);
        }
        $dbcon->close();
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
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Select to buy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($productArray as $product){
                        echo "<tr>";
                        echo "<td>".$product['productName']."</td><td>".$product['productPrice']."</td>";
                        echo "<td><input type='checkbox' name='pid[]' value='".$product['productID']."'/></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <!-- Email 1:<input name="email[]" type="checkbox" value="Email1"><br>
        Email 2:<input name="email[]" type="checkbox" value="Email2"><br>
        Email 3:<input name="email[]" type="checkbox" value="Email3"><br> -->
        <button type="submit">Submit</button>
    </form>
    <?php
        // $email = $_POST['email'];
        // print_r($email);
        echo time()+$_SESSION['user']['customer_id'];
//         Checking for the user session and redirecting to the login page if user has not logged in
// writing the code to save data into the transaction table after user bought something and display an invoice with total price
    ?>
</body>
</html>