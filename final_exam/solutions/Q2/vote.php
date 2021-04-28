<?php
    session_start();
?>
<html>
<body>

<?php

    if (!isset($_SESSION["errors"])) {
        echo "<h2>Vote Today!</h2>";
    }
    else{
        $error_count = count($_SESSION['errors']);
        echo "You have $error_count errors in your form. Please rectify them and submit again.";
        echo "<ol>";
        foreach($_SESSION['errors'] as $error){
            echo "<li>$error</li>";
        }
        echo "</ol>";
        unset($_SESSION["errors"]);
    }

    function printAge() {
        if(isset($_GET["age"])){
            echo "value={$_GET["age"]}";
        }
    }

    function printGender($gender){
        if(isset($_GET["gender"])){
            if ($_GET["gender"] === $gender) {
                echo "checked";
            }
        }
    }

    function printCandidate($candidate){
        if(isset($_GET["candidates"])){
            if (in_array($candidate,$_GET["candidates"])){
                echo "checked";
            }
        }
    }
?>

    <form method='GET' action='process_vote.php'>
        Your age: <input type='text' name='age' <?=printAge()?> ><br>

        Your gender: <input type='radio' name='gender' value='Female' <?=printGender('Female')?> >Female

        <input type='radio' name='gender' value='Male' <?=printGender('Male')?>>Male<br>
        
        District candidates (pick up to 2): <br>
        <input type='checkbox' name='candidates[]' value='Donald Trump' <?=printCandidate('Donald Trump')?>>Donald Trump<br>
        <input type='checkbox' name='candidates[]' value='Ted Cruz' <?=printCandidate('Ted Cruz')?>> Ted Cruz<br>
        <input type='checkbox' name='candidates[]' value='Jeb Bush' <?=printCandidate('Jeb Bush')?>>Jeb Bush<br>
        <input type='checkbox' name='candidates[]' value='Marco Rubio' <?=printCandidate('Marco Rubio')?>>Marco Rubio<br>
        
        <input type='submit' value='Vote Today'>
    </form>

</body>
</html>
