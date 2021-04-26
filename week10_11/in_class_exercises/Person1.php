<?php
class Person {
  // Properties
  private $name;
  private $age;
  private $gender;
  private $rating; // IS or CS
  private $id;

  // Methods

  function __construct($id,$name,$age,$gender,$rating) {
    $this->id = $id;
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
    $this->rating = $rating;

  }
   
  function set_id($id) {
    $this->id = $id;
  }  
  function get_id() {
    return $this->id;
  }

  function set_name($name) {
    $this->name = $name;
  }  
  function get_name() {
    return $this->name;
  }
  function set_age($age){
    $this->age = $age;
  }
  function get_age(){
    return $this->age;
  }
  function set_gender($gender){
    $this->gender = $gender;
  }
  function get_gender(){
    return $this->gender;
  }
  function set_rating($rating){
    $this->rating = $rating;
  }
  function get_rating(){
    return $this->rating;
  }
  function isChosen($gender_type,$range_age,$range_rating){      
    if($gender_type != "All" && $gender_type!= $this->gender){ return False;}
    if($this->age < $range_age[0] || $this->age > $range_age[1]){return False;}
    if($this->rating < $range_rating[0] || $this->rating > $range_rating[1]){return False;}
    return True;
}
}
?>