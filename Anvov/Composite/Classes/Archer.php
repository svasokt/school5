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


class Archer implements Unit
{
    /**
     * @return int|mixed
     */
    public function bombardStrenghth()
    {
        return 4;
    }
}