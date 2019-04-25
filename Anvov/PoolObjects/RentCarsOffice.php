<?php
/**
 * Pool objects
 *
 * @category school5
 * @package Pool objects
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class RentCarsOffice
{
    /**
     * @var array
     */
    private $free_cars = [];

    /**
     * @var array
     */
    private $in_use_cars = [];

    /**
     * @return Car|mixed
     */
    public function getCar()
    {

        if(count($this->free_cars) == 0)
        {
            $car = new Car;
        }else{
            $car = array_shift($this->free_cars);
        }
        $this->in_use_cars[spl_object_hash($car)] = $car;
        return $car;
    }

    /**
     * @param object $car
     * @return mixed
     */
    public function returnCar(object $car)
    {
        if(isset($this->in_use_cars[spl_object_hash($car)])){
            $car->returnDate(date("M-d-y"));

            unset($this->in_use_cars[spl_object_hash($car)]);
            $this->free_cars[spl_object_hash($car)] = $car;
        }
        return $car->payPerHour();
    }

    /**
     * @return array
     */
    public function showFreeCars()
    {
        return $this->free_cars;
    }

    /**
     * @return array
     */
    public function showUsedCars()
    {
        return $this->in_use_cars;
    }
}