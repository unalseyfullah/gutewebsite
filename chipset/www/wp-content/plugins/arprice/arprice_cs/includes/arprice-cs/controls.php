<?php

/**
 * Element Controls: ARPrice
 */
global $wpdb;
$tablename = $wpdb->prefix . 'arp_arprice';
$query = "SELECT ID,table_name FROM `{$tablename}` WHERE is_template = '0'";

$results = $wpdb->get_results($query);

$tables = array();

$tables[0]['value'] = '';
$tables[0]['label'] = __('Please Select Pricing Table', ARP_PT_TXTDOMAIN);

if (!empty($results)) {
    $n = 1;
    foreach ($results as $key => $table) {
        $tables[$n]['value'] = $table->ID;
        $tables[$n]['label'] = $table->table_name . ' [' . $table->ID . ']';
        $n++;
    }
}

$arprice_cs_control = array();

$arprice_cs_control['arprice_templates'] = array(
    'type' => 'select',
    'ui' => array(
        'title' => __('Select Pricing Table', ARP_PT_TXTDOMAIN)
    ),
    'options' => array(
        'choices' => $tables
    )
);

return $arprice_cs_control;
