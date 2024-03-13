<?php
/**
 * Setup logtra Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function logtra_child_theme_setup() {
	load_child_theme_textdomain( 'logtra-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'logtra_child_theme_setup' );


function logtra_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'logtra_enqueue_styles' );