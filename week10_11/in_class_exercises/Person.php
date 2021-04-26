<?php
class Person
{
    private $id;
    private $name;
    private $age;
    private $gender;
    private $rating_score;

    public function __construct($id, $name, $age, $gender, $rating_score)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->rating_score = $rating_score;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getRatingScore()
    {
        return $this->rating_score;
    }

    public function setRatingScore($rating_score)
    {
        $this->rating_score = $rating_score;
    }

    function isChosen($gender_type, $range_age, $range_rating)
    {
        if ($gender_type != "All" && $gender_type != $this->gender) {
            return False;
        }
        if ($this->age < $range_age[0] || $this->age > $range_age[1]) {
            return False;
        }
        if ($this->rating < $range_rating[0] || $this->rating > $range_rating[1]) {
            return False;
        }
        return True;
    }
}
