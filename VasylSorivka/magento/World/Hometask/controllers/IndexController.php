<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Contacts
 * @copyright  Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Contacts index controller
 *
 * @category   Mage
 * @package    Mage_Contacts
 * @author      Magento Core Team <core@magentocommerce.com>
 */
require_once Mage::getModuleDir('controllers', 'Mage_Contacts') . DS . 'IndexController.php';

class World_Hometask_IndexController extends Mage_Contacts_IndexController
{
    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        $collection = Mage::getModel('hometask/contactsus');
        $collection
            ->setData('name', $post['name'])
            ->setData('email', $post['email'])
            ->setData('telephone', $post['telephone'])
            ->setData('status', 0 )
            ->setData('comment', $post['comment']);
        $collection->save();
        $this->_redirect('*/*/');
    }
}


