<?php
/**
 * Grid for Widget
 *
 * @category    Training
 * @package     Training_Widgetvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */
class Training_Widgetvovk_Block_Widget_Chooser extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Block construction, prepare grid params
     *
     * @param array $arguments Object data
     */
    public function __construct($arguments=array())
    {
        parent::__construct($arguments);
        //$this->setDefaultSort('name');
        $this->setUseAjax(true);
//        $this->setDefaultFilter(array('chooser_is_active' => '1'));
    }

    /**
     * Prepare chooser element HTML
     *
     * @param Varien_Data_Form_Element_Abstract $element Form Element
     * @return Varien_Data_Form_Element_Abstract
     */
    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $uniqId = Mage::helper('core')->uniqHash($element->getId());
        $sourceUrl = $this->getUrl('*/widgetvovk/chooser', array('uniq_id' => $uniqId));

        $chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
            ->setElement($element)
            ->setTranslationHelper($this->getTranslationHelper())
            ->setConfig($this->getConfig())
            ->setFieldsetId($this->getFieldsetId())
            ->setSourceUrl($sourceUrl)
            ->setUniqId($uniqId);

        if ($element->getValue()) {
            $blog = Mage::getModel('weblog/blogpost')->load((int)$element->getValue());
            if ($blog->getId()) {
                $chooser->setLabel($blog->getTitle());
            }
        }

        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    /**
     * Grid Row JS Callback
     *
     * @return string
     */
    public function getRowClickCallback()
    {
        $chooserJsObject = $this->getId();
        $js = '
            function (grid, event) {
                var trElement = Event.findElement(event, "tr");
                var blogpostTitle = trElement.down("td").next().innerHTML;
                var blogpostId = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
                '.$chooserJsObject.'.setElementValue(blogpostId);
                '.$chooserJsObject.'.setElementLabel(blogpostTitle);
                '.$chooserJsObject.'.close();
            }
        ';
        return $js;
    }

    /**
     * Prepare pages collection
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('weblog/blogpost')->getCollection();
//        $collection->setFirstStoreFlag(true);
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns for pages grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', array(
            'header'    => Mage::helper('training_widgetvovk')->__('ID'),
            'align'     => 'right',
            'index'     => 'blogpost_id',
            'width'     => 50
        ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('training_widgetvovk')->__('Title'),
            'align'     => 'left',
            'index'     => 'title',
        ));
        $this->addColumn('post', array(
            'header'    => Mage::helper('training_widgetvovk')->__('Post'),
            'align'     => 'left',
            'index'     => 'post',
        ));
        $this->addColumn('date', array(
            'header'    => Mage::helper('training_widgetvovk')->__('Datee'),
            'align'     => 'left',
            'index'     => 'date',
        ));
        $this->addColumn('custom_value', array(
            'header'    => Mage::helper('training_widgetvovk')->__('Custom Value'),
            'align'     => 'left',
            'index'     => 'custom_value',
        ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/widgetvovk/chooser', array('_current' => true));
    }
}
