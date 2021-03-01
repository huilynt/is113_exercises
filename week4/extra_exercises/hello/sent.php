<?php

    $message = $_GET['msg'];
    $num = (int)$_GET['num'];

    $error_msg = "";
    if ($message == "") {
        $error_msg .= "<li>Why No Message?</li>";
    }
    if ($num == "") {
        $error_msg .= "<li>Why No Number?</li>";
    }

    if ($error_msg != "") {
        echo "<ol>";
        echo $error_msg;
        echo "</ol>";
    } else {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td><strong>S/N</strong></td>";
        echo "<td><strong>Message</strong></td>";
        echo "</tr>";
        for ($i=1; $i <= $num; $i++) { 
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>$message</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

?>