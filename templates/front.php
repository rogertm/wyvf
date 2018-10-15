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
 * Add Front Page Widgets Headline
 *
 * @since WYVF 1.0
 */
function wyvf_get_front_page_widgets_headline(){
?>
	<header class="<?php echo t_em_grid( 12 ) ?>">
		<h2><?php echo t_em( 'front_page_witgets_headline' ) ?></h2>
	</header>
<?php
}
add_action( 't_em_action_custom_front_page_inside_before', 'wyvf_get_front_page_widgets_headline' );

/**
 * Display CPT Program in front page
 *
 * @since WYVF 1.0
 */
function wyvf_front_page_program(){
	if ( ! is_front_page() )
		return;

	$args = array(
		'post_type'			=> 'wyvf-program',
		'posts_per_page'	=> 4,
	);
	$programs = get_posts( $args );
?>
	<section id="program" class="program my-5 py-5">
		<div class="<?php echo t_em_container() ?>">
			<div class="row">
			<?php foreach ( $programs as $program ) : ?>
				<div class="program-item mb-5 <?php echo t_em_grid( 6 ) ?>">
					<h4 class="program-title"><?php echo $program->post_title ?></h4>
					<div class="program-body"><?php t_em_get_post_excerpt( $program->ID ) ?></div>
				</div>
			<?php endforeach; ?>
				<div class="<?php echo t_em_grid( 12 ) ?> text-center"><a href="<?php echo get_post_type_archive_link( 'wyvf-program' ) ?>" class="btn btn-primary"><?php _e( 'All Program' ) ?></a></div>
			</div>
		</div>
	</section>
<?php
}
add_action( 't_em_action_main_after', 'wyvf_front_page_program', 99 );

/**
 * Follow us before to follow us... :P
 *
 * @since WYVF 1.0
 */
function wyvf_follow_us(){
?>
	<h4 class="h5 text-uppercase"><?php _e( 'Follow us', 'wyvf' ) ?></h4>
<?php
}
add_action( 't_em_action_site_info_before', 'wyvf_follow_us' );

/**
 * Override function
 */
function t_em_copy_right(){
?>
	<div id="copyright" class="mb-3">
		<?php printf( __( '&copy; %s %s. All right reserved', 'wyvf' ), date( 'Y' ), get_bloginfo( 'name' ) ) ?>
	</div><!-- #copyright -->
<?php
}
?>
