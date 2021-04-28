<?php
    $qtyApple = $_GET["qtyApple"];
    $qtyOrange = $_GET["qtyOrange"];
    $qtyPear = $_GET["qtyPear"];

    $PRICEAPPLE = 3;
    $PRICEORANGE = 4;
    $PRICEPEAR = 5;
    $total = $qtyApple * $PRICEAPPLE + $qtyOrange * $PRICEORANGE + $qtyPear * $PRICEPEAR;
    echo "Total: $$total";
?>