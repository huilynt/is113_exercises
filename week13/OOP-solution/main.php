<?php
    spl_autoload_register(function ($class){
        require_once "$class" . ".php";
    });
    $studyDAO = new studyDAO();
    
    echo "<h2>Courses</h2>";
    echo "<table border = '1'>
    <tr> <th>Course ID</th> <th>Name</th>  <th>Track</th> <th>List of Sections </th>  </tr>";
    foreach($studyDAO->getListCourse() as $course){
        echo "<tr> <td>{$course->getID()}</td> <td>{$course->getName()}</td> <td>{$course->getTrack()}</td><td>";
        foreach($course->getSectionList() as $section){
            echo "{$section->getID()}<br> ";
        }       
        echo "</td></tr>";
    }
    echo "</table>";


    echo "<h2>Sections</h2>";
    echo "<table border = '1'>
    <tr> <th>Section ID</th> <th>Time</th>  <th>Location</th> <th>Course ID </th> <th>List of Students </th> </tr>";
    foreach($studyDAO->getListSections() as $section){
        echo "<tr> <td>{$section->getID()}</td> <td>{$section->getTime()}</td> <td>{$section->getLocation()}</td>  <td>{$section->getCourseID()}</td> <td>";
        foreach($section->getListStudent() as $student){
            echo "{$student->getID()}<br> ";
        }       
        echo "</td></tr>";
    }
    echo "</table>";


    echo "<h2>Student</h2>";
    echo "<table border = '1'>
    <tr> <th>Student ID</th> <th>Name</th>  <th>Email</th> <th>Section List </th> <th> Course Names </th> <th>Time </th> <th>Location</th> </tr>";
    foreach($studyDAO->getListStudents() as $student){
        echo "<tr> <td>{$student->getID()}</td> <td>{$student->getName()}</td> <td>{$student->getEmail()}</td>  
         <td>";
        foreach($student->getListSection() as $section){
            echo "{$section->getID()}<br> ";
        }       
        echo "<td>";
        foreach($student->getListSection() as $section){
            $sourseID = $section->getCourseID();
            $course = $studyDAO->getCourse($sourseID);
            echo "{$course->getName()}<br> ";
        }              
        echo "</td>";

        echo "<td>";
        foreach($student->getListSection() as $section){
            echo "{$section->getTime()}<br> ";
        }              
        echo "</td>";

        echo "<td>";
        foreach($student->getListSection() as $section){
            echo "{$section->getLocation()}<br> ";
        }              
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";


 
?>