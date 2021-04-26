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
    }
    // if is client
    elseif ($_SESSION['role'] == 'client') {
        header("Location: client_view.php");
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
                    <form action="manager_view.php" method="POST">
                        <input type="submit" value="Logout" name="logout" />
                    </form>
                </td>
            </tr>
        </table>

        <h1> Service requests </h1>

        <?php

        // Add code here or elsewhere in this file
        $request_DAO = new RequestDAO();
        $all_requests = $request_DAO->getAll();

        if (!empty($_SESSION['all_requests'])) {
            $all_requests = $_SESSION['all_requests'];
        }
        
        echo "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Aircon ID</th>
                <th>Location</th>
                <th>Request Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";

        foreach ($all_requests as $request) {
            $aircon_dao = new AirconDAO();
            $aircon = $aircon_dao->getAircon($request->getAirconId());

            $print_temp = '';
            if ($request->getStatus() == 'pending') {
                $print_temp = "<a href='update_request_status.php?id={$request->getId()}'>Accept this request</a>";
            }

            echo "
            <tr>
                <td>{$request->getId()}</td>
                <td>{$request->getAirconId()}</td>
                <td>{$aircon->getLocation()}</td>
                <td>{$request->getRequestDate()}</td>
                <td>{$request->getStatus()}</td>
                <td>$print_temp</td>
            </tr>";
        }


        echo "</table>";

        // Add code here or elsewhere in this file


        ?>

    </center>
</body>

</html>