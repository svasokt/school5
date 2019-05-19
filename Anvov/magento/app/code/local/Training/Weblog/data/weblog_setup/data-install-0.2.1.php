<?php
$tickets = array(
    array(
        'title' => 'Broken cart',
        'post' => 'Unable to add items to cart.',
        'date' => '2019-05-18',
        'custom_value' => 'mister genialnist'
    ),
    array(
        'title' => 'Login issues',
        "post" => 'Cannot login when using IE.',
        'date' => '2019-05-17',
        'custom_value' => 'mister squared pants'
    ),
    array(
        'title' => 'Best decision',
        "post" => 'Alisa is never seen',
        'date' => '2019-05-17',
        'custom_value' => 'great job mister'
    ),
);

foreach ($tickets as $ticket) {
    Mage::getModel('weblog/blogpost')
        ->setData($ticket)
        ->save();
}