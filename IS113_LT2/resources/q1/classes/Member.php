<!--
    Name: Tay Hui Lin
    Email: huilin.tay.2020
-->
<?php
    
    ### Add code here
    class Member {
        private $name;

        public function __construct($name) {
            $this->name = $name;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
    }
?>