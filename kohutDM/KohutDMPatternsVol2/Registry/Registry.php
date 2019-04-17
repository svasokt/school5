<?php


namespace school5\kohutDM\KohutDMPatternsVol2\Registry;


abstract class Registry
{
    private static $heroes = [];

    public static function getHeroes($key)
    {
        if (isset (self::$heroes[$key])){
            return self::$heroes[$key];
        } else {
            echo "There is no such hero here!";
        }
    }

    public static function setHeroes($key, $value)
    {
        if (!isset (self::$heroes[$key])){
            self::$heroes[$key] = $value;
        } else {
            echo "We have such hero here!";
        }
    }
}