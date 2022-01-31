<?php
/*
Plugin Name: TRUSTist REVIEWer
Description: <strong>Display Trustist Reviews on your website.</strong><br>TRUSTist will provide the relevant codes to be used with the plugin via email. You must have a TRUSTist account in order to use this plugin. Please call 01904 217 110 to set one up.
Version: 2.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/


/* Do not allow direct access to the plugin */
defined( 'ABSPATH' ) or die( 'Direct access not allowed !' );

//Paths have trailing slash
define( 'TR2_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'TR2_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define( 'TR2_PLUGIN_NAME',dirname(__FILE__));
define( 'TR2_SETTINGS','tr2_plugin_settings');

$tr2_widgettypes = [
  'Default'      => 'widget',
  'Big'          => 'big',
  'Small'        => 'small',
  'Starbar'      => 'starbar',
  'Starbar 10px' => 'starbar10',
  'Starbar 12px' => 'starbar12',
  'Starbar 20px' => 'starbar20',
  'Starbar 25px' => 'starbar25',
  'Starbar 50px' => 'starbar50',
];
$tr2_radiuses = [
  '25px',
  '20px',
  '15px',
  '10px',
  '5px',
  '0px', // (default)
];

$tr2_js = false;

/*
 * Activate Plugin
 */
function tr2_activate()
{
  global $wpdb;

  //delete_option(TR2_SETTINGS);
  
  //make sure that we have some settings
  $settings = ['brandcode'=>'','locationcode'=>'','widgets'=>[],'condition'=>'','pages'=>''];
  add_option(TR2_SETTINGS,$settings);
}
register_activation_hook( __FILE__,'tr2_activate');
	
/*
 * Initialise plugin when wordpress starts up
 */ 
function tr2_init()
{
  add_shortcode('trustist-reviewer', 'tr2_shortcode');
}
add_action('init', 'tr2_init');




/*
 * return TRUE if $page is empty or $page is the ID, title, slug, ... of the current page
 */
function tr2_match_page( $page = '' ) {
  global $post;
  
  if ( $page == '' ) 
    return true;
  
  if( !empty( $post ) ) {

    if( ( is_single() || is_page() ) &&	( is_numeric( $page ) && ( $post->ID == $page ) || ( $post->post_title == $page )) ) {
      //matches page id or title
      return true;
    } else {
      //check for slug
      $permalink = get_permalink( $post->ID );
      $prefix = home_url();
      $slug = substr( $permalink, strlen( $prefix ) );
      $slug = ltrim( rtrim( $slug, '/'), '/' );
      $page = ltrim( rtrim( $page, '/'), '/' );
      if ( $slug == $page ) {
	return true;
      }
    }
  }
  
  return false;
}

/*
 * return TRUE if the current page matches the criteria in $page
 */
function tr2_match( $page ) {
  $page = trim( $page );

  if ( substr($page,0,1)=='[' && substr($page,-1)== ']' ) {
    //Its a token
    
    // strip brackets
    $page = trim(substr($page,1,-1));

    //split into parts
    $page_params = explode( ':', $page );
    $token = isset( $page_params[0] ) ? trim( $page_params[0] ) : null;
    $value = isset( $page_params[1] ) ? trim( $page_params[1] ) : null;
    $value2 = isset( $page_params[2] ) ? trim( $page_params[2] ) : null;
    switch ( $token ) {
      case 'home' :
	return is_home();
	break;
      case 'front' :
	return is_front_page();
	break;
      case 'single' :
	return is_single();
	break;
      case 'page' :
	return is_page();
	break;
      case 'category' :
	if ( ! empty( $value ) ) {
	  return is_category( $value );
	} else {
	  return is_category();
	}
	break;
      case 'has_term' :
	if ( !empty( $value ) ) {
	  if ( !empty( $value2 ) ) {
	    return has_term( $value, $value2 );
	  } else {
	    return has_term( $value, 'category' ) || has_term( $value, 'post_tag' );
	  }
	}
	break;
      case 'tag' :
	if ( ! empty ( $value ) ) {
	   return is_tag( $value );
	} else {
	  return is_tag();
	}
	break;
      case 'tax' :
	if ( ! empty( $value ) ) {
	  if ( empty( $value2 ) ) {
	    switch( $value ) {
	    case 'category' :
		return is_category();
		break;
	    case 'tag' :
		 return is_tag();
		break;
	    default :
		return is_tax( $value );
	    }
	  } else {
	    switch( $value ) {
	    case 'category' :
		return is_category( $value2 );
		break;
	    case 'tag' :
		return is_tag( $value2 );
		break;
	    default :
		return is_tax( $value, $value2 );
	    }
	  }
	} else {
	  return ( is_tax() || is_category() || is_tag());
	}
	break;
      case 'author' :
	if ( ! empty( $value) ) {
	  return is_author( $value );
	} else {
	  return is_author();
	}
	break;
      case 'archive' :
	return is_archive();
	break;
      case 'search' :
	return is_search();
	break;
      case '404' :
	return is_404();
	break;
      case 'language' :
	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	  $languages = array_map( 'trim', explode( ',', $value ) );
	  return in_array( ICL_LANGUAGE_CODE, $languages );
	}
	break;
    }
  } else {
    $page = trim( $page );
    return tr2_match_page( $page );
  }
  return false;
}



