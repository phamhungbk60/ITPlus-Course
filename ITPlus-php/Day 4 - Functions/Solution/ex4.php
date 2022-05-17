<?php 

$stringToTest = "tobot";

function isPalindrome($stringToTest) {
    if (strlen($stringToTest) === 0) {
        return "isPalindrome";
    }

    $isPalindrome = false;
    for ($i = 0; $i < strlen($stringToTest)/2; $i++) {
        if ($stringToTest[$i] === $stringToTest[strlen($stringToTest) - 1 - $i]) {
            $isPalindrome = true;
        } else {
            $isPalindrome = false;
            break;
        }
    }
    
    if ($isPalindrome) {
        echo "is palindrome";
    } else {
        echo "not a palindrome";
    }
}

echo isPalindrome($stringToTest);