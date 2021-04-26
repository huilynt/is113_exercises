<?php

/*
    Name:

    Email:
*/

require_once 'model/common.php';

?>

<!DOCTYPE html>
<html>

<body>
    <img src="images/sis.png">
    <h1>Statistics</h1>
    <?php
    # == Part C (Compute Statistics): ENTER CODE HERE == 
    $responseDAO = new ResponseDAO();
    $allResponses = $responseDAO->retrieveAll();

    $numRes = count($allResponses);
    $numTwo = 0;
    $fifteenWk = 0;

    foreach ($allResponses as $response) {
        if ($response->getPreferredClassLength() == 2) {
            $numTwo++;
        }
        if ($response->getPreferredSemLength() == 15) {
            $fifteenWk++;
        }
    }

    $percentWk = number_format($fifteenWk / $numRes * 100.0, 2);
    echo "<table border='1'>";
    echo "<tr>
            <th align='center'># Responses</th>
            <td>$numRes</td>
            </tr>
        <tr>
            <th align='center'># 2 hours</th>
            <td>$numTwo</td>
            </tr
        <tr>
            <th align='center'># 15 weeks</th>
            <td>$percentWk%</td>
            </tr>
        </table>";
    # ====
    ?>
</body>

</html>