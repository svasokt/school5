<?php

/**
 * Block for first.layout
 *
 * @category    Training
 * @package     Training_First
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Complexworld_Block_Eavlogic extends Mage_Core_Block_Template
{
    /**
     * collection with filters and joints
     */
    public function eavCollection()
    {
        $collection = Mage::getModel('complexworld/iphonepost')->getCollection();
        $collection
            ->joinTable(['weblog'=> 'blog_posts'],'blogpost_id = entity_id', ['weblog'=>'title','post'], null , 'inner')
//            ->joinTable(['first'=> 'blog_vovk'],'blogvovk_id = entity_id', ['info'=>'information'], null , 'left')
            ->joinField('info','first/blogvovk','information', 'blogvovk_id = entity_id', ['title'=> 'andriy'], 'inner')
//            ->joinAttribute('value','customer/customer_address_entity_varchar', 'value_id=entity_id', null , 'left')
            ->addAttributeToSelect('*'); // we use it only for eav , for simple table addFieldToSelect()
//            ->addAttributeToSelect('content');
//            ->addFieldToFilter('content','This is test content 3');
//            ->addAttributeToFilter('content',['neq'=>'This is test content 3'])
//            ->setPageSize(3)
//            ->setCurPage(4);
        $collection->load();
        return $collection;
    }
}
