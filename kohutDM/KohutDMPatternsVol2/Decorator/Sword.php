<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Decorator;


class Sword implements WeaponInterface
{
    public function attack()
    {
        return 5;
    }

    public function description()
    {
        return "Sword";
    }
}