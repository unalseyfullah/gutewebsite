<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'blog_settings' => array(
        'title' => __( 'Blog Settings', 'wellnesscenter' ),
        'type' => 'tab',
        'options' => array(
            'blog' => array(
                'title' => __( 'Blog Settings', 'wellnesscenter' ),
                'type' => 'box',
                'options' => array(
                    'blog_display_settings' => array(
                        'type' => 'multi',
                        'label' => false,
                        'attr' => array(
                            'class' => 'fw-option-type-multi-show-borders',
                        ),
                        'inner-options' => array(
                            'post_excerpt' => array(
                                'label' => __( 'Post Excerpt', 'wellnesscenter' ),
                                'desc' => __( 'Show post excerpt (short description) on archive?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'no',
                            ),
                            'post_date' => array(
                                'label' => __( 'Post Date', 'wellnesscenter' ),
                                'desc' => __( 'Show post date?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'yes',
                            ),
                            'post_author' => array(
                                'label' => __( 'Post Author', 'wellnesscenter' ),
                                'desc' => __( 'Show post author?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'yes',
                            ),
                            'author_desc' => array(
                                'label' => __( 'Author Description', 'wellnesscenter' ),
                                'desc' => __( 'Show author description on posts?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'no',
                            ),
                            'post_categories' => array(
                                'label' => __( 'Post Categories', 'wellnesscenter' ),
                                'desc' => __( 'Show post categories?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'yes',
                            ),
                            'post_comment' => array(
                                'label' => __( 'Post Comment', 'wellnesscenter' ),
                                'desc' => __( 'Show post Comment?', 'wellnesscenter' ),
                                'type' => 'switch',
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'wellnesscenter' )
                                ),
                                'left-choice' => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'wellnesscenter' )
                                ),
                                'value' => 'yes',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
