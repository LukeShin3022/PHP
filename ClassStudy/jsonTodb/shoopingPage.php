<?php
    include './config.php';
    $dbcon = new mysqli($dbHost,$dbUser,$dbpass,$dbName);
    if($dbcon -> connect_error){
        die ("stop");
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
                    <th>product Name</th>
                    <th>product Price</th>
                    <th>Select to buy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($productArray as $product){
                        echo "<tr>";
                        echo "<td>".$product['productName']."</td>"."<td>".$product['productPrice']."</td>";
                        echo "<td><input type='checkbox' name='pid[]' value='".$product['productID']."'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <!-- 1 : <input type="checkbox" name="email[]" value="email1"><br>
        2 : <input type="checkbox" name="email[]" value="email2"><br>
        3 : <input type="checkbox" name="email[]" value="email3"><br> -->
        <button type="submit">Submit</button>
    </form>
    <?php
        echo time()+$_SESSION['user']['customer_id'];
        // $pid = $_POST['pid'];
        
        // Checking for the user session and redirection to the login page if user has not logged in
        // writing the code to save data into the transaction table after user bought something and display an invoice with total price

        // print_r($pid);
    ?>
</body>
</html>