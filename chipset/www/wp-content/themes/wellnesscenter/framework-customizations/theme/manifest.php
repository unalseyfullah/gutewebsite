<?php

if (!defined('FW')) {
    die('Forbidden');
}

$manifest = array();

$manifest['name'] = __('WellnessCenter', 'wellnesscenter');
$manifest['uri'] = 'http://themeforest.com/user/XpeedStudio';
$manifest['description'] = WELLNESSCENTER_THEME;
$manifest['version'] = '1.4';
$manifest['author'] = 'XpeedStudio';
$manifest['author_uri'] = 'http://themeforest.com/user/XpeedStudio';
$manifest['requirements'] = array(
    'wordpress' => array(
        'min_version' => '4.1',
    /* 'max_version' => '4.99.9' */
    ),
);

$manifest['id'] = 'scratch';

$manifest['supported_extensions'] = array(
    'page-builder' => array(),
    'seo' => array(),
    'backups' => array(),
    'forms' => array(),
    'mailer' => array(),
    'analytics' => array(),
//    'translation' => array(),
    'megamenu' => array(),
);
