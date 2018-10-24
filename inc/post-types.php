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
 * Register CPT
 *
 * @since WYVF 1.0
 */
function wyvf_cpt(){
	$post_types = array(
		'wyvf-program'		=> array(
				'post-type'		=> 'wyvf-program',
				'singular'		=> _x( 'Program', 'post type singular name', 'wyvf' ),
				'plural'		=> _x( 'Programs', 'post type general name', 'wyvf' ),
				'hierarchical'	=> false,
				'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'shortlinks' ),
				'rewrite'		=> _x( 'wyvf-program', 'post type slug', 'wyvf' ),
				'public'		=> true,
			),
		'wyvf-faq'		=> array(
				'post-type'		=> 'wyvf-faq',
				'singular'		=> _x( 'FAQ', 'post type singular name', 'wyvf' ),
				'plural'		=> _x( 'FAQs', 'post type general name', 'wyvf' ),
				'hierarchical'	=> false,
				'supports'		=> array( 'title', 'editor' ),
				'rewrite'		=> _x( 'wyvf-faq', 'post type slug', 'wyvf' ),
				'public'		=> false,
			),
	);

	foreach ( $post_types as $post_type => $pt ) :
		$labels = array(
			'name'					=> $pt['plural'],
			'singular_name'			=> $pt['singular'],
			'manu_name'				=> $pt['plural'],
			'all_items'				=> sprintf( __( 'All %s', 'wyvf' ), $pt['plural'] ),
			'add_new'				=> __( 'Add new', 'wyvf' ),
			'add_new_item'			=> sprintf( __( 'Add new %s', 'wyvf' ), $pt['singular'] ),
			'edit_item'				=> sprintf( __( 'Edit %s', 'wyvf' ), $pt['singular'] ),
			'new_item'				=> sprintf( __( 'New %s', 'wyvf' ), $pt['singular'] ),
			'view_item'				=> sprintf( __( 'View %s', 'wyvf' ), $pt['singular'] ),
			'search_items'			=> sprintf( __( 'Search %s', 'wyvf' ), $pt['plural'] ),
			'not_found'				=> sprintf( __( 'No %s found', 'wyvf' ), $pt['singular'] ),
			'not_found_in_trash'	=> sprintf( __( 'No %s found in trash', 'wyvf' ), $pt['singular'] ),
			'parent_item_colon'		=> sprintf( __( 'Parent %s', 'wyvf' ), $pt['singular'] ),
		);

		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'exclude_from_search'	=> ( $pt['public'] ) ? false : true,
			'publicly_queryable'	=> ( $pt['public'] ) ? true : false,
			'show_ui'				=> true,
			'show_in_nav_menus'		=> true,
			'show_in_menu'			=> true,
			'show_in_admin_bar'		=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> $pt['hierarchical'],
			'supports'				=> $pt['supports'],
			'has_archive'			=> ( $pt['public'] ) ? true : false,
			'rewrite'				=> array( 'slug' => $pt['rewrite'] ),
			'query_var'				=> true,
			'can_export'			=> true,
		);

		register_post_type( $pt['post-type'], $args );
	endforeach;
}
add_action( 'init', 'wyvf_cpt' );

/**
 * Rewrite rules to get permalinks works when theme will be activated
 *
 * @since WYVF 1.0
 */
function wyvf_rewrite_flush(){
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'wyvf_rewrite_flush' );
?>
