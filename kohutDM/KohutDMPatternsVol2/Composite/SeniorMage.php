<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Composite;


class SeniorMage implements GetRandMana
{
    /**
     * @var array
     */
    private $magesStack = [];

    /**
     * @return int
     */
    public function getRandMana()
    {
        $manaValue = 0;

        foreach ($this->magesStack as $mage){
            $manaValue += $mage->getRandMana();
        }

        $manaValue += rand (2,3);

        return $manaValue;
    }

    /**
     * Add mage to the stack
     * @param GetRandMana $mage
     * @return $this
     * Use fluent interface pattern
     */
    public function addMage (GetRandMana $mage)
    {
        $this->magesStack[] = $mage;
        return $this;
    }
}