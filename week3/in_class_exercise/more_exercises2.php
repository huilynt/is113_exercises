<?php

$my_string1 = "32*43";
$op = '';
$num1 = '';
$num2 = '';
$result = 0;

for($i = 0;$i < strlen($my_string1); $i++) {
    $char = $my_string1[$i];
    if (is_numeric($char))  {
        if ($op == '') {
            $num1 .= $char;
        } else {
            $num2 .= $char;
        }
    } else if (!is_numeric($char)) {
        $op = $char;
    }
}

if ($op == '+') {
    $result = ((int)$num1) + ((int)$num2);
} else if ($op == '-') {
    $result = ((int)$num1) - ((int)$num2);
} else if ($op == '*') {
    $result = ((int)$num1) * ((int)$num2);
} else {
    $result = ((int)$num1) / ((int)$num2);
}

echo $result;

?>