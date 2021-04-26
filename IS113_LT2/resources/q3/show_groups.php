<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<!DOCTYPE html>
<?php

require_once 'common.php';

function create_study_groups($students, $min_size, $max_size, $min_gpa)
{
    $study_groups = [];

    # Add code here
    # You are free to create helper functions
    $num_students = count($students);

    // impossible constraints - grp size
    $avg_stu_per_grp = ($min_size + $max_size) / 2;
    if ($num_students < $avg_stu_per_grp) {
        return null;
    }

    $num_grps_req = ceil($num_students / $max_size);

    // sort gpa
    uasort($students, 'cmp');


    // seperate by gpa
    $high_gpa = [];
    $low_gpa = [];
    foreach ($students as $student) {
        if ($student->getGPA() >= $min_gpa) {
            $high_gpa[] = $student;
        } else {
            $low_gpa[] = $student;
        }
    }


    // impossible constraint - gpa
    if (count($high_gpa) < $num_grps_req) {
        return null;
    }

    // create req grps
    for ($i = 0; $i < $num_grps_req; $i++) {
        $members = [$high_gpa[$i]];

        $new_grp = new StudyGroup($i, $members);
        $study_groups[] = $new_grp;
    }


    $leftovers_high = array_slice($high_gpa, $num_grps_req);
    $all_leftovers = array_merge($leftovers_high, $low_gpa);

    // foreach ($study_groups as $a_grp) {
    //     $new_mems = [];
    //     $cur_size = count($a_grp->getMembers());

    //     if (($max_size - $cur_size) > count($all_leftovers)) {
    //         $new_mems = $all_leftovers;
    //     } else {
    //         $new_mems = array_splice($all_leftovers, ($max_size - $cur_size));
    //     }
    //     $a_grp->addMembers($new_mems);
    // }

    return $study_groups;
}

function cmp($a, $b)
{
    return ($a->getGPA() < $b->getGPA()) ? -1 : 1;
}

### START OF DO NOT MODIFY ###

if (count($_GET) != 0) {
    $min_size = $_GET['min_size'];
    $max_size = $_GET['max_size'];
    $min_gpa = $_GET['min_gpa'];
    $studentDAO = new StudentDAO();
    $students = $studentDAO->getStudents();
    $groups = create_study_groups($students, $min_size, $max_size, $min_gpa);
    display($groups);
}

function display($groups)
{
    echo
    "
        <!DOCTYPE html>    
        <html>
            <body>
        ";
    display_groups($groups);
    echo
    "
            </body>
        </html>
        ";
}

function display_groups($groups)
{
    if ($groups === null) {
        echo "<h3>No assignment is possible</h3>";
    } else {
        echo "<table border='1'>";
        $row_count = 0;
        $opened = true;

        $row1 = "";
        $row2 = "";

        foreach ($groups as $group) {
            $row1 .= "<th>";
            $sids = "";
            foreach ($group->getMembers() as $member) {
                $sids .= "sids[]={$member->getId()}&";
            }
            $sids = substr($sids, 0, strlen($sids) - 1);

            $row1 .= "<a href='show_availability?$sids'>{$group->getId()}</a>";
            $row1 .= "</th>";

            $members = $group->getMembers();
            $row2 .= "<td>";
            for ($i = 0; $i < count($members); $i++) {
                $row2 .= "{$members[$i]->getName()}";
                if ($i != count($members) - 1) $row2 .= "<br/>";
            }
            $row2 .= "</td>";

            if ($row_count % 5 == 4) {
                echo "<tr>$row1</tr>";
                echo "<tr>$row2</tr>";
                $row1 = "";
                $row2 = "";
            }
            $row_count++;
        }

        if ($row1 != "") {
            echo "<tr>$row1</tr>";
            echo "<tr>$row2</tr>";
            $row1 = "";
            $row2 = "";
        }
        echo "</table>";
    }
}

### END OF DO NOT MODIFY ###
?>