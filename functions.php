<?php

/**
 * Child theme styles.
 */
function tspa_enqueue_styles() {
	wp_enqueue_style(
		'seedlet-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'seedlet-style' ),
		filemtime( __DIR__ . '/style.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'tspa_enqueue_styles' );

/**
 * Create a "Colors Manager" class to short out the Seedlet colors customizer stuff.
 */
class Colors_Manager {}

/**
 * Force hardcode the values.
 */
add_filter( 'theme_mod_custom_colors_active', '__return_null' );

// These will be used by Seedlet's `functions.php` for the editor color palette.
add_filter( 'theme_mod_seedlet_--global--color-primary',    function() { return '#000000'; } );
add_filter( 'theme_mod_seedlet_--global--color-secondary',  function() { return '#3C8067'; } );
add_filter( 'theme_mod_seedlet_--global--color-tertiary',   function() { return '#FAFBF6'; } );
add_filter( 'theme_mod_seedlet_--global--color-foreground', function() { return '#333333'; } );
add_filter( 'theme_mod_seedlet_--global--color-background', function() { return '#FFFFFF'; } );

// Add this to a later action as the child theme's functions.php loads before the parent theme.
// Or we could `unregister_sidebar( 'sidebar-1' )` on `wp_loaded`
add_action( 'after_setup_theme', function() {
	remove_action( 'widgets_init', 'seedlet_widgets_init' );
});
