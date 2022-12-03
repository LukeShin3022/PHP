<?php
    include './config.php';
    $fileHandler = fopen('./MOCK_DATA.json','r');
    $jsonString = fread($fileHandler,filesize('./MOCK_DATA.json'));
    fclose($fileHandler);
    $jsonData = json_decode($jsonString,true);//default 값은 false이며, php오브젝트로 디코드 하는 것이고 TRUE는 Assciation 배열로 디코드 하는 것이다.

    $dbcon = new mysqli($dbHost,$dbUser,$dbpass,$dbName);
    if($dbcon->connect_error){

    }else{
        $insert = $dbcon->prepare("INSERT INTO product_tb(productName,productPrice) VALUES(?,?);");
        $insert->bind_param("sd",$productName,$productPrice);//sd는 배열 타입으로 S는 첫번째 인수의 데이터 타입(productName의 데이터 타입), d는 두번째 인수의 데이터 타입(productPrice의 데이터 타입)
        foreach($jsonData as $productDetails){
            $productName = $productDetails['productName'];
            // $productName = $productDetails -> productName; //php object일때는 이렇게 사용한다.
            $productPrice = $productDetails['price'];
            $insert->execute();
        }
        echo "Data Saved tinto the Database";
        $insert->close();
        $dbcon->close();

    }
?>