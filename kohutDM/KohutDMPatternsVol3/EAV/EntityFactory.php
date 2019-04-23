<?php


namespace school5\kohutDM\KohutDMPatternsVol3\EAV;

use PDO;

class EntityFactory
{
    /**
     * Information from Db table products
     * @var array
     */
    private $entityNames = [];
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $result = $db->query("SELECT `products`.product_name FROM `products`");
        $query = $result->fetch(PDO::FETCH_ASSOC);
        $this->entityNames[] = $query['product_name'];
    }

    public function create(string $entityName, array $entityValues)
    {
        /**
         * This check code have to be somewhere in middleware
         */
        foreach ($entityValues as $value){
            if ($value->isValue()){
                continue;
            } else {
                echo "Array contains non Value objects";
                return false;
            }
        }
        /**
         * This check code have to be somewhere in middleware
         */

        foreach ($this->entityNames as $name){
            if ($name == $entityName){
                continue;
            } else {
                echo "No such entity name";
                return false;
            }
        }
        return new Entity($entityName, $entityValues, $this->db);
    }
}