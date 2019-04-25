<?php


class Observable
{
    protected $observers = [];

    protected function notify(Prod $product)
    {
        foreach ($this->observers as $observer) {
            $observer->subscribersProduct($product);
        }
    }

    public function addSubscribe(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function AddProduct(Prod $prod)
    {
        $this->notify($prod);
    }
}