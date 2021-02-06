<?php
    $f0 = $_POST['f0'];
    $list = $_POST['list'];

    $list_arr = explode(";", $list);
    $res = array();
    foreach ($list_arr as $line) {
        $line_arr = explode(" ", $line);
        $name = $line_arr[0];
        $contact = $line_arr[1];
        if (array_key_exists($name, $res)) {
            array_push($res[$name], $contact);
        } else {
            $res[$name] = array($contact);
        }
    }

    $i = 0;
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>F$i</td>";
    echo "<td>$f0</td>";
    echo "</tr>";
    foreach ($res as $key => $value) {
        $i++;
        $combined = implode(", ", $value);
        echo "<tr>";
        echo "<td>F$i</td>";
        echo "<td>$combined</td>";
        echo "</tr>";
    }
    echo "</table>";
?>