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

	// Unhook
	remove_action( 't_em_action_site_info_right', 't_em_display_user_social_network' );
	remove_action( 't_em_action_site_info_left', 't_em_copy_right' );
	remove_action( 't_em_action_post_after', 't_em_single_related_posts' );
	remove_action( 't_em_action_post_after', 't_em_single_navigation', 5 );
	remove_action( 'get_the_excerpt', 't_em_custom_excerpt_more' );
	remove_action( 't_em_action_entry_meta_header', 't_em_post_date' );
	remove_action( 't_em_action_entry_meta_header', 't_em_post_author' );
	remove_action( 't_em_action_entry_meta_footer', 't_em_post_shortlink' );

	// Hooks
	add_action( 't_em_action_site_info_before', 't_em_display_user_social_network' );
	add_action( 't_em_action_site_info_before', 't_em_copy_right' );
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

/**
 * Redirect post type archive
 *
 * @since WYVF 1.0
 */
function wyvf_redirect(){
	$pages = wyvf_custom_pages();
	$dogo = array();
	foreach ( $pages as $key => $value ) :
		if ( $value['post_type'] ) :
			$args = array(
				'value'	=> $value['value'],
				'type'	=> $value['post_type'],
				'go'	=> t_em( $value['value'] ),
			);
			$go = array( $value['post_type'] => $args );
			$dogo = array_merge( $dogo, array_slice( $go, -1 ) );
		endif;
	endforeach;

	foreach ( $dogo as $key => $value ) :
		if ( is_post_type_archive( $value['type'] ) ) :
			wp_safe_redirect( get_permalink( $value['go'] ) );
		endif;
	endforeach;
}
add_action( 'template_redirect', 'wyvf_redirect' );
?>
