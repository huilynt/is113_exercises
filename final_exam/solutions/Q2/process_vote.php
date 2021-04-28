<?php
session_start();
$errors = [];
$age = $_GET['age'];
$gender = '';
$candidate_str = '';

if( !preg_match("/^[1-9][0-9]*$/", $age) || ($age < 18 || $age > 99) ) {
    $errors[] = "Age is incorrect";
}
if( !isset($_GET['gender']) ) {
    $errors[] = "Gender is not specified";
}
else {
    $gender = $_GET['gender'];
}

if( isset($_GET['candidates']) ){
    $candidates = $_GET['candidates'];
    if( count($candidates) > 2 ) {
        $errors[] = "Please enter at most 2 candidates";
    }
    foreach( $candidates as $candidate ){
        $candidate_str .= "candidates[]=" . $candidate . "&";
    }
}

$_SESSION["errors"] = $errors;

if( count($errors) == 0 ){
    echo "Thank you for your vote today!<br>";
    echo "<ul>";
    foreach( $candidates as $candidate ) {
        echo "<li>$candidate</li>";
    }
    echo "</ul>";
}
else {
    header("Location: vote.php?age=$age&{$candidate_str}gender=$gender");
    exit;
}
?>
