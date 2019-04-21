<?php
/**
 *  Strategy
 *
 * @category school5
 * @package  Strategy
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */


interface CarStrategy
{

  public function chooseCar($carPool);
}