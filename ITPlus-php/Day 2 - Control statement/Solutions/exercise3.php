<?php 

$sum = 0;
$i = 1;
$divideByThree = [];

while ($i <= 100) {
    if ($i >= 20 && $i <= 50) {
        if ($i % 3 === 0) {
            $divideByThree[] = $i;
        }
    }
    $sum += $i;
    $i++;
}

foreach ($divideByThree as $item) {
    echo "<p>{$item}</p>";
}

echo "Sum is $sum";