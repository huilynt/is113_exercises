<?php
spl_autoload_register(function($class) {
    require_once "$class.php";
});

$connMgr = new ConnectionManager();
$conn = $connMgr->connect();

$sql = "UPDATE student 
        SET 
            name = :name
        WHERE
            id = :id";

$name = 'DIYANAH';
$id = 11;

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$isAddOK = $stmt->execute();