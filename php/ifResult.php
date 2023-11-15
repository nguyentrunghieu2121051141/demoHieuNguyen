<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo"THE GAME";
        if ($_POST["response"] == "yes") {
            echo "HAS BEEN QUITED";
        }
        else {
            echo "WILL BE CONTINUES 3SECONDS";
        }
        echo "<br>AFTER IF STATEMENT";
    ?>
</body>
</html>