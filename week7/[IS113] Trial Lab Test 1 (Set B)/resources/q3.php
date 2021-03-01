<?php
/* 
    Name:  
    Email: 
*/

$people = [
    "trump"    => 'Donald Trump',
    "clinton"  => 'Hillary Clinton',
    "kim"      => 'Kim Jong Un',
    "moon"     => 'Moon Jae In',
    "putin"    => 'Vladimir Putin'
];

$msg = '';
$persons = [];
if (isset($_POST['start'])) {
    if (isset($_POST['persons'])) {
        $persons = $_POST['persons'];
        if (count($persons) < 3) {
            $msg = "<h1>Select at least THREE (3) people!</h1>";
        }
    } else {
        $msg = "You didn’t select anyone! Select at least THREE (3) people!";
    }
}


?>
<!DOCTYPE html>
<html>

<body>
    <?php
        if ($msg != '') {
            echo "<h1>$msg</h1>";
        }
    ?>
    <form method='post' action='q3.php'>
        <table border="1">
            <tr>
                <td>Persons</td>
            </tr>
            <?php
                foreach ($people as $key => $value) {
                    $checked = '';
                    if (in_array($key, $persons)) {
                        $checked = 'checked';
                    }
                    echo "<tr><td><input type='checkbox' name='persons[]' value='$key' $checked>$value</td></tr>";
                }
            ?>
            <tr>
                <td><input type="submit" name="start" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_POST['persons']) && count($_POST['persons']) >= 3) {
            $person_len = count($_POST['persons']);
            echo "<table border='1'>";
            for ($i=0; $i < $person_len; $i++) { 
                echo "<tr>";
                for ($j=0; $j < $person_len; $j++) {
                    $ran_num = rand(0, $person_len - 1);
                    echo "<td><img src='$persons[$ran_num].jpg'></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>

</html>