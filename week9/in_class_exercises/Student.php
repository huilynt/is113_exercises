<?php
    class Student
    {
        // Properties
        public $name;
        public $year;
        public $track;
        public $list_of_courses;

        // Methods
        function __construct($name, $year, $track)
        {
            $this->name = $name;
            $this->year = $year;
            $this->track = $track;
        }

        function set_name($name)
        {
            $this->name = $name;
        }
        function get_name()
        {
            return $this->name;
        }

        function set_courses($courses)
        {
            $ls = explode(",", $courses);
            $this->list_of_courses = $ls;
        }

        function get_courses()
        {
            return $this->list_of_courses;
        }
    }
