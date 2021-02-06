<?php
    $qtyApple = (int)$_GET["qtyApple"];
    $qtyOrange = (int)$_GET["qtyOrange"];
    $qtyPear = (int)$_GET["qtyPear"];

    $PRICEAPPLE = 3;
    $PRICEORANGE = 4;
    $PRICEPEAR = 5;

    $totalApple = 0;
    $totalOrange = 0;
    $totalPear = 0;

    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>Qty</td>";
    echo "<td>Price</td>";
    echo "</tr>";

    if ($qtyApple !== 0) {
        $totalApple = $qtyApple * $PRICEAPPLE;
        echo "<tr>";
        echo "<td>Apple</td>";
        echo "<td>$qtyApple</td>";
        echo "<td>$$totalApple</td>";
        echo "</tr>";
    }
    if ($qtyOrange !== 0) {
        $totalOrange = $qtyOrange * $PRICEORANGE;
        echo "<tr>";
        echo "<td>Orange</td>";
        echo "<td>$qtyOrange</td>";
        echo "<td>$$totalOrange</td>";
        echo "</tr>";
    }
    if ($qtyPear !== 0) {
        $totalPear = $qtyPear * $PRICEPEAR;
        echo "<tr>";
        echo "<td>Pear</td>";
        echo "<td>$qtyPear</td>";
        echo "<td>$$totalPear</td>";
        echo "</tr>";
    }
    $total = $totalApple + $totalOrange + $totalPear;
    echo "<tr>";
    echo "<td colspan='2'>Total Cost</td>";
    echo "<td>$$total</td>";
    echo "</tr>";
   
    echo "</table>";
?>