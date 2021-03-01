<?php
/* 
    Name:  
    Email: 
*/

$messages = [
    "trump"   => "Make America Great Again",
    "clinton" => "More Women in Office",
    "kim"     => "Nukes Fly High and Far",
    "moon"    => "One Korea One People"
];

?>
<!DOCTYPE html>
<html>
<body>
    <table border='1'>
        <tr>
            <td>Photo</td>
            <td>Message</td>
        </tr>
        <?php
            if (isset($_POST['people'])) {
                $people = $_POST['people'];
                foreach ($people as $person) {
                    echo "<tr>
                        <td>
                            <img src='./$person.jpg'>
                        </td>
                        <td>
                            $messages[$person]
                        </td>
                    </tr>";
                }
            }
        ?>
    </table>    
</body>
</html>