<?php
/**
 * Training Database5 collection
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Model\ResourceModel\Bohdan;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Database5\Model\Bohdan;
use Training\Database5\Model\ResourceModel\Bohdan as BohdanResourceModel;

/**
 * @codeCoverageIgnore
 */
class Collection extends AbstractCollection
{
    /**
     * Added for \Training\CustomAdmin\Controller\Adminhtml\Member\MassDelete
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * creates collection of data from table bohdan
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(Bohdan::class, BohdanResourceModel::class);
    }
}