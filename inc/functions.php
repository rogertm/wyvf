<?php
/**
 * WYVF
 *
 * @package			WordPress
 * @subpackage		WYVF
 * @author			RogerTM
 * @license			license.txt
 * @link			https://worldyouthvolleyballfestival.com
 * @since 			WYVF 1.0
 */

/**
 * WYVF Setup
 *
 * @since WYVF 1.0
 */
function wyvf_setup(){
	// Make WYVF available for translation.
	load_child_theme_textdomain( 'wyvf', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wyvf_setup' );

/**
 * Enqueue and register all css and js
 *
 * @since WYVF 1.0
 */
function wyvf_enqueue(){
	wp_register_style( 'wyvf-', t_em_get_css( 'theme', T_EM_CHILD_THEME_DIR_PATH .'/css', T_EM_CHILD_THEME_DIR_URL .'/css' ), '', t_em_theme( 'Version' ), 'all' );
	wp_enqueue_style( 'wyvf-' );
}
add_action( 'wp_enqueue_scripts', 'wyvf_enqueue' );

/**
 * Dequeue styles form parent theme
 *
 * @since WYVF 1.2
 */
function wyvf_dequeue(){
	wp_dequeue_style( 'twenty-em-style' );
	wp_deregister_style( 'twenty-em-style' );
}
add_action( 'wp_enqueue_scripts', 'wyvf_dequeue', 999 );
?>
