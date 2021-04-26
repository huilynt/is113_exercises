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
		<h1>Stored Responses</h1>
		<table border='1'>
        <?php
            # == Part A (Display Stored Responses): ENTER CODE HERE == 
			$responseDAO = new ResponseDAO();
			$allResponses = $responseDAO->retrieveAll();
			echo "
			<tr>
				<th>Name</th>
				<th align='center'>Preferred Class Length (in hours)</th>
				<th align='center'>Preferred Sem Length (in weeks)</th>
			</tr>
			";
			foreach ($allResponses as $response) {
				
				echo "
				<tr>
					<td>{$response->getName()}</td>
					<td>{$response->getPreferredClassLength()}</td>
					<td>{$response->getPreferredSemLength()}</td>
				</tr>";
			}
            # ====
		?>
		</table>
	</body>
</html>