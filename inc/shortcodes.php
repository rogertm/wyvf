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
 * Shortcode [wyvf_contact]
 * Behavior [wyvf_contact]
 *
 * @since WYVF 1.0
 */
function wyvf_shortcode_contact( $atts, $content = null ){
	$phone		= ( t_em( 'contact_phone' ) ) ? '<div class="contact-phone text-center"><i class="icomoon-old-phone mr-1 border border-dark rounded-circle p-1"></i>'. t_em( 'contact_phone' ) .'</div>' : null;
	$email		= ( t_em( 'contact_email' ) ) ? '<div class="contact-email text-center"><i class="icomoon-mail mr-1 border border-dark rounded-circle p-1"></i>'. t_em( 'contact_email' ) .'</div>' : null;
	$address	= ( t_em( 'contact_address' ) ) ? '<div class="contact-address text-center"><i class="icomoon-location-pin mr-1 border border-dark rounded-circle p-1"></i>'. t_em( 'contact_address' ) .'</div>' : null;

	$output	= '<div class="d-flex justify-content-around my-5">'. $phone . $email . $address .'</div>';
	return $output;
}
add_shortcode( 'wyvf_contact', 'wyvf_shortcode_contact' );
?>
