<?php

require_once ("interfaces/Observable.php");

class Championship implements Observable
{

    /**
     * @var
     */
    private $location;

    private $teams = [];

    private $counter = 0;

    /**
     * @param $team
     * @return mixed|void
     */
    public function addTeam($team)
    {
        $this->teams[$this->counter] = $team;
        $this->counter++;
    }

    /**
     * @param $team
     * @return mixed|void
     */
    public function removeTeam($team)
    {
//        unset($this->teams[$team]);
    }

    /**
     * @param string $location
     */
    public function changedLocation(string $location)
    {
        $this->location = $location;
        $this->notifyTeams();
    }

    /**
     * @return array
     */
    public function checkTeams()
    {
        return $this->teams;
    }

    /**
     *
     */
    public function notifyTeams()
    {
        foreach ($this->teams as $team)
        {
            $team->handleEvent($this->location);
        }
    }
}

?>