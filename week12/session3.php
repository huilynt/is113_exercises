<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session3</title>
</head>

<body>
    <form action="session3.php" method="post">
        <table>
            Hobby: <input type="text" name="hobby" id="hobby"><input type="submit" value="Next">
            <br>
            <?php
            if (isset($_POST['hobby'])) {
                $_SESSION['hobby'] = $_POST['hobby'];
                header('Location: summary.php');
            }
            ?>
        </table>
    </form>
</body>

</html>