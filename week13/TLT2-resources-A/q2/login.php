<?php

/*
    Name:

    Email:
*/

require_once 'model/common.php';

# == Part A : ENTER CODE HERE == 
$employeeDAO = new EmployeeDAO();
$role = $employeeDAO->authenticate($_POST['empId'], $_POST['password']);
if ($role == null) {
    $_SESSION['countUnsuccessful'] = $_SESSION['countUnsuccessful'] + 1;
} else {
    $_SESSION['empId'] = $_POST['empId'];
    $_SESSION['role'] = $role;
    unset($_SESSION['countUnsuccessful']);
    header("Location: viewDetails.php");
    exit;
}






?>

<html>

<body>
    <?php
    echo "<h1>Number of unsuccessful consecutive logins : {$_SESSION['countUnsuccessful']} </h1>";
    echo "<a href='login-view.html'>Back to Login";
    ?>
</body>

</html>