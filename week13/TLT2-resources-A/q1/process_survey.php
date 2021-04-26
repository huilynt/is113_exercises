<?php

/*
    Name:

    Email:
*/

require_once 'model/common.php';

?>

<!DOCTYPE html>
<html>

<body>

    <img src="images/sis.png">

    <h1>Survey: Summary</h1>

    <?php

    # Ensure that survey must always be taken from the beginning
    if (!isset($_POST['page2'])) {
        header("Location: survey1.php");
        exit;
    }
    #===

    # == Part B (Display student name and preferences): ENTER CODE HERE ==
    if (isset($_POST['page2'])) {
        $_SESSION['class_length'] = $_POST['class_length'];


        $_SESSION['sem_length'] = $_POST['sem_length'];
    }
    echo "You entered: <br><br>";

    echo "<table border='1'>";

    echo "<tr>
            <th align='center'>Name:</th>
            <td>{$_SESSION['name']}</td>
            </tr>";
    echo "<tr>
            <th align='center'>Class Length:</th>
            <td>{$_SESSION['class_length']}</td>
            </tr>";
    echo "<tr>
            <th align='center'>Semester Length:</th>
            <td>{$_SESSION['sem_length']}</td>
            </tr>";
    echo "</table>";
    # ===

    # == Part B (Add a new response to the database and display status): ENTER CODE HERE ==
    $responseDAO = new ResponseDAO();
    $status = $responseDAO->addResponse($_SESSION['name'], $_SESSION['class_length'], $_SESSION['sem_length']);

    if ($status) {
        echo "<strong>Response saved successfully</strong>";
    } else {
        echo "<strong>Response was not saved successfully</strong>";
    }
    # ====

    ?>

</body>

</html>