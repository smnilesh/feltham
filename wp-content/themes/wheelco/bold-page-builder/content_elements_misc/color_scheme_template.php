<?php

if ( ! isset( $color_scheme[2] ) ) {

	$custom_css = '';

} else {

	$custom_css = "

		/* Headline */

		/*.bt_bb_headline .bt_bb_headline_content:before, .bt_bb_headline .bt_bb_headline_content:after {
			border-color: {$color_scheme[1]};
		}*/
		
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_subheadline
		{
			color: {$color_scheme[2]};
		}

		/* Button */

		.bt_bb_button.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline a {
			box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		}

		/* Icon */
		.bt_bb_icon.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_icon_holder:before {
			box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		}

		/* Accordion */
		.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
			color: {$color_scheme[1]};
			border-color: {$color_scheme[1]};
		}

		/* Tabs */
		.bt_bb_tabs.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_tabs_header li {
			color: {$color_scheme[1]};
		}
		
		/* Service */
		
		.bt_bb_service.bt_bb_color_scheme_{$scheme_id} .bt_bb_service_content .bt_bb_service_content_title a {
			color: {$color_scheme[2]};
		}
		.bt_bb_service.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_icon_holder {
			box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		}

	";

}