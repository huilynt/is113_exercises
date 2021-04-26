<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session1</title>
</head>

<body>
    <form action="session1.php" method="post">
        <table>
            Name: <input type="text" name="name" id="name"><input type="submit" value="Next">
            <?php
            if (isset($_POST['name'])) {
                $_SESSION['name'] = $_POST['name'];
                header('Location: session2.php');
            }
            ?>
        </table>
    </form>
</body>

</html>