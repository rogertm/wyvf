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
 * Register Setting
 * @link http://codex.wordpress.org/Settings_API
 *
 * @since WYVF 1.0
 */
function wyvf_register_setting_init(){
	add_settings_field( 'wyvf_custom_content', __( 'Custom Content', 'wyvf' ), 'wyvf_setting_fields_custom_pages', 'twenty-em-options', 'twenty-em-section' );
}
add_action( 't_em_admin_action_add_settings_field', 'wyvf_register_setting_init' );

/**
 * Enqueue styles and scripts
 *
 * @since WYVF 1.0
 */
function wyvf_admin_enqueue(){
	$screen = get_current_screen();
	if ( $screen->id == 'toplevel_page_twenty-em-options' ):
		wp_register_style( 'style-admin', T_EM_CHILD_THEME_DIR_URL.'/admin/admin.css', false, t_em_theme( 'Version' ), 'all' );
		wp_enqueue_style( 'style-admin' );
	endif;
}
add_action( 'admin_enqueue_scripts', 'wyvf_admin_enqueue' );

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
 * Layouts template
 *
 * @since WYVF 1.0
 */
function wyvf_layout_options( $template = '' ){
	unset( $template['two-columns-content-left'] );
	unset( $template['two-columns-content-right'] );
	unset( $template['three-columns-content-left'] );
	unset( $template['three-columns-content-right'] );
	unset( $template['three-columns-content-middle'] );
	return $template;
}
add_filter( 't_em_admin_filter_layout_options', 'wyvf_layout_options' );

/**
 * Footer template
 *
 * @since WYVF 1.0
 */
function wyvf_footer_options( $template = '' ){
	unset( $template['four-footer-widget'] );
	unset( $template['three-footer-widget'] );
	unset( $template['two-footer-widget'] );
	unset( $template['one-footer-widget'] );
	return $template;
}
add_filter( 't_em_admin_filter_footer_options', 'wyvf_footer_options' );

/**
 * Call to Actions template
 *
 * @since WYVF 1.0
 */
function wyvf_call_actions_options( $template = '' ){
	unset( $template['call_action_three'] );
	unset( $template['call_action_four'] );
	return $template;
}
add_filter( 't_em_admin_filter_call_actions_options', 'wyvf_call_actions_options' );

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
		'contact_email'					=> '',
		'contact_phone'					=> '',
		'contact_address'				=> '',
	);

	// Get custom pages from the original function
	foreach ( wyvf_custom_pages() as $pages => $value ) :
		$key = array( $value['value'] => '' );
		$wyvf_default_options = array_merge( $wyvf_default_options, array_slice( $key, -1 ) );
	endforeach;

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

	// Let's go for pages
	$pages = wyvf_custom_pages();
	foreach ( $pages as $key => $value ) :
		if ( array_key_exists( $input[$key['value']], $pages ) ) :
			$input[$key] = $input[$key['value']];
		endif;
	endforeach;

	// Text inputs
	foreach ( array(
		'front_page_witgets_headline',
		'contact_email',
		'contact_phone',
		'contact_address',
	) as $text_field ) :
		$input[$text_field] = ( isset( $input[$text_field] ) ) ? trim( $input[$text_field] ) : '';
	endforeach;
	return $input;
}
add_filter( 't_em_admin_filter_theme_options_validate', 'wyvf_theme_options_validate' );
?>
