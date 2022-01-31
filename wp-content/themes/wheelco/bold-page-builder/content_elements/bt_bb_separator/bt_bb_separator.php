<?php

class bt_bb_separator extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'top_spacing'    => '',
			'bottom_spacing' => '',
			'border_style'   => '',
			'border_width'   => '',
			'color'         => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}
		
		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}
		
		if ( $border_style != '' ) {
			$class[] = $this->prefix . 'border_style' . '_' . $border_style;
		}

		if ( $border_width != '' ) {
			$el_style = $el_style . '; border-width: ' . $border_width;
			if ( $border_style == 'none' ) {
				$el_style = $el_style . '; border-color: transparent; border-style: solid;';
			}
		}

		if ( $color != '' ) {
			$el_style = $el_style . ';' . 'color:' . $color . ';border-color:' . $color . ';';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '></div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Separator', 'wheelco' ), 'description' => esc_html__( 'Separator line', 'wheelco' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array( 
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'wheelco' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'wheelco' ) => '',
						esc_html__( 'Extra small', 'wheelco' ) => 'extra_small',
						esc_html__( 'Small', 'wheelco' ) => 'small',		
						esc_html__( 'Normal', 'wheelco' ) => 'normal',
						esc_html__( 'Medium', 'wheelco' ) => 'medium',
						esc_html__( 'Large', 'wheelco' ) => 'large',
						esc_html__( 'Extra large', 'wheelco' ) => 'extra_large'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'wheelco' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'wheelco' ) => '',
						esc_html__( 'Extra small', 'wheelco' ) => 'extra_small',
						esc_html__( 'Small', 'wheelco' ) => 'small',		
						esc_html__( 'Normal', 'wheelco' ) => 'normal',
						esc_html__( 'Medium', 'wheelco' ) => 'medium',
						esc_html__( 'Large', 'wheelco' ) => 'large',
						esc_html__( 'Extra large', 'wheelco' ) => 'extra_large'
					)
				),				
				array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'wheelco' ), 'preview' => true,
					'value' => array(
						esc_html__( 'None', 'wheelco' ) => 'none',
						esc_html__( 'Solid', 'wheelco' ) => 'solid',
						esc_html__( 'Dotted', 'wheelco' ) => 'dotted',
						esc_html__( 'Dashed', 'wheelco' ) => 'dashed'
					)
				),
				array( 'param_name' => 'border_width', 'type' => 'textfield', 'heading' => esc_html__( 'Border width', 'wheelco' ), 'description' => esc_html__( 'E.g. 5px or 1em', 'wheelco' ) ),
				array( 'param_name' => 'color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color', 'wheelco' ), 'group' => esc_html__( 'Design', 'wheelco' ), 'preview' => true ),
			)
		) );
	}
}