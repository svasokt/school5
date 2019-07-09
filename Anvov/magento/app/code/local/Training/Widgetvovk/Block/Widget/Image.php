<?php
/**
 * Image uploader
 *
 * @category    Training
 * @package     Training_Widgetvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */
class Training_Widgetvovk_Block_Widget_Image extends Mage_Adminhtml_Block_Template implements Varien_Data_Form_Element_Renderer_Interface
{


    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $config = $this->getConfig();
        $chooseButton = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setType('button')
            ->setClass('scalable btn-chooser')
            ->setLabel($config['button']['open'])
            ->setOnclick('MediabrowserUtility.openDialog(\''.$this->getUrl('*/cms_wysiwyg_images/index', array('target_element_id' => $element->getName())).'\')')
            ->setDisabled($element->getReadonly());
        $text = new Varien_Data_Form_Element_Text();
        $text->setForm($element->getForm())
            ->setId($element->getName())
            ->setName($element->getName())
            ->setClass('widget-option input-text');
        if ($element->getRequired()) {
            $text->addClass('required-entry');
        }
        if ($element->getValue()) {
            $text->setValue($element->getValue());
        }
        $element->setData('after_element_html', $text->getElementHtml().$chooseButton->toHtml());
        return $element;
    }

    public function render(Varien_Data_Form_Element_Abstract $element)
    {

        return $element;
    }
}
