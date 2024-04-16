<?php

	if ( ! class_exists( 'FusionRedux_Validation_date' ) ) {
		class FusionRedux_Validation_date {

			public $parent;
			public $field;
			public $value;
			public $current;
			public $error;

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function __construct( $parent, $field, $value, $current ) {

				$this->parent       = $parent;
				$this->field        = $field;
				$this->field['msg'] = ( isset( $this->field['msg'] ) ) ? $this->field['msg'] : __( 'This field must be a valid date.', 'fusion-builder' );
				$this->value        = $value;
				$this->current      = $current;

				$this->validate();
			} //function

			/**
			 * Field Render Function.
			 * Takes the vars and outputs the HTML for the field in the settings
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function validate() {

				$string = str_replace( '/', '', $this->value );

				if ( ! is_numeric( $string ) ) {
					$this->value = ( isset( $this->current ) ) ? $this->current : '';
					$this->error = $this->field;

					return;
				}

				if ( $this->value[2] != '/' ) {
					$this->value = ( isset( $this->current ) ) ? $this->current : '';
					$this->error = $this->field;

					return;
				}

				if ( $this->value[5] != '/' ) {
					$this->value = ( isset( $this->current ) ) ? $this->current : '';
					$this->error = $this->field;
				}
			} //function
		} //class
	}
