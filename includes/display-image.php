<?php

/* Background Image */

function fsb_display_image() {
	global $eb_options;

	if ( isset( $eb_options['image'] ) ) {
		$image = $eb_options['image'];
		if( is_ssl() ) {
			$image = str_replace( 'http://', 'https://', $image );
		}
		echo '<img src="' . esc_url( $image ) . '" id="eb_image" alt=""/>';
	}
}
add_action( 'wp_footer', 'fsb_display_image' );


/** Font Sizes */

if( !empty($eb_options['heading_font'])){
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'heading_font' ) );
	} );
	echo '<style>
			.heading_font h1, .heading_font h2, .heading_font h3, .heading_font h4, .heading_font h5, .heading_font h6 {
				font-size: ' . $eb_options['heading_font'] . 'px !important;
			}
						
		</style>';
}

if( !empty($eb_options['text_font'])){
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'text_font' ) );
	} );
	echo '<style>
			.text_font p, .text_font li, .text_font a, .text_font span, .text_font td, .text_font th, .text_font input, .text_font textarea, .text_font select {
				font-size: ' . $eb_options['text_font'] . 'px !important;
			}
						
		</style>';
}

/** Font Colors */

if( !empty($eb_options['heading_font_color'])){
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'heading_font_color' ) );
	} );
	echo '<style>
			.heading_font_color h1, .heading_font_color h2, .heading_font_color h3, .heading_font_color h4, .heading_font_color h5, .heading_font_color h6 {
				color: ' . $eb_options['heading_font_color'] . ' !important;
			}
						
		</style>';
}

if( !empty($eb_options['text_font_color'])){
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'text_font_color' ) );
	} );
	echo '<style>
			.text_font_color h1, .text_font_color h2, .text_font_color h3, .text_font_color h4, .text_font_color h5, .heading_font_color h6 {
				color: ' . $eb_options['text_font_color'] . ' !important;
			}
						
		</style>';
}
