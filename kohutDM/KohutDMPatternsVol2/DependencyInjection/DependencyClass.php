<?php


namespace school5\kohutDM\KohutDMPatternsVol2\DependencyInjection;


class DependencyClass
{
    public $firstDependency;
    public $secondDependency;

    public function __construct(FirstDependency $dependency)
    {
        $this->firstDependency = $dependency;
    }

    public function setSecondDependency(SecondDependency $dependency)
    {
        $this->secondDependency = $dependency;
    }
}