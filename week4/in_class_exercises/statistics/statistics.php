<?php
    $stats_input = $_GET["statistics"];
    $stats_arr = explode(" ", $stats_input);

    $max = max($stats_arr);
    $min = min($stats_arr);
    $sum = array_sum($stats_arr);
    $average = $sum/count($stats_arr);

    $a_arr = array("Max" => $max, "Min" => $min, "Sum" => $sum, "Average" => $average);
    
    echo "<table border='1'>";
    foreach($a_arr as $key => $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$value</td>";
        echo "</tr>";
    }
    echo "</table>"
?>