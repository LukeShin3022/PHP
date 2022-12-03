<?php
    function createCooke($cookieName, $cookieValue, $expDate= 1 ){
        setcookie($cookieName, $cookieValue,time()+(86400 * $expDate),'/');
    }
?>