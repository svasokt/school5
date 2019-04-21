<?php


namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;

use splobserver;
use splsubject;


class NameObserver implements SplObserver
{
    public function update(SplSubject $squad)
    {
        foreach ($squad as $soldier){
            if ($soldier->getName() == 'John'){
                $soldier->setName('sir ' . $soldier->getName());
            }
        }
    }
}