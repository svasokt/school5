<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * echo string
     */
    public function indexAction()
    {
        echo "we are here";
    }

    public function populateEntriesAction() {
        for ($i=0;$i<10;$i++) {
            $weblog2 = Mage::getModel('complexworld/iphonepost');
            $weblog2->setTitle('This is a test title'.$i);
            $weblog2->setContent('This is test content '.$i);
            $weblog2->setDate(now());
            $weblog2->save();
        }

        echo 'Done';
    }

    public function showCollectionAction() {
        $weblog2 = Mage::getModel('complexworld/iphonepost');
        $entries = $weblog2->getCollection()
            ->addAttributeToSelect('title') // we use it only for eav , for simple table addFieldToSelect()
            ->addAttributeToSelect('content');
        $entries->load();
        foreach($entries as $entry)
        {
            // var_dump($entry->getData());
            echo '<h2>' . $entry->getTitle() . '</h2>';
            echo '<p>Date: ' . $entry->getDate() . '</p>';
            echo '<p>' . $entry->getContent() . '</p>';
        }
        echo '</br>Done</br>';
    }

    /**
     * correct view with reference to content from EAV table
     */
    public function eavListAction()
    {
        $this->loadLayout();
        $this->renderLayout();
//        phpinfo();
    }

    /**
     * Create
     */
    public function createNewPostAction()
    {
        $iphonepost = Mage::getModel('complexworld/iphonepost');
        $iphonepost->setTitle('Index controller post - new!');
        $iphonepost->setContent('index controller content');
        $iphonepost->save();
        echo 'post with ID ' . $iphonepost->getEntityId() . ' created';
    }

    /**
     * Update
     */
    public function editEavPostAction() {
        $params = $this->getRequest()->getParams();
        $iphonepost = Mage::getModel('complexworld/iphonepost');
        $iphonepost->load($params['id']);
        $iphonepost->setTitle("The First post fromm controller edited!");
        $iphonepost->save();
        echo 'post edited';
    }

    /**
     * Delete
     */
    public function deleteEavPostAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('complexworld/iphonepost');
        $blogpost->load($params['id']);
        $blogpost->delete();
        echo 'post removed';
    }
}