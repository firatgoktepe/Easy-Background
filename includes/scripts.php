<?php

function eb_load_css() {
	global $eb_options;
	if( isset( $eb_options['image'] ) ) {
		wp_enqueue_style( 'eb-image', plugin_dir_url( __FILE__ ) . 'fullscreen-image.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'eb_load_css' );

function eb_load_admin_scripts( $hook ) {
	if( 'appearance_page_full-screen-background' !== $hook )
		return;

	wp_enqueue_media();
	wp_enqueue_script( 'eb-scripts', plugin_dir_url( __FILE__ ) . 'eb-scripts.js', array( 'jquery', 'media-upload', 'thickbox' ), filemtime( plugin_dir_path( __FILE__ ) . 'eb-scripts.js' ) );
}
add_action( 'admin_enqueue_scripts', 'eb_load_admin_scripts' );
