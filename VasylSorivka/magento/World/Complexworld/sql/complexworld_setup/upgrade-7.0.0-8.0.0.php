<?php
/**
 * @var Mage_Eav_Model_Entity_Setup $this
 */

$installer = $this;

$installer->startSetup();

$this->addAttribute('complexworld_eavblogpost', 'title', array(
    'type'       => 'varchar',
    'label'       => 'Title',
    'input'       => 'text',
    'class'       => '',
    'backend'      => '',
    'frontend'     => '',
    'source'      => '',
    'required'     => false,
    'user_defined'   => true,
    'default'      => '',
    'unique'      => false,
));

$installer->endSetup();
