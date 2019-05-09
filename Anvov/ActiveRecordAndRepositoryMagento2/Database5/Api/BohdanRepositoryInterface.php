<?php
/**
 * Training Database5 API repository
 *
 * @category Training
 * @package Trainig_Database3
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Api;

interface BohdanRepositoryInterface
{
    /**
     * @return \Training\Database5\Api\Data\BohdanInterface [];
     */
    public function getList();

    /**
     * @param int $id
     * @return \Training\Database5\Api\Data\BohdanInterface [];
     */
    public function getBohdanMember($id);

    /**
     * @param \Training\Database5\Api\Data\BohdanInterface $member
     * @return \Training\Database5\Api\Data\BohdanInterface;
     */
    public function saveBohdanMember(\Training\Database5\Api\Data\BohdanInterface $member);
}


