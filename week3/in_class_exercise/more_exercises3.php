<?php

$n = 3;
$total = $n * 2 - 1;

for($i = 0; $i < $n; $i++) {
    $num_sign = $i * 2 + 1;
    echo str_repeat("__", ($total - $num_sign) / 2) . str_repeat("@", $num_sign) . str_repeat("__", ($total - $num_sign) / 2) . "<br>";
}

?>