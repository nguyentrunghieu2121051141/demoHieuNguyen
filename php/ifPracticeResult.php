<?php
    $USD = 22300;
    $AUD = 27300;
    $JPY = 200;
    $EUR = 27000;
    $amount = $_POST["amount"];
    echo"$amount VNĐ đổi được ";
    if($_POST["currency"] == "USD"){
        echo $amount * $USD ;
        echo" USD";
    }
    elseif($_POST["currency"] == "EUR"){
        echo $amount * $EUR;
        echo" EUR";
    }
    elseif($_POST["currency"] == "JPY"){
        echo $amount * $JPY;
        echo" JPY";
    }
    else{
        echo $amount * $AUD;
        echo" AUD";
    }
    
?>
