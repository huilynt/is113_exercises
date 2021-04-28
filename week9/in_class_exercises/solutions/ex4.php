

<html>
<body>
    <!----list of objects-->
<?php
class Fruit {
  // Properties
  const MESSAGE  = "We are selling ";
  public $name;
  public $color;

  // Methods

  function __construct($name, $color) {
    $this->name = $name;
	$this->color = $color;
    //echo "I am calling construct function .... <br/>";
  }
   
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$fruit = new Fruit("Apple","Red");

$list_fruits = [];
$list_names  = ["Apple", "Orange" ,"Strawberry" ,"Water Mellon"];
$list_color = ["Red", "Orange" ,"Red" ,"Blue"];

for($i=0; $i<= 3; $i++){
    $list_fruits[] = new Fruit($list_names[$i],$list_color[$i]);
}

var_dump($list_fruits);

?>
</html>
</body>