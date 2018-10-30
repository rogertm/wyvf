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
 * The default template for displaying content
 */
$cols = 6;
$date = explode( ' ', get_the_date( 'd M Y' ) );
?>
		<?php do_action( 't_em_action_post_before' ); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( array( t_em_grid( $cols ), 'program-item media' ) ); ?>>
			<?php do_action( 't_em_action_post_inside_before' ); ?>
			<div class="d-flex text-center text-light bg-green p-2 mr-3">
				<time>
					<span class="day h2 d-block font-weight-bold font-sans-serif"><?php echo $date[0] ?></span>
					<span class="month h5 d-block font-weight-bold text-uppercase"><?php echo $date[1] ?></span>
				</time>
			</div>
			<div class="media-body">
				<h2 class="entry-title program-title text-left h5"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wyvf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="program-body"><?php the_excerpt(); ?></div>
				<?php do_action( 't_em_action_post_inside_after' ); ?>
			</div>
		</article><!-- #post-## -->
		<?php do_action( 't_em_action_post_after' ); ?>
