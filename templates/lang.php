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

function wyvf_select_lang(){
	if ( ! is_plugin_active( 'qtranslate-x/qtranslate.php' ) )
		return;

	global $q_config;
	$url = ( is_404() ) ? home_url( '/' ) : '';
	$current_lang = ( ! isset( $q_config['url_info']['lang_url'] ) )
					? $q_config['default_language']
					: $q_config['url_info']['lang_url'];
?>
	<div id="language" class="w-100 text-right mr-3">
		<div class="btn-group" role="group">
<?php
	foreach( qtranxf_getSortedLanguages() as $language ) :
		$lang = $q_config['language_name'][$language];
		$active = ( $current_lang == $language ) ? ' active-lang text-primary' : ' text-muted';
		echo '<a href="'. qtranxf_convertURL( $url, $language, false, true ) .'" class="small text-uppercase font-weight-bold ml-1'. $active .'"><small>'. $lang .'</small></a>';
	endforeach;
?>
		</div>
	</div>
<?php
}
add_action( 't_em_action_top_menu_navbar_before', 'wyvf_select_lang' );
?>
