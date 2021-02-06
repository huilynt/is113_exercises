<?php
    $arr1 = explode(" ", $_GET["input1"]);
    $arr2 = explode(" ", $_GET["input2"]);

    echo "<table border='1'>";
    foreach ($x as $i) {
        echo "<tr>";
        foreach ($arr2 as $j) {
            $res = $i * $j;
            echo "<td>$res</td>";
        }
        echo "</tr>";
    }
    echo "</table>"
?>