<?php
    $a = 11;
    $b = 21;
    $c = 31;
    $d = 41;
    echo "before rotation: a = $a, b = $b, c = $c, d = $d <br/>";
    
    # Write code here
    $var_array = array($a, $b, $c, $d);
    for ($i=count($var_array)-1; $i > 0; $i--) { 
        $temp = $var_array[$i];
        $var_array[$i] = $var_array[$i - 1];
        $var_array[$i - 1] = $temp;
    }
    $a = $var_array[0];
    $b = $var_array[1];
    $c = $var_array[2];
    $d = $var_array[3];
    # End of code
    
    echo "after rotation: a = $a, b = $b, c = $c, d = $d";   
?>  
