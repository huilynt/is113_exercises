<?php
spl_autoload_register(function($class) {
    require_once "$class.php";
});

$connMgr = new ConnectionManager();
$conn = $connMgr->connect();

$sql = "DELETE FROM student WHERE id = :id";
$id = 1;
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();