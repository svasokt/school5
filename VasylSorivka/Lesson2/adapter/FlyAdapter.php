<?php


class FlyAdapter implements TransportInterface
{
    public $fly;

    public function __construct(Fly $fly) {
        $this->fly = $fly;
    }

    public function ride()
    {
        return $this->fly->fly();
    }
}