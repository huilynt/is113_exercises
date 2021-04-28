<?php

class Person {
    private $fullname;
    private $gender;
    private $age;
    private $height;
    private $weight;
    private $image;
    const SPECIES = "Homo Sapiens";

    // constructor
    public function __construct($f, $g, $a, $h, $w, $i) {
        // YOUR CODE GOES HERE


    }

    //============== Attribute Getters & Setters ==============
    public function getFullname() {
        $this->fullname;
    }

    public function setFullname($f) {
        $fullname = $f;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($g) {
        $this->gender = $gender;
    }

    public function getAge() {
        return $this->$age;
    }

    public function setAge($a) {
        $this->age = 12;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($h) {
        $this->height = $h;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($w) {
        $this->weight = $w;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage() {
        $this->image = $i;
    }

    //===================== DO NOT MODIFY THE CODE BELOW THIS LINE ======================

    // Get all attribute names & values of a Person object AND returns an Associative Array
    // Key   : object's attribute name
    // Value : object's attribute value
    public function getAllAttributes() {
        $result = [
            "fullname"       => $this->fullname,
            "gender"         => $this->gender,
            "age"            => $this->age,
            "height"         => $this->height,
            "weight"         => $this->weight,
            "image"          => $this->image
        ];
        return $result;
    }

    // INPUT  : object's attribute name
    // OUTPUT : object's attribute value
    public function getAttributeValue($prop) {
        if( $prop == 'fullname' )
            return $this->fullname;
        elseif( $prop == 'gender' )
            return $this->gender;
        elseif( $prop == 'age' )
            return $this->age;
        elseif( $prop == 'height' )
            return $this->height;
        elseif( $prop == 'weight' )
            return $this->weight;
        elseif( $prop == 'image' )
            return $this->image;
        else
            return null;
    }
}

?>