<?php 

$str = "Write a function countWords(str) write that takes any string of characters and finds the number of times each string occurs.";

function countWords($str) {
    $output = [];
    $stringToLower = strtolower($str);
    $strToArray = explode(' ',$stringToLower);
    
    foreach ($strToArray as $searchedItem) {
        $output[$searchedItem] = 0;
        if (in_array($searchedItem, $strToArray)) {
            $output[$searchedItem] = $output[$searchedItem] + 1;
        }
    }

    return $output;
}

echo "<pre>";
print_r(countWords($str));
echo "<pre>";