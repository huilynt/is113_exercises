<?php
/* 
    Name:  
    Email: 
*/

function generateRandomSets($quantity)
{
    $num_numbers = 3; // generate 3 random integers
    $result = [];
    /*
     $result is an Array of Arrays.
     A sample $result array looks like this
     with parameter $quantity of 3 (user input):

     [
         [1, 5, 3],
         [2, 0, 9],
         [4, 8, 4]
     ]
    */

    // Part A
    // YOUR CODE GOES HERE
    for ($i = 0; $i < $quantity; $i++) {
        $temp = [];
        for ($j = 0; $j < $num_numbers; $j++) {
            $temp[] = rand(0, 10);
        }
        $result[] = $temp;
    }

    return $result;
}

function calculate($random_sets, $lucky_number)
{
    $result = [];
    $num_numbers = 3; // each set consists of 3 randomly generated integers

    /*
     $results is an Array.
     A sample $result array looks like this
     (given that $random_sets contain 4 sets of numbers)

     [
         0,
         1,
         0,
         2
     ]

     It means:
        - First number set had zero match.
        - Second number set had ONE match.
        - Third number set had zero match.
        - Fourth number set had TWO matches.

    */

    // Part B
    // YOUR CODE GOES HERE
    for ($i = 0; $i < count($random_sets); $i++) {
        $temp = 0;
        for ($j = 0; $j < count($random_sets[$i]); $j++) {
            if ($random_sets[$i][$j] == $lucky_number) {
                $temp += 1;
            }
        }
        $result[] = $temp;
    }
    return $result;
}

// Form Processing
// YOUR CODE GOES HERE
$quantity = $_POST['quantity'];
$lucky_number = $_POST['lucky_number'];
$bet_amount = $_POST['bet_amount'];

echo "<h1>Lucky Number: $lucky_number <br><br> Bet Amount: $bet_amount</h1>";


// Generate # of sets (each set contains 3 numbers)
$random_sets = generateRandomSets($quantity); // DO NOT MODIFY THIS LINE


// Check if lucky number is found
$result = calculate($random_sets, $lucky_number); // DO NOT MODIFY THIS LINE

$total_winning = 0;
foreach ($result as $res) {
    $total_winning += ($res * $bet_amount);
}

echo "
<table border='1'>
    <tr>
        <td>Number Set</td>
        <td>Number of Matches</td>
        <td>Winning Amount</td>
    </tr>
    ";

for ($i = 0; $i < count($random_sets); $i++) {
    $rset = implode(", ", $random_sets[$i]);
    $matches = $result[$i];
    $win_amount = $matches * $bet_amount;
    echo "
    <tr>
        <td>$rset</td>
        <td>$matches</td>
        <td>$win_amount</td>
    </tr>";
}

echo "
    <tr>
        <td colspan='2'>Total Winning Amount</td>
        <td>$total_winning</td>
    </tr>
</table>
";

?>
<!DOCTYPE html>
<html>

<body>

</body>

</html>