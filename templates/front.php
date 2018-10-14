<?php
/**
 * WYVF
 *
 * @package			WordPress
 * @subpackage		WYVF
 * @author			RogerTM
 * @license			license.txt
 * @link			https://themingisprose.com/twenty-em
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
?>
