<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class Wellnesscenter_Option_Type_Form_Builder_Item_Text extends FW_Option_Type_Form_Builder_Item {
	public function get_type() {
		return 'text';
	}

	private function get_uri( $append = '' ) {
		return fw_get_framework_directory_uri( '/extensions/forms/includes/option-types/' . $this->get_builder_type() . '/items/' . $this->get_type() . $append );
	}

	public function get_thumbnails() {
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add a Single Line Text', 'wellnesscenter' ) . '">' .
					'<div class="item-type-icon"><img src="' . esc_url( $this->get_uri( '/static/images/icon.png' ) ) . '" /></div>' .
					'<div class="item-type-title">' . __( 'Single Line Text', 'wellnesscenter' ) . '</div>' .
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
					'item_title'      => __( 'Single Line Text', 'wellnesscenter' ),
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
								'value' => __( 'Single Line Text', 'wellnesscenter' ),
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
							'placeholder' => array(
								'type'  => 'text',
								'label' => __( 'Placeholder', 'wellnesscenter' ),
								'desc'  => __( 'This text will be used as field placeholder', 'wellnesscenter' ),
							)
						),
						array(
							'default_value' => array(
								'type'  => 'text',
								'label' => __( 'Default Value', 'wellnesscenter' ),
								'desc'  => __( 'This text will be used as field default value', 'wellnesscenter' ),
							)
						)
					)
				)
			),
			array(
				'g3' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'constraints' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'value'   => array(
									'constraint' => 'characters',
								),
								'picker'  => array(
									'constraint' => array(
										'label'   => __( 'Restrictions', 'wellnesscenter' ),
										'desc'    => __( 'Set characters or words restrictions for this field', 'wellnesscenter' ),
										'type'    => 'radio',
										'inline'  => true,
										'choices' => array(
											'characters' => __( 'Characters', 'wellnesscenter' ),
											'words'      => __( 'Words', 'wellnesscenter' )
										),
									)
								),
								'choices' => array(
									'characters' => array(
										'min' => array(
											'type'  => 'short-text',
											'label' => __( 'Min', 'wellnesscenter' ),
											'desc'  => __( 'Minim value', 'wellnesscenter' ),
											'value' => 0
										),
										'max' => array(
											'type'  => 'short-text',
											'label' => __( 'Max', 'wellnesscenter' ),
											'desc'  => __( 'Maxim value', 'wellnesscenter' ),
											'value' => ''
										),
									),
									'words'      => array(
										'min' => array(
											'type'  => 'short-text',
											'label' => __( 'Min', 'wellnesscenter' ),
											'desc'  => __( 'Minim value', 'wellnesscenter' ),
											'value' => 0
										),
										'max' => array(
											'type'  => 'short-text',
											'label' => __( 'Max', 'wellnesscenter' ),
											'desc'  => __( 'Maxim value', 'wellnesscenter' ),
											'value' => ''
										),
									),
								),
							)
						),
					)
				)
			),
			array(
				'g4' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'info' => array(
								'type'  => 'textarea',
								'label' => __( 'Instructions for Users', 'wellnesscenter' ),
								'desc'  => __( 'The users will see these instructions in the tooltip near the field',
									'wellnesscenter' ),
							)
						),
					)
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

		{
			$constraints = $attributes['options']['constraints'];

			if ( ! empty( $constraints['constraint'] ) ) {
				$constraint      = $constraints['constraint'];
				$constraint_data = $constraints[ $constraint ];

				switch ( $constraint ) {
					case 'characters':
					case 'words':
						if ( ! empty( $constraint_data['min'] ) ) {
							$constraint_data['min'] = intval( $constraint_data['min'] );

							if ( $constraint_data['min'] < 0 ) {
								$constraint_data['min'] = 0;
							}
						}

						if ( ! empty( $constraint_data['max'] ) ) {
							$constraint_data['max'] = intval( $constraint_data['max'] );

							if ( $constraint_data['max'] < 0 || $constraint_data['max'] < $constraint_data['min'] ) {
								$constraint_data['max'] = null;
							}
						}
						break;
					default:
						trigger_error( 'Invalid constraint: ' . $constraint, E_USER_WARNING );
						$attributes['options']['constraints']['constraint'] = '';
				}

				$attributes['options']['constraints'][ $constraint ] = $constraint_data;
			}
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

		// prepare attributes
		{
			$attr = array(
				'type'        => 'text',
				'name'        => $item['shortcode'],
				'placeholder' => $options['placeholder'],
				'value'       => is_null( $input_value ) ? $options['default_value'] : $input_value,
				'id'          => 'id-' . fw_unique_increment(),
			);

			if ( $options['required'] ) {
				$attr['required'] = 'required';
			}

			if ( ! empty( $options['constraints']['constraint'] ) ) {
				$constraint      = $options['constraints']['constraint'];
				$constraint_data = $options['constraints'][ $constraint ];

				switch ( $constraint ) {
					case 'characters':
					case 'words':
						if ( $constraint_data['min'] || $constraint_data['max'] ) {
							$attr['data-constraint'] = json_encode( array(
								'type' => $constraint,
								'data' => $constraint_data
							) );
						}

						if ( $constraint == 'characters' && $constraint_data['max'] ) {
							$attr['maxlength'] = $constraint_data['max'];
						}
						break;
					default:
						trigger_error( 'Unknown constraint: ' . $constraint, E_USER_WARNING );
				}
			}
		}

		return fw_render_view(
			$this->locate_path( '/views/view.php', dirname( __FILE__ ) . '/view.php' ),
			array(
				'item' => $item,
				'attr' => $attr,
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_validate( array $item, $input_value ) {
		$options = $item['options'];

		$messages = array(
			'required'                => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field is required', 'wellnesscenter' )
			),
			'characters_min_singular' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d character', 'wellnesscenter' )
			),
			'characters_min_plural'   => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d characters', 'wellnesscenter' )
			),
			'characters_max_singular' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d character', 'wellnesscenter' )
			),
			'characters_max_plural'   => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d characters', 'wellnesscenter' )
			),
			'words_min_singular'      => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d word', 'wellnesscenter' )
			),
			'words_min_plural'        => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d words', 'wellnesscenter' )
			),
			'words_max_singular'      => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d word', 'wellnesscenter' )
			),
			'words_max_plural'        => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d words', 'wellnesscenter' )
			),
		);

		if ( $options['required'] && ! fw_strlen( trim( $input_value ) ) ) {
			return $messages['required'];
		}

		$length = fw_strlen( $input_value );

		if ( $length && ! empty( $options['constraints']['constraint'] ) ) {
			$constraint      = $options['constraints']['constraint'];
			$constraint_data = $options['constraints'][ $constraint ];

			switch ( $constraint ) {
				case 'characters':
					if ( $constraint_data['min'] && $length < $constraint_data['min'] ) {
						return sprintf( $messages[ 'characters_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['min']
						);
					}
					if ( $constraint_data['max'] && $length > $constraint_data['max'] ) {
						return sprintf( $messages[ 'characters_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['max']
						);
					}
					break;
				case 'words':
					$words_length = count( preg_split( '/\s+/', $input_value ) );

					if ( $constraint_data['min'] && $words_length < $constraint_data['min'] ) {
						return sprintf( $messages[ 'words_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['min']
						);
					}
					if ( $constraint_data['max'] && $words_length > $constraint_data['max'] ) {
						return sprintf( $messages[ 'words_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['max']
						);
					}
					break;
				default:
					return 'Unknown constraint: ' . $constraint;
			}
		}
	}
}

FW_Option_Type_Builder::register_item_type( 'Wellnesscenter_Option_Type_Form_Builder_Item_Text' );
