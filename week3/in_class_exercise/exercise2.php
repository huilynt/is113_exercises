<?php
$my_string1 = "456";
$my_string2 = '-66';

function get_sum($num_string) {
    $sum = 0;
    for($i = 0; $i < strlen($num_string); $i++) {
        $char = $num_string[$i];
        if (is_numeric($char)) {
            $n = (int) $char;
            $sum += $n;
        }
    }
    return $sum;
}

$sum1 = get_sum($my_string1);
$sum2 = get_sum($my_string2);
echo "Sum of numbers in $my_string1 is $sum1";
echo "<br>";
echo "Sum of numbers in $my_string2 is $sum2";

?>