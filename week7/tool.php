<html>

<body>

  <h2> Textfield form </h2> <br />
  <form action='tool.php' method='POST'>
    Text field:
    <input type="text" name="input" />
    <input type='submit' value='Submit' name='tf' />
  </form>

  <?php
  if (isset($_POST["tf"])) {
    //echo "You have inserted: \"". $_POST["input"] ."\"";
    echo "<p style=\"color:red\">You have inserted: \"" . $_POST["input"] . "\"" . "</p>";
  }
  ?>
  <hr>


  <h2> Password field form </h2> <br />
  <form action='tool.php' method='POST'>
    Password field:
    <input type="password" name="input_pwf" />
    <input type='submit' value='Submit' name='pwf' />
  </form>

  <?php
  if (isset($_POST["pwf"])) {
    //echo "You have inserted: \"". $_POST["input_pwf"] ."\"";
    echo "<p style=\"color:red\">You have inserted: \"" . $_POST["input_pwf"] . "\"" . "</p>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Checkbox </h2> <br />
  <form action='tool.php' method='POST'>
    Checkbox:
    <input name="color[]" type="checkbox" value="Red" checked id="id_red" />
    <label for="id_red">Red</label>
    <input name="color[]" type="checkbox" value="Green" checked id="id_green" />
    <label for="id_green">Green</label>
    <input name="color[]" type="checkbox" value="Blue" id="id_blue" />
    <label for="id_blue">Blue</label>
    <input type='submit' value='Submit' name='cb' />
  </form>

  <?php
  if (isset($_POST["cb"])) {
    $list = $_POST["color"];
    echo "<p style=\"color:red\">You have inserted: \"";;
    foreach ($list as $item) {
      echo $item . " ";
    }
    echo "\"" . "</p>";
  }
  ?>
  <hr>



  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Checkbox -but keep the checked items after submiting </h2> <br />

  <?php
  $list_items = ["Red" => "", "Green" => "", "Blue" => ""];
  if (isset($_POST["cb2"])) {
    $list = $_POST["color"];
    if (count($list) > 0) {
      foreach ($list as $item) {
        $list_items[$item] = "checked ";
      }
    }
  }

  echo "<form action='tool.php' method='POST'>
       Checkbox: 
      <input name=\"color[]\" type=\"checkbox\" value=\"Red\" " . $list_items["Red"] . " id=\"id_red\"/>" .
    "<label for=\"id_red\">Red</label>
      <input name=\"color[]\" type=\"checkbox\" value=\"Green\" " . $list_items["Green"] . " id=\"id_green\"/>
      <label for=\"id_green\">Green</label>
      <input name=\"color[]\" type=\"checkbox\" value=\"Blue\" " . $list_items["Blue"] . " id=\"id_blue\"/>
      <label for=\"id_blue\">Blue</label>
      <input type='submit' value='Submit' name = 'cb2' /> 
    </form>";


  if (isset($_POST["cb2"])) {
    echo "<p style=\"color:red\">You have selected: \"";;
    foreach ($list as $item) {
      echo $item . " ";
    }

    echo "\"" . "</p>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Radio button </h2> <br />
  <form action='tool.php' method='POST'>
    Password field:
    <input name="color_r" type="radio" value="Red" checked id="id_red" />
    <label for="id_red">Red</label>
    <input name="color_r" type="radio" value="Green" id="id_green" />
    <label for="id_green">Green</label>
    <input name="color_r" type="radio" value="Blue" id="id_blue" />
    <label for="id_blue">Blue</label>
    <input type='submit' value='Submit' name='rb' />
  </form>

  <?php
  if (isset($_POST["rb"])) {
    $list = $_POST["color_r"];
    echo "<p style=\"color:red\">You have selected: \"";;
    echo $list;

    echo "\"" . "</p>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Text area </h2> <br />
  <form action='tool.php' method='POST'>
    Comment:
    <textarea name="comment" rows="10" cols="50">
        No comments!
      </textarea>
    <input type='submit' value='Submit' name='ta' />
  </form>

  <?php
  if (isset($_POST["ta"])) {
    $list = $_POST["comment"];
    echo "<p style=\"color:red\">You have inserted: \"";;
    echo $list;

    echo "\"" . "</p>";
  }
  ?>
  <hr>



  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Dropdown list </h2> <br />
  <form action='tool.php' method='POST'>
    Select a color
    <select name="color">
      <option value="Red" selected>Red</option>
      <option value="Green">Green</option>
      <option value="Blue">Blue</option>
    </select>
    <input type='submit' value='Submit' name='dl' />
  </form>

  <?php
  if (isset($_POST["dl"])) {
    $cl = $_POST["color"];
    echo "<p style=\"color:red\">You have selected: \"";;
    echo $cl;

    echo "\"" . "</p>";
  }
  ?>
  <hr>


  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->
  <!--------------------------------------------------------------------->

  <h2> Dropdown list - multiple choices </h2> <br />
  <form action='tool.php' method='POST'>
    Select a color
    <select name="color2[]" SIZE="3" MULTIPLE>
      <option value="Red" selected>Red</option>
      <option value="Green">Green</option>
      <option value="Blue">Blue</option>
    </select>
    <input type='submit' value='Submit' name='dl2' />
  </form>

  <?php
  if (isset($_POST["dl2"])) {
    $list = $_POST["color2"];
    echo "<p style=\"color:red\">You have selected: \"";;
    foreach ($list as $cl) {
      echo $cl . " ";
    }
    echo "\"" . "</p>";
  }
  ?>
  <hr>


</html>
</body>