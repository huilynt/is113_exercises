<?php
    $search = $_POST['search'];
    $library = array("PHP Advanced" => "available", "PHP for beginners" => "unavailable", "CSS" => "available");

    echo "<table border='1'>";
    foreach($library as $key => $value) {
        if (stripos($key, $search) !== false) {
            $color = 'green';
            $avail = $library[$key];
            if ($avail === 'unavailable') { $color = 'red'; }
            echo "<tr><td>$key</td><td style='color: $color;'>$avail</td></tr>";
        }
    }
    echo "</table>";
?>