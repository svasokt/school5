<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Decorator;


class FireDamage extends AbstractDecorator implements WeaponInterface
{
    public function attack()
    {
        return $this->aditionalDamdge->attack() + 4;
    }

    public function description()
    {
        return "fire " . $this->aditionalDamdge->description();
    }
}