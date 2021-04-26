<?php

class Course {
    // Properties
    private $courseID;
    private $name;
    private $track;
    private $list_of_sections; 
  
    // Methods
  
    function __construct($id,$name,$track,$sectionlist) {
      $this->courseID = $id;
      $this->name = $name;
      $this->track = $track;
      $this->list_of_section = $sectionlist;  
    }

    function getID(){
        return $this->courseID;
    }
    function getName(){
        return $this->name;
    }
    function getTrack(){
        return $this->track;
    }
    function getSectionList(){
        return $this->list_of_sections;
    }
    function addSection($section){
        $this->list_of_sections[] = $section; 
    }

}  
?>


