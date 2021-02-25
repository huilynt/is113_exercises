<?php
/* 
    Name:  
    Email: 
*/
    if (isset($_POST['fruit'])) {
        $fruit_arr = $_POST['fruit'];
    }
?>
<html>
<body>
    <table border='1'>
        <?php
            if (isset($_POST['fruit'])) {
                foreach ($fruit_arr as $fruit) {
                    echo "<tr><td><img src='$fruit.jpg'></td></tr>";
                }
            }
        ?>
    </table>
    <form method='post' action='q2-one.php'>
        <input type="checkbox" value="apple" name="fruit[]">Apple
        <input type="checkbox" value="orange" name="fruit[]">Orange
        <input type="checkbox" value="pear" name="fruit[]">Pear
        <br>
        <input type='submit' name='send'>
    </form>
</body>
</html>