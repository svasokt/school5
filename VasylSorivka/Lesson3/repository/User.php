<?php

class User
{
    protected $id;
    protected $name;
    protected $city;

    public function __construct($id, $name, $city)
    {
        $this->id = $id;
        $this->name = $name;
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCity()
    {
        return $this->city;
    }
}
