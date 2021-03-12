
<?php
class Student {
  // Properties
  public $name;
  public $year;
  public $track; // IS or CS
  public $list_of_courses;


  // Methods

  function __construct($name,$year,$track) {
    $this->name = $name;
    $this->year = $year;
    $this->track = $track;
  }
   
  function set_name($name) {
    $this->name = $name;
  }
  function set_course($list) {
    $ls = explode(" ",$list);  
    $this->list_of_courses = $ls;
  }
  function get_name() {
    return $this->name;
  }
}
?>