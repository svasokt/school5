<?php
/**
 * Iterator
 *
 * @category school5
 * @package Iterator
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Anvov\Iterator\Classes;

class Car
{
    /**
     * @var string
     */
    private $engine;

    /**
     * @var string
     */
    private $color;

    /**
     * @var int
     */
    private $price;

    /**
     * Car constructor.
     * @param string $engin
     * @param string $color
     * @param int $price
     */
    public function __construct(string $engine, string $color, int $price)
    {
       $this->engine = $engine;
       $this->color = $color;
       $this->price = $price;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getEngine()
    {
        return $this->engine;
    }
}