<?php

class bt_bb_service extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'         => '',
			'supertitle'   => '',
			'title'        => '',
			'text'         => '',
			'url'          => '',
			'target'       => '',
			'color_scheme' => '',
			'style'        => '',
			'size'         => '',
			'title_size'   => '',
			'shape'        => '',
			'align'        => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

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
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}		

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		if ( $url != '' ) {
			$url = bt_bb_get_url( $url );
			$title = '<a href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '">' . $title . '</a>';
		}

		$icon = bt_bb_icon::get_html( $icon, '', $url, $target );
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = $icon;

		$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content_title' ) . '">';
				if ( $supertitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_supertitle' ) . '">' . $supertitle . '</div>';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_content_title_inner' ) . '">' . $title . '</div>';
			$output .= '</div>';	
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content_text' ) . '">' . nl2br( $text ) . '</div>';
		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Service', 'wheelco' ), 'description' => esc_html__( 'Icon with text', 'wheelco' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'wheelco' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'wheelco' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'wheelco' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'wheelco' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'wheelco' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'wheelco' ) => '_blank',
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon alignment', 'wheelco' ),
					'value' => array(
						esc_html__( 'Inherit', 'wheelco' ) => 'inherit',
						esc_html__( 'Left', 'wheelco' ) => 'left',
						esc_html__( 'Right', 'wheelco' ) => 'right'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'wheelco' ), 'preview' => true, 'group' => esc_html__( 'Design', 'wheelco' ),
					'value' => array(
						esc_html__( 'Small', 'wheelco' ) => 'small',
						esc_html__( 'Extra small', 'wheelco' ) => 'xsmall',
						esc_html__( 'Normal', 'wheelco' ) => 'normal',
						esc_html__( 'Large', 'wheelco' ) => 'large',
						esc_html__( 'Extra large', 'wheelco' ) => 'xlarge'
					)
				),
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Title size', 'wheelco' ), 'preview' => true, 'group' => esc_html__( 'Design', 'wheelco' ),
					'value' => array(
						esc_html__( 'Normal + Bold', 'wheelco' ) => 'normal_bold',
						esc_html__( 'Normal', 'wheelco' ) => 'normal',
						esc_html__( 'Large', 'wheelco' ) => 'large',
						esc_html__( 'Large + Bold', 'wheelco' ) => 'large_bold'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'wheelco' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'wheelco' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'wheelco' ), 'preview' => true, 'group' => esc_html__( 'Design', 'wheelco' ),
					'value' => array(
						esc_html__( 'Outline', 'wheelco' ) => 'outline',
						esc_html__( 'Filled', 'wheelco' ) => 'filled',
						esc_html__( 'Borderless', 'wheelco' ) => 'borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'wheelco' ), 'group' => esc_html__( 'Design', 'wheelco' ),
					'value' => array(
						esc_html__( 'Circle', 'wheelco' ) => 'circle',
						esc_html__( 'Square', 'wheelco' ) => 'square',
						esc_html__( 'Rounded Square', 'wheelco' ) => 'round'
					)
				)
			)
		) );
	}
}