<html>

<body>
    <?php
    require_once "common.php";

    $person_dao = new PersonDAO();

    $status = false;
    if (isset($_POST['people'])) {
        $list_delete = $_POST['people'];
        foreach ($list_delete as $id) {
            $status = $person_dao->delete($id);
        }
        if ($status) {
            echo "<h1>Deleted</h1>";
        }
    }

    $list_pp = $person_dao->loadAll();
    
    ?>
    <form action="exercise8.php" method="post">
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
                <td><input type='checkbox' name='people[]' value='$id'></td>
                <td>$id</td>
                <td>$name</td>
                <td>$age</td>
                <td>$gender</td>
                <td>$rating</td>
            </tr>";
        }
        ?>
    </table>
    
        <input type="submit" value="Delete" name="delete">
    </form>
</body>

</html>