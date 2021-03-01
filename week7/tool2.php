<html>

<body>




  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Text to table </h2> <br />
  <form action='tool2.php' method='POST'>
    Enter a series of number:
    <input name="series" type="text" value="" />
    <input type='submit' value='Submit' name='tf' />
  </form>

  <?php
  if (isset($_POST["tf"])) {
    $list = explode(" ", $_POST["series"]);
    echo "<p style=\"color:red\">You have inserted: \"";;
    foreach ($list as $item) {
      echo $item . " ";
    }
    echo "\"" . "</p>";
    echo "table : <br/>";
    echo "<table border='1' style=\"color:red\" >";
    foreach ($list as $item) {
      echo "<td>" . $item . "</td> ";
    }
    echo "</table>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Create random matrix of size N x M </h2> <br />
  <form action='tool2.php' method='POST'>
    Comment:
    <input name="size" type="text" value="" />
    <input type='submit' value='Submit' name='ta' />
  </form>

  <?php
  if (isset($_POST["ta"])) {
    $str = $_POST["size"];
    $list = explode(" ", $str);
    $N = $list[0];
    $M = $list[1];
    $A = [];

    // Random matrix between 1 to 100
    for ($i = 0; $i < $N; $i++) {
      for ($j = 0; $j < $M; $j++) {
        $A[$i][$j] = rand(1, 100);
      }
    }

    // Echo a table

    echo "table : <br/>";
    echo "<table border='1' style=\"color:red\" >";

    for ($i = 0; $i < $N; $i++) {
      echo "<tr>";
      for ($j = 0; $j < $M; $j++) {
        echo "<td>" . $A[$i][$j] . "</td> ";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> For loop </h2> <br />
  <form action='tool2.php' method='POST'>
    Enter a two numbers, separated by space:
    <input name="two_number" type="text" value="" />
    <input type='submit' value='Submit' name='tf1' />
  </form>

  <?php
  if (isset($_POST["tf1"])) {
    $list = explode(" ", $_POST["two_number"]);
    $a = $list[0];
    $b = $list[1];

    echo "<p style=\"color:red\">Series between $a and $b : \"";
    for ($i = $a; $i <= $b; $i++) {
      echo $i . " ";
    }
    echo "\"" . "</p>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Do While </h2> <br />
  <form action='tool2.php' method='POST'>
    Enter two numbers, separated by space:
    <input name="two_number1" type="text" value="" />
    <input type='submit' value='Submit' name='tf2' />
  </form>

  <?php
  if (isset($_POST["tf2"])) {
    $list = explode(" ", $_POST["two_number1"]);
    $a = $list[0];
    $b = $list[1];

    echo "<p style=\"color:red\">Series between $a and $b : \"";

    $i = $a;
    do {
      echo $i . " ";
      $i++;
    } while ($i < $b + 1);
    echo "\"" . "</p>";
  }
  ?>
  <hr>



  <h2> While() ... </h2> <br />
  <form action='tool2.php' method='POST'>
    Enter two numbers, separated by space:
    <input name="two_number2" type="text" value="" />
    <input type='submit' value='Submit' name='tf3' />
  </form>

  <?php
  if (isset($_POST["tf3"])) {
    $list = explode(" ", $_POST["two_number2"]);
    $a = $list[0];
    $b = $list[1];

    echo "<p style=\"color:red\">Series between $a and $b : \"";

    $i = $a;
    while ($i <= $b) {
      echo $i . " ";
      $i++;
    }
    echo "\"" . "</p>";
  }
  ?>
  <hr>




  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Redirect </h2> <br />
  <form action='tool2.php' method='POST'>
    Select a website
    <select name="ad">
      <option value="Google" selected>Google</option>
      <option value="Facebook">Facebook</option>
      <option value="Amazon">Amazon</option>
    </select>
    <input type='submit' value='GO' name='go' />
  </form>

  <?php

  $links = [
    "Google" => "www.google.com",
    "Facebook" => "www.facebook.com",
    "Amazon" => "www.amazon.com"
  ];
  if (isset($_POST["go"])) {
    header("Location: https://" . $links[$_POST["ad"]]);
    exit;
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Array Delete - 1 </h2> <br />
  < <?php
    $fruits = array("Apple", "Durian", "Banana");
    var_dump($fruits);

    echo "<form action='tool2.php' method='POST'> 
          <input type='submit' value='Delete first item' name = 'dml' />
        </form>";
    if (isset($_POST["dml"])) {
      array_splice($fruits, 0, 1);
      var_dump($fruits);
    }

    ?> <hr>





    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <h2> Associate Array - Delete </h2> <br />
    < <?php
      $fruits = array("A" => "Apple", "D" => "Durian");
      var_dump($fruits);

      echo "<form action='tool2.php' method='POST'> 
          <input type='submit' value='Delete Durian' name = 'dml2' />
        </form>";
      if (isset($_POST["dml2"])) {
        unset($fruits["D"]);
        var_dump($fruits);
      }

      ?> <hr>




      <!--------------------------------------------------------------------->
      <!--------------------------------------------------------------------->
      <!--------------------------------------------------------------------->

      <h2> Associate Array - Delete 2 </h2> <br />
      < <?php
        $people = array("Peter" => 70, "John" => 40, "Kim" => 23, "Tom" => 90);
        var_dump($people);
        $names = [];
        foreach ($people as $key => $score) {
          $names[] = $key;
        }
        $selected_name  = "";

        if (isset($_POST["person"])) {
          $selected_name =  $_POST["person"];
        } else {
          $selected_name = $names[0];
        }


        echo "<form action='tool2.php' method='POST'>";
        echo "<select name=\"person\">";
        foreach ($names as $name) {
          $sl  = "";
          if ($name == $selected_name) {
            $sl = "selected";
          }
          echo "<option value=\"" . $name . "\" $sl>" . $name . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Delete' name = 'dml3' />
          </form>";
        if (isset($_POST["dml3"])) {
          echo  $_POST["person"];
          unset($people[$_POST["person"]]);
          var_dump($people);
        }

        ?> <hr>


</html>
</body>