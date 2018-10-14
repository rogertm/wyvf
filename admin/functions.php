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
 * Remove unnecessary options
 */
add_filter( 't_em_admin_filter_header_options_no_header_image', '__return_false' );
add_filter( 't_em_admin_filter_header_options_slider', '__return_false' );
add_filter( 't_em_admin_filter_header_options_static_header', '__return_false' );
add_filter( 't_em_admin_filter_front_page_options_wp_front_page', '__return_false' );

/**
 * Front Page Widgets template
 *
 * @since WYVF 1.0
 */
function wyvf_front_page_witgets_templates( $templates = '' ){
	unset( $templates['template-jumbotron'] );
	unset( $templates['template-features'] );
	return $templates;
}
add_filter( 't_em_admin_filter_front_page_witgets_templates', 'wyvf_front_page_witgets_templates' );

/**
 * Add a headline to front page witgets
 *
 * @since WYVF 1.0
 */
function wyvf_front_page_witgets_headline(){
?>
	<div class="row d-flex">
		<div id="text_widget_headline" class="sub-extend option-group flex-equal">
			<div class="layout text-option">
				<header><?php _e( 'Headline', 'wyvf' ) ?></header>
				<p>
					<label>
						<span><?php _e( 'Title', 'wyvf' ) ?></span>
						<input type="text" class="regular-text headline" name="t_em_theme_options[front_page_witgets_headline]" value="<?php echo t_em( 'front_page_witgets_headline' ) ?>">
					</label>
				</p>
			</div>
		</div>
	</div>
<?php
}
add_action( 't_em_admin_action_from_page_option_widgets-front-page_before', 'wyvf_front_page_witgets_headline' );

/**
 * Merge into default theme options
 * This function is attached to the "t_em_admin_filter_default_theme_options" filter hook
 * @return array 	Array of options
 *
 * @since WYVF 1.0
 */
function wyvf_default_theme_options( $default_theme_options ){
	$wyvf_default_options = array(
		'front_page_witgets_headline'	=> '',
	);

	$default_options = array_merge( $default_theme_options, $wyvf_default_options );

	return $default_options;
}
add_filter( 't_em_admin_filter_default_theme_options', 'wyvf_default_theme_options' );

/**
 * Sanitize and validate the input.
 * This function is attached to the "t_em_admin_filter_theme_options_validate" filter hook
 * @param $input array  Array of options to validate
 * @return array
 *
 * @since WYVF 1.0
 */
function wyvf_theme_options_validate( $input ){
	if ( ! $input )
		return;

	// Text inputs
	foreach ( array(
		'front_page_witgets_headline',
	) as $text_field ) :
		$input[$text_field] = ( isset( $input[$text_field] ) ) ? trim( $input[$text_field] ) : '';
	endforeach;
	return $input;
}
add_filter( 't_em_admin_filter_theme_options_validate', 'wyvf_theme_options_validate' );
?>
