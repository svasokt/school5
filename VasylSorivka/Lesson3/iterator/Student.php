<?php


class Student
{
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getStudentName()
    {
        return $this->name;
    }
}