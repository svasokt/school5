<?php
$installer = $this;
$installer->startSetup();
$installer->addEntityType('complexworld_iphonepost', array(
    //entity_mode is the URI you'd pass into a Mage::getModel() call
    'entity_model'    => 'complexworld/iphonepost',

    //table refers to the resource URI complexworld/iphonepost
    //<complexworld_resource>...<iphonepost><table>iphone_posts</table>

    'table'           =>'complexworld/iphonepost',
));
$installer->createEntityTables(
    $this->getTable('complexworld/iphonepost')
);
$this->addAttribute('complexworld_iphonepost', 'title', array(
    //the EAV attribute type, NOT a MySQL varchar
    'type'              => 'varchar',
    'label'             => 'Title',
    'input'             => 'text',
    'class'             => '',
    'backend'           => '',
    'frontend'          => '',
    'source'            => '',
    'required'          => true,
    'user_defined'      => true,
    'default'           => '',
    'unique'            => false,
));
$this->addAttribute('complexworld_iphonepost', 'content', array(
    'type'              => 'text',
    'label'             => 'Content',
    'input'             => 'textarea',
));
$this->addAttribute('complexworld_iphonepost', 'date', array(
    'type'              => 'datetime',
    'label'             => 'Post Date',
    'input'             => 'datetime',
    'required'          => false,
));

$installer->endSetup();