<?php 

$sum = 0;
$squareSum = 0;
$i = 1;

for ($i = 1; $i <= 100; $i++) {
    if ($i == 50) {
        break;
    }

    $sum += $i;
}

echo "Sum is $sum";