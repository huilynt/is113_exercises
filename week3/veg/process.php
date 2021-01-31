<?php
// key: vegetable,  value: quantity
$vegQtyArr = [ 
    'cabbage'   => 3, 
    'lettuce'   => 3,
    'spinach'   => 2,
];

// get submitted value of form field 'vegetable'
$veg = $_GET['vegetable'];
?>

<html>
<body>
    <?php
        echo "
            <h1>$veg</h1>
        ";

    ?>
</body>
</html>