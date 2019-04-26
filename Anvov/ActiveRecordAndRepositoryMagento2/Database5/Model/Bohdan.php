<?php
/**
 * Training Database5 data install script
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Model;

use Magento\Framework\Model\AbstractModel;
use Training\Database5\Model\ResourceModel\Bohdan as BohdanResource;
use Training\Database5\Api\Data\BohdanInterface;

/**
 *
 */
class Bohdan extends AbstractModel implements BohdanInterface
{
    /**
     * Bohdan constructor.
     *
     * Model construct that should be used for object initialization
     * @return void
     */
    public function _construct()
    {
        $this->_init(BohdanResource::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(BohdanInterface::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(BohdanInterface::NAME);
    }


    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(BohdanInterface::STATUS);
    }


    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(BohdanInterface::ADDRESS);
    }


    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(BohdanInterface::PHONE_NUMBER);
    }


    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(BohdanInterface::CREATED_AT);
    }


    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(BohdanInterface::UPDATED_AT);
    }

    /**
     * @param  string $name
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setName($name)
    {
        return $this->setData(BohdanInterface::NAME, $name);
    }

    /**
     * @param  string $status
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setStatus($status)
    {
        return $this->setData(BohdanInterface::STATUS, $status);
    }

    /**
     * @param  string $phoneNumber
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->setData(BohdanInterface::PHONE_NUMBER, $phoneNumber);
    }

    /**
     * @param  string $address
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setAddress($address)
    {
        return $this->setData(BohdanInterface::ADDRESS, $address);
    }
}