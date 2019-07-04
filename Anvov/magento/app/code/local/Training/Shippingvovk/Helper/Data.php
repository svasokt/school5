<?php

/**
 * Helper for shipping method
 *
 * @category    Training
 * @package     Training_Shippingvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Shippingvovk_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_EXPRESS_MAX_WEIGHT = 'carriers/training_shippingvovk/express_max_weight';

    public function getExpressMaxWeight()
    {

        return Mage::getStoreConfig(self::XML_EXPRESS_MAX_WEIGHT);
    }

}
