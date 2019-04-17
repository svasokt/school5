<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Decorator;


abstract class AbstractDecorator implements WeaponInterface
{
    /**
     * @var WeaponInterface
     */
    protected $aditionalDamdge;

    public function __construct(WeaponInterface $weapon)
    {
        $this->aditionalDamdge = $weapon;
    }
}