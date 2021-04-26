<?php
require_once 'common.php';
session_start();
// WRITE YOUR CODES HERE
$userDAO = new UserDAO();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<html>

<body>
    <h1>Welcome ! Login Page</h1>

    <head>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
            }
        </style>
    </head>
    <form action="login.php" method="post">
        <table>
            <tr>
                <th>Username</th>
                <td><input type='text' name='username'></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type='password' name='password'></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Login">
        <br>
        <?php
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];

            $user = $userDAO->get($_SESSION['username']);
            if ($user !== null) {
                $pw_status = password_verify($_POST['password'], $user->getPasswordHash());

                if ($pw_status) {
                    header('Location: view.php');
                    exit;
                } else {
                    echo "Failed login.";
                }
            } else {
                echo "Username not found.";
            }
        }
        ?>
    </form>



    Do not have an account? <a href="register.php">sign up now.</a>
</body>

</html>