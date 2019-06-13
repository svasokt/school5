<?php
$installer = $this;
$installer->startSetup();
$this->addAttribute('complexworld_iphonepost', 'published', array(
    'type'              => 'text',
    'label'             => 'Published',
    'input'             => 'select',
));

$installer->endSetup();