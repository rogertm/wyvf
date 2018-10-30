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
			<?php foreach ( $programs as $program ) :
					$date = explode( ' ', get_the_date( 'd M Y', $program->ID ) );
			?>
				<div class="program-item mt-5 mb-5 media <?php echo t_em_grid( 6 ) ?>">
					<div class="d-flex text-center text-light bg-green p-2 mr-3">
						<time>
							<span class="day h2 d-block font-weight-bold font-sans-serif"><?php echo $date[0] ?></span>
							<span class="month h5 d-block font-weight-bold text-uppercase"><?php echo $date[1] ?></span>
						</time>
					</div>
					<div class="media-body">
						<h4 class="program-title h5"><a href="<?php echo get_permalink( $program->ID ) ?>"><?php echo $program->post_title ?></a></h4>
						<div class="program-body"><?php t_em_get_post_excerpt( $program->ID ) ?></div>
					</div>
				</div>
			<?php endforeach; ?>
				<div class="<?php echo t_em_grid( 12 ) ?> text-center"><a href="<?php echo get_permalink( t_em( 'page_program' ) ) ?>" class="btn btn-primary"><?php _e( 'All Program' ) ?></a></div>
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
