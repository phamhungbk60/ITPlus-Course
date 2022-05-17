<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    p{
        color: red;
    }
    </style>
</head>
<body>
    <p>
        <?php
        $string = "madam";
        $ispalindrome = false;
    for($i = 0;$i < strlen($string); $i ++){
        if ($string[$i] == $string[strlen($string) -1 -$i]){
            $ispalindrome = true ;
        }else {
            $ispalindrome = false ;
            break;
        }
    }
    if ($ispalindrome){
        echo "true";
    }else{
        echo "false";
    }
    function palirome($x){

    }
        ?>
        
    </p>
</body>
</html>
