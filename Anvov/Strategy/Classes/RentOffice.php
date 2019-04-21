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


class RentOffice
{
    /**
     * @var CarStrategy
     */
    private $strategy;

    /*
     * choose strategy
     */
    public function __construct(CarStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * send car pool to filter
     */
    public function chooseCar(array $carPool)
    {
        $this->strategy->chooseCar($carPool);
    }
}