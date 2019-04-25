<?php


class DescriptionRoom
{
    private $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getDescriptionRoom()
    {
        return $this->room->getRoom();
    }
}