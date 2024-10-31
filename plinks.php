<?php
/*
Plugin Name: Powie's pLinks PagePeeker
Plugin URI: https://powie.de/wordpress/plinks
Description: Link directory pageview with pagepeeker preview and shortcodes
Version: 1.0.2
License: GPLv2
Author: Thomas Ehrhardt
Author URI: https://powie.de
Text Domain: plinks
Domain Path: /languages
*/

//Define some stuff
define( 'PL_VERSION', '1.0.2');
define( 'PL_PLUGIN_DIR', dirname( plugin_basename( __FILE__ ) ) );
define( 'PL_PAGEPEEKER_URL', 'http://free.pagepeeker.com/v2/thumbs.php?size=%s&url=%s');
define( 'PL_LOVE', 'Linkdirectory made with <a href="https://powie.de" target="_blank">Powies</a> pLinks Plugin '.PL_VERSION );
define( 'PL_PAGEPEEKER_API_URL', 'https://api.pagepeeker.com/v2/thumbs.php?size=%s&url=%s');
load_plugin_textdomain( 'plinks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

//create custom plugin settings menu
add_action('admin_menu', 'plinks_create_menu');
add_action('admin_init', 'plinks_register_settings' );

//Style
add_action( 'init', 'plcssadd' );
function plcssadd() {
    wp_enqueue_style( 'plinks', plugins_url('/plinks.css', __FILE__), array(), PL_VERSION, 'all' );
}

//Shortcode
add_shortcode('plinks', 'plinks_show');
add_shortcode('pagepeeker', 'plinks_pagepeeker');

//Hook for Activation
register_activation_hook( __FILE__, 'plinks_activate' );
//Hook for Deactivation
register_deactivation_hook( __FILE__, 'plinks_deactivate' );

function plinks_create_menu() {
	// or create options menu page
	add_options_page(__('pLinks Setup'),__('pLinks Setup'), 'manage_options', PL_PLUGIN_DIR.'/plinks_settings.php');
}

function plinks_register_settings() {
	//register settings
	register_setting( 'plinks-settings', 'plinks-showlove' );
	register_setting( 'plinks-settings', 'websnapr-show' );
	register_setting( 'plinks-settings', 'websnapr-size' );
	register_setting( 'plinks-settings', 'ppapikey' );
}

function plinks_pagepeeker( $atts ){
	//var_Dump($atts);
	/*
	   extract( shortcode_atts( array(
	   'foo' => 'something',
	   'bar' => 'something else',
	   ), $atts ) );
	   return "Hallo -> foo = {$foo}";
	*/
	$url = $atts['url'];
	$size = $atts['size'];
	if ($size == '') { $size = get_option('websnapr-size'); }
	$sc = '<!-- pLinks Plugin PagePeeker Output -->';
	if  (get_option('ppapikey') != '') {
		$sc.=sprintf( '<img src="'.PL_PAGEPEEKER_API_URL.'" border="0" alt="preview" />',$size , $url);
	} else {
		$sc.=sprintf( '<img src="'.PL_PAGEPEEKER_URL.'" border="0" alt="preview" />',$size,  $url);
	}
	$sc.='<!-- /pLinks Plugin PagePeeker Output -->';
	return $sc;
}

function plinks_show( $atts ) {
	//var_Dump($atts);
	/*
	extract( shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts ) );
	return "Hallo -> foo = {$foo}";
	*/
	$bookmarks = get_bookmarks( array(
				'orderby'        => 'name',
				'order'          => 'ASC',
				'category_name'  => $atts['category_name']  ));
	$websnapr_key = get_option('websnapr-key');
	$websnapr_show = get_option('websnapr-show');
	$websnapr_size = get_option('websnapr-size');
	$sc = '<!-- pLinks Plugin Output -->';
	// Loop through each bookmark and print formatted output
	foreach ( $bookmarks as $bm ) {
		$sc.=sprintf( '<div class="post plinks">');
		$sc.=sprintf( '<h2><a class="relatedlink" href="%s" target="%s">%s</a></h2>', $bm->link_url,$bm->link_target, __($bm->link_name) );
		if($websnapr_show == 1) {
			if  (get_option('ppapikey') != '') {
				$sc.=sprintf( ' <div style="float:left; padding-right:0.5em; padding-bottom:0.5em;">
                                <img src="'.PL_PAGEPEEKER_API_URL.'" border="0" />
						    	</div> ',$websnapr_size, $bm->link_url );
			} else {
				$sc.=sprintf( ' <div style="float:left; padding-right:0.5em; padding-bottom:0.5em;">
                                <img src="'.PL_PAGEPEEKER_URL.'" border="0" />
						    	</div> ',$websnapr_size,  $bm->link_url );
			}
		}
		$sc.='<div class="postentry"><p>';
		$sc.=sprintf ('%s<br />%s',$bm->link_description, nl2br($bm->link_notes));
		//var_dump($bm);
		$sc.= '</p></div></div>';
	}
	if ( get_option('plinks-showlove','1') == 1 ) {
		$sc.='<br /><p style="text-align: center; font-size:11px;">'.PL_LOVE.'</p>';
	}
	$sc.='<!-- /pLinks Plugin Output -->';
	return $sc;
}

//Activate
function plinks_activate() {
	// do not generate any output here
}

//Deactivate
function plinks_deactivate() {
	// do not generate any output here
}
?>