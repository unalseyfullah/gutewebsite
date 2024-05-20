<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function wellnesscenter_filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'calendar';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', 'wellnesscenter_filter_disable_shortcodes');