<?php
class Fruit {
  // Properties
  private $name;
  private $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$fruit = new Fruit();
$fruit->set_name("Apple");
echo $fruit->name;
