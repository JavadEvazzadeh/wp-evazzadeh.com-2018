<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.4
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		// array(
		// 			'name'     				=> 'TGM Example Plugin', // The plugin name
		// 			'slug'     				=> 'tgm-example-plugin', // The plugin slug (typically the folder name)
		// 			'source'   				=> get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source
		// 			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
		// 			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
		// 			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		// 			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		// 			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		// 		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		
		array(
			'name' 		=> 'Option Framework',
			'slug' 		=> 'options-framework',
			'required' 	=> true,
		),
		
		array(
			'name' 		=> 'WP Pagenavi',
			'slug' 		=> 'wp-pagenavi',
			'required' 	=> true,
		),
		
	
		);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'نصب افزونه های مورد نیاز', $theme_text_domain ),
			'menu_title'                       			=> __( 'نصب افزونه ها ', $theme_text_domain ),
			'installing'                       			=> __( 'در حال نصب افزونه: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'اووپس. مشکلی در افزونه پیش آمده .', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'این پوسته نیازمند افزونه های زیر است : %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'این پوسته افزونه های زیر را به شما پیشنهاد می کند: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'متاسفیم، شما اجازه نصب افزونه  %s را ندارید. با مدیر سایت خود تماس بگیرید تا این افزونه را برای شما نصب کند.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'این افزونه ها لازم غیرفعال شده اند: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'این افزونه های پیشنهادی غیرفعال شده اند: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'متاسفیم، شما اجازه فعال سازی افزونه %s را ندارید. با مدیر سایت خود تماس بگیرید تا این افزونه را برای شما فعال کند.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'این افزونه ها برای رسیدن به بیشترین هماهنگی با پوسته نیاز به بروز رسانی به آخرین نسخه خود دارند: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'متاسفیم، شما اجازه بروزرسانی افزونه %s را ندارید. با مدیر سایت خود برای بروز رسانی افزونه به آخرین نسخه تماس بگیرید.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'شروع نصب افزونه', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'فعال سازی افزونه نصب شده', 'Activate installed plugins' ),
			'return'                           			=> __( 'بازگشت به محل نصب افزونه های مورد نیاز', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'افزونه با موفقیت فعال شد.', $theme_text_domain ),
			'complete' 									=> __( 'تمام افزونه ها با موفقیت نصب و فعال شدند. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'به روز رسانی شد.' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}