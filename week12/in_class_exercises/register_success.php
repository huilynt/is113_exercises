<html>

<body>
    <?php
    session_start();
    require_once 'common.php';
    if (!isset($_SESSION['username'])) {
        header("Location: register.php");
        exit;
    }

    $userDAO = new UserDAO();
    $user = $userDAO->get($_SESSION['username']);
    $username = $_SESSION['username'];
    $firstname = $user->getFirstname();
    $lastname = $user->getLastname();
    echo "<h2> Congratulations $firstname $lastname, you are registered successfully </h2>";

    if (isset($_POST['logout'])) {
        unset($_SESSION['username']);
        header('Location: login.php');
        exit;
    }
    
    echo "Back to <a href = \"login.php\">login page</a>";
    ?>

</body>

</html>