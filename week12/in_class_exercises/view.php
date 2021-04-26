<?php
if (isset($_POST['logout'])) {
    session_destroy();
}
?>
<html>
<body>
<?php
    session_start();
    require_once 'common.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    $userDAO = new UserDAO();
    $user = $userDAO->get($_SESSION['username']);
    $username = $_SESSION['username'];
    $firstname = $user->getFirstname();
    $lastname = $user->getLastname();
    echo "<h2> Welcome $firstname $lastname</h2>";

    if (isset($_POST['logout'])) {
        unset($_SESSION['username']);
        header('Location: login.php');
        exit;
    }
    // echo "<input type='submit' value='Logout'>";
    // echo "Back to <a href = \"login.php\">login page</a>";
    ?>
    <form action="register_success.php" method="post">
        <input type='submit' value='Logout' name='logout'>
    </form>



</body>
</html>