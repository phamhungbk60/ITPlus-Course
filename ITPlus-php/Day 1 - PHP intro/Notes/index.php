<?php 
    $number = 6;
    $string = "sample";
    $string .= "test"; //$string = $string."test"
    define("ITEM_PER_PAGE", 6);

    echo $number % 2 == 0 ? 'Chẵn' : 'Lẻ';

    if ($number % 2 == 0) {
        echo "Chẵn";
    } else {
        echo "Lẻ";
    }

    $odd = 9;

    echo "// ----------------- //";
    // Switch case
    switch ($number) {
        case 1: 
            echo "1";
            break;
        case 2:
            echo "2";
            break;
        case 6:
            echo "6";
            break;
        default:
            echo "Default";
    }

    echo "<br/>";


    //[,4]
    //[4,8]
    //[8,]
    if ($odd < 4) {
        echo "Tạch";
    }
    else if ($odd >= 4 && $odd <= 8) {
        echo "An toàn";
    } else {
        echo "Đỗ mạnh";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            color: red;
        }
    </style>
</head>
<body>
    <p><?php echo $number + 7 ?></p>
    <p><?php echo $string ?></p>
    <p><?php echo ITEM_PER_PAGE ?></p>
</body>
</html>