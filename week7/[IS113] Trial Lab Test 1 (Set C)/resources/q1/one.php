<?php
// Do NOT change: start
$gender_list = [
    'm' => 'Male',
    'f' => 'Female',
];

$pet_list = ["cat", "dog", "fish", "other"];

$fruit_list = ['apple', 'orange', 'pear'];
// Do NOT change: end

if (isset($_POST['form'])) {
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }

    if (isset($_POST['pets'])) {
        $pets = $_POST['pets'];
    }

    if (isset($_POST['fruits'])) {
        $fruits = $_POST['fruits'];
    }
}

?>

<html>

<head>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <!-- form -->
    <form action="one.php" method="post">
        <table border='1'>
            <tr>
                <th>Gender</th>
                <td>
                    <?php
                    foreach ($gender_list as $key => $value) {
                        $checked = '';
                        if (isset($gender) && $gender === $key) {
                            $checked = 'checked';
                        }
                        echo "
                            <input type='radio' name='gender' id='$key' value='$key' $checked>
                            <label for='$key' name='gender'>$value</label>
                        ";
                    }
                    ?>
                </td>

                <th>Pets</th>
                <td>
                    <select name='pets[]' multiple>
                        <?php
                        $count_pet = count($pet_list);
                        foreach ($pet_list as $pet) {
                            $selected = '';
                            if (isset($pets) && in_array($pet, $pets)) {
                                $selected = 'selected';
                            }
                            echo "<option value='$pet' $selected>$pet</option>";
                        }
                        ?>
                    </select>
                </td>

            </tr>

            <tr>
                <th>Fruits</th>
                <td>
                    <?php
                    foreach ($fruit_list as $fruit) {
                        $checked = '';
                        if (isset($fruits) && in_array($fruit, $fruits)) {
                            $checked = 'checked';
                        }
                        echo "
                            <input type='checkbox' name='fruits[]' id='$fruit' value='$fruit' $checked>
                            <label for='$fruit'>$fruit</label>
                        ";
                    }
                    ?>
                </td>
            </tr>

        </table>
        <input type='submit' value='Send' name='form' />
        <br><br>
        <a href="one.php">Reset form</a>
    </form>



    <?php
    $errors = [];

    if (isset($gender)) {
        if ($gender === '') {
            $errors[] = 'No gender';
            echo "<h1>Errors</h1><ul>";
            foreach ($errors as $err) {
                echo "<li>$err</li>";
            }
            echo "</ul>";
        } else {
            $sal = 'Sir';
            if ($gender === 'f') {
                $sal = 'Miss';
            }
            echo "<h1>Dear $sal</h1>";

            if (isset($pets)) {
                echo "<h3>Pets</h3>";
                if (count($pets) === 0) {
                    echo "No pets";
                } else {
                    echo "<ol>";
                    foreach ($pets as $pet) {
                        echo "<li>$pet</li>";
                    }
                    echo "</ol>";
                }
            }

            if (isset($fruits)) {
                echo "<h3>Fruits</h3>";
                if (count($fruits) === 0) {
                    echo "./fruits/none.jpg";
                } else {
                    foreach ($fruits as $fruit) {
                        echo "<img src='./fruits/$fruit.jpg'>";
                    }
                }
            }
        }
    }



    ?>
</body>

</html>