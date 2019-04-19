<?php
/**
 * Composite
 *
 * @category school5
 * @package Composite
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Api/Unit.php";


 abstract class CompositeUnit implements Unit
{
     /**
      * @param Unit $unit
      * @return mixed
      */
     abstract function AddUnit(Unit $unit);

     /**
      * @param Unit $unit
      * @return mixed
      */
     abstract function RemoveUnit(Unit $unit);
     //створений для наслідування композитами
}