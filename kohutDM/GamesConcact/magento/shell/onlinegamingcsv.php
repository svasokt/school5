<?php
require_once 'abstract.php';

class School_Shell_Onlinegaming extends Mage_Shell_Abstract
{
    public function run()
    {
        $this->generateCsvReport();
    }

    protected function generateCsvReport()
    {
        $collection = $this->getEavCollection();
        $report = array(array('id','title','description','creator'));
        foreach ($collection as $singleGame){
            array_push($report, array($singleGame->getEntityId(),$singleGame->getTitle(),$singleGame->getDescription(),$singleGame->getCreator(),));
        }
        $file = fopen('onlinegaming.csv','w');

        foreach ($report as $field){
            fputcsv($file,$field);
        }

        fclose($file);
    }

    public function getEavCollection()
    {
        $model = Mage::getModel("onlinegaming/eavgames")
            ->getCollection()
            ->addAttributeToSelect('entity_id')
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('description')
            ->addAttributeToSelect('creator');
        return $model;
    }
}

$shell = new School_Shell_Onlinegaming();
$shell->run();