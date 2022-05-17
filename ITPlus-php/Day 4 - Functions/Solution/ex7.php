<?php 

function capitalize($string) {
    $stringArray = explode(" ", $string);
    $capitalizedString = [];
    foreach ($stringArray as $item) {
        $capitalizedString[] = ucfirst($item);
    }
    return implode(" ", $capitalizedString);
}

$string = "hello there";

echo capitalize($string);