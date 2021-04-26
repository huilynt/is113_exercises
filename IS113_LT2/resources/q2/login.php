<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<?php
require_once 'common.php';

// Add code here or elsewhere in this file
session_start();
?>

<html>

<body>
    <center>
        <img src="./images/lunar.jpg" width="200">
        <form action="login.php" method="post">
            <table border="1">
                <tr>
                    <th>Username</th>
                    <td> <input name="username" value='' /> </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td> <input type="password" name="password" /> </td>
                </tr>
            </table>
            <br />
            <input type="submit" value="Login" name="login" />
            <br />
        </form>

        <?php
        // Add code here or elsewhere in this file
        $user_dao = new UserDAO();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $user_dao->get($username);
            var_dump($user);

            // user is NULL, username is wrong
            if ($user == NULL) {
                echo "Username does not exist!";
            }
            // password is wrong
            elseif ($user !== NULL && $password !== $user->getPassword()) {
                echo "Password is not valid!";
            }
            // all is valid
            else {
                // set session role
                $role = $user->getRole();
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $role;

                // client role
                if ($role == 'client') {
                    header("Location: client_view.php");
                    exit;
                }
                // manager role
                elseif ($role == 'manager') {
                    header("Location: manager_view.php");
                    exit;
                }
            }
        }

        ?>
    </center>
</body>

</html>