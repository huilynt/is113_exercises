
<?php
    $a1 = $_GET["a1"];
    $b1 = $_GET["b1"];
    $c1 = $_GET["c1"];

    $a2 = $_GET["a2"];
    $b2 = $_GET["b2"];
    $c2 = $_GET["c2"];

    $a3 = $_GET["a3"];
    $b3 = $_GET["b3"];
    $c3 = $_GET["c3"];
    
    $winner = '';
    if ($a1 == $b1 and $a1 == $c1) {
        $winner = $a1;
    }
    if ($a2 == $b2 and $a2 == $c2) {
        $winner = $a2;
    }
    if ($a3 == $b3 and $a3 == $c3) {
        $winner = $a3;
    }

    if ($a1 == $a2 and $a1 == $a3) {
        $winner = $a1;
    }
    if ($b1 == $b2 and $b1 == $b3) {
        $winner = $a2;
    }
    if ($c1 == $c2 and $c1 == $c3) {
        $winner = $c1;
    }

    if ($a1 == $b2 and $a1 == $c3) {
        $winner = $a1;
    }
    if ($a3 == $b2 and $a3 == $c1) {
        $winner = $a3;
    }

    if ($winner === "") {
        echo "There is no winner";
    } else {
        echo "The winner is $winner";
    }

?>