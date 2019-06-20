<?php

require_once(dirname(__FILE__) . '/app/Mage.php');
Mage::init();

$client = new SoapClient('http://school5.loc/api/soap/?wsdl');
$name = 'soapVovk';
$password = '123456';
$session = $client->login($name, $password);
$resources = $client->resources( $session );
/** contactus_collection */
//$result = $client->call( $session, 'contactus_order.process');
/**  product info */
//$result = $client->call( $session, 'catalog_product.info', 907);
/**  product change price */
//$product_id = 907;
//$product_data = array( 'status' => 2, 'price' => 12 );
//$arguments = array( $product_id, $product_data );
//$result = $client->call( $session, 'catalog_product.update', $arguments);
/** set special price */
//$from_date = '01/12/'.date( 'Y' );
//$to_date = '31/12/'.date( 'Y' );
//$special_price = 14;
//$arguments = array( 907, $special_price, $from_date, $to_date );
//$result = $client->call( $session, 'catalog_product.setSpecialPrice', $arguments);
//$result = $client->call( $session, 'catalog_product.info', 907);
/** filters */
$filters = array( 'status' => 2 );
$result = $client->call( $session, 'catalog_product.list', array($filters) );

var_dump($result)
?>
<?php //if( is_array( $resources ) && !empty( $resources )) { ?>
<?php //foreach( $resources as $resource ) { ?>
<!--<h1>--><?php //echo $resource['title']; ?><!--</h1>-->
<!--Name: --><?php //echo $resource['name']; ?><!--<br/>-->
<!--Aliases: --><?php //echo implode( ',', $resource['aliases'] ); ?>
<!--<table>-->
<!--    <tr>-->
<!--        <th>Title</th>-->
<!--        <th>Path</th>-->
<!--        <th>Name</th>-->
<!--    </tr>-->
<!--    --><?php //foreach( $resource['methods'] as $method ) { ?>
<!--    <tr>-->
<!--        <td>--><?php //echo $method['title']; ?><!--</td>-->
<!--        <td>--><?php //echo $method['path']; ?><!--</td>-->
<!--        <td>--><?php //echo $method['name']; ?><!--</td>-->
<!--        <td>--><?php //echo implode( ',', $method['aliases'] ); ?><!--</td>-->
<!--    </tr>-->
<!--    --><?php //} ?>
<!--</table>-->
<?php //} ?>
<?php //} ?>