/*
 * Returns TRUE if the current page matches the conditions to use the location_code
 */
function tr2_show_locationcode( $condition, $pages ) {
  global $post;

  //show on all pages
  if ( $condition == '' ) {
    return true;
  }

  //process pages
  $pages = explode( "\n", $pages );
  
  if ( is_array( $pages ) ) {
    //we have some pages
    
    $pages = array_map( 'trim', $pages );

    $matches = array_map( 'tr2_match', $pages );
    $matches[] = false;
    $result = in_array( true, $matches, true );

    return ($condition=='only'?$result:!$result);
    
  } else {
    //no rules, so always fail
    return false;
  }

}


/*
 * Process a trustist-reviewer shortcode
 */
function tr2_shortcode($atts = [], $content = null, $tag = '')
{
  global $tr2_js;
  
  // normalize attribute keys, lowercase
  $atts = array_change_key_case((array)$atts, CASE_LOWER);

  //Get Settings
  $settings = get_option(TR2_SETTINGS);

  // override default attributes with user attributes
  $atts = shortcode_atts(['widget' => '',], $atts, $tag);
  $attributes = 'ts-widget="widget"';
  if( $atts['widget'] != '' && isset($settings['widgets'][$atts['widget']]) && is_array($settings['widgets'][$atts['widget']])){
    $w = $settings['widgets'][$atts['widget']];
    $attributes = sprintf('ts-widget="%s"',htmlspecialchars($w['Widget Type']));
    if( strncmp($w['Widget Type'],'starbar',7) ){
      if( isset($w['Suppress Review Link']) && $w['Suppress Review Link']){
	$attributes .= sprintf(' ts-suppress-review-link="true"');
      } else {
	if( !(isset($w['Review Link Colour']) &&  isset($w['Review Link Background Colour']) && $w['Review Link Colour']==$w['Review Link Background Colour'])){
	  if( isset($w['Review Link Colour']) && $w['Review Link Colour']!='' )
 	    $attributes .= sprintf(' ts-review-link-colour="%s"',htmlspecialchars($w['Review Link Colour']));
	  if( isset($w['Review Link Background Colour']) && $w['Review Link Background Colour']!='' )
	    $attributes .= sprintf(' ts-review-link-background-colour="%s"',htmlspecialchars($w['Review Link Background Colour']));
	}
      }
      $attributes .= sprintf(' ts-border-radius="%s"',isset($w['Border Radius']) && $w['Border Radius']!='' ?$w['Border Radius']:'0px');
      if( isset($w['Review Links']) && $w['Review Links']!='' )
	$attributes .= sprintf(' ts-review-links="%s"',htmlspecialchars($w['Review Links']));
      if( isset($w['Reviews URL']) && $w['Reviews URL']!='' )
	$attributes .= sprintf(' ts-reviews-url="%s"',htmlspecialchars($w['Reviews URL']));
    }
  }

  $ret = <<<EOT
  <div class="trustist-reviewer" $attributes >
  </div>
EOT;
  
  /* Old style     
  
  //Only add JS first time through
  if( !$tr2_js ){
    $tr2_js = true;
    $brandcode = urlencode($settings['brandcode']);
    if( tr2_show_locationcode($settings['condition'],$settings['pages']) ){
      $locationcode = '&l='.urlencode($settings['locationcode']);
    } else {
      $locationcode = '';
    }
    $ret .= <<<EOT
    <script src="//widget.trustist.com/trustistreviewer?b=$brandcode$locationcode"></script>
EOT;
  }
*/
  
  /* New style */  

  //Only add JS first time through
  if( !$tr2_js ){
    $tr2_js = true;
    if( tr2_show_locationcode($settings['condition'],$settings['pages']))
      $code = urlencode($settings['locationcode']);
    else
      $code = urlencode($settings['brandcode']);
    $ret .= <<<EOT
    <script src="//widget.trustist.com/$code/trustistreviewer.js"></script>
EOT;
  }

  return $ret;
}


