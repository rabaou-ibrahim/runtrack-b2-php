<?php

function my_fizz_buzz(int $length) : array {
    $array = [];

    for ($i = 1; $i <= $length; $i++){
        if ($i % 3 == 0 && $i % 5 == 0) {
            $array[] = 'FizzBuzz';
        } elseif ($i % 3 == 0) {
            $array[] = 'Fizz';
        } elseif ($i % 5 == 0) {
            $array[] = 'Buzz';
        } else {
            $array[] = $i;
        }
    }

    return $array;
}

$fizzBuzzArray = my_fizz_buzz(15);
print_r($fizzBuzzArray);


?>