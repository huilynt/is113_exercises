<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<!DOCTYPE html>
<?php
    require_once 'common.php';
?>
<html>
    <body>
        <?php
            ### Add code here or elsewhere in this file
            $dao = new StallDAO();
            
            $all_stalls = $dao->getStalls();
            $stall_count = count($all_stalls);
        ?>
        <table border="1">
            <tr>
                <th>Stall Name</th>
                <th>Count of Sales</th>
            </tr>
            <?php
            foreach ($all_stalls as $stall) {
                $num_sales = count($stall->getSales());
                echo "<tr>
                    <td>{$stall->getName()}</td>
                    <td>$num_sales</td>
                </tr>";
            }
            ?>
        </table>
    </body>
</html>