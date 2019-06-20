<?php
// Magento login information
$mage_url = 'http://m1.loc/api/soap?wsdl';
$mage_user = 'admin';
$mage_api_key = '123456789';

// Initialize the SOAP client
$soapClient = new SoapClient( $mage_url );

// Login to Magento
$session_id = $soapClient->login($mage_user, $mage_api_key);

//// Make the API-call
//$resources = $soapClient->resources( $session_id );
//?>
<?php //if( is_array( $resources ) && !empty( $resources )) { ?>
<!--    --><?php //foreach( $resources as $resource ) { ?>
<!--        <h1>--><?php //echo $resource['title']; ?><!--</h1>-->
<!--        Name: --><?php //echo $resource['name']; ?><!--<br/>-->
<!--        Aliases: --><?php //echo implode( ',', $resource['aliases'] ); ?>
<!--        <table border="1">-->
<!--            <tr>-->
<!--                <th>Title</th>-->
<!--                <th>Path</th>-->
<!--                <th>Name</th>-->
<!--                <th>Aliases</th>-->
<!--            </tr>-->
<!--            --><?php //foreach( $resource['methods'] as $method ) { ?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $method['title']; ?><!--</td>-->
<!--                    <td>--><?php //echo $method['path']; ?><!--</td>-->
<!--                    <td>--><?php //echo $method['name']; ?><!--</td>-->
<!--                    <td>--><?php //echo implode( ',', $method['aliases'] ); ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} ?>
<!--        </table>-->
<!--    --><?php //} ?>
<?php //} ?>
<?php

$result_1 = $soapClient->call($session_id, 'customer.info', 138);

var_dump($result_1);

$params = ['customerId' => '138', 'customerData' => ['middlename' => 'test_777', 'email' => 'test_777@mail.ru']];

$result_2 = $soapClient->call($session_id, 'customer.update', $params);

var_dump($result_2);

$result_3 = $soapClient->call($session_id, 'customer.info', 138);

var_dump($result_3);





