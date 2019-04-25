<?php
/**
 * Strategy
 *
 * @category school5
 * @package Strategy
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Strategy/Api/CarStrategy.php";

class Engine implements CarStrategy
{
    /**
     * min engine for car;
     */
    const MIN_ENGINE = 2;

    public function chooseCar($carPool)
    {
        foreach ($carPool as $key => $value) {
            if ($value->getEngine() > self::MIN_ENGINE) {
                echo "variant :" . $value->getEngine() . "</br>";
            }
        }
    }
}