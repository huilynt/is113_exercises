<?php

class Student {
    // Properties
    private $studentID;
    private $name;
    private $email;
    private $list_of_sections;
  
    // Methods
  
    function __construct($id,$name,$email,$list_of_sections) {
      $this->studentID = $id;
      $this->name = $name;
      $this->email = $email;
      $this->list_of_sections = $list_of_sections;  
    }

    function getID(){
        return $this->studentID;
    }
    function getName(){
        return $this->name;
    }
    function getEmail(){
        return $this->email;
    }
    function getListSection(){
        return $this->list_of_sections;
    }
    function addSection($section){
        $this->list_of_section = $section; 
    }

}  
?>