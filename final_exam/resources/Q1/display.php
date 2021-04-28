<?php
// display.php 
// code to generate sample output

require_once 'common.php';

$dao = new ProductDAO();
$productArr = $dao->retrieveAll();

echo "<html><body>";
print_form($productArr);
echo "</body></html>";

function print_form($productArr) {
    // YOUR CODE GOES HERE
    
    

    }

?>

