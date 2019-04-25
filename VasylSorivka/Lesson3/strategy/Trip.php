<?php

class Trip
{
    protected $trip;

    public function __construct(TripToKievInterface $trip) {
        $this->trip = $trip;
    }

    public function trip()
    {
        return $this->trip->trip();
    }
}
