<?php

require_once 'PersonDAO.php';
// By importing this file, we can create a DAO object.
// DAO object allows us to obtain:
//    - $people (Array of Person objects)
//    - a subset of $people where gender is either 'M' or 'F'
$dao = new PersonDAO();
// You can now call all public methods of PersonDAO class.


?>
<html>
<head>
    <title>Dating - Show All Profiles</title>
</head>
<body>
    <h3>Show All Profiles</h3>
     
        <?php
            // YOUR CODE GOES HERE
            // There are multiple Tables within a Table
            
            //===================================================================
            // Display a Table containing "Men" only
            // There are multiple Tables within a Table
            // YOUR CODE GOES HERE
            

            

            echo '<hr>';
            //===================================================================
            // Display a Table containing "Women" only
            // There are multiple Tables within a Table
            // YOUR CODE GOES HERE
            
        ?>
    </table>

</body>
</html>