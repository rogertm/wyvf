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
 * Array of pages object
 *
 * @since WYVF 1.0
 */
function wyvf_list_pages( $type ){
	$args = array(
		'post_type'			=> $type,
		'posts_per_page'	=> -1,
		'orderby'			=> 'title',
		'post_status'		=> array( 'publish', 'private' ),
		'order'				=> 'ASC',
		'post_parent'		=> 0,
	);
	$sort = get_posts( $args );
	sort( $sort );
	return apply_filters( 'wyvf_admin_filter_list_pages', get_posts( $args ) );
}

/**
 * Custom Pages
 *
 * @since WYVF 1.0
 */
function wyvf_custom_pages(){
	$pages = array(
		'page_faq'	=> array(
			'value'			=> 'page_faq',
			'label'			=> __( 'Page FAQ', 'wyvf' ),
			'public_label'	=> __( 'FAQ', 'wyvf' ),
			'user_menu'		=> '',
			'type'			=> 'page',
		),
		'page_program'	=> array(
			'value'			=> 'page_program',
			'label'			=> __( 'Page Program', 'wyvf' ),
			'public_label'	=> __( 'Program', 'wyvf' ),
			'user_menu'		=> '',
			'type'			=> 'page',
		),
	);
	return apply_filters( 'wyvf_admin_filter_custom_pages', $pages );
}

/**
 * Custom Content Panel
 *
 * @since WYVF 1.0
 */
function wyvf_setting_fields_custom_pages(){
?>
	<h2><?php _e( 'Custom Pages', 'wyvf' ) ?></h2>
<?php
	foreach ( wyvf_custom_pages() as $page ) :
?>
	<div class="text-option custom-pages">
		<label class="">
			<span><?php echo $page['label']; ?></span>
			<select name="t_em_theme_options[<?php echo $page['value'] ?>]">
				<option value="0"><?php _e( '&mdash; Select &mdash;', 'wyvf' ); ?></option>
				<?php foreach ( wyvf_list_pages( $page['type'] ) as $list ) : ?>
					<?php $selected = selected( t_em( $page['value'] ), $list->ID, false ); ?>
					<option value="<?php echo $list->ID ?>" <?php echo $selected; ?>><?php echo $list->post_title ?></option>
					<?php
						$args = array(
							'post_type'			=> $page['type'],
							'posts_per_page'	=> -1,
							'orderby'			=> 'title',
							'post_status'		=> array( 'publish', 'private' ),
							'order'				=> 'ASC',
							'post_parent'		=> $list->ID,
						);
						$sort_child = get_posts( $args );
						sort( $sort_child );
						foreach ( $sort_child as $child ) :
							$selected = selected( t_em( $page['value'] ), $child->ID, false );
					?>
						<option value="<?php echo $child->ID ?>" <?php echo $selected; ?>> &mdash; <?php echo $child->post_title ?></option>
					<?php
						endforeach;
					?>
				<?php endforeach; ?>
			</select>
		</label>
		<?php if ( t_em( $page['value'] ) ) : ?>
			<div class="row-action">
				<span class="edit"><a href="<?php echo get_edit_post_link( t_em( $page['value'] ) ) ?>"><?php _e( 'Edit', 'wyvf' ) ?></a> | </span>
				<span class="view"><a href="<?php echo get_permalink( t_em( $page['value'] ) ) ?>"><?php _e( 'View', 'wyvf' ) ?></a></span>
			</div>
		<?php endif; ?>
	</div>
<?php
	endforeach;
}
?>
