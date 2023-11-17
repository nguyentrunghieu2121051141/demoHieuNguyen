<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    Result:
    <?php
        $result = $_GET["math"] + $_GET["chemistry"] + $_GET["physic"];
        echo $result;
        if($result >= 18 and $result <22){
            echo" Bạn đã trúng tuyển ngành CNTT và ngành KHDL";
        }
        elseif($result >= 22){
            echo" Bạn đã trúng tuyển ngành CNTT CLC";
        }
        elseif($result >= 17 and $result < 18){
            echo" Bạn đã trúng tuyển ngành Địa chất";
        }
        elseif($result >= 15 and $result < 17){
            echo" Bạn đã trúng tuyển ngành Môi trường";
        }
        else{
            echo" Bạn đã trượt hết tất cả các nguyện vọng";
        }
    ?>
</body>
</html>