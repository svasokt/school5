<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 12/1/18
 * Time: 17:16
 */
require_once ("interfaces/Observer.php");


class Teams implements Observer{

    public function handleEvent($location)
    {
       echo $location;
    }
}

?>