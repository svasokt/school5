<?php

class ActiveRecord
{
    protected $dbConfig = [];

    function setConfigDB($host, $user, $pass, $db, $table) {
        $this->dbConfig["host"] = $host;
        $this->dbConfig["user"] = $user;
        $this->dbConfig["pass"] = $pass;
        $this->dbConfig["db"] = $db;
        $this->dbConfig["table"] = $table;
    }

    protected function init_connected_db() {
        mysqli_connect($this->dbConfig["host"], $this->dbConfig["user"], $this->dbConfig["pass"]);
        mysqli_select_db($this->dbConfig["db"]);
        mysqli_query("SET NAMES cp1251");
    }

    function insert($keys, $values) {
        $table = $this->dbConfig["table"];
        $query = "INSERT INTO $table (";
        foreach ($keys as $value) {
            $query.="$value, ";
        }
        $query = substr($query, 0, -2);
        $query.=") VALUES (";
        foreach ($values as $value) {
            $query.="'$value', ";
        }
        $query = substr($query, 0, -2);
        $query.=");";

        $this->init_connected_db();
        mysqli_query($query);
    }

    function select($fields) {
        $table = $this->dbConfig["table"];
        $query = "SELECT ";
        foreach ($fields as $value) {
            $query.="$value, ";
        }
        $query = substr($query, 0, -2);
        $query.=" FROM $table";

        $this->init_connected_db();
        $result = mysqli_query($query);
        return $result;
    }

    public function delete($key, $value)
    {
        $table = $this->dbConfig['table'];
        $query = "DELETE FROM $table WHERE $key = $value";
        $this->initConnectedDB();
        $result = mysqli_query($query);
        return $result;
    }
}
