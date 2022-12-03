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
        $min = 999999;
        $max = 0;
        (float)$sum = 0;
        $count = 0;
        
        $jsonAddr ="./sell_report.json";
        $fp = fopen($jsonAddr,'r');
        $reportData = fread($fp,filesize($jsonAddr));
        fclose($fp);
        $sellData = json_decode($reportData);

        echo "<table><thead><tr><th>#</th><th>Product Name</th><th>Total Price</th></tr></thead><tbody>";//make a table

        foreach($sellData as $item ){
            $count ++;//want to know about end of data
            $itemPrice = $item->price;//price value move from json array to itemPrice variable
            $itemAmount = $item -> amount;//amount value move from json array to itemAmount variable
            (float)$totalPrice = $itemPrice * $itemAmount;
            echo "<tr><td>$item->id</td><td>$item->item_name</td><td>$$totalPrice</td></tr>";

            $sum += $totalPrice;

            if($max<=$totalPrice){//CCompare Which is bigger, max or total
                $max = $totalPrice;
            }

            if($min>$totalPrice){//CCompare Which is smaller, min or total
                $min = $totalPrice;
            }

            if ($count == count($sellData)){
                (float)$avg = $sum / count($sellData); //Caculating Average
                $avg = round($avg,2); //Show hundred place value
                echo "<tr><td>Avg-price : $avg</td><td>Max-Price: $max</td><td>Min-Price: $min</td></tr>"; //Printing the Avg, Max-price and Min-price
                echo "</tbody></table>";
            }
        }
        
    ?>
</body>
</html>