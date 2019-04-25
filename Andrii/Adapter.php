<?php

class PCGame {
    private $MadeBy;
    private $Name;
    function __construct($MadeBy_in, $Name_in) {
        $this->MadeBy = $MadeBy_in;
        $this->Name  = $Name_in;
    }
    function getMadeBy() {
        return $this->MadeBy;
    }
    function getName() {
        return $this->Name;
    }
}

class GameAdapter {
    private $Game;
    function __construct(PCGame $Game_in) {
        $this->Game = $Game_in;
    }
    function getMadeByAndName() {
        return $this->Game->getName().' by '.$this->Game->getMadeBy();
    }
}

// client

writeln('BEGIN TESTING ADAPTER PATTERN');
writeln('');

$Game = new PCGame("Ubisoft", "AsassinsCreed");
$GameAdapter = new GameAdapter($Game);
writeln('Made by  and Name of the game: '.$GameAdapter->getMadebyAndName());
writeln('');

writeln('END TESTING ADAPTER PATTERN');

function writeln($line_in) {
    echo $line_in."<br/>";
}
