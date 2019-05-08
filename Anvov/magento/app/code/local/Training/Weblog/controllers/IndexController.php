<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Weblog_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * echo string
     */
    public function testModelAction()
    {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        echo("Loading the blogpost with an ID of ".$params['id']);
        $blogpost->load($params['id']);
        $data = $blogpost->getData();
        var_dump($data);
    }

    /**
     * Create
     */
    public function createNewPostAction()
    {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }

    /**
     * Update
     */
    public function editFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->setTitle("The First post!");
        $blogpost->save();
        echo 'post edited';
    }

    /**
     * Delete
     */
    public function deleteFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->delete();
        echo 'post removed';
    }

    /**
     * Collection from blog_post
     */
    public function showAllBlogPostsAction()
    {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach($posts as $blogpost){
            echo '<h3>'.$blogpost->getTitle().'</h3>';
            echo nl2br($blogpost->getPost());
        }
    }
}