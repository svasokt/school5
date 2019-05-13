<?php
class World_Car_Block_Fiat extends Mage_Core_Block_Template
{
    protected $car = 'fiat';

    public function getCar()
    {
        return $this->car;
    }

    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }
}