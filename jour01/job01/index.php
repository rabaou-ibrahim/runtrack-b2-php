<?php

function my_str_search(string $haystack, string $needle) : int {

    $nbOccurences = 0;

    // on récupère la longueur du "haystack"

    $i = 0;
    while (isset($haystack[$i])) {
        $i++;
    }

    // on incrémente le nombre d'occurrences à chaque fois que "needle" matche avec "i"

    for ($j = 0; $j < $i; $j++){
        if ($needle ===  $haystack[$j]) {
            $nbOccurences++;
        }
    }

    return $nbOccurences;

}

var_dump(my_str_search("espaaaace", "e"));