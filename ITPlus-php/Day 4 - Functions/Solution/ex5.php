<?php

function reverse($input) {
    $str = "";
    $output = "";
    $isNegative = false;
    if (is_numeric($input)) {
        if ($input < 0) {
            $isNegative = true;
            $str = strval(abs($input));
        } else {
            $str = strval($input);
        }
    }
    else {
        $str = $input;
    }

    for ($i = strlen($str); $i >= 0; $i--) {
        $output .= $str[$i];
    }

    //if output cannot be casted to integer
    if (intval($output) === 0) {
        return $output;
    }
    return $isNegative ? '-'.intval($output) : intval($output);
}

echo reverse("123").'<br/>';
echo reverse(123).'<br/>';
echo reverse(-912).'<br/>';
echo reverse("abcdef").'<br/>';