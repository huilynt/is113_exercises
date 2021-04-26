<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summary</title>
</head>

<body>
    <?php
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $hobby = $_SESSION['hobby'];
    echo "Name: $name <br>";
    echo "Age: $age <br>";
    echo "Hobby: $hobby <br>";
    ?>

</body>

</html>