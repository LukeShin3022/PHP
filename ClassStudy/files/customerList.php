<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .customerLink{
            padding: 10px;
            border: 1px solid black;
            text-decoration: none;
            color: black;
            margin: 5px;
        }
        .customerLink:hover{
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h1>Customer List</h1>
    <?php
        class cartOrder{
            private $product;
            private $price;
            private $qty;
            private $totalValue = [];

            function __construct($product, $price, $qty)
            {
                $this -> product = $product;
                $this -> price = $price;
                $this -> qty = $qty;
            }

            function calcTotal(){
                $total =  $this -> price * $this -> qty;
                return $total;
            }

            function display(){

            }

        }

        if($_SERVER['REQUEST_METHOD']=="GET"){
            $customerDirectory = scandir('../files/customers');
            foreach($customerDirectory as $fileName){
                if($fileName=="." || $fileName==".."){
                    continue;
                }
                $cName = substr($fileName,0,strpos($fileName,"."));
                echo "<a href='".$_SERVER['PHP_SELF']."?cName=$cName' class='customerLink'>$cName</a>";
            }
        }
        if(isset($_GET['cName'])){
            $cName = $_GET['cName'];
            $addr = "../files/customers/$cName.txt";
            $fileHandler = fopen($addr,'r');

            $product;
            $price;
            $qty;
            $totalPrice = 0;
            // echo fread($fileHandler,filesize($addr));
            echo "<table><thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr></thead>";
            while(!feof($fileHandler)){
                for($i=0; $i<4; $i++){
                    $fData = explode(":", fgets($fileHandler));
                    // echo "<h1>".$fData[0]."</h1>";
                    switch($fData[0]){
                        case 'product':
                            $product = $fData[1];
                            break;
                        case 'price':
                            $price = $fData[1];
                            break;
                        case 'quantity':
                            $qty = $fData[1];
                            break;
                        default:
                            // continue;
                    }
                }
                $order = new cartOrder($product, $price, $qty);
                $totalPrice += $order -> calcTotal();

                // echo $totalPrice."<br>";

            }
            fclose($fileHandler);
            echo "</table>";
        }
    ?>
</body>
</html>