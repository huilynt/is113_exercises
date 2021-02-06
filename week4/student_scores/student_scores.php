<?php
    $scores_arr = explode(";", $_POST['scores']);
    $res_arr = array();
    foreach ($scores_arr as $item) {
        $temp_arr = explode(" ", $item);
        $res_arr[$temp_arr[0]] = $temp_arr[1];
    }
    arsort($res_arr);
    echo "<table border='1'>";
    echo "<td>Name</td>";
    echo "<td>Scores</td>";
    echo "<td>Grade</td>";
    foreach ($res_arr as $key => $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$value</td>";
        $grade = '';
        if ($value >= 90) { $grade = "A+"; }
        elseif ($value >= 80) { $grade = "A"; }
        elseif ($value >= 70) { $grade = "B+"; }
        else { $grade = "B"; }
        echo "<td>$grade</td>";
        echo "</tr>";
    }
    echo "</table>";
?>