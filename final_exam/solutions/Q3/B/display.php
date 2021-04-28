<?php
// display.php
// CORRECT (Displays "Forrest wanna marry Jenny")

session_start();

require_once 'extra.php';

echo "Forrest wanna marry {$_SESSION['forrest_gf']}";


?>