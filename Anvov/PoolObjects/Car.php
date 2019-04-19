<?php
/**
 * Pool objects
 *
 * @category school5
 * @package Pool objects
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Car{

    /**
     * @var false|string
     */
    private $startDate;

    /**
     * @var
     */
    private $returnDate;

    /**
     * Car constructor.
     */
    public function __construct()
    {

        $this->startDate = date("M-d-y");
    }

    /**
     * @param string $date
     */
    public function returnDate(string $date)
    {
        $this->returnDate = $date;
    }

    /**
     * @return float|int
     */
    public function payPerHour()
    {
        $days = (strtotime($this->returnDate) - strtotime($this->startDate)) / (60 * 60 * 24);
        return $days;
    }
}