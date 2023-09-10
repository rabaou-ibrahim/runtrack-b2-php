<?php

function my_array_sort(array $arr, string $order = 'ASC') : array {
    $length = 0;
    $k = 0;

    while (isset($arr[$k])) {
        $length++;
        $k++;
    }

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            $compare = ($order === 'ASC') ? ($arr[$j] > $arr[$j + 1]) : ($arr[$j] < $arr[$j + 1]);
            if ($compare) { // temp sert à changer les deux cases arr[i] et arr[j]
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }

    return $arr;
}

$array = [3, 1, 2, 4, 5];

$sortedArrayASC = my_array_sort($array, 'ASC');
print_r($sortedArrayASC);

$sortedArrayDESC = my_array_sort($array, 'DESC');
print_r($sortedArrayDESC);




?>