<?php

BoldThemes_Customize_Default::$data['body_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['heading_supertitle_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['heading_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['heading_subtitle_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['menu_font'] = 'Roboto';

BoldThemes_Customize_Default::$data['accent_color'] = '#FFAE02';
BoldThemes_Customize_Default::$data['alternate_color'] = '#0529A3';
BoldThemes_Customize_Default::$data['logo_height'] = '80';

BoldThemes_Customize_Default::$data['template_skin'] = 'light';
BoldThemes_Customize_Default::$data['buttons_shape'] = 'hard-rounded';
// BoldThemes_Customize_Default::$data['heading_style'] = 'default';

BoldThemes_Customize_Default::$data['sidebar_use_dash'] = true;
BoldThemes_Customize_Default::$data['blog_use_dash'] = true;
BoldThemes_Customize_Default::$data['pf_use_dash'] = true;

BoldThemes_Customize_Default::$data['boxed_menu'] = false;
BoldThemes_Customize_Default::$data['sticky_header'] = true;


// SECTION

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( "bt_bb_section", 'layout' );
	bt_bb_remove_params( "bt_bb_section", 'background_overlay' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {

	bt_bb_add_params( 'bt_bb_section', array(

		array( 'param_name' => 'layout', 'type' => 'dropdown', 'default' => 'boxed_1200', 'heading' => esc_html__( 'Layout', 'wheelco' ), 'group' => esc_html__( 'General', 'wheelco' ), 'weight' => 0, 'preview' => true,
			'value' => array(
				esc_html__( 'Boxed (800px)', 'wheelco' ) 			=> 'boxed_800',
				esc_html__( 'Boxed (900px)', 'wheelco' ) 			=> 'boxed_900',
				esc_html__( 'Boxed (1000px)', 'wheelco' ) 			=> 'boxed_1000',
				esc_html__( 'Boxed (1100px)', 'wheelco' ) 			=> 'boxed_1100',
				esc_html__( 'Boxed (1200px)', 'wheelco' ) 			=> 'boxed_1200',
				esc_html__( 'Boxed (1300px)', 'wheelco' ) 			=> 'boxed_1300',
				esc_html__( 'Boxed (1400px)', 'wheelco' ) 			=> 'boxed_1400',
				esc_html__( 'Boxed (1500px)', 'wheelco' ) 			=> 'boxed_1500',
				esc_html__( 'Boxed (1600px)', 'wheelco' ) 			=> 'boxed_1600',
				esc_html__( 'Boxed right (1200px)', 'wheelco' ) 	=> 'boxed_right_1200',
				esc_html__( 'Boxed left (1200px)', 'wheelco' ) 		=> 'boxed_left_1200',
				esc_html__( 'Wide', 'wheelco' ) 					=> 'wide'
			)
		),

		array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'wheelco' ), 'group' => esc_html__( 'Design', 'wheelco' ), 'weight' => 4, 
			'value' => array(
				esc_html__( 'No overlay', 'wheelco' )    		=> '',
				esc_html__( 'Light stripes', 'wheelco' ) 		=> 'light_stripes',
				esc_html__( 'Dark stripes', 'wheelco' )  		=> 'dark_stripes',
				esc_html__( 'Light solid', 'wheelco' )	  		=> 'light_solid',
				esc_html__( 'Dark solid', 'wheelco' )	  		=> 'dark_solid',
				esc_html__( 'Light gradient', 'wheelco' )	  	=> 'light_gradient',
				esc_html__( 'Dark gradient', 'wheelco' )	  	=> 'dark_gradient',
				esc_html__( 'Accent gradient', 'wheelco' )	  	=> 'accent_gradient',
				esc_html__( 'Alternate gradient', 'wheelco' )	=> 'alternate_gradient'
			)
		),

		array( 'param_name' => 'top_negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Top negative margin', 'wheelco' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No margin', 'wheelco' ) 		=> '',
				esc_html__( 'Extra small', 'wheelco' ) 		=> 'extra_small',
				esc_html__( 'Small', 'wheelco' ) 			=> 'small',		
				esc_html__( 'Normal', 'wheelco' ) 			=> 'normal',
				esc_html__( 'Medium', 'wheelco' ) 			=> 'medium',
				esc_html__( 'Large', 'wheelco' ) 			=> 'large',
				esc_html__( 'Extra large', 'wheelco' ) 		=> 'extra_large'
			)
		),

		array( 'param_name' => 'bottom_negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom negative margin', 'wheelco' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No margin', 'wheelco' ) 		=> '',
				esc_html__( 'Extra small', 'wheelco' ) 		=> 'extra_small',
				esc_html__( 'Small', 'wheelco' ) 			=> 'small',		
				esc_html__( 'Normal', 'wheelco' ) 			=> 'normal',
				esc_html__( 'Medium', 'wheelco' ) 			=> 'medium',
				esc_html__( 'Large', 'wheelco' ) 			=> 'large',
				esc_html__( 'Extra large', 'wheelco' ) 		=> 'extra_large'
			)
		),

		array( 'param_name' => 'highlighted', 'type' => 'dropdown', 'heading' => esc_html__( 'Highlighted section', 'wheelco' ), 'group' => esc_html__( 'Design', 'wheelco' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No', 'wheelco' ) 		=> 'no',
				esc_html__( 'Outline', 'wheelco' ) 	=> 'outline'
			)
		)
	) );
}

