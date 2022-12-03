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
         $students = array("Henry"=>[56,80,70],"Kathleen"=>[70,80,67],"Lin-Wen"=>[90,55,76],"Akane"=>[78,80,90]);
            echo "<table>";
         foreach($students as $key=>$value){
            echo "</tr>";
            echo "<td>$key</td>";
            $max = 0;
            $min = $value;
            $sum = 0;
            $avg = 0;
            $count = 0;

            foreach($value as $number){
                if($number >= $max){
                    $max = $number;
                }
                
                if($number <= $min){
                    $min = $number;
                }

                $count = count($value);
                $sum += $number;
            }
            $avg =  $sum / $count;
            $avg = number_format($avg,1);
            

            echo "<td>$max</td>";
            echo "<td>$min</td>";
            echo "<td>$avg</td>";
            echo "</tr>";
         }
         echo "</table>";

    ?>
</body>
</html>