<?php


namespace school5\kohutDM\KohutDMPatternsVol3\EAV;


use pdo;

class ConnectionDB
{
    private $dbConnection;

    public function getDbConnection()
    {
        if (isset($this->dbConnection)){
            return $this->dbConnection;
        } else {
            $paramsPath = ROOT . '/db_params.php';
            $params = include($paramsPath);
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $db = new PDO($dsn, $params['username'], $params['password']);
            $db->exec("set names utf8");
            return $this->dbConnection = $db;
        }
    }
}