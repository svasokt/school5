<?php


namespace school5\kohutDM\KohutDMPatternsVol3\EAV;

use PDO;

class Entity
{
    private $values;
    private $name;

    public function __construct(string $name, array $values, $db)
    {
        $this->name = $name;
        $this->values = $values;

        $result = $db->query("SELECT `products`.id FROM `products` WHERE `product_name` = '{$this->name}'");
        $query = $result->fetch(PDO::FETCH_ASSOC);
        $productId = $query['id'];
        foreach ($this->values as $value){
            $attributeName = $value->getAttributeName();

            $result = $db->query("SELECT `attributes`.id FROM `attributes` WHERE `attribute_name` = '{$attributeName}'");
            $query = $result->fetch(PDO::FETCH_ASSOC);
            $attributeId = $query['id'];

            $result = $db->query("SELECT `values`.id FROM `values` WHERE `product_id` = '{$productId}' && 
            `attribute_id` = '{$attributeId}' && `value` = '{$value->getName()}'");
            $query = $result->fetch(PDO::FETCH_ASSOC);
            $valueId = $query['id'];
            if (isset($valueId)){
                continue;
            } else {
                $db->query("INSERT INTO `values` (`product_id`, `attribute_id`,`value`)
                VALUES ('{$productId}','{$attributeId}','{$value->getName()}')");
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValuesNames()
    {
        $valuesNames = '';
        foreach ($this->values as $value){
            $valuesNames .= $value->getAttributeName() . ":" . $value->getName() . "  ";
        }
        return $valuesNames;
    }
}