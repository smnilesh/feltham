<?php

class bt_bb_history_date extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'title' 			=> '',
			'supertitle' 		=> '',
			'text' 				=> '',
			'images' 			=> '',
			'video' 			=> ''
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

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
			$output .= '<div class="bt_bb_history_date_content bt_bb_animation_fade_in animate">';
				$output .= '<div class="bt_bb_history_date_supertitle">' . $supertitle . '</div>';
				$output .= '<div class="bt_bb_history_date_title">' . $title . '</div>';
				$output .= '<div class="bt_bb_history_date_text">' . $text . '</div>';
				$output .= '<div class="bt_bb_history_date_inner_content">';
					if ( $content != '' ) $output .=  wpautop( wptexturize( do_shortcode( $content ) ) );
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="bt_bb_history_date_media bt_bb_animation_fade_in animate">';
				if ( $images != '' ) $output .=  do_shortcode( '[bt_bb_masonry_image_grid images="' . esc_attr( $images ) . '" columns="1" gap="no_gap"]' );
				if ( $video != '' ) {
					$video_html = '<div class="bt_bb_history_date_media_video">';
						$hw = 9 / 16;
						$video_html .= '<div class="btMediaBox video" data-hw="' . esc_attr( $hw ) . '"><img class="aspectVideo" src="' . esc_url_raw( get_template_directory_uri() . '/gfx/video-16.9.png' ) . '" alt="' . esc_url_raw( get_template_directory_uri() . '/gfx/video-16.9.png' ) . '" role="presentation" aria-hidden="true">';
						if ( strpos( $video, 'vimeo.com/' ) > 0 ) {
							$video_id = substr( $video, strpos( $video, 'vimeo.com/' ) + 10 );
							$video_html .= '<ifra' . 'me src="' . esc_url_raw( 'http://player.vimeo.com/video/' . $video_id ) . '" allowfullscreen width="100%"></ifra' . 'me>';
							
						} else {
							$yt_id_pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
							$youtube_id = ( preg_replace( $yt_id_pattern, '$1', $video ) );
							if ( strlen( $youtube_id ) == 11 ) {
								$video_html .= '<ifra' . 'me width="560" height="315" src="' . esc_url_raw( 'http://www.youtube.com/embed/' . $youtube_id ) . '" allowfullscreen></ifra' . 'me>';
							} else {
								$video_html .= do_shortcode( $video );
							}
						}
						$video_html .= '</div>';	
					$video_html .= '</div>';

					$output .= $video_html;
				}
			
		$output .= '</div>';

		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'History date', 'wheelco' ), 'description' => esc_html__( 'Single history element', 'wheelco' ), 'as_child' => array( 'only' => 'bt_bb_history_year' ), 'container' => 'vertical', 'accept_all' => false, 'accept' => array( 'bt_bb_section' => false, 'bt_bb_accordion_item' => false, 'bt_bb_tab_item' => false, 'bt_bb_history' => false, 'bt_bb_history_year' => true, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'images', 'type' => 'attach_images', 'heading' => esc_html__( 'Images', 'wheelco' ) ),
				array( 'param_name' => 'video', 'type' => 'textfield', 'heading' => esc_html__( 'Video (Youtube or Vimeo)', 'wheelco' ), 'preview' => true )				
			)
		) );
	}
}