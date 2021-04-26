<?php
spl_autoload_register(function ($class) {
    require_once "$class.php";
});

$connMgr = new ConnectionManager();
$conn = $connMgr->connect();

$sql = "SELECT id, name, age, gender, rating
        FROM student
        ORDER BY name ASC";
$stmt = $conn->prepare($sql);

$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$list_pp = [];
while ($row = $stmt->fetch()) {
    $list_pp[] = new Person(
        // $row['id'],
        $row['name'],
        $row['age'],
        $row['gender'],
        $row['rating']
    );
}

$index = 1;
echo "<table border='1'>
    <tr>
        <th>Index</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Rating</th>
    </tr>";

foreach ($list_pp as $person) {
    $name = $person->getName();
    $age = $person->getAge();
    $gender = $person->getGender();
    $rating = $person->getRatingScore();

    echo "<tr><td>$index</td>
    <td>$name</td>
    <td>$age</td>
    <td>$gender</td>
    <td>$rating</td></tr>";
    $index++;
}
echo "</table>";
