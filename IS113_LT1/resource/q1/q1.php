<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<!DOCTYPE html>
<html>
<head>
    <title>Q1</title>
</head>
<body>
 

<?php

   // Add Code Here
   if (!isset($_GET['tracks'])) {
       echo "No tracks selected";
   } else {
       echo "<table border='1'>";
       
       echo "<tr><th>Name</th>
       <th>Email</th>
       <th>Preferred Tracks</th></tr>";

       $name = $_GET['name'];
       $email = $_GET['email'];
       $tracks = $_GET['tracks'];

       echo "<tr>";
       echo "<td>$name</td><td>$email</td>";
       
       echo "<td><ul>";
       foreach ($tracks as $track) {
           echo "<li>$track</li>";
       }
       echo "</ul></td>";
       echo "</tr>";

       echo "</table>";
   }

?>

  
</body>
</html>