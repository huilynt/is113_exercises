<?php

require_once 'common.php';

/* 
 * grabs the value send over by the dropdown list
 * the format will be <product's id>-<size> 
 * e.g. '1-M'
 */

$items = $_POST['item'];

$dao = new ProductDAO();


// YOUR CODE GOES HERE


header('Location: display.php');
return;

?>
