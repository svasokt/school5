<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;

use pdo;

class SoldierRepository
{
    private $db;
    private $resourceCRUD;
    private $soldierFactory;

    public function __construct($db, ResourceCRUD $resourceCRUD,
                                SoldierFactory $soldierFactory)
    {
        $this->db = $db;
        $this->resourceCRUD = $resourceCRUD;
        $this->soldierFactory = $soldierFactory;
    }

    public function randName($db){
        $result = $db->query("SELECT name FROM `soldiers_names` 
            ORDER BY RAND() LIMIT 1");
        $name = $result->fetch(PDO::FETCH_ASSOC);
        return $name['name'];
    }

    function randRank($db){
        $result = $db->query("SELECT name FROM `soldiers_rank` 
            ORDER BY RAND() LIMIT 1");
        $name = $result->fetch(PDO::FETCH_ASSOC);
        return $name['name'];
    }

    public function create()
    {
        $soldier = $this->soldierFactory->createSoldier();// MAKE MINT

        $soldier->setRank($this->randRank($this->db));// INITIALIZE
        $soldier->setName($this->randName($this->db));

        $values['id'] = $soldier->getId(); // SAVE TO DB
        $values['name'] = $soldier->getName();
        $values['rank'] = $soldier->getRank();
        $this->resourceCRUD->save($this->db, $values);

        $result = $this->db->query("SELECT LAST_INSERT_ID()"); // LOAD FROM DB PREVIOUSLY SAVED OBJECT
        $query = $result->fetch(PDO::FETCH_ASSOC);
        $id = $query['LAST_INSERT_ID()'];
        $soldier = $this->load($id);

        return $soldier; // RETURN DONE OBJECT
    }

    public function save (Soldier $soldier)
    {
        $values['id'] = $soldier->getId();
        $values['name'] = $soldier->getName();
        $values['rank'] = $soldier->getRank();
        $this->resourse->save($this->db, $values);
    }

    public function saveAll(array $soldiers)
    {
        foreach ($soldiers as $soldier){
            $values['id'] = $soldier->getId();
            $values['name'] = $soldier->getName();
            $values['rank'] = $soldier->getRank();
            $this->resourse->save($this->db, $values);
        }
    }

    /**
     * @param $id
     * @return Soldier
     */
    public function load(int $id)
    {
        $soldierValues = $this->resourceCRUD->load($this->db, $id);
        $soldier = $this->soldierFactory->createSoldier();
        $soldier->setId($soldierValues['id']);
        $soldier->setName($soldierValues['name']);
        $soldier->setRank($soldierValues['rank']);

        return $soldier;
    }

    public function loadAll()
    {
        $soldiers = [];
        $id = 0;
        while ($this->resourceCRUD->load($this->db, $id)){
            $soldiers[$id] = $this->resourceCRUD->load($this->db, $id);
            $id++;
        }
        return $soldiers;
    }

    public function delete(Soldier $soldier)
    {
        $id = $soldier->getId();
        $this->resourceCRUD->delete($this->db, $id);
    }
}