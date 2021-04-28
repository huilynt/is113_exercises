<?php
// ?
require_once "cars.php";
?>
<html>

<body>

    <ul>
        <?php
        // YOUR CODE GOES HERE
        // Display Car objects
        foreach ($cars as $car) {
            $year = $car->getYear();
            $model = $car->getModel();
            $make = $car->getMake();
            $rating = $car->getRating();

            echo "
            <li>
                $year&nbsp;$model;&nbsp;$make
                <ul>
                    <li>Rating: &nbsp;$rating</li>
                </ul>
            </li>";
        }
        ?>
    </ul>

</body>

</html>