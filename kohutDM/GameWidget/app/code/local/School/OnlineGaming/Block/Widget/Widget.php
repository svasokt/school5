<?php
class School_OnlineGaming_Block_Widget_Widget
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    public function __construct(array $args = array())
    {
        parent::__construct($args);
        $this->setTemplate('school/onlinegaming/onlinegaming_widget.phtml');
        $model = Mage::getModel('onlinegaming/eavgames')->load($this->getGameId());
        $this->setGameTitle($model->getTitle());
    }
}
