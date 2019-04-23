<?php


namespace school5\kohutDM\KohutDMPatternsVol3\EAV;

use PDO;

class Attribute
{
    private $values = [];
    private $name;

    public function __construct(string $name, $db)
    {
        $attributes = [];
        $result = $db->query("SELECT `attributes`.attribute_name FROM `attributes`");
        while ($query = $result->fetch(PDO::FETCH_ASSOC)){
            array_push($attributes, $query['attribute_name']);
        }
        if (!isset($attributes[0])){
            $db->query("INSERT INTO `attributes` (`attribute_name`)
            VALUES ('{$name}')");
            $this->name = $name;
            return;
        } else {
            if (is_int(array_search($name, $attributes))){
                    $this->name = $name;
                    return;
            } else {
                $db->query("INSERT INTO `attributes` (`attribute_name`)
                VALUES ('{$name}')");
                $this->name = $name;
                return;
            }
        }
    }

    public function addValue(Value $value)
    {
        $this->values[$value->getName()] = $value;
    }

    public function getValue(string $name)
    {
        return $this->values[$name];
    }

    public function removeValue(string $name)
    {
        unset($this->values[$name], $this->values);
    }

    public function getName()
    {
        return $this->name;
    }
}