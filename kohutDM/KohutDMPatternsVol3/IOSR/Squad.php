<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;

use countable;
use iterator;
use splsubject;
use splobserver;
use splobjectstorage;

class Squad implements Countable, Iterator, SplSubject
{
    private $soldiers = [];
    private $currentIndex = 0;
    private $soldierRepository;
    private $storage;
    private $heroStrategy;

    public function __construct(SoldierRepository $soldierRepository, HeroStrategy $heroStrategy)
    {
        $this->soldierRepository = $soldierRepository;
        $this->heroStrategy = $heroStrategy;
        $this->storage = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }

    public function notify()
    {
        foreach ($this->storage as $observer){
            $observer->update($this);
        }
    }

    /**
     * @param Soldier $soldiers
     * @return $this
     */
    public function setSoldier(Soldier $soldier)
    {
        if (!array_search($soldier, $this->soldiers)){
            $this->soldiers[] = $soldier;
            return $this;
        } else {
            return false;
        }
    }

    /**
     * @param Repository $repository
     * @return $this
     */
    public function createSoldier()
    {
        $this->setSoldier($this->soldierRepository->create());
        $this->notify();
        return $this;
    }

    /**
     * @param $soldierName
     * @return mixed
     */
    public function getSoldier($soldierId)
    {
        foreach ($this->soldiers as $soldier){
            if ($soldierId == $soldier->getId){
                return $soldier;
            }
            return "There is not such soldier";
        }
    }

    public function removeSoldier($soldierId)
    {
        foreach ($this->soldiers as $soldier){
            if ($soldierId == $soldier->getId){
                unset($this->soldiers, $soldier);
                return true;
            }
            return "There is not such soldier";
        }
    }

    public function deleteSoldier (Soldier $soldier)
    {
        $this->soldierRepository->delete($soldier);
    }

    public function saveSquad()
    {
        $this->soldierRepository->saveAll($this->soldiers);
    }

    public function loadSquad()
    {
        $this->soldiers = $this->soldierRepository->loadAll();
    }

    public function saveSoldier(Soldier $soldier)
    {
        $this->soldierRepository->save($soldier);
    }

    public function HeroFactor()
    {
        $heroFactor = '';

        foreach ($this->soldiers as $soldier){
            $heroFactor = $soldier->getName() . ' is a ' . $this->heroStrategy->hero($soldier) . "<br/>";
        }
        return $heroFactor;
    }


    public function count()
    {
        return count($this->soldiers);
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function valid()
    {
        return isset($this->soldiers[$this->currentIndex]);
    }

    public function next()
    {
        $this->currentIndex++;
        return true;
    }

    public function current()
    {
        return $this->soldiers[$this->currentIndex];
    }

    public function rewind()
    {
        $this->currentIndex = 0;
        return true;
    }
}