<?php

// Write Car class definition
class Car
{
    public $year;
    public $make;
    public $model;
    public $rating;

    function __construct($year, $make, $model, $rating)
    {
        $this->year = $year;
        $this->make = $make;
        $this->model = $model;
        $this->rating = $rating;
    }

    function getYear()
    {
        return $this->year;
    }

    function getMake()
    {
        return $this->make;
    }

    function getModel()
    {
        return $this->model;
    }

    function getRating()
    {
        return $this->rating;
    }
}