function wheelco_bt_bb_section_class( $class, $atts ) {

	if ( isset( $atts['top_negative_margin'] ) && $atts['top_negative_margin'] != '' ) {
		$class[] = 'bt_bb_top_negative_margin' . '_' . $atts['top_negative_margin'];
	}
	
	if ( isset( $atts['bottom_negative_margin'] ) && $atts['bottom_negative_margin'] != '' ) {
		$class[] = 'bt_bb_bottom_negative_margin' . '_' . $atts['bottom_negative_margin'];
	}

	if ( isset( $atts['highlighted'] ) && $atts['highlighted'] != '' ) {
		$class[] = 'bt_bb_highlighted' . '_' . $atts['highlighted'];
	}

	return $class;
}
add_filter( 'bt_bb_section_class', 'wheelco_bt_bb_section_class', 10, 2 );



// NEW PARAM: COUNTER WEIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_counter', array(
		array( 
			'param_name' => 'font_weight', 
			'type' 		=> 'dropdown', 
			'default' 	=> 'normal', 
			'heading' 	=> esc_html__( 'Weight', 'wheelco' ), 
			'group' 	=> esc_html__( 'General', 'wheelco' ), 
			'weight' 	=> 3, 
			'preview' 	=> true,
			'value' 	=> array(
				esc_html__( 'Light', 'wheelco' ) 	=> 'light',
				esc_html__( 'Normal', 'wheelco' ) 	=> 'normal',
				esc_html__( 'Bold', 'wheelco' ) 	=> 'bold',
			)
		)
	) );
}

function wheelco_bt_bb_counter_class( $class, $atts ) {
	if ( isset( $atts['font_weight'] ) && $atts['font_weight'] != '' ) {
		$class[] = 'bt_bb_font_weight_' . $atts['font_weight'];
	}
	return $class;
}
add_filter( 'bt_bb_counter_class', 'wheelco_bt_bb_counter_class', 10, 2 );



// NEW PARAM: COLUMN HIGHLIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'highlighted',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Highlighted column', 'wheelco' ),
			'group' => esc_html__( 'Design', 'wheelco' ),
			'preview' => true,
			'value' => array(
				esc_html__( 'No', 'wheelco' ) 		=> 'no',
				esc_html__( 'Outline', 'wheelco' ) 	=> 'outline',
				esc_html__( 'Shadow', 'wheelco' ) 	=> 'shadow'
			)
		)
	) );
}

function wheelco_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['highlighted'] ) && $atts['highlighted'] != '' ) {
		$class[] = 'bt_bb_highlighted' . '_' . $atts['highlighted'];
	}
	return $class;
}
add_filter( 'bt_bb_column_class', 'wheelco_bt_bb_column_class', 10, 2 );


// NEW PARAM: COLUMN INNER HIGHLIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'highlighted',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Highlighted column', 'wheelco' ),
			'group' => esc_html__( 'Design', 'wheelco' ),
			'preview' => true,
			'value' => array(
				esc_html__( 'No', 'wheelco' ) 	=> 'no',
				esc_html__( 'Yes', 'wheelco' ) 	=> 'outline'
			)
		)
	) );
}

function wheelco_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['highlighted'] ) && $atts['highlighted'] != '' ) {
		$class[] = 'bt_bb_highlighted' . '_' . $atts['highlighted'];
	}
	return $class;
}
add_filter( 'bt_bb_column_inner_class', 'wheelco_bt_bb_column_inner_class', 10, 2 );



// NEW PARAM: CONTENT SLIDER ITEM HIGHLIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_content_slider_item', array(
		array( 'param_name' => 'highlighted',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Highlighted slider item', 'wheelco' ),
			'group' => esc_html__( 'General', 'wheelco' ),
			'preview' => true,
			'value' => array(
				esc_html__( 'No', 'wheelco' ) 		=> 'no',
				esc_html__( 'Outline', 'wheelco' ) 	=> 'outline'
			)
		)
	) );
}

function wheelco_bt_bb_content_slider_item_class( $class, $atts ) {
	if ( isset( $atts['highlighted'] ) && $atts['highlighted'] != '' ) {
		$class[] = 'bt_bb_highlighted' . '_' . $atts['highlighted'];
	}
	return $class;
}
add_filter( 'bt_bb_content_slider_item_class', 'wheelco_bt_bb_content_slider_item_class', 10, 2 );



// PARAM: ICON SIZE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_icon', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'size', 
			'type' => 'dropdown', 
			'heading' => esc_html__( 'Size', 'wheelco' ), 
			'preview' => true,
			'value' => array(
				esc_html__( 'Small', 'wheelco' ) 		=> 'small',
				esc_html__( 'Extra small', 'wheelco' ) 	=> 'xsmall',
				esc_html__( 'Normal', 'wheelco' ) 		=> 'normal',
				esc_html__( 'Large', 'wheelco' ) 		=> 'large',
				esc_html__( 'Extra large', 'wheelco' ) 	=> 'xlarge',
				esc_html__( 'Huge', 'wheelco' ) 		=> 'huge'
			)
		),
	) );
}