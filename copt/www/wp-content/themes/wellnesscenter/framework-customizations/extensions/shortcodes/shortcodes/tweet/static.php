<?php

if (!defined('FW'))
    die('Forbidden');

$shortcodes_extension = fw_ext( 'shortcodes' );
    wp_enqueue_script('wellnesscenter-tweetie', WELLNESSCENTER_SCRIPTS . '/tweetie.js', array('jquery'), WELLNESSCENTER_VERSION, true);
