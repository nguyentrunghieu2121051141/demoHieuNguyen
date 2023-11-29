<?php
    $USD = 22300;
    $AUD = 27300;
    $JPY = 200;
    $EUR = 27000;
    $amount = $_POST["amount"];
    if(isset($_POST["currency"]) == "USD"){
        echo"$amount USD đổi được ";
        echo $amount * $USD ;
        echo" VND";
    }
    elseif(isset($_POST["currency"]) == "EUR"){
        echo"$amount EUR đổi được ";
        echo $amount * $EUR;
        echo" VND";
    }
    elseif(isset($_POST["currency"]) == "JPY"){
        echo"$amount JPY đổi được ";
        echo $amount * $JPY;
        echo" VND";
    }
    else{
        echo"$amount AUD đổi được ";
        echo $amount * $AUD;
        echo" VND";
    }
    
?>
