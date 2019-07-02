<?php

/**
 * Block for Widget
 *
 * @category    Training
 * @package     Training_Widgetvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Widgetvovk_Block_Adminhtml_Topblogs extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    public function __construct(array $args = array())
    {
        parent::__construct($args);
        $this->setTemplate('training/widgetvovk/widget.phtml');
    }

    protected function getModel()
    {
        if($this->getBlogpostId()) {
            $model = Mage::getModel('weblog/blogpost')->load($this->getBlogpostId());

            return $model;
        }

        return false;
    }

//    protected function _toHtml()
//    {
//        $html = "<h1>". $this->getCustomText() ."</h1>" . "<br>" .
//                "<h2>". $this->getModel()->getTitle() ."</h2>" . "<br>" ;
//        return $html;
//    }
}
