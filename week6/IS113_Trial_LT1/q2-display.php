<?php
/* 
    Name:  
    Email: 
*/

    $fruit_arr = $_POST['fruit'];
?>
<html>
<body>
    <table border='1'>
        <?php
            foreach ($fruit_arr as $fruit) {
                echo "<tr><td><img src='$fruit.jpg'></td></tr>";
            }
        ?>
    </table>
</body>
</html>