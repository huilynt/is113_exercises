<?php



function check_prime($n) {
    if ($n == 1) {
        return False;
    }

    for($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            return False;
        }
    }
    return True;
}

$n = 6;
echo $n;
echo "<br />";
echo check_prime($n) ? "True": "False";
echo "<br />";
echo "<br />";

$n = 1;
echo $n;
echo "<br />";
echo check_prime($n) ? "True": "False";
?>