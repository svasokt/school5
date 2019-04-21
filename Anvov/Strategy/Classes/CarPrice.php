<?php
/**
 * Strategy
 *
 * @category school5
 * @package Strategy
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Strategy/Api/CarStrategy.php";


class CarPrice implements CarStrategy
{
    /**
     * min Price for car;
     */
    const MAX_PRICE = 20000;

    public function chooseCar($carPool)
    {
        foreach ($carPool as $key => $value) {
            if ($value->getPrice() > self::MAX_PRICE) {
                echo $value->getPrice() . "</br>";
            }
        }
    }
}