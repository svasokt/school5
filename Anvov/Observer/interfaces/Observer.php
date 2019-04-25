<?php


interface Observer
{
    /**
     * @param Observable $observable
     *
     * @return mixed
     */
    public function handleEvent($location);
}

?>
