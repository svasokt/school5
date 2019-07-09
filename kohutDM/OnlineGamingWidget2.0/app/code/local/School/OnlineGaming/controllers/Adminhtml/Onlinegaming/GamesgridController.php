<?php
class School_OnlineGaming_Adminhtml_Onlinegaming_GamesgridController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('onlinegaming/games');
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_title($this->__("OnlineGaming Grid"));
        $this->_setActiveMenu('onlinegaming');
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('onlinegaming')
            ->_title($this->__('ONLINEGAMING GRID EDIT'))
            ->_addBreadcrumb($this->__('grid'), $this->__('grid'));
        return $this;
    }

    public function editAction()
    {
        $this->_initAction();
        // Get id if available
        $id  = $this->getRequest()->getParam('block_id');
        $model = Mage::getModel('onlinegaming/eavgames');
        if ($id) {
            // Load record
            $model->load($id);
            // Check if record is loaded
            if (!$model->getEntityId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This game no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        $this->_title($model->getEntityId() ? $model->getTitle() : $this->__('New GAME'));
        $data = Mage::getSingleton('adminhtml/session')->getData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        Mage::register('onlinegaming_gamesgrid', $model);
        $this//->_initAction()
            //->_addBreadcrumb($id ? $this->__('Edit GAME') : $this->__('New GAME'), $id ? $this->__('Edit GAME') : $this->__('New GAME'))
            ->_addContent($this->getLayout()
            ->createBlock('onlinegaming/adminhtml_gamesgrid_edit'))
            ->_addLeft($this->getLayout()->createBlock('onlinegaming/adminhtml_gamesgrid_edit_tabs'))
            ->renderLayout();
    }

    /**    public function editAction()
    {
        $id = $this->getRequest()->getParam('block_id');
        Mage::register('adminhtml_gamesgrid', Mage::getModel('onlinegaming/eavgames')->load($id));
        $this->loadLayout();
        $this->_title($this->__("OnlineGaming Grid Edit"));
        $this->_setActiveMenu('onlinegaming');
        $this->renderLayout();
    }**/

    /**
     * Save action
     */
    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {
            $data = $this->_filterPostData($data);
            //init model and set data
            $model = Mage::getModel('onlinegaming/eavgames');

            if ($id = $this->getRequest()->getParam('block_id')) {
                $model->load($id);
            }

            $model->setData($data);
            //die(print_r($data));

            Mage::dispatchEvent('onlinegaming_eavgames_prepare_save', array('eavgames' => $model, 'request' => $this->getRequest()));

            //validating
            if (!$this->_validatePostData($data)) {
                $this->_redirect('*/*/edit', array('block_id' => $model->getId(), '_current' => true));
                return;
            }

            if(isset($_FILES['picture']['name'])) {

                try {

                    $uploader = new Varien_File_Uploader('picture');

                    $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything

                    $uploader->setAllowRenameFiles(false);

                    $uploader->setFilesDispersion(false);

                    $path = Mage::getBaseDir('media') . '/school';

                    $uploader->save($path, $_FILES['picture']['name']);

                    $data['picture'] =$path. $_FILES['picture']['name'];

                    $model->setPicture('/media/school/' . $_FILES['picture']['name']);

                }catch(Exception $e) {
                }
            }

            // try to save it
            try {
                // save the data
                $model->save();
//                die(var_dump($model));
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('cms')->__('The game has been saved.'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('block_id' => $model->getId(), '_current'=>true));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/');
                 return;

            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
            catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('adminhtml')->__('An error occurred while saving the game.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('block_id' => $this->getRequest()->getParam('block_id')));
            return;
        }
        $this->_redirect('*/*/');
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('block_id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('onlinegaming/eavgames');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('admin')->__('The game has been deleted.'));
                // go to grid
                $this->_redirect('*/*/');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('block_id' => $id));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('admin')->__('Unable to find a game to delete.'));
        // go to grid
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $gamesIds = $this->getRequest()->getParam('onlinegaming');
        if(!is_array($gamesIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select game(s).'));
        } else {
            try {
                $game = Mage::getModel('onlinegaming/eavgames');
                foreach ($gamesIds as $gameId) {
                    $game
                        ->load($gameId)
                        ->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were deleted.', count($gamesIds))
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }

    public function exportCsvAction()
    {
        $fileName   = 'games.csv';
        $grid       = $this->getLayout()->createBlock('onlinegaming/adminhtml_gamesgrid_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $grid);
    }

    /**
     *  Export credit memo grid to Excel XML format
     */
    public function exportXmlAction()
    {
        $fileName   = 'games.xml';
        $grid       = $this->getLayout()->createBlock('onlinegaming/adminhtml_gamesgrid_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

    /**
     * Filtering posted data. Converting localized data if needed
     *
     * @param array
     * @return array
     */
    protected function _filterPostData($data)
    {
        $data = $this->_filterDates($data, array('custom_theme_from', 'custom_theme_to'));
        return $data;
    }

    protected function _validatePostData($data)
    {
        $errorNo = true;
        if (!empty($data['layout_update_xml']) || !empty($data['custom_layout_update_xml'])) {
            /** @var $validatorCustomLayout Mage_Adminhtml_Model_LayoutUpdate_Validator */
            $validatorCustomLayout = Mage::getModel('adminhtml/layoutUpdate_validator');
            if (!empty($data['layout_update_xml']) && !$validatorCustomLayout->isValid($data['layout_update_xml'])) {
                $errorNo = false;
            }
            if (!empty($data['custom_layout_update_xml'])
                && !$validatorCustomLayout->isValid($data['custom_layout_update_xml'])) {
                $errorNo = false;
            }
            foreach ($validatorCustomLayout->getMessages() as $message) {
                $this->_getSession()->addError($message);
            }
        }
        return $errorNo;
    }
}
