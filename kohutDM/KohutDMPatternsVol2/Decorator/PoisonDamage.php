<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Decorator;


class PoisonDamage extends AbstractDecorator implements WeaponInterface
{
    public function attack()
    {
        return $this->aditionalDamdge->attack() + 3;
    }

    public function description()
    {
        return "poison " . $this->aditionalDamdge->description();
    }
}