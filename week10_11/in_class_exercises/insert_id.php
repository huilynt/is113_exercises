<?php
spl_autoload_register(function($class) {
    require_once "$class.php";
});

$connMgr = new ConnectionManager();
$conn = $connMgr->connect();

$sql = "INSERT INTO student 
                    (
                        name,
                        age,
                        gender,
                        rating
                    )
                    VALUES
                    (
                        :name,
                        :age,
                        :gender,
                        :rating
                    )";

$name = "Diyanah";
$age = 21;
$gender = "Female";
$rating = "10.00";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':age', $age, PDO::PARAM_INT);
$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
$stmt->bindParam(':rating', $rating, PDO::PARAM_STR);

$isAddOK = $stmt->execute();