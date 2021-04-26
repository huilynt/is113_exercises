<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<html>

<body>

    <?php
    require_once 'common.php';

    // Add code here or elsewhere in this file
    session_start();
    if (!$_SESSION['role']) {
        header("Location: login.php");
        exit;
    } elseif ($_SESSION['role'] == 'manager') {
        header("Location: manager_view.php");
        exit;
    } else {
        $user = $_SESSION['user'];

        if (isset($_POST['logout'])) {
            $_SESSION = [];
            header("Location: login.php");
        }
    }

    
    ?>

    <center>

        <table>
            <tr>
                <td>
                    <?php
                    $username = $user->getUsername();
                    echo "<img src='./images/$username.png' width='200'>"
                    ?>
                </td>
                <td>
                    <?php
                    $name = $user->getFullname();
                    echo "<h1> Welcome, $name </h1>"
                    ?>

                </td>
            </tr>
            <tr>
                <td align="center">
                    <form action="client_view.php" method="POST">
                        <input type="submit" value="Logout" name="logout" />
                    </form>
                </td>
            </tr>
        </table>

        <h1> Your aircons</h1>

        <?php

        // Add code here or elsewhere in this file

        $aircon_dao = new AirconDAO();
        $all_aircons = $aircon_dao->getAll();
        
        echo "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Date of Last Request</th>
                <th>Status of Last Request</th>
            </tr>";
        foreach ($all_aircons as $aircon) {
            if ($aircon->getUsername() == $user->getUsername()) {
                echo "<tr>
                    <td>{$aircon->getId()}</td>
                    <td>{$aircon->getName()}</td>
                    <td>{$aircon->getLocation()}</td>
                    <td>{$aircon->getLastRqDate()}</td>
                    <td>{$aircon->getLastRqStatus()}</td>
                </tr>";
            }
        }
        

        echo "</table>";

        // Add code here or elsewhere in this file

        ?>

    </center>

</body>

</html>