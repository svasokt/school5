<?php
class World_Grid_Adminhtml_PostsController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		return Mage::getSingleton('admin/session')->isAllowed('grid/posts');
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Grid"));
	   $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        Mage::register('grid_posts',Mage::getModel('grid/posts')->load($id));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('grid/adminhtml_posts_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('id');
            $post = Mage::getModel('grid/posts')->load($id);
            $post
                ->setTitle($this->getRequest()->getParam('title'))
                ->setShortDescription($this->getRequest()->getParam('short_description'))
                ->setDescription($this->getRequest()->getParam('description'))
                ->save();


            if(!$post->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the block');
            }
        } catch(Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($post->getData());
            return  $this->_redirect('*/*/edit',array('id'=>$this->getRequest()->getParam('id')));
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Post was saved successfully!');

        $this->_redirect('*/*/'.$this->getRequest()->getParam('back','index'),array('id'=>$post->getId()));
    }

    public function deleteAction()
    {
        $block = Mage::getModel('grid/posts')
            ->setId($this->getRequest()->getParam('id'))
            ->delete();
        if($block->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Post was deleted successfully!');
        }
        $this->_redirect('*/*/');

    }







}