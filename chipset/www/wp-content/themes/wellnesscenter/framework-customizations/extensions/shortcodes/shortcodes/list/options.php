<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'list_group' => array(
        'type' => 'group',
        'options' => array(
            'list_items' => array(
                'type' => 'addable-popup',
                'label' => __('List Items', 'wellnesscenter'),
                'desc' => __('Add list items', 'wellnesscenter'),
                'template' => '{{=item}}',
                'popup-options' => array(
                    'sublist_group' => array(
                        'type' => 'group',
                        'options' => array(
                            'item' => array(
                                'label' => __('Item', 'wellnesscenter'),
                                'desc' => __('Enter an item in list', 'wellnesscenter'),
                                'type' => 'text',
                            ),
                            'sublist_items' => array(
                                'type' => 'addable-popup',
                                'label' => __('Sublist Items', 'wellnesscenter'),
                                'desc' => __('Add sublist items', 'wellnesscenter'),
                                'template' => '{{=subitem}}',
                                'popup-options' => array(
                                    'subitem' => array(
                                        'label' => __('Sublist Item', 'wellnesscenter'),
                                        'desc' => __('Enter a sublist item', 'wellnesscenter'),
                                        'type' => 'text',
                                    ),
                                    'btn_link_group' => array(
                                        'type' => 'group',
                                        'options' => array(
                                            'link' => array(
                                                'label' => __('Link', 'wellnesscenter'),
                                                'desc' => __('you can add link if you want', 'wellnesscenter'),
                                                'type' => 'text',
                                            ),
                                            'target_subitem' => array(
                                                'type' => 'switch',
                                                'label' => __('', 'wellnesscenter'),
                                                'desc' => __('Open link in new window?', 'wellnesscenter'),
                                                'value' => '_self',
                                                'right-choice' => array(
                                                    'value' => '_blank',
                                                    'label' => __('Yes', 'wellnesscenter'),
                                                ),
                                                'left-choice' => array(
                                                    'value' => '_self',
                                                    'label' => __('No', 'wellnesscenter'),
                                                ),
                                            ),
                                        )
                                    ),
                                ),
                            ),
                        )
                    ),
                    'btn_link_group' => array(
                        'type' => 'group',
                        'options' => array(
                            'link' => array(
                                'label' => __('Link', 'wellnesscenter'),
                                'desc' => __('you can add link if you want', 'wellnesscenter'),
                                'type' => 'text',
                            ),
                            'target' => array(
                                'type' => 'switch',
                                'label' => __('', 'wellnesscenter'),
                                'desc' => __('Open link in new window?', 'wellnesscenter'),
                                'value' => '_self',
                                'right-choice' => array(
                                    'value' => '_blank',
                                    'label' => __('Yes', 'wellnesscenter'),
                                ),
                                'left-choice' => array(
                                    'value' => '_self',
                                    'label' => __('No', 'wellnesscenter'),
                                ),
                            ),
                        )
                    ),
                ),
            ),
            'separator' => array(
                'type' => 'switch',
                'label' => __('', 'wellnesscenter'),
                'desc' => __('Separate each list item by a line?', 'wellnesscenter'),
                'value' => '_self',
                'right-choice' => array(
                    'value' => 'list-bordered',
                    'label' => __('Yes', 'wellnesscenter'),
                ),
                'left-choice' => array(
                    'value' => '',
                    'label' => __('No', 'wellnesscenter'),
                ),
            ),
        )
    ),
    'list_type' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'selected_value' => array(
                'label' => __('Add Element', 'wellnesscenter'),
                'desc' => __('Make a numbered list or add an icon to list items', 'wellnesscenter'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'value' => 'list-default',
                'type' => 'radio',
                'choices' => array(
                    'list-default' => __('None', 'wellnesscenter'),
                    'list-numbers' => __('Number', 'wellnesscenter'),
                    'list-icon' => __('Icon', 'wellnesscenter'),
                ),
            )
        ),
        'choices' => array(
            'list-default' => array(),
            'list-numbers' => array(),
            'list-icon' => array(
                'icon' => array(
                    'type' => 'icon',
                    'label' => __('', 'wellnesscenter')
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
        'help' => __('You can use this class to further style this shortcode', 'wellnesscenter'),
    ),
);
