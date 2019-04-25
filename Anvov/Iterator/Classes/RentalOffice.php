<?php
/**
 * Iterator
 *
 * @category school5
 * @package Iterator
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/Car.php";

use Anvov\Iterator\Classes\Car;


class RentalOffice implements \Countable, \Iterator
{

    /**
     * @var Car[]
     */
    private $freeCars = [];

    /**
     * @var int
     */
    private $currentIndex = 0;

    public function addCar(Car $car)
    {
        $this->freeCars[] = $car;
    }

    public function removeCar(Car $carToRemove)
    {
        foreach ($this->freeCars as $key => $car) {
            if ($car->getPrice() === $carToRemove->getPrice()) {
                unset($this->freeCars[$key]);
            }
        }
    }

    public function current()
    {
        return $this->freeCars[$this->currentIndex];
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function valid()
    {
        return isset($this->freeCars[$this->currentIndex]);
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function count()
    {
        return count($this->freeCars);
    }
}