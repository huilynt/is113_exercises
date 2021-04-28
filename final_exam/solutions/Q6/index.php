<?php

require_once 'common.php';

?>
<html>
<body>

<!--

   Database table 'user' contains 2 test accounts:

   username: 'donald'
   password (plain text): 'donald123' (hashed version of this is stored in user table)
   employeeType: 'management'

   username: 'hillary'
   password (plain text): 'hillary456' (hashed version of this is stored in user table)
   employeeType: 'normal'

-->

<form action='login.php' method='POST'>

    Username: <input type='text' name='username'><br>
    Password: <input type='password' name='password'><br>
    <input type='submit' value='Login'>

    <?php
        printErrors();
    ?>

</form>

</body>
</html>