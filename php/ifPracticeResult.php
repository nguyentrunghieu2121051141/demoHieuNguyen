<?php
    $USD = 22300;
    $AUD = 27300;
    $JPY = 200;
    $EUR = 27000;
    $amount = $_POST["amount"];
    echo"$amount USD is equal";
    if($_POST["currency"] == "USD"){
        echo $amount * $USD;
    }
    elseif($_POST["currency"] == "EUR"){
        echo $amount * $EUR;
    }
    elseif($_POST["currency"] == "JPY"){
        echo $amount * $JPY;
    }
    else{
        echo $amount * $AUD;
    }
    echo"VND";
?>
