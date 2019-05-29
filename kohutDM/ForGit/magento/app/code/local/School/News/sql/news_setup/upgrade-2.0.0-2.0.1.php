<?php
$installer = $this;
$installer->startSetup();
$installer->addEntityType('news_eavnews', array(
    //entity_mode is the URI you'd pass into a Mage::getModel() call
    'entity_model'    => 'news/eavnews',

    //table refers to the resource URI news/eavnews
    //...eavnews_entities

    'table'           =>'news/eavnews',
));
$installer->createEntityTables(
    $this->getTable('news/eavnews')
);
$this->addAttribute('news_eavnews', 'title', array(
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
$this->addAttribute('news_eavnews', 'content', array(
    'type'              => 'text',
    'label'             => 'Content',
    'input'             => 'textarea',
));
$this->addAttribute('news_eavnews', 'author', array(
    'type'              => 'text',
    'label'             => 'Author',
    'input'             => 'textarea',
));
$installer->endSetup();
