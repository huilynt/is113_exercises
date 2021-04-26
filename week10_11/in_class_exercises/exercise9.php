<html>

<body>
    <?php
    require_once "common.php";

    $person_dao = new PersonDAO();

    if (isset($_POST['load'])) {
    }
    $list_pp = $person_dao->loadAll();

    $name = '';
    $age = '';
    $gender = '';
    $rating = '';

    $checked = ["Male" => "", "Female" => ""];
    ?>
    <form action="exercise9.php" method="post">
    <table border="1">
        <tr>
            <th></th>
            <th>Index</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Rating</th>
        </tr>

        <?php
        foreach ($list_pp as $pp) {
            $id = $pp->getId();
            $name = $pp->getName();
            $age = $pp->getAge();
            $gender = $pp->getGender();
            $rating = $pp->getRatingScore();
            echo "
            <tr>
                <td><input type='radio' name='person' value='$id'></td>
                <td>$id</td>
                <td>$name</td>
                <td>$age</td>
                <td>$gender</td>
                <td>$rating</td>
            </tr>";
        }
        ?>
    </table>
    
        <input type="submit" value="Load" name="load">

        <form action="exercise7.php" method="post" name='add'>
        <table border='1'>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name" value="<?=$name?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <?php 
                    $checkedM = $checked['Male'];
                    $checkedF = $checked['Female'];
                    echo "<input type='radio' name='gender' id='male' value='Male' $checkedM><label for='male'>Male</label>";
                    echo "<input type='radio' name='gender' id='female' value='Female' $checkedF><label for='female'>Female</label>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" id="age"></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="string" name="rating" id="rating"></td>
            </tr>
        </table>
        <input type="submit" value="Add" name="add">
    </form>
    </form>
</body>

</html>