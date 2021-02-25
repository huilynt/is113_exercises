<?php
/* 
    Name:  
    Email: 
*/

    function is_divisible_by($num, $n) {
        if ($num % $n == 0) {
            return true;
        } else {
            return false;
        }
    }

    $num_arr = explode(",", $_GET['numbers']);
    $divisor = $_GET['divisor'];
    echo "<ul>";
    foreach ($num_arr as $num) {
        echo "<li>";
        if (is_divisible_by($num, $divisor)) {
            echo "$num is divisible by $divisor: YES";
        } else {
            echo "$num is divisible by $divisor: NO";
        }
        echo "</li>";
    }
    echo "</ul>";
?>