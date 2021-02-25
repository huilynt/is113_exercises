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

    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $num3 = $_GET['num3'];
    $divisor = $_GET['divisor'];

    $num_arr = array($num1, $num2, $num3);
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
