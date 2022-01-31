<?php

class bt_bb_simple_price extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'title'        		=> '',
			'supertitle'     	=> '',
			'description'     	=> '',
			'price_comment'     => '',
			'price'        		=> '',
			'button_text'       => '',
			'url'        		=> ''
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

		if ( $url != '' && $url != '#' && substr( $url, 0, 4 ) != 'http' && substr( $url, 0, 5 ) != 'https' && substr( $url, 0, 6 ) != 'mailto' ) {
			$link = bt_bb_get_permalink_by_slug( $url );
		} else {
			$link = $url;
		}		
		
		$output = '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_price_wrap' ) . '">';
				if ( $supertitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_supertitle' ) . '">' . $supertitle . '</div>';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_title_inner' ) . '">' . $title . '</div>';
			$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_description' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_description_text' ) . '">' . $description . '</div>';
		$output .= '</div>';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_price' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_price_wrap' ) . '">';
				if ( $price_comment != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_price_comment' ) . '">' . $price_comment . '</div>';
				$output .= '<div class="' . esc_attr( $this->shortcode . '_amount' ) . '">' . $price . '</div>';
			$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_button' ) . '">';
			$output .= '<a href="' . esc_url_raw( $link ) . '" target="_self" class="' . esc_attr( $this->shortcode . '_url' ) . '">';
				$output .= '<span class="' . esc_attr( $this->shortcode . '_button_text' ) . '">' . $button_text . '</span>';
			$output .= '</a>';
		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;
	}	

	function map_shortcode() {
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Simple price', 'wheelco' ), 'description' => esc_html__( 'Simple price table with button', 'wheelco' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'wheelco' ) ),
				array( 'param_name' => 'description', 'type' => 'textfield', 'heading' => esc_html__( 'Description', 'wheelco' ) ),
				array( 'param_name' => 'price_comment', 'type' => 'textfield', 'heading' => esc_html__( 'Price Comment', 'wheelco' ) ),
				array( 'param_name' => 'price', 'type' => 'textfield', 'heading' => esc_html__( 'Price', 'wheelco' ) ),
				array( 'param_name' => 'button_text', 'type' => 'textfield', 'heading' => esc_html__( 'Button Text', 'wheelco' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'wheelco' ) )			
			)
		) );
	}
}