<?php
class School_OnlineGaming_Block_Widget_Chooser extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Block construction, prepare grid params
     *
     * @param array $arguments Object data
     */
    public function __construct($arguments=array())
    {
        parent::__construct($arguments);
        $this->setUseAjax(true);
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
        $sourceUrl = $this->getUrl('*/gamewidget/chooser', array('uniq_id' => $uniqId));

        $chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
            ->setElement($element)
            ->setTranslationHelper($this->getTranslationHelper())
            ->setConfig($this->getConfig())
            ->setFieldsetId($this->getFieldsetId())
            ->setSourceUrl($sourceUrl)
            ->setUniqId($uniqId);


        if ($element->getValue()) {
            $game = Mage::getModel('onlinegaming/eavgames')->load((int)$element->getValue());
            if ($game->getId()) {
                $chooser->setLabel($game->getTitle());
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
                var gameTitle = trElement.down("td").next().innerHTML;
                var gameId = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
                '.$chooserJsObject.'.setElementValue(gameId);
                '.$chooserJsObject.'.setElementLabel(gameTitle);
                '.$chooserJsObject.'.close();
            }
        ';
        return $js;
    }

    /**
     * Prepare pages collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('onlinegaming/eavgames')->getCollection();

        $this->setCollection($collection);
        $collection->setFirstStoreFlag(true);
        $collection->addAttributeToSelect(array('title', 'creator', 'description'));

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns for pages grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('game_id', array(
            'header'    => Mage::helper('school_onlinegaming')->__('ID'),
            'align'     => 'right',
            'index'     => 'entity_id',
            'width'     => 50
        ));

        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'title'
            )
        );

        $this->addColumn('creator',
            array(
                'header'=> $this->__('Creator'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'creator'
            )
        );

        $this->addColumn('description',
            array(
                'header'=> $this->__('Description'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'description'
            )
        );

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/gamewidget/chooser', array('_current' => true));
    }
}
