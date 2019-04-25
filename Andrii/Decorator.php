<?php

class Game {
    private $MadeBy;
    private $Name;
    function __construct($Name_in, $MadeBy_in) {
        $this->MadeBy = $MadeBy_in;
        $this->Name  = $Name_in;
    }
    function getMadeBy() {
        return $this->MadeBy;
    }
    function getName() {
        return $this->Name;
    }
    function getMadeByAndName() {
        return $this->getName().' by '.$this->getMadeBy();
    }
}

class GameNameDecorator {
    protected $Game;
    protected $Name;
    public function __construct(Game $Game_in) {
        $this->Game = $Game_in;
        $this->resetName();
    }

    function resetName() {
        $this->Name = $this->Game->getName();
    }
    function showName() {
        return $this->Name;
    }
}

class GameNameExclaimDecorator extends GameNameDecorator {
    private $btd;
    public function __construct(GameNameDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function exclaimName() {
        $this->btd->Name = "!" . $this->btd->Name . "!";
    }
}

class GameNameStarDecorator extends GameNameDecorator {
    private $btd;
    public function __construct(GameNameDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function starName() {
        $this->btd->Name = Str_replace(" ","*",$this->btd->Name);
    }
}

writeln('BEGIN TESTING DECORATOR PATTERN');
writeln('');

$patternGame = new Game(' Ubisoft ', ' AssasinsCreed ');

$decorator = new GameNameDecorator($patternGame);
$starDecorator = new GameNameStarDecorator($decorator);
$exclaimDecorator = new GameNameExclaimDecorator($decorator);

writeln('showing Name : ');
writeln($decorator->showName());
writeln('');

writeln('showing Name after two exclaims added : ');
$exclaimDecorator->exclaimName();
$exclaimDecorator->exclaimName();
writeln($decorator->showName());
writeln('');

writeln('showing Name after star added : ');
$starDecorator->starName();
writeln($decorator->showName());
writeln('');

writeln('showing Name after reset: ');
writeln($decorator->resetName());
writeln($decorator->showName());
writeln('');

writeln('END TESTING DECORATOR PATTERN');

function writeln($line_in) {
    echo $line_in."<br/>";
}
