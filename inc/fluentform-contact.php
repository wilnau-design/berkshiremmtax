<?php
/**
 * Fluent Forms contact form integration.
 *
 * @package BMM_Tax
 */

/**
 * Get the BMM Tax contact form ID.
 *
 * @return int
 */
function bmm_tax_contact_form_id() {
	return (int) get_option( 'bmm_tax_contact_form_id', 0 );
}

/**
 * Build a Fluent Forms field definition.
 *
 * @param int    $index       Field index.
 * @param string $element     Field element type.
 * @param string $name        Field name attribute.
 * @param string $label       Field label.
 * @param string $placeholder Field placeholder.
 * @param bool   $required    Whether the field is required.
 * @return array
 */
function bmm_tax_contact_form_field( $index, $element, $name, $label, $placeholder, $required = false ) {
	$field = array(
		'index'          => $index,
		'element'        => $element,
		'attributes'     => array(
			'name'        => $name,
			'value'       => '',
			'id'          => '',
			'class'       => '',
			'placeholder' => $placeholder,
		),
		'settings'       => array(
			'container_class'    => 'bmm-form__field',
			'label'              => $label,
			'label_placement'    => '',
			'admin_field_label'  => $label,
			'help_message'       => '',
			'validation_rules'   => array(
				'required' => array(
					'value'   => $required,
					'message' => __( 'This field is required.', 'bmm-tax' ),
					'global'  => true,
				),
			),
			'conditional_logics' => array(
				'type'       => 'any',
				'status'     => false,
				'conditions' => array(
					array(
						'field'    => '',
						'value'    => '',
						'operator' => '',
					),
				),
			),
		),
		'editor_options' => array(
			'title'      => $label,
			'icon_class' => 'textarea' === $element ? 'ff-edit-textarea' : ( 'input_email' === $element ? 'ff-edit-email' : 'ff-edit-text' ),
			'template'   => 'textarea' === $element ? 'inputTextarea' : 'inputText',
		),
		'uniqElKey'      => 'el_' . wp_unique_id(),
	);

	if ( 'input_email' === $element ) {
		$field['attributes']['type'] = 'email';
		$field['settings']['validation_rules']['email'] = array(
			'value'   => true,
			'message' => __( 'Please enter a valid email address.', 'bmm-tax' ),
			'global'  => true,
		);
	} elseif ( 'textarea' === $element ) {
		$field['attributes']['rows'] = 5;
		$field['attributes']['cols'] = 2;
	} else {
		$field['attributes']['type'] = 'text';
	}

	return $field;
}

/**
 * Create the contact form in Fluent Forms if it does not exist.
 */
function bmm_tax_ensure_contact_form() {
	if ( ! function_exists( 'wpFluentForm' ) || ! class_exists( '\FluentForm\App\Models\Form' ) ) {
		return;
	}

	$form_id = bmm_tax_contact_form_id();

	if ( $form_id && wpFluent()->table( 'fluentform_forms' )->find( $form_id ) ) {
		return;
	}

	$existing = wpFluent()->table( 'fluentform_forms' )->where( 'title', 'BMM Tax Contact' )->first();
	if ( $existing ) {
		update_option( 'bmm_tax_contact_form_id', (int) $existing->id, false );
		return;
	}

	try {
		$custom_form = \FluentForm\App\Models\Form::resolvePredefinedForm(
			array(
				'type'       => 'form',
				'predefined' => 'blank_form',
			)
		);
	} catch ( Exception $e ) {
		return;
	}

	$fields = json_decode( $custom_form['form_fields'], true );

	$fields['fields'] = array(
		bmm_tax_contact_form_field( 0, 'input_text', 'name', __( 'Name', 'bmm-tax' ), __( 'Your name…', 'bmm-tax' ), true ),
		bmm_tax_contact_form_field( 1, 'input_email', 'email', __( 'Email', 'bmm-tax' ), __( 'Your email…', 'bmm-tax' ), true ),
		bmm_tax_contact_form_field( 2, 'input_text', 'phone', __( 'Phone', 'bmm-tax' ), __( 'Your phone…', 'bmm-tax' ), false ),
		bmm_tax_contact_form_field( 3, 'textarea', 'message', __( 'Message', 'bmm-tax' ), __( 'Your message…', 'bmm-tax' ), true ),
	);

	$fields['submitButton']['settings']['container_class'] = 'bmm-form__submit';
	$fields['submitButton']['settings']['button_ui']['text'] = __( 'SUBMIT', 'bmm-tax' );
	$fields['submitButton']['settings']['align']             = 'left';

	$custom_form['title']        = 'BMM Tax Contact';
	$custom_form['form_fields']  = wp_json_encode( $fields );
	$custom_form['has_payment']  = 0;
	$custom_form['type']         = 'form';

	$data = \FluentForm\App\Models\Form::prepare( $custom_form );
	$form = \FluentForm\App\Models\Form::create( $data );

	$form_meta = \FluentForm\App\Models\FormMeta::prepare(
		array(
			'type'       => 'form',
			'predefined' => 'blank_form',
		),
		$custom_form
	);

	$form_settings = \FluentForm\App\Models\Form::getFormsDefaultSettings( $form->id );
	$form_settings['confirmation']['messageToShow']        = __( 'Thank you! Your message has been sent.', 'bmm-tax' );
	$form_settings['confirmation']['samePageFormBehavior'] = 'hide_form';

	foreach ( $form_meta as $index => $meta ) {
		if ( 'formSettings' === $meta['meta_key'] ) {
			$form_meta[ $index ]['value'] = wp_json_encode( $form_settings );
			break;
		}
	}

	\FluentForm\App\Models\FormMeta::store( $form, $form_meta );

	\FluentForm\App\Helpers\Helper::setFormMeta( $form->id, '_ff_selected_style', 'ffs_inherit_theme' );
	\FluentForm\App\Helpers\Helper::setFormMeta( $form->id, '_primary_email_field', 'email' );

	update_option( 'bmm_tax_contact_form_id', (int) $form->id, false );

	do_action( 'fluentform/inserted_new_form', $form->id, $data );
}
add_action( 'init', 'bmm_tax_ensure_contact_form', 20 );

