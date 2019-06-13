<?php
$installer = $this;
$installer->startSetup();
$this->addAttribute('complexworld_iphonepost', 'status', array(
    'type'              => 'int',
    'label'             => 'Status',
    'input'             => 'boolean',
));

$installer->endSetup();