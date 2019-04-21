<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;

use pdo;

class ResourceCRUD
{
    public function save ($db, array $values)
    {
        //var_dump($values);
        $id = null;
        $result = $db->query("SELECT id FROM `soldiers` 
        WHERE `soldiers`.id = '{$values['id']}'");
        while ($query = $result->fetch(PDO::FETCH_ASSOC)){
            $id = $query['id'];}
        if (!$id){
            $result = $db->query("INSERT INTO `soldiers` 
              (`name`,`rank`)
              VALUES ('{$values['name']}','{$values['rank']}')");
            $result->fetch();
            return true;
        } else {
            $result = $db->query("UPDATE `soldiers` 
            SET name = {$values['name']},rank = {$values['rank']}
            WHERE id = {$values['id']}");
            $result->fetch();
            return true;
        }
    }

    public function load ($db, int $id)
    {
        $result = $db->query("SELECT `soldiers`.id,`soldiers`.name,`soldiers`.rank FROM `soldiers` 
            WHERE `soldiers`.id = '{$id}'");
        $query = $result->fetch(PDO::FETCH_ASSOC);
        $soldierValues['id'] = $query['id'];
        $soldierValues['name'] = $query['name'];
        $soldierValues['rank'] = $query['rank'];
        return $soldierValues;
    }

    public function delete($db, int $id)
    {
        /**
         *  query to db
         */
    }
}