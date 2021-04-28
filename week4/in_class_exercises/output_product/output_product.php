<?php
    $arr1 = explode(" ", $_POST["input1"]);
    $arr2 = explode(" ", $_POST["input2"]);

    echo "<table border='1'>";
    foreach ($arr1 as $i) {
        echo "<tr>";
        foreach ($arr2 as $j) {
            $res = $i * $j;
            echo "<td>$res</td>";
        }
        echo "</tr>";
    }
    echo "</table>"
?>