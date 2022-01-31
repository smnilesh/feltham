<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#FFAE02";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#0529A3";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "80";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$accentColorTransparent = CssCrush\fn__a_adjust( $accentColor." -100" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$alternateColorTransparent = CssCrush\fn__a_adjust( $alternateColor." -100" );$css_override = sanitize_text_field("select,
input{font-family: {$bodyFont};}
input:not([type='checkbox']):not([type='radio']):not([type='submit']):focus,
textarea:focus,
.fancy-select .trigger.open{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btContent a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\";}
.btContentHolder table thead th{
    background-color: {$accentColor};}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child,
.btTransparentLightHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColor};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
.btNoSearchResults .bt_bb_port #searchform input[type='submit']{
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};}
.btNoSearchResults .bt_bb_port #searchform input[type='submit']:hover{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.mainHeader{
    font-family: \"{$menuFont}\";}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\";}
.menuPort nav ul li a:hover{color: {$accentColor};}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{font-family: \"{$menuFont}\";
    line-height: {$logoHeight}px;}
.btLogoArea .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > a:after,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > a:after{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li a:hover{color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{-webkit-box-shadow: inset 5px 0 0 0 {$accentColor};
    box-shadow: inset 5px 0 0 0 {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btAccentLightHeader .btBelowLogoArea,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .btBelowLogoArea a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btAccentDarkHeader .mainHeader,
.btAccentDarkHeader .btVerticalHeaderTop{background-color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$accentColor};}
.btLightAccentHeader .btLogoArea,
.btLightAccentHeader .btVerticalHeaderTop{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .btLogoArea{background-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btDarkSkin .btSiteFooterCopyMenu .port:before,
.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before{background-color: {$accentColor};}
.btReadMoreColumn .bt_bb_button a{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.btReadMoreColumn .bt_bb_button a:hover{
    color: {$accentColor};}
.btMediaBox.btQuote:before,
.btMediaBox.btLink:before{
    background-color: {$accentColor};}
.btShareColumn .bt_bb_icon a:hover,
.btShareRow .bt_bb_icon a:hover{color: {$accentColor};}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.btDarkSkin .btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btDarkSkin .btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before{color: {$accentColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{
    background: {$accentColor};}
.no-comments{
    border: 2px solid {$accentColor};}
.btPagination{font-family: \"{$headingFont}\";}
.btPagination .paging a:hover{color: {$accentColor};}
.btPagination .paging a:hover:after{border-color: {$accentColor};
    color: {$accentColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{font-family: \"{$headingFont}\";}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.btArticleCategories a:hover{color: {$accentColor};}
.btArticleCategories a:not(:first-child):before{
    background-color: {$accentColor};}
.bt-comments-box .vcard .posted{
    font-family: \"{$headingFont}\";}
.bt-comments-box .commentTxt p.edit-link,
.bt-comments-box .commentTxt p.reply{
    font-family: \"{$headingFont}\";}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link{
    color: {$accentColor};}
a#cancel-comment-reply-link:hover{color: {$alternateColor};}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.widget_calendar table caption{background: {$accentColor};
    background: {$accentColor};
    font-family: \"{$headingFont}\";}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\";}
.fancy-select ul.options li:hover{color: {$accentColor};}
.widget_shopping_cart .total{
    font-family: {$headingFont};}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    background-color: {$alternateColor};
    font: normal 10px/1 \"{$menuFont}\";}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{font-family: {$headingFont};}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    background: {$accentColor};}
.topTools .btIconWidget:hover,
.topBarInMenu .btIconWidget:hover{color: {$accentColor};}
.topTools .btIconWidget.btAccentIconWidget .btIconWidgetContent .btIconWidgetText{
    color: {$accentColor};}
.btSidebar .btIconWidget:hover .btIconWidgetText,
footer .btIconWidget:hover .btIconWidgetText,
.topBarInLogoArea .btIconWidget:hover .btIconWidgetText{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
.btLightSkin .btSidebar .btSearch button:hover,
.btDarkSkin .btLightSkin .btSidebar .btSearch button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar .btSearch button:hover,
.btDarkSkin .btSidebar .btSearch button:hover,
.btLightSkin .btDarkSkin .btSidebar .btSearch button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar .btSearch button:hover,
.btLightSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin .btLightSkin .btSidebar .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin .btSidebar .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar .widget_product_search button:hover{background: {$accentColor} !important;
    border-color: {$accentColor} !important;}
.recentTweets small{font-family: \"{$headingSuperTitleFont}\";}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
.bt_bb_headline .bt_bb_headline_content a:hover{color: {$accentColor};}
.bt_bb_section[class*=\"accent_gradient\"]:before{background: -webkit-linear-gradient(top,{$accentColor} 0%,{$accentColorTransparent} 25%,{$accentColorTransparent} 75%,{$accentColor} 100%);
    background: -moz-linear-gradient(top,{$accentColor} 0%,{$accentColorTransparent} 25%,{$accentColorTransparent} 75%,{$accentColor} 100%);
    background: linear-gradient(to bottom,{$accentColor} 0%,{$accentColorTransparent} 25%,{$accentColorTransparent} 75%,{$accentColor} 100%);}
.bt_bb_section[class*=\"alternate_gradient\"]:before{background: -webkit-linear-gradient(top,{$alternateColor} 0%,{$alternateColorTransparent} 35%,{$alternateColorTransparent} 65%,{$alternateColor} 100%);
    background: -moz-linear-gradient(top,{$alternateColor} 0%,{$alternateColorTransparent} 35%,{$alternateColorTransparent} 65%,{$alternateColor} 100%);
    background: linear-gradient(to bottom,{$alternateColor} 0%,{$alternateColorTransparent} 35%,{$alternateColorTransparent} 65%,{$alternateColor} 100%);}
.bt_bb_dash_top.bt_bb_headline .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_content:before{
    border-color: {$accentColor};}
.bt_bb_dash_bottom.bt_bb_headline .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_content:after{
    border-color: {$accentColor};}
.bt_bb_headline h1 del,
.bt_bb_headline h2 del,
.bt_bb_headline h3 del,
.bt_bb_headline h4 del,
.bt_bb_headline h5 del,
.bt_bb_headline h6 del,
.bt_bb_headline h7 del,
.bt_bb_headline h8 del{color: {$accentColor};}
.bt_bb_headline h1 em,
.bt_bb_headline h2 em,
.bt_bb_headline h3 em,
.bt_bb_headline h4 em,
.bt_bb_headline h5 em,
.bt_bb_headline h6 em,
.bt_bb_headline h7 em,
.bt_bb_headline h8 em{color: {$accentColor};}
.bt_bb_headline h1 .bt_bb_headline_superheadline,
.bt_bb_headline h2 .bt_bb_headline_superheadline,
.bt_bb_headline h3 .bt_bb_headline_superheadline,
.bt_bb_headline h4 .bt_bb_headline_superheadline,
.bt_bb_headline h5 .bt_bb_headline_superheadline,
.bt_bb_headline h6 .bt_bb_headline_superheadline,
.bt_bb_headline h7 .bt_bb_headline_superheadline,
.bt_bb_headline h8 .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_headline .bt_bb_headline_subheadline{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_date{font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_author a:hover,
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_comments a:hover{color: {$accentColor};}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_title a:hover{color: {$accentColor};}
.bt_bb_latest_posts_item a.bt_bb_latest_posts_item_more:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta{font-family: \"{$headingSubTitleFont}\";}
.mfp-arrow{color: {$accentColor} !important;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title_inner{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_service:hover .bt_bb_service_content_title_inner a{color: {$accentColor};}
button.slick-arrow:hover:before{color: {$accentColor};}
.bt_bb_history_year:last-child:after{
    color: {$accentColor};}
.bt_bb_history_year .bt_bb_history_year_title{
    border: 2px solid {$accentColor};
    background-color: {$accentColor};}
.bt_bb_history_year .bt_bb_history_year_title:after{
    background: {$accentColor};}
.bt_bb_history_year .bt_bb_history_date .bt_bb_history_date_content .bt_bb_history_date_supertitle:before{
    color: {$accentColor};
    border-top: 1px solid {$accentColor};}
.bt_bb_history_year .bt_bb_history_date:nth-child(odd) .bt_bb_history_date_content{
    border-left: 2px solid {$accentColor};}
.bt_bb_history_year .bt_bb_history_date:nth-child(even) .bt_bb_history_date_media{
    border-left: 2px solid {$accentColor};}
.bt_bb_custom_menu div ul a:hover{color: {$accentColor};}
.bt_bb_style_simple ul.bt_bb_tabs_header li.on{border-color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title{
    font-family: \"{$headingFont}\";}
.wpcf7-form .wpcf7-submit{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    background-color: {$accentColor} !important;}
.wpcf7-form .wpcf7-submit:hover{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.wpcf7-form .wpcf7-not-valid-tip{color: {$accentColor} !important;}
.wpcf7-form .wpcf7-validation-errors{color: {$accentColor} !important;}
.btContactRow.btLogisticsContactRow .wpcf7-submit{-webkit-box-shadow: 0 0 0 1px {$alternateColor} inset;
    box-shadow: 0 0 0 1px {$alternateColor} inset;
    background-color: {$alternateColor} !important;}
.btContactRow.btLogisticsContactRow .wpcf7-submit:hover{
    -webkit-box-shadow: 0 0 0 0 {$alternateColor} inset;
    box-shadow: 0 0 0 0 {$alternateColor} inset;}
.btNewsletterRow .btNewsletterRowButton :before{
    color: {$accentColor};}
div.wpcf7-validation-errors{color: {$accentColor};}
.page .btContent .bt_bb_simple_price .bt_bb_simple_price_title .bt_bb_simple_price_supertitle{
    color: {$accentColor};}
.page .btContent .bt_bb_simple_price .bt_bb_simple_price_title .bt_bb_simple_price_title_inner{
    font-family: \"{$headingFont}\";}
.page .btContent .bt_bb_simple_price .bt_bb_simple_price_button .bt_bb_simple_price_url{background-color: {$accentColor};}
.page .btContent .bt_bb_simple_price .bt_bb_simple_price_button .bt_bb_simple_price_url:hover{-webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
nav.woocommerce-pagination ul li a,
nav.woocommerce-pagination ul li span{
    border: 2px solid {$accentColor};
    color: {$accentColor};}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a:hover,
nav.woocommerce-pagination ul li a.next,
nav.woocommerce-pagination ul li a.prev,
nav.woocommerce-pagination ul li span.current{background: {$accentColor};}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td.product-remove a.remove{
    color: {$accentColor};
    border: 2px solid {$accentColor};}
table.shop_table td.product-remove a.remove:hover{background-color: {$accentColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.woocommerce-info a: not(.button),
.woocommerce-message a: not(.button){color: {$accentColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{border: 2px solid {$accentColor};
    color: {$accentColor};}
.woocommerce .btSidebar a.button:hover,
.woocommerce .btContent a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .btContent a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .btContent input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .btContent input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .btContent button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .btContent button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .btContent input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .btContent input.button:hover,
.woocommerce .btSidebar input.alt,
.woocommerce .btContent input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .btContent input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .btContent a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .btContent a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .btContent .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .btContent .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .btContent button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .btContent button.alt,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{border: 2px solid {$accentColor};
    background: {$accentColor};}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted[data-selected]{background-color: {$accentColor};}
.btQuoteBooking .btContactNext{
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};}
.btQuoteBooking .btContactNext:focus,
.btQuoteBooking .btContactNext:hover{-webkit-box-shadow: 0 0 0 2em {$accentColor} inset;
    box-shadow: 0 0 0 2em {$accentColor} inset;}
.btQuoteBooking .btContactNext:hover,
.btQuoteBooking .btContactNext:active{background-color: {$accentColor} !important;}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{
    background: {$accentColor};}
.btQuoteBooking input[type=\"text\"]:focus,
.btQuoteBooking input[type=\"email\"]:focus,
.btQuoteBooking input[type=\"password\"]:focus,
.btQuoteBooking textarea:focus,
.btQuoteBooking .fancy-select .trigger:focus,
.btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{
    -webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{
    background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btDatePicker .ui-datepicker-header{
    background-color: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .btContactSubmit{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor} !important;}
.btQuoteBooking .btContactSubmit:focus,
.btQuoteBooking .btContactSubmit:hover{-webkit-box-shadow: 0 0 0 2em {$accentColor} inset;
    box-shadow: 0 0 0 2em {$accentColor} inset;}
.btPayPalButton:hover{-webkit-box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.bt_cc_email_confirmation_container [type=\"checkbox\"]:checked + label:before{border-color: {$accentColor};
    background: {$accentColor};}
.btQuoteBooking.btCostCalculator .btQuoteTotalCurrency,
.btQuoteBooking.btCostCalculator .btQuoteTotalCalc{
    color: {$accentColor};}
.btQuoteBooking.btShortDarkCalculator .btQuoteTotalCurrency,
.btQuoteBooking.btShortDarkCalculator .btQuoteTotalCalc{
    color: {$accentColor};}
.btQuoteBooking.btShortLightCalculator .btQuoteSwitch.on{border: 2px solid {$alternateColor};}
.btQuoteBooking.btShortLightCalculator .btQuoteSwitch.on .btQuoteSwitchInner{background: {$alternateColor};}
.btQuoteBooking.btShortLightCalculator .btQuoteItem .btQuoteItemInput .btQuoteSlider .ui-slider-handle{background: {$alternateColor} !important;}
ul.job_listings li.job_listing a:hover h3,
ul.job_listings li.job_listing a:hover div.position .company{color: {$accentColor};}
ul.job_listings li.job_listing .job-type.full-time{color: {$alternateColor};}
ul.job_listings li.job_listing .job-type{color: {$accentColor};}
article.job_listing .meta .job-type{background-color: {$accentColor};}
.single_job_listing .job_application input.application_button{
    background: {$accentColor};}
.rp4wp-related-job_listing > ul li.job_listing.job_position_featured a,
.rp4wp-related-job_listing > ul li.no_job_listings_found.job_position_featured a{
    border: 1px solid {$accentColor};}
.bt_bb_job_listings .bt_bb_job_listings_submit input{
    background: {$accentColor};}
", array() );