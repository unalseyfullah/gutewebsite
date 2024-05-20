<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class Wellnesscenter_Option_Type_Form_Builder_Item_Select extends FW_Option_Type_Form_Builder_Item {
	public function get_type() {
		return 'select';
	}

	private function get_uri( $append = '' ) {
		return fw_get_framework_directory_uri( '/extensions/forms/includes/option-types/' . $this->get_builder_type() . '/items/' . $this->get_type() . $append );
	}

	public function get_thumbnails() {
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add a Dropdown', 'wellnesscenter' ) . '">' .
					'<div class="item-type-icon">' .
					'<img src="' . esc_url( $this->get_uri( '/static/images/icon.png' ) ) . '" />' .
					'</div>' .
					'<div class="item-type-title">' . __( 'Dropdown', 'wellnesscenter' ) . '</div>' .
					'</div>'
			)
		);
	}

	public function enqueue_static() {
		wp_enqueue_style(
			'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
			$this->get_uri( '/static/css/styles.css' )
		);

		wp_enqueue_script(
			'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
			$this->get_uri( '/static/js/scripts.js' ),
			array(
				'fw-events',
			),
			false,
			true
		);

		wp_localize_script(
			'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
			'fw_form_builder_item_type_' . $this->get_type(),
			array(
				'l10n'     => array(
					'item_title'      => __( 'Dropdown', 'wellnesscenter' ),
					'label'           => __( 'Label', 'wellnesscenter' ),
					'toggle_required' => __( 'Toggle mandatory field', 'wellnesscenter' ),
					'edit'            => __( 'Edit', 'wellnesscenter' ),
					'delete'          => __( 'Delete', 'wellnesscenter' ),
					'edit_label'      => __( 'Edit Label', 'wellnesscenter' ),
				),
				'options'  => $this->get_options(),
				'defaults' => array(
					'type'    => $this->get_type(),
					'width'   => fw_ext( 'forms' )->get_config( 'items/width' ),
					'options' => fw_get_options_values_from_input( $this->get_options(), array() )
				)
			)
		);

		fw()->backend->enqueue_options_static( $this->get_options() );
	}

	private function get_options() {
		return array(
			array(
				'g1' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'label' => array(
								'type'  => 'text',
								'label' => __( 'Label', 'wellnesscenter' ),
								'desc'  => __( 'Enter field label ( ite will be displayed on the web site )', 'wellnesscenter' ),
								'value' => __( 'Dropdown', 'wellnesscenter' ),
							)
						),
						array(
							'required' => array(
								'type'  => 'switch',
								'label' => __( 'Mandatory Field', 'wellnesscenter' ),
								'desc'  => __( 'Make this field mandatory?', 'wellnesscenter' ),
								'value' => true,
							)
						),
					)
				)
			),
			array(
				'g2' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'choices' => array(
								'type'   => 'addable-option',
								'label'  => __( 'Choices', 'wellnesscenter' ),
								'desc'   => __( 'Add choice', 'wellnesscenter' ),
								'option' => array(
									'type' => 'text',
								),
							)
						),
						array(
							'randomize' => array(
								'type'  => 'switch',
								'label' => __( 'Randomize', 'wellnesscenter' ),
								'desc'  => __( 'Do you want choices to be displayed in random order?', 'wellnesscenter' ),
								'value' => false,
							)
						),
					)
				)
			),
			array(
				'info' => array(
					'type'  => 'textarea',
					'label' => __( 'Instructions for Users', 'wellnesscenter' ),
					'desc'  => __( 'The users will see these instructions in the tooltip near the field', 'wellnesscenter' ),
				)
			),
		);
	}

	protected function get_fixed_attributes( $attributes ) {
		// do not allow sub items
		unset( $attributes['_items'] );

		$default_attributes = array(
			'type'      => $this->get_type(),
			'shortcode' => false, // the builder will generate new shortcode if this value will be empty()
			'width'     => '',
			'options'   => array()
		);

		// remove unknown attributes
		$attributes = array_intersect_key( $attributes, $default_attributes );

		$attributes = array_merge( $default_attributes, $attributes );

		/**
		 * Fix $attributes['options']
		 * Run the _get_value_from_input() method for each option
		 */
		{
			$only_options = array();

			foreach ( fw_extract_only_options( $this->get_options() ) as $option_id => $option ) {
				if ( array_key_exists( $option_id, $attributes['options'] ) ) {
					$option['value'] = $attributes['options'][ $option_id ];
				}
				$only_options[ $option_id ] = $option;
			}

			$attributes['options'] = fw_get_options_values_from_input( $only_options, array() );

			unset( $only_options, $option_id, $option );
		}

		if ( empty( $attributes['options']['choices'] ) ) {
			$attributes['options']['choices'][] = __( 'Dropdown', 'wellnesscenter' );
		}

		return $attributes;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_value_from_attributes( $attributes ) {
		return $this->get_fixed_attributes( $attributes );
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_render( array $item, $input_value ) {
		$options = $item['options'];

		$value = (string) $input_value;

		// prepare choices
		{
			$choices = array();

			foreach ( $options['choices'] as $choice ) {
				$attr = array(
					'value' => $choice,
				);

				if ( $choice === $value ) {
					$attr['selected'] = 'selected';
				}

				$choices[] = $attr;
			}

			if ( $options['randomize'] ) {
				shuffle( $choices );
			}
		}

		return fw_render_view(
			$this->locate_path( '/views/view.php', dirname( __FILE__ ) . '/view.php' ),
			array(
				'item'    => $item,
				'choices' => $choices,
				'value'   => $value,
				'attr'    => array(
					'type' => 'select',
					'name' => $item['shortcode'],
					'id'   => 'id-' . fw_unique_increment(),
				),
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_validate( array $item, $input_value ) {
		$options = $item['options'];

		$messages = array(
			'required'            => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field is required', 'wellnesscenter' )
			),
			'not_existing_choice' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( '{label}: Submitted data contains not existing choice', 'wellnesscenter' )
			),
		);

		if ( empty( $options['choices'] ) ) {
			// the item was not displayed in frontend
			return;
		}

		if ( $options['required'] && empty( $input_value ) ) {
			return $messages['required'];
		}

		// check if has not existing choices
		if ( ! empty( $input_value ) && ! in_array( $input_value, $options['choices'] ) ) {
			return $messages['not_existing_choice'];
		}
	}
}

FW_Option_Type_Builder::register_item_type( 'Wellnesscenter_Option_Type_Form_Builder_Item_Select' );
