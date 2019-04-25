<?php
/**
 * Registry
 */
class Products
{

    protected static $data = array();

    /**
     * Add value to the Registry
     */
    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    /**
     * Returns value from Registry by key
     */
    public static function get($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    /**
     * Removes value from Registry by key
     */
    final public static function removeProduct($key)
    {
        if(array_key_exists($key, self::$data)){
            unset(self::$data[$key]);
        }
    }
}

// REGISTRY USAGE
// --------------------
// Set new computer
Products::set('new_computer', 'Apple');
// Get new computer
print_r(Products::get('new_computer'));
// Output: Apple
