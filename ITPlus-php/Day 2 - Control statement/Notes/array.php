<?php 

// array với chỉ mục là số
$arr = [];

$arr[] = 2;
$arr[] = 3;
$arr[] = 4;
$arr[] = 5;

if (in_array(2, $arr)) {
    echo "Found";
}

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i]."<br/>";
}

$j = 0;
while ($j < count($arr)) {
    echo $arr[$j];
    $j++;
}

echo "<pre>";
print_r($arr);
echo "</pre>";

foreach ($arr as $value):
    if ($value % 2 == 0):
        break;
    endif;
    echo "Hell yea".$value;
endforeach;

$numberToCheck = 7;

// if ($numberToCheck % 2 == 0):
//     echo "Chan";
// else:
//     echo "Le";
// endif;

// $associativeArr = [
//     "first_name" => 'nguyen', 
//     "last_name" => 'cam'
// ];

// $associativeArr1 = [];
// $associativeArr1["first_name"] = "nguyen";
// $associativeArr1["age"] = 28;

// $multidimensionalArray = [
//     [
//         "first_name" => 'abc',
//         "last_name" => 'def'
//     ]
// ];

// echo $arr[1]."<br/>";
// echo $associativeArr["last_name"]."<br/>";
// echo "<pre>";
// print_r($multidimensionalArray[0]["first_name"]);
// echo "</pre>";

// echo "<pre>";
// print_r($arr);
// echo "</pre>";

// echo "<pre>";
// print_r($associativeArr);
// echo "</pre>";

// echo "<pre>";
// print_r($multidimensionalArray);
// echo "</pre>";

// echo "<pre>";
// print_r($associativeArr1);
// echo "</pre>";