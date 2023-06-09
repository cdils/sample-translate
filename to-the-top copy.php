<?php
/*
 * Plugin Name:       To the Top
 * Description:       Adds a 'back to top' link
 * Version:           0.0.1
 * Requires at least: 6.2
 * Requires PHP:      8.0
 * Author:            Carrie Dils
 * Author URI:        https://carriedils.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       to-the-top
 * Domain Path:       /languages
 */

 /**
  * Output the "back to top" link to footer.
  *
  */
function ttt_add_link() {

	// Define the 'back to top' link text.
	$link_text = __( 'Back to top (PHP)', 'to-the-top' );

	// Output the 'back to top' link.
	printf( '<a href="#" id="to-the-top">%s</a>', $link_text );
}
add_action( 'wp_footer', 'ttt_add_link' );

/**
 * Load scripts.
 *
 * @return void
 */
function ttt_load_scripts() {
	wp_enqueue_script( 'to-the-top', plugin_dir_url(__FILE__) . 'js/to-the-top.js', array( 'wp-i18n', 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'ttt_load_scripts' );

/**
 * Load javascript translations.
 *
 * @return void
 */
function ttt_load_js_translations() {
	wp_set_script_translations( 'to-the-top', 'to-the-top', plugin_basename( __FILE__ ) . '/languages' );
}
add_action( 'wp_enqueue_scripts', 'ttt_load_js_translations', 100 );

/**
 * Load plugin textdomain (for PHP translations).
 */
function ttt_load_php_translations() {
	$text = load_plugin_textdomain( 'to-the-top', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'ttt_load_php_translations' );
