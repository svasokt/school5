<?php


interface Observable
{
    /**
     * @param Observer $observer
     *
     * @return mixed
     */
    public function addTeam( $team);

    /**
     * @param Observer $observer
     *
     * @return mixed
     */
    public function removeTeam($team);

    /**
     * Execute methods Observer::handleEvent for all observers
     *
     * @return void
     */

    public function changedLocation(string $Location);

    public function notifyTeams();

    public function checkTeams();
}
?>