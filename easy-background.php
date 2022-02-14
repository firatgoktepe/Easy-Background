<?php
/*
Plugin Name: Easy Background 
Description: Easily set a full-screen background image, font sizes and colors for your single page website.
Version: 1.0.0
Author: Firat Göktepe
Author URI: https://firatgoktepe.vercel.app/
*/

function eb_textdomain() {

	// Set filter for plugin's languages directory
	$lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$lang_dir = apply_filters( 'eb_languages_directory', $lang_dir );

	// Load the translations
	load_plugin_textdomain( 'easy-background-image', false, $lang_dir );
}
add_action( 'init', 'eb_textdomain' );

/*****************************************
* global
*****************************************/

$eb_options = get_option( 'eb_settings' );

/*****************************************
* includes
*****************************************/
include( 'includes/admin-page.php' );
include( 'includes/display-image.php' );
include( 'includes/scripts.php' );


/** For error debug purpose */
add_action('activated_plugin','my_save_error');
function my_save_error()
{
    file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}