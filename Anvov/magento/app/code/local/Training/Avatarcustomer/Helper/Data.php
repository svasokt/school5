<?php

/**
 * Helper for extended functionality of customer page
 *
 * @category    Training
 * @package     Training_Avatarcustomer
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Avatarcustomer_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getMyUrl($route)
    {
        $route = strstr($route, 'custo', true);
        return $route;
    }

    public function getPlaceholder()
    {
        return "/media/customer/person-placeholder.jpg";
    }

    /**
     * Form server url to show image
     *
     * @param $url
     * @return string
     */
    public function getUrl($url)
    {
        $serverUrl = strstr($url, 'custo', true);

        return $serverUrl . "media/customer";
    }

    public function getMultiSelect($array)
    {
        $string = implode( ',' ,$array);

        return $string;
    }

    /**
     * To get new url for Image in CustomerController
     *
     * @param $url
     * @return string
     */
    public function getAdminPicUrl($url)
    {
        $newUrl =  $url;

        return $newUrl;
    }
}
