<?php

require_once 'abstract.php';

class Training_Shell_Jetta extends Mage_Shell_Abstract
{

    public function run()
    {
        $this->mailMe();
    }
    protected function mailMe()
    {
        $mail = $this->createMail();

        Mage::log($mail, null, 'mail.log', true);
    }

    public function getModel()
    {
        $model = Mage::getModel("contactus/contactus");
        $model->load(3);
        return $model;
    }

    public function createMail()
    {
        $mail = Mage::getModel('core/email')
            ->setToEmail($this->getModel()->getEmail())
            ->setBody($this->getModel()->getComment() . ' Answer is : ' . $this->getModel()->getAnswer())
            ->setSubject('Shell answer')
            ->setFromEmail('aloha@example.com')
            ->setFromName('Shell name')
            ->setType('html');
        return $mail;
    }
}
$shell = new Training_Shell_Jetta();
$shell->run();