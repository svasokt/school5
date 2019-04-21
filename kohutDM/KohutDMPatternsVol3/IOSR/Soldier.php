<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;


class Soldier
{
    private $id;
    private $name;
    private $rank;

    public function setId($id)
    {
        $this->id = $id;
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return true;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRank(string $value)
    {
        $this->rank = $value;
        return true;
    }

    public function getRank()
    {
        return $this->rank;
    }
}