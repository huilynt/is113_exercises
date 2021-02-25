<?php
/* 
    Name:  
    Email: 
*/

// $students is an Array of:
//    Associative Arrays, where each Associative Array contains:
//        key (name) => value (string)
//        key (courses) => value (Array of Arrays)
$students = [
    [
        "name"    => 'Jong Un Kim',
        "courses" => [
            ['IS111', 'Intro Programming', 'MON', '1000', 1],
            ['CS102', 'Discrete Mathematics', 'TUE', '0830', 2],
            ['EE200', 'Intro to Circuits', 'TUE', '1330', 1],
            ['WRIT100', 'Writing and Reasoning', 'WED', '1000', 1],
            ['LIT380', 'Intro to Korean Literature', 'FRI', '1630', 1]
        ]
    ],
    [
        "name"    => 'Donald Trump',
        "courses" => [
            ['IS112', 'Data Management', 'TUE', '0830', 2],
            ['WRIT100', 'Writing and Reasoning', 'WED', '1000', 1],
            ['OBHR101', 'Leadership Team Building', 'WED', '1200', 2],
            ['IS113', 'Web Application Development', 'THU', '1500', 2],
            ['STAT202', 'Bayesian Logics', 'FRI', '1000', 1]
        ]
    ],
    [
        "name"    => 'Hugo Chavez',
        "courses" => [
            ['IS111', 'Intro Programming', 'MON', '1000', 1],
            ['IS112', 'Data Management', 'TUE', '0830', 2],            
            ['EE200', 'Intro to Circuits', 'TUE', '1330', 1],
            ['OBHR101', 'Leadership Team Building', 'WED', '1200', 2],
            ['STAT202', 'Bayesian Logics', 'FRI', '1500', 1]
        ]
    ]
];

// INPUT  : $students Array
// OUTPUT : Return an Array of student names (String)
function getStudentNames($students) {
    $arr = [];
    // Part A
    // YOUR CODE GOES HERE
    foreach ($students as $student) {
        $name = $student['name'];
        array_push($arr, $name);
    }

    return $arr;
}

?>
<html>
<body>
    <form action='q3.php' method='POST'>
        Name:
        <select name='student_name'>
            <?php
                // Part A
                // YOUR CODE GOES HERE
                $student_names = getStudentNames($students); // DO NOT MODIFY THIS LINE
                // YOUR CODE CONTINUES HERE
                foreach ($student_names as $name) {
                    echo "<option value='$name'>$name</option>";
                }
            ?>
        </select>
        <input type='submit' value='Show Timetable' />
    </form>
    <?php

        function get_course_by_name($students, $name) {
            foreach ($students as $student) {
                if ($student['name'] == $name) {
                    return $student['courses'];
                }
            }
        }

        function get_course_by_slot($day, $time, $courses) {
            foreach ($courses as $course) {                                
                if ($day == $course[2] && $time == $course[3]) {
                    return $course;
                }
            }
            return null;
        }
        if (isset($_POST['student_name'])) {
            
            $name = $_POST['student_name'];

            $courses = get_course_by_name($students, $name);

            var_dump($courses);  

            $days = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
            $slots = ['0830', '1000', '1200', '1330', '1500', '1630'];

            echo "<table border='1'>";
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td>08:30am - 10:00am</td>";
                    echo "<td>10:00am - 11:30am</td>";
                    echo "<td>12:00nn - 1:30pm</td>";
                    echo "<td>1:30pm - 3:00pm</td>";
                    echo "<td>3:00pm - 4:30pm</td>";
                    echo "<td>4:30pm - 6:00pm</td>";
                echo "</tr>";
                foreach ($days as $day) {
                    echo "<tr>";
                        echo "<td>$day</td>";
                        $prev_colspan = 1;
                        foreach ($slots as $slot) {
                            $course = get_course_by_slot($day, $slot, $courses);
                            if ($course !== null) {
                                echo "<td colspan='$course[4]'>$course[0]<br>$course[1]</td>";
                                $prev_colspan = $course[4];
                            
                            } else {
                                if ($prev_colspan == 1) {
                                    echo "<td></td>";
                                }
                            }
                        }
                    echo "</tr>";
                }
                
            echo "</table>";
        }
    ?>
</body>
</html>