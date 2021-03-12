<?php
class Section
    {
        public $num_students;
        public $name;
        public $times;
        public $locations;
        public $list_students;

        function __construct($num_students, $name, $times, $locations)
        {
            $this->num_students = $num_students;
            $this->name = $name;
            $this->times = $times;
            $this->locations = $locations;
        }

        function add_student($person)
        {
            $this->list_students[] = $person;
        }

        function get_list_student()
        {
            return $this->list_students;
        }
    }
?>