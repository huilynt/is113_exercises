<html>

<body>
    <?php
    require_once "common.php";

    $person_dao = new PersonDAO();
    $status = false;
    if (isset($_POST['add']) &&
    isset($_POST['name']) &&
    isset($_POST['age']) &&
    isset($_POST['gender']) &&
    isset($_POST['rating'])) {
        $status = $person_dao->add($_POST['name'], $_POST['age'] , $_POST['gender'], (double) $_POST['rating']);
    }

    $list_pp = $person_dao->loadAll();

    
    ?>
    <table border="1">
        <tr>
            <th>Index</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Rating</th>
        </tr>

        <?php
        $index = 1;
        foreach ($list_pp as $pp) {
            $name = $pp->getName();
            $age = $pp->getAge();
            $gender = $pp->getGender();
            $rating = $pp->getRatingScore();
            echo "
            <tr>
                <td>$index</td>
                <td>$name</td>
                <td>$age</td>
                <td>$gender</td>
                <td>$rating</td>
            </tr>";
            $index++;
        }
        ?>
    </table>

    <form action="exercise7.php" method="post" name='add'>
        <table border='1'>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" id="male" value='Male'><label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value='Female'><label for="female">Female</label>
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
</body>

</html>