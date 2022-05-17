<?php

$integers = [4,5,8,5,3,1];

$elementsNumber = count($integers);

if ($elementsNumber > 0) {
    $max = $integers[0];
    $min = $integers[0];
    $sum = 0;

    for ($i = 1; $i < $elementsNumber - 1; $i++) {
        if ($integers[$i] > $max) {
            $max = $integers[$i];
        }

        if ($integers[$i] < $min) {
            $min = $integers[$i];
        }

        $sum += $integers[$i];
    }

    $average = $sum / $elementsNumber;

    echo "Max is $max, min is $min, average is {$average}";
}