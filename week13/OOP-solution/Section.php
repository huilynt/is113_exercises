<?php

class Section {
    // Properties
    private $sectionID;
    private $time;
    private $location;
    private $courseID;
    private $list_of_students;
  
    // Methods
  
    function __construct($id,$time,$location,$courseID,$list_of_students) {
      $this->sectionID = $id;
      $this->time = $time;
      $this->location = $location;
      $this->courseID = $courseID;
      $this->list_of_students = $list_of_students;  
    }

    function getID(){
        return $this->sectionID;
    }
    function getTime(){
        return $this->time;
    }
    function getLocation(){
        return $this->location;
    }
    function getCourseID(){
        return $this->courseID;
    }
    function getListStudent(){
        return $this->list_of_students;
    }
    function addStudent($student){
        $this->list_of_students[] = $student; 
    }

}  
?>