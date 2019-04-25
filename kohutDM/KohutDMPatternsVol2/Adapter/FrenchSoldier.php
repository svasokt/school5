<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Adapter;

class FrenchSoldier implements FrenchCommandsInterface
{
    public function attaque()
    {
        return "Pour mon roi!";
    }

    public function laDefense()
    {
        return "La défense de votre roi!";
    }
}