/**
 * Render the contact form.
 */
function bmm_tax_render_contact_form() {
	$form_id = bmm_tax_contact_form_id();

	if ( ! $form_id || ! function_exists( 'wpFluentForm' ) ) {
		echo '<p class="contact-notice contact-notice--error">' . esc_html__( 'The contact form is unavailable. Please try again later.', 'bmm-tax' ) . '</p>';
		return;
	}

	echo do_shortcode(
		sprintf(
			'[fluentform id="%1$d" css_classes="bmm-form" theme="ffs_inherit_theme"]',
			$form_id
		)
	);
}

/**
 * Style the submit button to match the theme.
 *
 * @param array    $data Field data.
 * @param stdClass $form Form object.
 * @return array
 */
function bmm_tax_fluentform_submit_button_data( $data, $form ) {
	if ( (int) $form->id !== bmm_tax_contact_form_id() ) {
		return $data;
	}

	$data['attributes']['class'] = trim( ( $data['attributes']['class'] ?? '' ) . ' wp-element-button bmm-button bmm-button--primary' );
	$data['settings']['container_class'] = 'bmm-form__submit';

	return $data;
}
add_filter( 'fluentform/rendering_field_data_button', 'bmm_tax_fluentform_submit_button_data', 10, 2 );

/**
 * Add the arrow icon to the submit button markup.
 *
 * @param string   $html Button HTML.
 * @param array    $data Field data.
 * @param stdClass $form Form object.
 * @return string
 */
function bmm_tax_fluentform_submit_button_html( $html, $data, $form ) {
	if ( (int) $form->id !== bmm_tax_contact_form_id() ) {
		return $html;
	}

	$button_text = esc_html__( 'SUBMIT', 'bmm-tax' );
	$arrow       = bmm_tax_arrow_icon();

	return (string) preg_replace(
		'/<button([^>]*)>.*?<\/button>/s',
		'<button$1><span>' . $button_text . '</span>' . $arrow . '</button>',
		$html,
		1
	);
}
add_filter( 'fluentform/rendering_field_html_button', 'bmm_tax_fluentform_submit_button_html', 10, 3 );

/**
 * Keep Fluent Forms default styles from overriding the theme form styles.
 *
 * @param bool     $load    Whether to load default styles.
 * @param stdClass $form    Form object.
 * @param int      $post_id Post ID.
 * @return bool
 */
function bmm_tax_fluentform_disable_default_styles( $load, $form, $post_id ) {
	unset( $post_id );

	if ( isset( $form->id ) && (int) $form->id === bmm_tax_contact_form_id() ) {
		return false;
	}

	return $load;
}
add_filter( 'fluentform/load_default_public', 'bmm_tax_fluentform_disable_default_styles', 10, 3 );

/**
 * Style Fluent Forms success messages like theme notices.
 *
 * @param string   $message   Confirmation message.
 * @param int      $insert_id Submission ID.
 * @param array    $form_data Submitted data.
 * @param stdClass $form      Form object.
 * @return string
 */
function bmm_tax_fluentform_success_message( $message, $insert_id, $form_data, $form ) {
	unset( $insert_id, $form_data );

	if ( (int) $form->id !== bmm_tax_contact_form_id() ) {
		return $message;
	}

	return '<p class="contact-notice contact-notice--success">' . wp_kses_post( $message ) . '</p>';
}
add_filter( 'fluentform/submission_message_parse', 'bmm_tax_fluentform_success_message', 10, 4 );
