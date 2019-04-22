<?php


class Room
{
    public $TV;
    public $phone;
    public $sofa;
    public $tablel;

    public function __construct($TV, $phone, $sofa, $table)
    {
        $this->TV = $TV;
        $this->phone = $phone;
        $this->sofa = $sofa;
        $this->tablel = $table;
    }

    public function getRoom()
    {
        return $this->TV . ',' . $this->phone . ',' . $this->sofa . ',' . $this->tablel;
    }
}