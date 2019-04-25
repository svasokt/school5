<?php


class Observer
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function subscribersProduct(Prod $product)
    {
        echo $this->name . ', '. $product->getTitle() . ' вже є в наявності на складі' . '<br>';
    }
}