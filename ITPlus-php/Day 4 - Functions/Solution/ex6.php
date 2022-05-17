<?php 

function group($arr, $elementsToCut) {
    if (count($arr) > 0) {
        $output = [];
        $arrToSave = [];
        $i = 1; 
        foreach ($arr as $key => $item) {
            $arrToSave[] = $item;

            //if item is the last item
            if ($key === count($arr) - 1) {
                $output[] = $arrToSave;
                continue;
            }

            if ($i == $elementsToCut) {
                $output[] = $arrToSave;
                //reset
                $arrToSave = [];
                $i = 1;
                continue;
            }
            $i++;
        }
        return $output;
    }
}

$input = [1,2,3,4,5];
print_r(group($input, 6));