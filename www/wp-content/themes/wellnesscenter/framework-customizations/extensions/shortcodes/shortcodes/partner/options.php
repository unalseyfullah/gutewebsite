<?php

if (!defined('FW'))
    die('Forbidden');

$options = array(
    'partner_img' => array(
        'label' => __('Partner Image', 'wellnesscenter'),
        'type' => 'upload',
    ),
    'partner_link' => array(
        'label' => __('Partner Link', 'wellnesscenter'),
        'desc' => __('if you want you can use partner link also. or just Leave it blank', 'wellnesscenter'),
        'type' => 'text',
    ),
);
