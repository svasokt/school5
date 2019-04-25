<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Adapter;

class FrenchSoldierAdapter implements EnglishCommandsInterface
{
    private $frenchSoldier;

    public function __construct(FrenchSoldier $frenchSoldier)
    {
        $this->frenchSoldier = $frenchSoldier;
    }

    public function attack()
    {
       return $this->frenchSoldier->attaque();
    }

    public function defence()
    {
       return $this->frenchSoldier->laDefense();
    }
}