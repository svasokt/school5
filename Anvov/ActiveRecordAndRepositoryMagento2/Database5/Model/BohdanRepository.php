<?php
/**
 * Training Database5 Model repository
 *
 * @category Training
 * @package Trainig_Database3
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Model;

use Training\Database5\Api\BohdanRepositoryInterface;
use Training\Database5\Model\ResourceModel\Bohdan\CollectionFactory;
use Training\Database5\Api\Data\BohdanInterface;
use Training\Database5\Model\ResourceModel\Bohdan;

class BohdanRepository implements BohdanRepositoryInterface
{
    /**
     * @var \Magento\Framework\Model\ActionValidator\RemoveAction
     */
    protected $bohdanFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var ResourceModel\
     */
    private $bohdan;

    /**
     * BohdanRepository constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory,
                                BohdanFactory $bohdanFactory,
                                Bohdan $bohdan)
    {
        $this->bohdanFactory = $bohdanFactory;
        $this->collectionFactory = $collectionFactory;
        $this->bohdan = $bohdan;
    }

    /**
     * @return \Training\Database5\Api\Data\BohdanInterface [];
     */
    public function getList()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getData();
    }

    /**
     * @param int $id
     * @return \Training\Database5\Api\Data\BohdanInterface [];
     */
    public function getBohdanMember($id)
    {
        $member = $this->bohdanFactory->create();
        return $member->load($id);
    }

    /**
     * @param \Training\Database5\Api\Data\BohdanInterface $member
     * @return \Training\Database5\Api\Data\BohdanInterface;
     */
    public function saveBohdanMember(BohdanInterface $member)
    {
        if($member->getId() == null) {
            $this->bohdan->save($member);
            return $member;
        }else {
            $newMember = $this->bohdanFactory->create()->load($member->getId());
            foreach ($member->getData() as $key => $value) {
                $newMember->setData($key, $value);
            }
            $this->bohdan->save($newMember);
            return $newMember;
        }
    }
}


