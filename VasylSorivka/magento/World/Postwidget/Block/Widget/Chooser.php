<?php
class World_Postwidget_Block_Widget_Chooser extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct($arguments = array())
    {
        parent::__construct($arguments);
        $this->setUseAjax(true);
    }

    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $uniqId = Mage::helper('core')->uniqHash($element->getId());
        $sourceUrl = $this->getUrl('*/postwidget/chooser', array('uniq_id' => $uniqId));
        $chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
            ->setElement($element)
            ->setTranslationHelper($this->getTranslationHelper())
            ->setConfig($this->getConfig())
            ->setFieldsetId($this->getFieldsetId())
            ->setSourceUrl($sourceUrl)
            ->setUniqId($uniqId);
        if ($element->getValue()) {
            $post = Mage::getModel('grid/posts')->load((int)$element->getValue());
            if ($post->getId()) {
                $chooser->setLabel($post->getTitle());
            }
        }
        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    public function getRowClickCallback()
    {
        $chooserJsObject = $this->getId();
        $js = '
            function (grid, event) {
                var trElement = Event.findElement(event, "tr");
                var postTitle = trElement.down("td").next().innerHTML;
                var postId = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
                ' . $chooserJsObject . '.setElementValue(postId);
                ' . $chooserJsObject . '.setElementLabel(postTitle);
                ' . $chooserJsObject . '.close();
            }
        ';
        return $js;
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('grid/posts')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => Mage::helper('post_widget')->__('ID'),
            'align' => 'right',
            'index' => 'id',
            'width' => 50
        ));
        $this->addColumn('title', array(
            'header' => Mage::helper('post_widget')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));
        return parent::_prepareColumns();
    }
    public function getGridUrl()
    {
        return $this->getUrl('*/postwidget/chooser', array('_current' => true));
    }
}

