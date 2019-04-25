<?php
/**
 * Registry
 *
 * @category school5
 * @package Registry
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/RentalOffice.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/Car.php";

use Anvov\Iterator\Classes\Car;

class Registry
{
    /**
     * objects
     *
     * @var array
     */
    private $container = [];

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if(!isset($this->container[$key]))
            $this->container[$key] = $value;
        else
            trigger_error('Variable '. $key .' already defined', E_USER_WARNING);
    }

    public function __get($key)
    {
        return $this->container[$key];
    }
}

$RG = new Registry();
$RG->rental = new RentalOffice();
print_r($RG->rental);
$RG->rental = new Car('2.4','black', 23000);