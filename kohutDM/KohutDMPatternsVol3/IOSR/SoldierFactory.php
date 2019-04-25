<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;


class SoldierFactory
{
    public function createSoldier()
    {
        return new Soldier();
    }
}