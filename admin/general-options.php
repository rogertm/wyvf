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
 * Add custom general options
 *
 * @since WYVF 1.0
 */
function wyvf_custom_general_options(){
?>
	<div class="sub-layout text-option general">
		<h4><?php _e( 'Your contact information', 'wyvf' ) ?></h4>
		<p><?php printf( __( 'Insert the <code>%s</code> shortcode to display your contact info in any page or post', 'wyvf' ), '[wyvf_contact]' ) ?></p>
	</div>
	<div class="sub-layout text-option general">
		<label class="description single-option">
			<p><?php _e( 'Contact Email', 'wyvf' ); ?></p>
			<p class="description"><?php _e( 'Email address.', 'wyvf' ); ?></p>
			<input type="email" class="regular-text" name="t_em_theme_options[contact_email]" value="<?php echo t_em( 'contact_email' ) ?>" />
		</label>
	</div>
	<div class="sub-layout text-option general">
		<label class="description single-option">
			<p><?php _e( 'Phone Number', 'wyvf' ); ?></p>
			<p class="description"><?php _e( 'Phone Numbers.', 'wyvf' ); ?></p>
			<input type="text" class="regular-text" name="t_em_theme_options[contact_phone]" value="<?php echo t_em( 'contact_phone' ) ?>" />
		</label>
	</div>
	<div class="sub-layout text-option general">
		<label class="description single-option">
			<p><?php _e( 'Address', 'wyvf' ); ?></p>
			<p class="description"><?php _e( 'Address of your businesses.', 'wyvf' ); ?></p>
			<input type="text" class="regular-text" name="t_em_theme_options[contact_address]" value="<?php echo t_em( 'contact_address' ) ?>" />
		</label>
	</div>
<?php
}
add_action( 't_em_admin_action_general_options_after', 'wyvf_custom_general_options', 15 );
?>
