<?php

function eb_admin_page() {

	global $eb_options;
?>
	<div class="wrap">
		<div id="eb-wrap" class="eb-help">
			<h1><?php _e( 'Easy Background', 'easy-background-image' ); ?></h1>
			<?php
			if ( ! isset( $_REQUEST['updated'] ) )
				$_REQUEST['updated'] = false;
			?>
			<?php if ( false !== $_REQUEST['updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'easy-background-image' ); ?></strong></p></div>
			<?php endif; ?>
			<form method="post" action="options.php">

				<?php settings_fields( 'eb_register_settings' ); ?>

				<h3><?php _e( 'Choose Your Image', 'easy-background-image' ); ?></h3>

				<p>
					<input id="eb_settings[image]" name="eb_settings[image]" type="text" class="upload_field" value="<?php echo $eb_options['image']; ?>"/>
					<input class="upload_image_button button-secondary" type="button" value="<?php _e( 'Choose Image', 'easy-background-image' ); ?>"/><?php do_action( 'eb_additional_image_sources' ); ?>
					<label class="description" for="eb_settings[image]"><?php _e( 'This image will be applied to the background of your website', 'easy-background-image' ); ?></label>
					<p style="font-style: italic; font-size: 10px"><?php _e( '**If you want to remove this font size, you can delete input value you typed and click Save Options', 'easy-background-image' ); ?></p>
				</p>

				<p>
					<?php if( ! empty( $eb_options['image'] ) ) { ?>
						<img src="<?php echo $eb_options['image']; ?>" id="eb_preview_image" style="padding: 3px; border: 1px solid #f0f0f0; max-width: 600px; overflow: hidden;"/>
					<?php } else { ?>
						<img src="<?php echo plugin_dir_url( __FILE__ ) . 'preview.jpg'; ?>" id="eb_preview_image" style="padding: 3px; border: 1px solid #f0f0f0; max-width: 600px; overflow: hidden;"/>
					<?php } ?>
				</p>





                <h3><?php _e( 'Choose Your Font Sizes', 'easy-background-image' ); ?></h3>
                
                <h4><?php _e( 'Heading Font Size', 'easy-background-image' ); ?></h4>
				<p>
					<input id="eb_settings[heading_font]" name="eb_settings[heading_font]" type="text" class="upload_field" value="<?php if ( is_array( $eb_options ) && isset( $eb_options['heading_font'] ) ) { echo $eb_options['heading_font']; } else { echo ''; } ?>" size="5"/>
					<label class="description" for="eb_settings[heading_font]"><?php _e( '(px) This font size will be applied to the all headings of your website', 'easy-background-image' ); ?></label>
                    <p style="font-style: italic; font-size: 10px"><?php _e( '**If you want to remove this font size, you can delete input value you typed and click Save Options', 'easy-background-image' ); ?></p>
				</p>

                <h4><?php _e( 'Texts Font Size', 'easy-background-image' ); ?></h4>
				<p>
					<input id="eb_settings[text_font]" name="eb_settings[text_font]" type="text" class="upload_field" value="<?php if ( is_array( $eb_options ) && isset( $eb_options['text_font'] ) ) { echo $eb_options['text_font']; } else { echo ''; } ?>" size="5"/>
					<label class="description" for="eb_settings[text_font]"><?php _e( '(px) This font size will be applied to the all texts of your website', 'easy-background-image' ); ?></label>
                    <p style="font-style: italic; font-size: 10px"><?php _e( '**If you want to remove this font size, you can delete input value you typed and click Save Options', 'easy-background-image' ); ?></p>
				</p>


                <h3><?php _e( 'Choose Your Font Colors', 'easy-background-image' ); ?></h3>
                
                <h4><?php _e( 'Heading Font Color', 'easy-background-image' ); ?></h4>
				<p>
					<input id="eb_settings[heading_font_color]" name="eb_settings[heading_font_color]" type="text" class="upload_field" value="<?php if ( is_array( $eb_options ) && isset( $eb_options['heading_font_color'] ) ) { echo $eb_options['heading_font_color']; } else { echo ''; } ?>" size="5"/>
					<label class="description" for="eb_settings[heading_font_color]"><?php _e( 'This font color can be color name OR hex code OR rgb value', 'easy-background-image' ); ?></label>
                    <p style="font-style: italic; font-size: 14px"><?php _e( 'Ex: white OR #fff OR rgb(255,255,255)', 'easy-background-image' ); ?></p>
                    <p style="font-style: italic; font-size: 10px"><?php _e( '**If you want to remove this font color, you can delete input value you typed and click Save Options', 'easy-background-image' ); ?></p>
				</p>

                <h4><?php _e( 'Texts Font Color', 'easy-background-image' ); ?></h4>
				<p>
					<input id="eb_settings[text_font_color]" name="eb_settings[text_font_color]" type="text" class="upload_field" value="<?php if ( is_array( $eb_options ) && isset( $eb_options['text_font_color'] ) ) { echo $eb_options['text_font_color']; } else { echo ''; } ?>" size="5"/>
					<label class="description" for="eb_settings[text_font_color]"><?php _e( 'This font colcan be color name OR hex code OR rgb value', 'easy-background-image' ); ?></label>
                    <p style="font-style: italic; font-size: 10px"><?php _e( 'Ex: white OR #fff OR rgb(255,255,255)', 'easy-background-image' ); ?></p>
                    <p style="font-style: italic; font-size: 10px"><?php _e( '**If you want to remove this font color, you can delete input value you typed and click Save Options', 'easy-background-image' ); ?></p>
				</p>




				<!-- save the options -->
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'easy-background-image' ); ?>" />
				</p>

			</form>
		</div><!--end eb-wrap-->
	</div><!--end wrap-->
<?php
}
function eb_init_admin() {
	$eb_admin = add_submenu_page( 'themes.php', __( 'Easy Background', 'easy-background-image' ), __( 'Easy BG', 'easy-background-image' ), 'manage_options', 'full-screen-background', 'eb_admin_page' );

	/* Adding support for Instant Images plugin */
	if ( class_exists( 'InstantImages' ) ){
		add_action( 'admin_head-' . $eb_admin, 'instant_img_media_popup_content' );
		add_action( 'eb_additional_image_sources', 'instant_img_media_popup' );
	}
}
add_action( 'admin_menu', 'eb_init_admin' );

// register the plugin settings
function seb_register_settings() {
	register_setting( 'eb_register_settings', 'eb_settings' );
}
add_action( 'admin_init', 'seb_register_settings' );
