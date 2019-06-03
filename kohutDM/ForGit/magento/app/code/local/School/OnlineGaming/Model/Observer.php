<?php
class School_OnlineGaming_Model_Observer
{
    public function showMessage($observer)
    {
        if ($observer['eavgames']->getTitle() == 'Overcooked') {
            $observer['eavgames']->setTitle('THIS WEEK BEST GAME - ' . $observer['eavgames']->getTitle());
        };
    }
}
