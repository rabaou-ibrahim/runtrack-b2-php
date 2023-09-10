<?php

function my_is_multiple(int $divider, int $multiple) : bool {
    if ($divider % $multiple == 0){
        echo "true";
        return true;
    }    
    else {
        echo "false";
        return false;
    }
}

my_is_multiple(6, 4);

?>