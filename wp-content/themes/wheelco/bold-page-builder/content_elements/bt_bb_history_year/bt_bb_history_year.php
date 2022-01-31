<?php

class bt_bb_history_year extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'title' => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode, 'on', 'animate', 'bt_bb_animation_fade_in' );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}
	
		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
			$output .= '<div class="bt_bb_history_year_title bt_bb_animation_fade_in animate">' . $title . '</div>';
			$output .= '<div class="bt_bb_history_year_content">' . wpautop( wptexturize( do_shortcode( $content ) ) ) . '</div>';
		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'History year', 'wheelco' ), 'description' => esc_html__( 'Single history element', 'wheelco' ), 'as_child' => array( 'only' => 'bt_bb_history' ), 'container' => 'vertical', 'auto_add' => 'bt_bb_history_date', 'accept' => array( 'bt_bb_history_date' => true ), 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'wheelco' ), 'preview' => true )				
			)
		) );
	}
}