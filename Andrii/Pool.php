<?php

/**
 * Object Pool
 */
class Factory
{
    /**
     * @var Product[]
     */
    protected static $products = array();

    /**
     * Adds product to the pool
     * @param Product $product
     * @return void
     */
    public static function pushProduct(Product $product)
    {
        self::$products[$product->getId()] = $product;
    }

    /**
     * Returns product from the pool
     * @param int|string $id - product ID
     * @return Product $product
     */
    public static function getProduct($id)
    {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

    /**
     * Removes product from the pool
     * @param int|string $id - product ID
     * @return void
     */
    public static function removeProduct($id)
    {
        if (array_key_exists($id, self::$products)) {
            unset(self::$products[$id]);
        }
    }
}

class Product
{

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

  urn int|string
     */
    public function getId()
    {
        return $this->id;
    }
}

// OBJECT POOL USAGE
// --------------------
Factory::pushProduct(new Product('first'));
Factory::pushProduct(new Product('second'));

print_r(Factory::getProduct('first')->getId());
// Output: first
print_r(Factory::getProduct('second')->getId());
// Output: second

