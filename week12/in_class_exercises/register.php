<?php
require_once 'common.php';

$tmp_username = '';
session_start();

?>

<html>

<body>
    <h1>Register </h1>


    <table>
        <tr>
            <td style="text-align:left">
                <form method="post" action="register.php">
                    <table border="1">
                        <tr>
                            <th>
                                First name
                            </th>
                            <td>
                                <input name="firstname" value="" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Last name
                            </th>
                            <td>
                                <input name="lastname" value="" />
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Username
                            </th>
                            <td>
                                <input name="username" value="" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Password
                            </th>
                            <td>
                                <input type="password" name="password" value="" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Confirm password
                            </th>
                            <td>
                                <input type="password" name="confirmPassword" value="" />
                            </td>
                        </tr>
                    </table>
                    <br>
                    <!--<p>
        By clicking Agree & Join, you agree to the LinkedIn User Agreement, Privacy Policy, and Cookie Policy.
        </p> -->
                    <input type="submit" name="register" value="Join now" />
                    <br />
                    Alread have an account? <a href="login.php">Login.</a>
                </form>
        </tr>
        </td>
        <tr>
            <td>
                <?php
                if (isset($_POST['register'])) {
                    $errors = [];
                    if (!isset($_POST['firstname']) || $_POST['firstname'] == '') {
                        $errors[] = 'Firstname is empty.';
                    }
                    if (!isset($_POST['lastname']) || $_POST['lastname'] == '') {
                        $errors[] = 'Lastname is empty.';
                    }
                    if (!isset($_POST['username']) || $_POST['username'] == '') {
                        $errors[] = 'Username is empty.';
                    }
                    if (isset($_POST['username'])) {
                        $userDAO = new UserDAO();
                        $user = $userDAO->get($_POST['username']);
                        if ($user !== null) {
                            $errors[] = 'Username is already taken.';
                        }
                    }

                    $pw_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    if (isset($_POST['password']) && $_POST['password'] !== '') {
                        if ($_POST['password'] !== $_POST['confirmPassword']) {
                            $errors[] = 'The passwords are different.';
                        }
                    } else {
                        $errors[] = 'Password is empty';
                    }

                    if (count($errors) > 0) {
                        echo "<ul style='color:red;'>";
                        foreach ($errors as $e) {
                            echo "<li>$e</li>";
                        }
                        echo "</ul>";
                    } else {
                        $_SESSION['username'] = $_POST['username'];
                        // $user = new User($_POST['username'], $pw_hash, $_POST['firstname'], $_POST['lastname']);
                        $add_status = $userDAO->add($_POST['username'], $pw_hash, $_POST['firstname'], $_POST['lastname']);
                        if ($add_status) {
                            header("Location: register_success.php");
                            exit;
                        }
                    }
                }
                ?>


        </tr>
        </td>

    </table>
</body>

</html>