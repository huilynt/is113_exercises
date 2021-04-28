<?php
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $errors = array("First name" => "valid", "Last name" => "valid", "Username" => "valid", "Password" => "valid", "Email" => "valid");

    
    if (strlen($username) < 6 || strlen($username) > 20) {
        $errors["Username"] = "invalid";
    }
    if (!preg_match("/^[0-9a-zA-Z]*$/", $username) || preg_match("/^[\s]*$/", $username)) {
        $errors["Username"] = "invalid";
    }
    if (strpos($password, $fName) || strpos($password, $lName)) {
        $errors["Username"] = "invalid";
    }

    if (strlen($password) < 6 || strlen($password) > 20 || strpos($password, " ")) {
        $errors["Password"] = "invalid";
    }
    
    if (strpos($email, " ") || !strpos($email, "@") || strpos($email, $fName) || strpos($email, $lName)) {
        $errors["Email"] = "invalid";
    }

    echo "<ul>";
    foreach($errors as $key => $value) {
        echo "<li>$key is $value</li>";
    }
    echo "</ul>";
?>