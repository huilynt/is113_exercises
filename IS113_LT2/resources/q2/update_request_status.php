<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<?php

require_once 'common.php';   // DO NOT MODIFY THIS LINE

if( isset($_GET['id']) ) {   // DO NOT MODIFY THIS LINE
    
    $id = $_GET['id'];       // DO NOT MODIFY THIS LINE


    // Update the corresponding request in requests database table
    // Your code goes here

    session_start();
    $request_dao = new RequestDAO();
    $request_dao->updateStatus($id, 'accepted');


    // Update the corresponding aircon in aircons database table
    // Your code goes here
    
    $_SESSION['all_requests'] = $request_dao->getAll();



    // Forward the user back to manager_view.php
    // Your code goes here
    header ("Location: manager_view.php");
    exit;
}

?>