/*
 * Create Entry In Settings Menu
 */
function tr2_add_menu() {
  add_options_page( 'TRUSTist REVIEWer Settings', 'TRUSTist REVIEWer','manage_options','tr2_settings', 'tr2_settings' );
}
add_action( 'admin_menu', 'tr2_add_menu' );

/*
 * Display and Process Settings Form
 */

function tr2_settings(){
  global $tr2_widgettypes;
  global $tr2_radiuses;
  
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }

  /* Process any form submissions */
  $settings = get_option(TR2_SETTINGS);
  if( isset($_POST['tr2_settings']) && $_POST['tr2_settings']=='Yes' ){
    //Main Settings

    $settings['brandcode'] = $_REQUEST['brandcode'];
    $settings['locationcode'] = $_REQUEST['locationcode'];
    $settings['condition'] = $_REQUEST['condition'];
    $settings['pages'] = $_REQUEST['pages'];
    
  }
  if( isset($_POST['tr2_widget']) && $_POST['tr2_widget']!='' ){

    //Widget Settings
    $settings['widgets'][$_POST['tr2_widget']] = @['Widget Type'=> $_POST['widgettype'],'Suppress Review Link'=> $_POST['suppress_review'],'Border Radius'=>$_POST['borderradius'],'Review Link Colour'=>$_POST['review_link_colour'],'Review Link Background Colour'=>$_POST['review_link_background_colour'],'Review Links'=>$_POST['review_links'],'Reviews URL'=>$_POST['reviews_url'] ];

    //return to main form
    unset($_REQUEST['editwidget']);
  }
  if( isset($_REQUEST['deletewidget']) && $_REQUEST['deletewidget']!=''){
    unset($settings['widgets'][$_REQUEST['deletewidget']]);
  }

  //save any changes
  update_option(TR2_SETTINGS,$settings);

  
  /* Display Settings Form */

  //Edit or Create a new widget
  if( (isset($_REQUEST['editwidget']) && $_REQUEST['editwidget']!='' && isset($settings['widgets'][$_REQUEST['editwidget']])) || (isset($_REQUEST['Submit']) && $_REQUEST['Submit']=='Add New' && isset($_REQUEST['widget']) && $_REQUEST['widget']!='')){
    //Show Widget Edit Page

    if( isset($_REQUEST['Submit']) && $_REQUEST['Submit']=='Add New' && isset($_REQUEST['widget']) && $_REQUEST['widget']!=''){
      //New widget
      $widget = $_REQUEST['widget'];
      $settings['widgets'][$widget] = ['Widget Type'=>'widget','Suppress Review Link'=>0,'Border Radius'=>'0px','Review Link Colour'=>'','Review Link Background Colour'=>'','Review Links'=>'all','Reviews URL'=>''];
    } else {
      //Edit widget
      $widget = $_REQUEST['editwidget'];
    }

    //Build input data
    $ewidget = htmlspecialchars($widget);
    $srl = ($settings['widgets'][$widget]['Suppress Review Link']?'checked':'');
    $widgettype = '<select name="widgettype">';
    foreach($tr2_widgettypes AS $v=>$k ){
      $widgettype .= sprintf('<option value="%s" %s>%s</option>',htmlspecialchars($k),$k==$settings['widgets'][$widget]['Widget Type']?'selected':'',htmlspecialchars($v));
    }
    $widgettype .= "</select>\n";
    $borderradius = '<select name="borderradius">';
    foreach($tr2_radiuses AS $v ){
      $borderradius .= sprintf('<option value="%s" %s>%s</option>',htmlspecialchars($v),$v==$settings['widgets'][$widget]['Border Radius']?'selected':'',htmlspecialchars($v));
    }
    $borderradius .= "</select>\n";
    $rlc = htmlspecialchars($settings['widgets'][$widget]['Review Link Colour']);
    $rlbc = htmlspecialchars($settings['widgets'][$widget]['Review Link Background Colour']);
    if( $settings['widgets'][$widget]['Review Links']=='all'){
      $rla = 'checked';
      $rlt = '';
    } else {
      $rla = '';
      $rlt = 'checked';
    }
    $ru = htmlspecialchars($settings['widgets'][$widget]['Reviews URL']);
			   
    //Show form
    echo <<<EOT
  <div class="wrap">
    <h2>TRUSTist REVIEWer Settings</h2>

    <form name="tr2_settings" method="post" action="?page=tr2_settings">
      <input type="hidden" name="tr2_widget" value="$widget">
      <fieldset>
        <legend><br><b>Edit Widget: $ewidget</b></legend>
        <table class="wp-list-table widefat" style="width:auto" cellspacing="0">
	  <tr>
            <th><b>Widget Type</b></th>
	    <td>$widgettype</td>
          </tr>
	  <tr>
            <th><b>Suppress Review Link</b></th>
	    <td><input type="checkbox" name='suppress_review' $srl></td>
          </tr>
	  <tr>
            <th><b>Border Radius</b></th>
	    <td>$borderradius</td>
          </tr>
	  <tr>
            <th><b>Review Link Colour</b></th>
	    <td><input type="color" name="review_link_colour" value="$rlc"></td>
          </tr>
	  <tr>
            <th><b>Review Link Backround Colour</b></th>
	    <td><input type="color" name="review_link_background_colour" value="$rlbc"></td>
          </tr>
          <tr>
            <th><b>Review Links</b></th>
	    <td><input type="radio" name="review_links" value="all" $rla>Icons&nbsp;&nbsp;<input type="radio" name="review_links" value="" $rlt>TRUSTist</td>
          </tr>
          <tr>
            <th><b>Reviews URL</b></th>
	    <td><input type="url" name="reviews_url" value="$ru"></td>
          </tr>
          <tr>
           <td colspan="2"><p class="submit"><input type="submit" name="Submit" class="button-primary" value="Save Widget" /></p></td>
          </tr>
         </table>
      </fieldset>
      <script>
        //Disable all optiosn when a starbar is chosen
        function endisopts(endis){
          var opts = ['suppress_review','borderradius','review_link_colour','review_link_background_colour','review_links','reviews_url'];
          for( var o in opts ){
            console.log('input[name="'+opts[o]+'"]');
            jQuery('[name="'+opts[o]+'"]').prop("disabled",endis);
            if( endis)
               jQuery('[name="'+opts[o]+'"]').closest('tr').children('th').css({'opacity': 0.5});
            else
               jQuery('[name="'+opts[o]+'"]').closest('tr').children('th').css({'opacity': 1.00});
          }
        }
        jQuery(function(){
          jQuery('select[name="widgettype"]').change(function(){
             endisopts(jQuery('select[name="widgettype"]').val().substring(0,7) == 'starbar');
          });
          endisopts(jQuery('select[name="widgettype"]').val().substring(0,7) == 'starbar');
        });
      </script>
EOT;
  } else {
    //Show main settings page
    $widgets = '';
    if(isset($settings['widgets'])){
  
      foreach($settings['widgets'] AS $k => $v ){
	$widgets .= sprintf('
      <tr> 
      <td>%s</td>
      <td><a class="button-secondary" href="?page=tr2_settings&editwidget=%s">Edit</a>&nbsp;<a class="button-secondary" href="?page=tr2_settings&deletewidget=%s">Delete</a></td>
</tr>',htmlspecialchars($k),urlencode($k),urlencode($k));
      }
    }
    switch($settings['condition']){
      case 'only':
	$any = $except = '';
	$only = 'checked="checked"';
	break;
      case 'except':
        $any = $only = '';
	$except = 'checked="checked"';
      break;
      default:
        $except = $only = '';
	$any = 'checked="checked"';
    }	
    echo <<<EOT
  <div class="wrap">
    <h2>TRUSTist REVIEWer Settings</h2>

    <div style="float:left;margin:5px;width:40%; min-width:420px;">
    <form name="tr2_settings" method="post" action="?page=tr2_settings">
      <input type="hidden" name="tr2_settings" value="Yes">
      <fieldset>
        <legend><br><b>TRUSTist Settings</b></legend>
        <table class="wp-list-table widefat"  cellspacing="0">
	  <tr>
            <th valign="top"><b>Brand Code</b><p>Please enter the brand code provided by TRUSTist here</p></th>
	    <td><input type="text" name="brandcode" value="{$settings['brandcode']}"></td>
          </tr>
	  <tr>
            <th valign="top"><b>Location Code</b><p>Please enter the location code provided by TRUSTist here</p></th>
	    <td><input type="text" name="locationcode" value="{$settings['locationcode']}"></td>
          </tr>

            <tr>
             <th valign="top"><b>Conditions</b><p>This will determine which page the Local Business Structured Data is added to. Please select the option advised by TRUSTist.</p></th>
             <td>
               <br>
               <label><input type="radio" name="condition" value="" $any /> Show on all pages</label><br/>
               <label><input type="radio" name="condition" value="only" $only /> Show only on these pages</label><br/>
               <label><input type="radio" name="condition" value="except" $except /> Show on all except these pages</label><br/>
             </td>
             </tr>
             <tr>
               <th valign="top"><b>Pages</b>
                 <p>Please enter the page relevant to the option selected above.</p> 
                 <p><b>To add Local Business Structured Data to a post please use the tag <i>[single:a-post-title]</i><br>Where <i>a-post-title</i> is the name of a post.</b></p>
                 <p>Put each item on a line by itself.</p>
                 <p>To include or exclude pages, use page ids, titles or slugs.</p>
                 <p>These tokens can also be used:<br/> [home] [front] [single] [page] [category] [category:xyz] [has_term:term:taxonomy] [tag] [tag:xyz] [tax] [tax:taxonomy] [tax:taxonomy:term] [author] [author:xyz] [archive] [search] [404]</p>
               </th>
               <td><br><label><textarea class="" cols="20" rows="5" name="pages">{$settings['pages']}</textarea></label></td>
             </tr>
    
          <tr>
           <td colspan="2"><p class="submit"><input type="submit" name="Submit" class="button-primary" value="Save Changes" /></p></td>
          </tr>
         </table>
      </fieldset>
    </form>
    </div>
    <div style="float:left;margin:5px;width:40%;min-width:420px;">
      <fieldset>
       <legend><br><b>Getting Started</b></legend>
        <table class="wp-list-table widefat" style="width:100%;" cellspacing="0">
	  <tr>
            <td>
               <p>
               Enter the basic widget tag to display the default TRUSTist widget. If you would like to customise the widget, please follow the instructions below for 'Advanced'.
               </p><p>
               <b>Basic</b><br>
               Just add the <i>[trustist-reviewer]</i> Tag in your templates or page content where you would like the widget to appear.
               </p>
               <p>
               <b>Advanced</b><br>
                Please use an advanced widget to create a custom widget using the modifiers provided. Modifiers will adjust the size, style and appearance of the widget.
               </p><p><b>Advanced Widgets</b><br>
               - Please enter a custom widget name, click 'Add New' and enter your widget modifiers<br>
               - Click 'Edit' to adjust your widget modifiers<br>
               - Enter the widget tag into the required pages as specified above. An example of this would be <i>[trustist-reviewer widget="customwidgetname"]</i>.
               </p>
            </td>
          </tr>
        </table>
      </fieldset>
      <fieldset>
       <legend><br><b>Widgets</b></legend>
        <table class="wp-list-table widefat" style="width:100%;" cellspacing="0">
	  <tr>
            <th><b>Widget Name</b></th>
            <th><b>Action</b></th>
          </tr>$widgets
          <form name="tr2_widget" method="post" action="?page=tr2_settings">
          <tr>
            <td><input type="text" name="widget" value=""></td>
            <td><input type="submit" name="Submit" value="Add New" class="button-secondary"></td>
          </tr>
          </form>
        </table>
      </fieldset>
    </div>
  </div>
EOT;
  }
}
?>
