<?php
    $first = $_GET['first'];
    $second = $_GET['second'];
    $operator = $_GET['operator'];
        
    if ($operator == '+') {
        $result = ((int)$first) + ((int)$second);
    } else if ($operator == '-') {
        $result = ((int)$first) - ((int)$second);
    } else if ($operator == '*') {
        $result = ((int)$first) * ((int)$second);
    } else if ($operator == '/') {
        $result = ((int)$first) / ((int)$second);
    } else {
        $result = ((int)$first) ** ((int)$second);
    }
    echo "<h1>Result: $result</h1>";
?>