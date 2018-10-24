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
 * Template Name: WYVF FAQ
 */
get_header(); ?>

		<section id="main-content" <?php t_em_breakpoint( 'main-content' ); ?>>
			<section id="content" role="main" <?php t_em_breakpoint( 'content-one-column' ); ?>>
				<?php do_action( 't_em_action_content_before' ); ?>
				<?php
				// Custom query for post type FAQ
				$args = array(
				'post_type'			=> 'wyvf-faq',
				'posts_per_page'	=> -1,
				'order'				=> 'ASC',
				'orderby'			=> 'menu_order',
				);

				$faqs = get_posts( $args );
				?>
				<div id="faq-archive">
					<?php foreach ( $faqs as $faq ) : ?>
					<div id="faq-<?php echo $faq->ID ?>" class="faq mb-3 border-bottom">
						<div class="faq-body">
							<h2 class="faq-title pt-5"><?php echo $faq->post_title ?></h2>
							<div class="faq-text">
								<?php echo t_em_wrap_paragraph( $faq->post_content ) ?>
							</div>
						</div>
					</div>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
				<?php do_action( 't_em_action_content_after' ); ?>
			</section><!-- #content -->
		</section><!-- #main-content -->
<?php get_footer(); ?>
