<?php
/**
 * Singleton
 */
final class Product
{

    /**
     * @var self
     */
    private static $instance = null;

    /**
     * @var mixed
     */
    public $prop;

    /**
     * Returns an instance of itself
     * @return self
     */
    public static function getInstance()
    {
        if(self::$instance != null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Construct is closed
     */
    private function __construct() {}

    /**
     * Cloning is prohibited
     */
    private function __clone() {}

    /**
     * Serialization is prohibited
     */
    private function __sleep() {}

    /**
     * Deserialization is prohibited
     */
    private function __wakeup() {}

}

// USING OF SINGLETON
// --------------------
$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->prop = 1;
$secondProduct->prop = 2;

print_r($firstProduct->prop);
// Output: 2
print_r($secondProduct->prop);
// Output: 2
