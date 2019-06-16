<?php
$installer = $this;
$installer->startSetup();
$this->addAttribute('complexworld_iphonepost', 'responsible', array(
    'type'              => 'text',
    'label'             => 'Responsible',
    'input'             => 'textarea',
));
$this->addAttribute('complexworld_iphonepost', 'city', array(
    'type'              => 'text',
    'label'             => 'City',
    'input'             => 'textarea',
));

$installer->endSetup();