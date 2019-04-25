<?php

class Config
{
    public static $factory = 1;
}


interface Product
{

    public function getName();
}

abstract class AbstractFactory
{

    public static function getFactory()
    {
        switch(Config::$factory){
            case 1:
                return new FirstFactory();
            case 2:
                return new SecondFactory();
        }
        throw new Exception('Bad configuration');
    }

    /**
     * Returns product
     */
    abstract public function getProduct();
}


class FirstFactory extends AbstractFactory
{
    /**
     * Returns product
     */
    public function getProduct()
    {
        return new FirstProduct();
    }
}


class FirstProduct implements Product
{
    /**
     * Returns a name of product
     */
    public function getName()
    {
        return 'The product from the first factory';
    }
}


class SecondFactory extends AbstractFactory
{
    /**
     * Returns product
     */
    public function getProduct()
    {
        return new SecondProduct();
    }
}

/**
 * Product from the second factory
 */
class SecondProduct implements Product
{
    /**
     * Returns a name of product

     */
    public function getName()
    {
        return 'The product from second factory';
    }
}


// USING OF ABSTRACT FACTORY
// --------------------

$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

// The first product from the first factory
print_r($firstProduct->getName());
// The second product from second factory
print_r($secondProduct->getName());