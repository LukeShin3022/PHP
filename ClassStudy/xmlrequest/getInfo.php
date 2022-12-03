<?php
    if(isset($_GET['fname']) && isset($_GET['lname'])){
        echo "This is server : Hello ".$_GET['fname']." ".$_GET['lname'];
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // echo "This is server : Hello".$_POST['fname']." ".$_POST['lname'];
        $user = ['fname'=>$_POST['fname'],'lname'=>$_POST['lname']];
        echo json_encode($user);
    }
?>