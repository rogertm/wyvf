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
 * Template Name: WYVF Program
 */
get_header(); ?>

		<section id="main-content" <?php t_em_breakpoint( 'main-content' ); ?>>
			<section id="content" role="main" <?php t_em_breakpoint( 'content-one-column' ); ?>>
				<?php do_action( 't_em_action_content_before' ); ?>
				<section id="program" class="program">
				<?php
				// Query for Custom Loop
				$args = array( 'post_type'			=> 'wyvf-program',
								'posts_per_page'	=> -1,
						);
				$the_query = new WP_Query ( $args );
				$cols = 2;
				if ( $the_query->have_posts() ) :
					if ( $cols ) :
						echo '<div class="row">';
						$i = 0;
					endif;

					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						if ( $cols && 0 == $i % $cols ) :
							echo '</div>';
							echo '<div class="row">';
						endif;
						get_template_part( '/template-parts/content', 'program' );
						if ( $cols ) :
							$i++;
						endif;
					endwhile;

					if ( $cols ) :
						echo '</div>';
					endif;
				else :
					get_template_part( '/template-parts/content', 'none' );
				endif;
				wp_reset_postdata();
				?>
				</section>
				<?php do_action( 't_em_action_content_after' ); ?>
			</section><!-- #content -->
		</section><!-- #main-content -->
<?php get_footer(); ?>
