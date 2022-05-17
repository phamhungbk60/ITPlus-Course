<?php 

$sample = 'rayy@example.com';
$output = '';

for ($i = 0; $i < strlen($sample) - 1; $i++) {
    if ($sample[$i] === '@') {
        break;
    }

    $output .= $sample[$i];
}

echo "Output is $output";