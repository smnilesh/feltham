<?php

class bt_bb_history extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {

		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'color_scheme'      => ''
		) ), $atts, $this->shortcode ) );
	
		wp_enqueue_script( 
			'bt_bb_history',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_history/bt_bb_history.js',
			array( 'jquery' ),
			'',
			true
		);

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $content . '</div>';
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
			
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'History', 'wheelco' ), 'description' => esc_html__( 'history container', 'wheelco' ), 'container' => 'vertical', 'auto_add' => 'bt_bb_history_year', 'show_settings_on_create' => false, 'accept' => array( 'bt_bb_history_year' => true ), 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'wheelco' ), 'value' => $color_scheme_arr, 'preview' => true 
			) )
		) );
	}
}