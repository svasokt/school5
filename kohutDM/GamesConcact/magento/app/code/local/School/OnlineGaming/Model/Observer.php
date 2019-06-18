<?php
class School_OnlineGaming_Model_Observer
{
    public function showMessage($observer)
    {
        $model = $observer->getEvent()->getEavgames();
        if ($model->getTitle() == 'Overcooked') {
            $model->setTitle('THIS WEEK BEST GAME - ' . $model->getTitle());
        };
    }
}