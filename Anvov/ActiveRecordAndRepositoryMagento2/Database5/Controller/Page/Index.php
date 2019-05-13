<?php
/**
 * Training Database5 Controller\Page router.
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Training\Database5\Model\BohdanFactory;
use Training\Database5\Model\ResourceModel\Bohdan;

/**
 * Router action
 */
class Index extends Action
{
    /**
     * @var \Magento\Framework\Model\ActionValidator\RemoveAction
     */
    protected $bohdanFactory;

    /**
     * Constructor
     */
    public function __construct(Context $context, BohdanFactory $bohdanFactory)
    {
        $this->bohdanFactory = $bohdanFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Reqest will be added as operation argument in future
     * @return \Magento\Framework\Controller\ResultInterface\ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $bohdan = $this->bohdanFactory->create();

        /**
         * load data from db throughout controller
         *
         * code below works!
         */
//        $member = $bohdan->load(1);
//        $member->setAddress('new address');
//        $member->save();
//        var_dump($member->getData());

        /**
         * add new member to db throughout controller
         *
         * code below works!
         */
//        $bohdan->addData(['name'=>'Rand', 'address'=>'kyiv is a capital','status'=>true, 'phone_number'=>'769943456']);
//        $bohdan->save();

        /**
         * delete member  from db throughout controller
         *
         * code below works!
         */
//        $member = $bohdan->load(3);
//        $member->delete();

        /**
         * Collection from Db
         *
         * code below works!
         */
        $collection = $bohdan->getCollection()
        ->addFieldToSelect(['name','status']) /** selects only names from Db , if to delete this line then we have full selection */

            /**
             * selects only lines where column name  = Andriy
             * (eq - it is pattern and mandatory  We can use neq (!=) ex.  ['neq'=>'Andriy']  )
             */
        ->addFieldToFilter('name', ['eq'=>'Andriy']);
        foreach ($collection as $item) {
            print_r($item->getData());
            echo '</br>';
        }
    }
}