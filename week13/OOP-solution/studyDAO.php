<?php

spl_autoload_register(function ($class){
    require_once "$class" . ".php";
});

class StudyDAO {
    // Properties
    private $list_students;
    private $list_sections;
    private $list_courses;  

    function __construct(){
        $course113 = new Course("IS113", "Web Application Development","IS",[]); 
        $this->addCourse($course113);
        $course101 = new Course("CS101", "Programming fundamental","CS",[]); 
        $this->addCourse($course101);

        $section113G1 = new Section("IS113-G1", "Monday 1.30pm", "SoL SR 2.3", "IS113",[]);
        $this->addSection($section113G1);
        $section113G2 = new Section("IS113-G2", "Monday 3.30pm", "SCIS SR 1.3", "IS113",[]);
        $this->addSection($section113G2);
        $section113G3 = new Section("IS113-G3", "Tuesday 1.30pm", "SoL SR 2.3", "IS113",[]);
        $this->addSection($section113G3);
        $section113G4 = new Section("IS113-G4", "Friday 10.30am", "SoE 3.3", "IS113",[]);
        $this->addSection($section113G4);

        $section101G1 = new Section("CS101-G1", "Friday 5.30am", "SoE 3.3", "CS101",[]);
        $this->addSection($section101G1);
        $section101G2 = new Section("CS101-G2", "Wednesday 10.30am", "SoE 2.3", "CS101",[]);
        $this->addSection($section101G2);


        // Update list of sections of each course
        $course113->addSection($section113G1);
        $course113->addSection($section113G2);
        $course113->addSection($section113G3);
        $course113->addSection($section113G4);
        $course101->addSection($section101G1);
        $course101->addSection($section101G1);

        $stu1 = new Student("STU1","Donald Trump","trump@smu.edu.sg",[$section113G1,$section101G1]);
        $stu2 = new Student("STD2","Michel Jackson","Jackson@smu.edu.sg",[$section113G1,$section101G1]);
        $stu3 = new Student("STD3","Madonna","mdn@smu.edu.sg",[$section113G2,$section101G1]);
        $stu4 = new Student("STD4","The Rock","Rock@smu.edu.sg",[$section113G3,$section101G2]);
        $stu5 = new Student("STD5","Harry Potter","Harry@smu.edu.sg",[$section113G4,$section101G2]);
        $stu6 = new Student("STD6","Captain Marvel","captain@smu.edu.sg",[$section113G4,$section101G2]);


        $this->addStudent($stu1);
        $this->addStudent($stu2);
        $this->addStudent($stu3);
        $this->addStudent($stu4);
        $this->addStudent($stu5);
        $this->addStudent($stu6);
    }
    // Methods
 

    function getListStudents(){
        return $this->list_students;
    }
    function getListSections(){
        return $this->list_sections;
    }
    function getListCourse(){
        return $this->list_courses;
    }

    function getStudent($studentID){
        foreach($this->list_students as $stu){
            if($stu->getID() == $studentID){break;}
        }
        return $stu;
    }

    function getCourse($courseID){
        foreach($this->list_courses as $co){
            if($co->getID() == $courseID){break;}
        }
        return $co;
    }
    function getSection($sectionID){
        foreach($this->list_sections as $sec){
            if($sec->getID() == $sectionID){break;}
        }
        return $sec;
    }

    function addStudent($student){
        foreach($student->getListSection() as $sec){
            $sec->addStudent($student);
        }
        $this->list_students[] = $student;
    }

    function addSection($section){
        $this->list_sections[] = $section;
    }

    function addCourse($course){
        $this->list_courses[] = $course;
    }
    
}  
?>