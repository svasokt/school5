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

    /**
     * Method for forming Url in AccountController
     *
     * @param $route
     * @return string
     */
    public function getMyUrl($route)
    {
        $route = strstr($route, 'custo', true);
        return $route;
    }

    /**
     * Get placeholder url for template
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return "/media/catalog/category/person-placeholder.jpg";
    }

    /**
     * Get part for forming Url in block Edit.php
     *
     * @return string
     */
    public function getPartImageUrl()
    {
        return "/media/customer";
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

    /**
     * Change array from multi select into string
     *
     * @param $array
     * @return string
     */
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
