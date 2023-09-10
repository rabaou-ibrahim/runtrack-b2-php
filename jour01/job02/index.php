<?php

function my_str_reverse(string $string): string {
    $newString = '';
    $i = 0;

    // Find the end of the string
    while (isset($string[$i])) {
        $i++;
    }

    $i--;

    while ($i >= 0) {
        $newString .= $string[$i];
        $i--;
    }

    return $newString;
}

echo my_str_reverse("Rabaou");



?>