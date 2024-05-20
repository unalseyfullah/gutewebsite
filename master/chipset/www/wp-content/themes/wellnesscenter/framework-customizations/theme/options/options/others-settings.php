<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'others_settings' => array(
        'title' => __('Advanced Settings', 'wellnesscenter'),
        'type' => 'tab',
        'options' => array(
            'mailchimp-box' => array(
                'title' => __('Mailchimp Settings', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'mailchimp_api' => array(
                        'type' => 'text',
                        'label' => __( 'Mailchimp API key', 'wellnesscenter' ),
                        'desc' => __( 'logging in at www.MailChimp.com From the top, right menu, select Account, Extras, API Keys & Authorized Apps. Your API Key will be listed in the table labeled Your API Keys', 'wellnesscenter' ),
                        'value' => __( 'b714582d55c439ece1f49cb8d167c4b9-us3', 'wellnesscenter' ),
                    ),
                    'mailchimp_id' => array(
                        'type' => 'text',
                        'label' => __( 'Mailchimp ID', 'wellnesscenter' ),
                        'desc' => __( 'When viewing your MailChimp Lists, select the list you wish to offer user sign-up, then click the word "Settings". Your list id will be in the bottom field of the resulting page.', 'wellnesscenter' ),
                        'value' => __( 'f84fe4d84c', 'wellnesscenter' ),
                    )
                )
            ),
            'action-box' => array(
                'title' => __('Menu Action Button', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'use_action_button' => array(
                        'type' => 'multi-picker',
                        'label' => false,
                        'desc' => false,
                        'picker' => array(
                            'action_show' => array(
                                'label' => __( 'Show Action Button on menu ?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'true',
                                    'label' => __( 'yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'false',
                                    'label' => __( 'no', 'wellnesscenter' )
                                ),
                                'value' => 'true',
                                'desc' => __( 'Add an eye candy action button (Appoientment menu) to top menu bar to boost your Business.', 'wellnesscenter' ),
                            )
                        ),
                        'choices' => array(
                            'true' => array(
                                'action_text' => array(
                                    'type' => 'text',
                                    'label' => __( 'Button Text', 'wellnesscenter' ),
                                    'desc' => __( 'Button text.', 'wellnesscenter' ),
                                    'value' => __( 'Request an Appointment', 'wellnesscenter' ),
                                ),
                                'use_popup_form' => array(
                                    'type' => 'multi-picker',
                                    'label' => false,
                                    'desc' => false,
                                    'picker' => array(
                                        'action_form' => array(
                                            'label' => __( 'Pop-up Form', 'wellnesscenter' ),
                                            'type' => 'switch',
                                            'right-choice' => array(
                                                'value' => 'true',
                                                'label' => __( 'yes', 'wellnesscenter' )
                                            ),
                                            'left-choice' => array(
                                                'value' => 'false',
                                                'label' => __( 'no', 'wellnesscenter' )
                                            ),
                                            'value' => 'true',
                                            'desc' => __( 'Use pop-up submition form?', 'wellnesscenter' ),
                                        )
                                    ),
                                    'choices' => array(
                                        'false' => array(
                                            'action_url' => array(
                                                'type' => 'text',
                                                'label' => __( 'Button URL', 'wellnesscenter' ),
                                                'desc' => __( 'Link address for the button. Please don\'t forget to add <strong>http://</strong>', 'wellnesscenter' ),
                                                'value' => __( '#', 'wellnesscenter' ),
                                            )
                                        ),
                                        'true' => array()
                                    ),
                                    'show_borders' => false,
                                ),
                            ),
                            'false' => array()
                        ),
                        'show_borders' => false,
                    ),
                ),
            ),
            'popup-box' => array(
                'title' => __('Appoientment Pop-up Form', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'booking_method' => array(
                        'label' => __('Appoientment submission system', 'wellnesscenter'),
                        'desc' => __('Select the plugin to be used for appoientment submission.', 'wellnesscenter'),
                        'attr' => array('class' => 'fw-checkbox-float-left'),
                        'type' => 'radio',
                        'choices' => array(
                            'vfb' => __('Form Builder', 'wellnesscenter'),
                            'booked' => __('Booked', 'wellnesscenter'),
                        ),
                        'value' => 'vfb'
                    ),
                    'modal_title' => array(
                        'type' => 'text',
                        'label' => __( 'Form title', 'wellnesscenter' ),
                        'value' => __( 'Request an Appointment', 'wellnesscenter' ),
                    ),
                    'modal_sub_title' => array(
                        'type' => 'text',
                        'label' => __( 'Form sub-tile', 'wellnesscenter' ),
                        'value' => __( 'Upon completing this booking, you will receive a booking confirmation!', 'wellnesscenter' ),
                    ),
                    'booking_success_text' => array(
                        'type' => 'text',
                        'label' => __( 'Submission success message', 'wellnesscenter' ),
                        'value' => __( 'Your information was successfully submitted.', 'wellnesscenter' ),
                    )
                )
            ),
        ),
    ),
);

// latitude and longitude