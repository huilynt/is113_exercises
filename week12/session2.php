<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session2</title>
</head>

<body>
    <form action="session2.php" method="post">
        <table>
            Age: <input type="number" name="age" id="age"><input type="submit" value="Next">
            <?php
            if (isset($_POST['age'])) {
                $_SESSION['age'] = $_POST['age'];
                header('Location: session3.php');
            }
            ?>
        </table>
    </form>
</body>

</html>