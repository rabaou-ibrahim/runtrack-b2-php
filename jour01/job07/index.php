<?php

function my_closest_to_zero(array $numbers) {

    $closest = $numbers[0]; 
    $minDistance = $numbers[0] < 0 ? -$numbers[0] : $numbers[0];

    foreach ($numbers as $number) {
    
        $distance = $number < 0 ? -$number : $number;

        if ($distance < $minDistance) {
            $minDistance = $distance;
            $closest = $number;
        } elseif ($distance == $minDistance) {

            if ($number < 0) {
                $closest = $number;
            }
        }
    }

    return $closest;
}


$numbers = [49, -32, 25, -48, 73];
$closestToZero = my_closest_to_zero($numbers);
echo "Le nombre le plus proche de zéro: " . $closestToZero;

?>