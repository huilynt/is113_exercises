<?php
class Section {
    // Properties
    public $number_of_students;
    public $name;
    public $time; 
    public $location;
    public $student_list;
   
    // Methods
  
    function __construct($name,$n_stus,$time,$location) {
      $this->name = $name;
      $this->number_of_students = $n_stus;
      $this->time = $time;
      $this->location = $location;
    }    
    function add_student($person){
        $this->student_list[] = $person;
    }
    function get_student_list(){
        return $this->student_list;
    }
  }
  ?>