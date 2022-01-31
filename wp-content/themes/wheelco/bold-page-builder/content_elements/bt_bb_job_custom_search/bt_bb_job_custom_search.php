<?php

class bt_bb_job_custom_search extends BT_BB_Element {

	function __construct() {
		parent::__construct();
	}

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'url'				=> '',
			'show_categories'   => '',
			'show_types'		=> ''
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

		$output = $this->output_form( $atts );
		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Job Custom Search', 'wheelco' ), 'description' => esc_html__( 'Job Custom Search', 'wheelco' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(				
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'Job Listings Page URL', 'wheelco' ), 'description' => esc_html__( 'Enter URL of the custon job listings page or leave empty for Job Manager Job Listings Page Settings', 'wheelco' ), 'preview' => true ),
				array( 'param_name' => 'show_categories', 'type' => 'checkbox', 'heading' => esc_html__( 'Show Job Categories Filter', 'wheelco' ),'value' => array( esc_html__( 'Yes', 'wheelco' ) => 'show_categories' ), 'preview' => true ),
				array( 'param_name' => 'show_types', 'type' => 'checkbox', 'heading' => esc_html__( 'Show Job Types Filter', 'wheelco' ),'value' => array( esc_html__( 'Yes', 'wheelco' ) => 'show_types' ), 'preview' => true )
			)
		) );

	}


	function output_form( $atts ){	

		$show_categories	= $atts['show_categories'] == 'show_categories' ? true : false;
		$show_types			= $atts['show_types'] == 'show_types' ? true : false;
		$action_page_url	= $atts['url'] == '' ? get_page_link( get_option('job_manager_jobs_page_id') ) : $atts['url'];

		ob_start();
		?>		
			
			<div class="bt_bb_job_listings">
				<form method="GET" action="<?php echo esc_url($action_page_url);?>">
					<div class="bt_bb_job_listings_inner">				
					  <div class="bt_bb_job_listings_keywords">
						<label for="keywords"><?php echo  esc_html__( 'Keywords', 'wheelco' );?></label>
						<input type="text" id="search_keywords" placeholder="Keywords" name="search_keywords" />
					  </div>
					  <div class="bt_bb_job_listings_location">
						<label for="keywords"><?php echo  esc_html__( 'Location', 'wheelco' );?></label>
						<input type="text" id="search_location" placeholder="Location" name="search_location" />
					  </div>
					</div>  			 
					  <?php if ( $show_categories ) { ?>
						 <div class="bt_bb_job_listings_category">
							<label for="search_category"><?php echo  esc_html__( 'Job Category', 'wheelco' );?></label>
							<select class="bt_bb_search_category" name="search_category">
								<option value=""><?php _e( 'Any Categories', 'wheelco' ); ?></option>
								<?php foreach ( get_job_listing_categories() as $cat ) : ?>
									<option value="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></option>
								<?php endforeach; ?>
							</select>
						  </div>
					  <?php } ?>
					  <?php if ( $show_types ) { ?>
						  <div class="bt_bb_job_listings_types">
							<label for="search_types"><?php echo  esc_html__( 'Job Types', 'wheelco' );?></label>
							<ul class="bt_bb_job_types">								
								<?php foreach ( get_job_listing_types() as $type ) : ?>
									<li>
									<label for="job_type_<?php echo esc_attr($type->slug); ?>" class="<?php echo esc_attr( $type->name ); ?>">
										<input type="checkbox" name="filter_job_type[]" value="<?php echo esc_attr($type->slug); ?>"  id="job_type_<?php echo esc_attr($type->slug); ?>" /> 
										<?php echo esc_html($type->name); ?>
									</label>
									</li>
								<?php endforeach; ?>
							</ul>
							<input type="hidden" name="filter_job_type[]" value="" />
						  </div>
					   <?php } ?>
					  <div class="bt_bb_job_listings_submit">
						<input type="submit" value="Search" />
					  </div>
				</form>
			</div>
		
		<?php
		return ob_get_clean();
	}

		


}