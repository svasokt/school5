<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Composite;

/**
 * LEAF Class JuniorMage
 */
class JuniorMage implements GetRandMana
{
    /**
     * @return int
     */
    public function getRandMana()
    {
        return rand (1,2);
    }
}