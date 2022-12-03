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

        $w_string = "Hello World Friends";
    
        function wordCounter($word){
            $word = trim($word);//문자열의 앞과 뒤의 스페이스를 삭제 해주는 함수
            if (strlen($word) > 0){
                $count = 1;
                for($i=0; $i<strlen($word); $i++){
                    if($word[$i] == " "){
                        $count ++;
                    }
                }
                return $count;
            }
            return 0;
        }


        function rev_word($word){
            if (strlen($word) > 0){
                $rev_word="";
                for($i=strlen($word)-1; $i>=0; $i--){
                    $rev_word[strlen($word)-$i] = $word[$i];
                }
                return $rev_word;
            }
            return 0;
        }

       

        function count_char($word, $char){
            if (strlen($word || $char) > 0){
                $word = strtolower($word);
                $char = strtolower($char);
                $count = 0;
                for($i = 0; $i < strlen($word); $i++){
                    echo $word[$i];
                    if($word[$i] == $char){
                        $count++;
                    }
                }
                return $count;
            }
            return 0;
        }

        echo "String is " . ' "'. $w_string .'"<br>';
        echo "Number of word are " . wordCounter($w_string);;
        echo "<br> reverse : ".rev_word($w_string);
        echo "</br> Reapeat : ".count_char($w_string, "L");
    ?>
</body>
</html>