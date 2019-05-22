<?php
class World_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function viewEavAction()
    {
        $weblog = Mage::getModel('complexworld/eavblogpost');
        $collection = $weblog->getCollection()
            ->addAttributeToSelect('title');
         $collection->load();
        foreach ($collection as $value) {
            echo '<p>' . $value->getTitle() . '</p> ';
        }
    }

    public function createEavAction()
    {
        $title = $this->getRequest()->getParams('title');
        print_r($title['title']);
        if ($title) {
            $post = Mage::getModel('complexworld/eavblogpost')
                ->setTitle($title['title'])
                ->save();
            $this->_redirect('complexworld/index/viewEav');
        }
    }

    public function editEavAction()
    {
        $params = $this->getRequest()->getParams();
        $weblog = Mage::getModel('complexworld/eavblogpost');
        $post = $weblog->load($params['id']);
        $post->setTitle($params['title']);
        $post->save();
        $this->_redirect('complexworld/index/viewEav');
    }



    public function deleteEavAction()
    {
        $id = $this->getRequest()->getParams(['id']);
        $post = Mage::getModel('complexworld/eavblogpost')->load($id);
        $post->delete()->save();
        $this->_redirect('complexworld/index/viewEav');
    }


}


