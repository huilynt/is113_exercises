<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<?php

// use these Arrays to print the contents of the table.

$upgrade_info =     array (
                        array("Upgrade to 16GB RAM", 323),   
                        array("Upgrade to 16GB RAM + 512GB SSD", 433),
                        array("Upgrade to Premium Privacy Filter", 48)
                    );

$warranty_info =   array(
                        2 => ["2 years warranty", 0],
                        3 => ["3 years warranty", 168]
                    );


if (isset($_POST['upgrade'])) {
    $upgrades = $_POST['upgrade'];
}
$upgrades = [];
$error = false;
    
if (isset($_POST['upgrade'])) {
    $upgrades = $_POST['upgrade'];
    if (in_array(0, $upgrades) && in_array(1, $upgrades)) {        
    $error = true;
    echo "You can only select one upgrade option from 1-2";
    }
}

if (!$error) {
    echo "<h1>Please confirm your selection</h1>";

    echo "<table border='1'>";
    echo "
    <tr>
        <th>No.</th>
        <th>Description</th>
        <th>Price w/o GST</th>
    </tr>
    ";
    echo "<tr><td>1</td>
    <td>ThinkPad X1 Carbon Gen 8</td>
    <td>$1,669.00</td></tr>";
    $counter = 2;
    $subtotal = 1669.00;
    foreach ($upgrades as $up) {
        $desc = $upgrade_info[$up][0];
        $price = $upgrade_info[$up][1];
        $price = number_format($price, 2);
        $subtotal += $price;
        echo "
        <tr>
            <td>$counter</td>
            <td>$desc</td>
            <td>$$price</td>
        </tr>
        ";
        $counter ++;
    }

    $warranty = $_POST['warranty'];
    $wdesc = $warranty_info[$warranty][0];
    $wprice = $warranty_info[$warranty][1];
    $wprice = number_format($wprice, 2);
    $subtotal += $wprice;
    echo "
        <tr>
            <td>$counter</td>
            <td>$wdesc</td>
            <td>$$wprice</td>
        </tr>
    "; 

    $gst = $subtotal * .07;
    $total = $subtotal + $gst;
    $gst = number_format($gst, 2);
    $total = number_format($total, 2);
    echo "<tr><td colspan='2'>Subtotal</td><td>$$subtotal</td></tr>";
    echo "<tr><td colspan='2'>GST</td><td>$$gst</td></tr>";
    echo "<tr><td colspan='2'>Total</td><td>$$total</td></tr>";
    echo "</table>";

        
}

?>