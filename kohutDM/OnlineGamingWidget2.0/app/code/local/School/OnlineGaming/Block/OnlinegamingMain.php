<?php
class School_OnlineGaming_Block_OnlinegamingMain extends Mage_Core_Block_Template
{
    private $imgUrl = array();

    public function setImgSrc(string $key, string $url)
    {
        $this->imgUrl[$key] = $url;
    }

    public function getImgSrc($key)
    {
        return $this->imgUrl[$key];
    }

    public function getEavModelFromRegistry()
    {
        return Mage::registry('IndexController_addNewGameSuccessAction');
    }

    public function getEavModelById()
    {
        $id = $this->getRequest()->getParams('id');
        $model = Mage::getModel("onlinegaming/eavgames");
        $model->load($id);
        return $model;
    }

    public function getEavCollection()
    {
        $model = Mage::getModel("onlinegaming/eavgames")
            ->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('creator')
            ->addAttributeToSelect('picture');
//            ->joinField('quality', 'onlinegaming/gamesrank', 'quality', 'game_id=entity_id',null,'left');
//            ->joinTable('onlinegaming/gamesrank', 'game_id=entity_id', ['*'],null,'left');
//        $model->getSelect()->join('onlinegaming_games_rank', 'game_id=entity_id', ['rank','quality']);
        $model->getSelect()->joinLeft('onlinegaming_games_rank', 'entity_id=game_id',['rank','quality']);
        return $model;
    }
}
