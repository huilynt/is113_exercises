<?php

function check_pw($pw) {
    $upper = False;
    $lower = False;
    $num = False;
    if ((strlen($pw) < 6) || (strlen($pw) > 20)) {
        return False;
    }

    for($i = 0; $i < strlen($pw); $i++) {
        $char = $pw[$i];
        if (is_numeric($char)) {
            $num = True;
        } else {
            if ($char === strtolower($char)) {
                $lower = True;
            } else {
                $upper = True;
            }
        }
    }
    
    return $upper and $lower and $num;
}
$pw1 = 'Abc123';
$pw2 = 'abc123';
$pw3 = '123456';

echo $pw1;
echo "<br>";
echo check_pw($pw1) ? 'True': 'False';
echo "<br>";
echo "<br>";

echo $pw2;
echo "<br>";
echo check_pw($pw2) ? 'True': 'False';
echo "<br>";
echo "<br>";

echo $pw3;
echo "<br>";
echo check_pw($pw3) ? 'True': 'False';
?>