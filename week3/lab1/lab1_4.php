<?php
    $a = 11;
    $b = 21;
    $c = 31;
    $d = 41;
    echo "before rotation: a = $a, b = $b, c = $c, d = $d <br/>";
    
    # Write code here
    $var_array = array($a, $b, $c, $d);
    function swap($var) {
        $var = (string) $var;
        $var = $var[1] . $var[0];
        return (int)$var;
    }
    foreach($var_array as $var) {
        $var = swap($var);
    }

    for($i = 0; $i < count($var_array) -1; $i++) {
        echo $i . " " . $var_array[$i] . " " . $var_array[$i+1] .  "<br />";
        $var_array[$i] = $var_array[$i] + $var_array[$i+1];
        $var_array[$i+1] = $var_array[$i] - $var_array[$i+1];
        $var_array[$i] = $var_array[$i] - $var_array[$i+1];
        echo $i . "<br>";
    }

    echo $var_array[1];
   
    # End of code
    
    echo "after rotation: a = $a, b = $b, c = $c, d = $d";   
?>  
