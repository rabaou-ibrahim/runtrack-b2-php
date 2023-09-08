<?php

function my_str_reverse(string $string) : string {

    // on prend la longueur de la chaine de caractères

    $i = 0;
    while (isset($string[$i])) {
        $i++;
    }

    for ($j = $i; $j >= 0; $j--){
        $reverseString[$j] = $string[$i];
    }
}

my_str_reverse("Rabaou");

?>