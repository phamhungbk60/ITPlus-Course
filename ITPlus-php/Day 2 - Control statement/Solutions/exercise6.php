<?php 

$length = 50;
$output = '';

for ($i = 1; $i <= $length; $i++) {
    if ($i === $length) {
        $output .= "$i";
    } else {
        $output .= "$i-";
    }
}

echo $output;