<?php

/**
 * Element Definition: "ARPrice_CS"
 */
class ARPrice_CS {

    public function ui() {
        return array(
            'title' => __('AR-PRICE', ARP_PT_TXTDOMAIN),
            'autofocus' => array(
                'heading' => 'h4.arprice-cs-heading',
                'content' => '.arprice-cs'
            ),
            'icon_group' => 'AR-PRICE'
        );
    }

    public function update_build_shortcode_atts($atts) {

        // This allows us to manipulate attributes that will be assigned to the shortcode
        // Here we will inject a background-color into the style attribute which is
        // already present for inline user styles
        if (!isset($atts['style'])) {
            $atts['style'] = '';
        }


        if (isset($atts['background_color'])) {
            $atts['style'] .= ' background-color: ' . $atts['background_color'] . ';';
            unset($atts['background_color']);
        }

        return $atts;
    }

}
