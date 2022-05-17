<?php 

function checkAnagram($string1, $string2) {
    $str1ToLower = strtolower($string1);
    $str2ToLower = strtolower($string2);
    $isAnagram = true;

    for ($i = 0; $i < strlen($str1ToLower); $i++) {
        if (strpos($str2ToLower, $str1ToLower[$i]) === false) {
            $isAnagram = false;
            break;
        }
    }

    if ($isAnagram) {
        return "is anagram";
    }

    return "is not anagram";
}

// $string1 = 'rail safety';
// $string2 = 'fairy tales';

$string1 = 'roast beef';
$string2 = 'goat roast';

// $string1 = 'Elvis';
// $string2 = 'lives';

echo checkAnagram($string1, $string2);