<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;


class HeroStrategy
{
    public function hero(Soldier $soldier)
    {
        switch ($soldier){
            case ($soldier->getName() == 'sir John' && $soldier->getRank() == 'general'):
                return 'hero';
            default:
                return 'average man';
        }
    }
}