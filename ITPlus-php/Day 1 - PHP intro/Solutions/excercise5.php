<?php 

$number = 120;

if ($number < 100) {
    echo 450 * $number;
}

if ($number > 100 && $number <= 200) {
    echo 450 * 100 + 600 * ($number - 100);
}

if ($number > 200 && $number <= 300) {
    echo 450 * 100 + 600 * 100 + 750 * ($number - 100);
}

if ($number > 300 && $number <= 500) {
    echo 450 * 100 + 600 * 100 + 750 * 100 + 900 * ($number - 100);
}

// Thuế tương tự như bài trên