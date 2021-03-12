<html>
<body>
    <!----construct-->
<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods

  function __construct($name) {
    $this->name = $name;
    echo "I am calling the constructor function .... <br/>";
  }
   
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$fruit = new Fruit("Apple");
//$fruit->set_name("Apple");
echo $fruit->get_name();

?>
</html>
</body>