<?php
$course = "Web Application Development";
$i = 0;
$totalA = 0;
$totalNA = 0;

for ($i = 0; $i < strlen($course); $i++) {
    $char = $course[$i];
    if (strtolower($char) === 'a') {
        $totalA += 1;
    } else {
        $totalNA += 1;
    }    
}

echo 'Total a chars : ' . $totalA . '<br />';
echo 'Total non-a chars : ' . $totalNA . '<br />';
?>