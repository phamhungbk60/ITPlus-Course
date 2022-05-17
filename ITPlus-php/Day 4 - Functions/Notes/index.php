<?php 
/**
 * Undocumented function
 *
 * @return void
 */
function checkOddOrEvenNumber ($message) 
{
    $messageArray = explode(" ",$message);
    echo "<pre>";
    print_r($messageArray);
    echo "</pre>";

    echo implode(",", $messageArray);
}

for ($i = 1; $i <= 4; $i++) {
    if ($i == 2) {
        continue;
    }
    echo $i;
}

$i = 6;


function checkDiv



// $number = 8;

// if ($number % 2 == 0) {
//     echo $number;
//     die();
//     echo "Even";
// } else {
//     echo "Odd";
// }


