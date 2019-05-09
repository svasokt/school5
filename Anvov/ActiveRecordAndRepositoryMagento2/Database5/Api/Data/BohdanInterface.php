<?php
/**
 * Training Database5 API
 *
 * @category Training
 * @package Trainig_Database3
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Api\Data;

interface BohdanInterface
{
    const ID = "entity_id";
    const NAME = "name";
    const ADDRESS = "address";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const PHONE_NUMBER = "phone_number";

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param  string $name
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setName($name);

    /**
     * @param  string $status
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setStatus($status);

    /**
     * @param  string $phoneNumber
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * @param  string $address
     * @return \Training\Database5\Api\Data\BohdanInterface
     */
    public function setAddress($address);
}


