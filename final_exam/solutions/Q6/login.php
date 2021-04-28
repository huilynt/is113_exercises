<?php

require_once 'common.php';

$errors = [];

if( isset($_POST['username']) && isset($_POST['password']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dao = new UserDAO();
    $user = $dao->get($username);

    if( $user !== false && password_verify($password, $user->getPasswordHash()) ) {

        if( $user->getEmployeeType() == 'management' ) {
            $url = 'management_main.php';
        }
        elseif( $user->getEmployeeType() == 'normal' ) {
            $url = 'normal_main.php';
        }
        else {
            $errors[] = 'Access denied';
        }
    }
    else {
        $errors[] = 'Login fails';
    }
}

// If there are errors
if( empty($errors) ) {
    $_SESSION['login'] = $user;
}
else {
    $_SESSION['errors'] = $errors;
    $url = 'index.php';
}

header("Location: $url");
exit;

?>