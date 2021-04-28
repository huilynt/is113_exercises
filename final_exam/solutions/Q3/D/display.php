<?php
// display.php
// INCORRECT: extra.php will display "Forrest wanna marry nobody"

session_start();

$_SESSION['forrest_gf'] = 'Jenny';

header('Location: extra.php');

?>
