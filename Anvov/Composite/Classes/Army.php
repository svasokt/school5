<?php
/**
 * Composite
 *
 * @category school5
 * @package Composite
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Classes/CompositeUnit.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Api/Unit.php";


class Army extends CompositeUnit
{
    /**
     * @var array
     */
    private $units = [];

    /**
     * @var array
     */
    private $armies = [];

    /**
     * @param Unit $unit
     * @return mixed|void
     */
    public function AddUnit(Unit $unit)
    {
        if(in_array($unit, $this->units, true)){
            echo "object already added";
        }
        $this->units[] = $unit;
    }

    /**
     * @param Unit $unit
     * @return mixed|void
     */
    public function RemoveUnit(Unit $unit){
        if(in_array($unit, $this->units, true)){
            unset($unit, $this->units);
        }
    }

    /**
     * @param Unit $army
     */
    public function AddArmy(Unit $army){
        $this->armies[] = $army;
    }

    /**
     * @return int|mixed
     */
    public function bombardStrenghth()
    {
        $power = 0;
        foreach ($this->units as $unit){
            $power = $power + $unit->bombardStrenghth();
        }

        foreach ($this->armies as $army){
            $power = $power + $army->bombardStrenghth();
        }
        return $power;
    }
}