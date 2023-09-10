<?php

function my_is_prime(int $number) : bool {
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

if (my_is_prime(44)) {
    echo " 44 est un nombre premier premier.";
} else {
    echo " 44 n'est pas un nombre premier.";
}


?>