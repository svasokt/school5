<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/19/19
 * Time: 09:35
 */

class Singletone
{
    /**
     * @var null
     */
    private static $db = null;

    /**
     * @return null|PDO
     */
    public static function getConnection()
    {
        $params = ['host' => "localhost",
            'dbname' => "phpshop",
            'user' => "root",
            'password' => "root",];

        if(self::$db === null) {
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            self::$db = new PDO($dsn,$params['user'],$params['password']);
            echo"first initialization";
        }else{
            echo "NOT first initialization";
        }
        return self::$db;
    }

    /**
     * Singletone constructor.
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     *
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}