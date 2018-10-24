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
?>
		<?php do_action( 't_em_action_post_before' ); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( array( t_em_grid( $cols ), 'program-item border-bottom' ) ); ?>>
			<?php do_action( 't_em_action_post_inside_before' ); ?>
				<h2 class="entry-title program-title text-left"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wyvf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="program-body"><?php the_excerpt(); ?></div>
				<?php do_action( 't_em_action_post_inside_after' ); ?>
		</article><!-- #post-## -->
		<?php do_action( 't_em_action_post_after' ); ?>
