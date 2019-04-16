<?php

final class Singleton
{
    private static $instance;
    public $name;
    
    public function getName() 
    {
        return $this->name;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}  
    private function __sleep() {}    
}
