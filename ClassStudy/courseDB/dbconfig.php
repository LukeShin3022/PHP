<?php

    $dbUsername ="root";
    $dbServername ="localhost";
    $dbPass="";
    $dbName="students_db";
    $tbName="course_tb";

    function createCookie($cookieName, $cookieValue, $expDay = 1){
        setcookie($cookieName,$cookieValue,time()+(86400 * $expDay),'/');//86400 is equal to 1 day = 24(hours) * 60(minutes) * 60(seconds)
    }

?>