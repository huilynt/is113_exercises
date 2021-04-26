<?php

/*
    Name:

    Email:
*/

############  DO NOT CHANGE THIS CODE ################
spl_autoload_register(
    function($class){
        require_once "classes/$class.php";
    }
);

$dao = new LectureDAO();
if (isset($_POST['operation'])){
    echo "<img src='images/sis.png'>";
    $operation = $_POST['operation'];
    if ($operation === 'Show Sample Schedule'){
        echo "  <br/>
                <h1>Sample Schedule</h1>";
        $room_allocation =  [
            "Room-1" => [new Lecture("L10",9,1), new Lecture("L9",11,3), new Lecture("L8",14,3)],
            "Room-2" => [new Lecture("L6",13,1), new Lecture("L7",9,3), new Lecture("L5",15,1)],
            "Room-3" => [new Lecture("L2",11,1),  new Lecture("L1",9,1), new Lecture("L3",13,1), new Lecture("L4",15,1)],
        ];
        $sample_schedule = new Schedule($room_allocation);
        display_schedule($sample_schedule);
    }
    elseif ($operation === 'Show Schedule for a Date'){
        $date = $_POST['date'];
        $lectures = $dao->getLectures($date);
        if($lectures == null){
            echo "  <br/>
                    <h1>No schedule for $date</h1>";
        }
        else{
            echo "  <br/>
                    <h1>Schedule for $date</h1>";
            $schedule = create_schedule($lectures);
            display_schedule($schedule);
        }
    }
}
#########################################################
    
# Part A (Display the schedule): ENTER CODE HERE == 
function display_schedule($schedule){
    echo "<table border='1'>";
    echo "</table>";
}
# ====

# (B) Put lectures into a schedule (4 marks)
function create_schedule($lectures){
    $room_allocation = []; # Creates an empty room allocation
    uasort($lectures,'cmp'); # Sort lectures based on their start time

    foreach($lectures as $lecture){

        # Find an available room in the room allocation so far for $lecture
        $room_name = find_available($room_allocation,$lecture);
        // var_dump($room_name,$room_allocation,$lecture);
        # If no such room exists
        if($room_name == NULL){
            # Open a new room
            # Arrange for the $lecture to be held in the new room
            $room_allocation['Room-'.(count($room_allocation)+1)] = [$lecture];
        }
        else{
            # Arrange for the $lecture to be held in $room_name
            # that has been allocated before
            $room_allocation[$room_name][] = $lecture;
        }
    }
    return new Schedule($room_allocation);
}

# Helper function for uasort
# $a = Lecture object
# $b = Lecture object
# returns -1, if the start time of $a is less than that of $b
#          1, otherwise
function cmp($a,$b){
    return ($a->getStartTime() < $b->getStartTime()) ? -1: 1;
}

# Find an available room for $lecture among those 
# that appear in $room_allocation
function find_available ($room_allocation,$lecture){
    foreach($room_allocation as $room_name => $booked_slots){
        $available = true;
        foreach($booked_slots as $booked_slot){
            if($lecture->getStartTime() < ($booked_slot->getStartTime() + $booked_slot->getDuration())){
                $available = false;
                break;
            }
        }
        if($available){
            return $room_name;
        }
    }
}
# ====
?>