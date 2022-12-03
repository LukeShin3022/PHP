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

        set_time_limit(400);
        $rainy = false;
        if($rainy){
            // echo "<h2>Take the umbrella</h2>";
        }elseif(!$rainy){
            // echo "<h2>Don't Take the umbrella</h2>";
        }else {
            //  echo "<h2>Nothing</h2>";
        }

        echo "<h1>";
            for($i=0; $i<5; $i++){

                $num = rand(0, 12);

                if($num % 2 == 0){
                    echo "$num is Even number<br>";
                }else {
                    echo "$num is Odd Number<br>";
                }
            }
        echo "</h1>";



        $result1 = rand(50, 100);
        $sum = 0;
        $avg = 0;
        $numbers = array();
        $count = 5;

        for($i = 0; $i < 5; $i++){
            $result = rand(50, 100);
            $sum+=$result;
        }

        $avg = $sum / $count;

        echo "<h1>";
            echo "sum = $sum<br>";
            echo "avg = $avg<br>";

            if($avg >= 85 && $avg <= 100){
                echo "Your mark is A";
            }elseif($avg >= 75 && $avg <= 85){
                echo "Your mark is B";
            }elseif($avg >= 65 && $avg <= 75){
                echo "Your mark is C";
            }else{
                echo "Your mark is D";
            }
        echo "</h1>";


        for($i = 0; $i < $count; $i++){
            $numbers[$i] = rand(50, 100);
            $sum+=$numbers[$i];
        }

        $total = array_sum($numbers);

        $avg = $total / $count;

        echo "sum = $total<br>";
        var_dump($numbers);

        // array_unique($numbers);// 중복된 값 제거
        // array_unshift($numbers,80,90);//array_push와 반대되는 함수 배열의 시작점에 값을 넣는다.
        // sort($numbers);//오름차순으로 정렬
        // rsort($numbers);//내림차순으로 정렬


        echo "<h1>";
            echo "sum = $total<br>";
            echo "avg = $avg<br>";

            if($avg >= 85 && $avg <= 100){
                echo "Your mark is A";
            }elseif($avg >= 75 && $avg <= 85){
                echo "Your mark is B";
            }elseif($avg >= 65 && $avg <= 75){
                echo "Your mark is C";
            }else{
                echo "Your mark is D";
            }
        echo "</h1>";

    ?>
</body>
</html>