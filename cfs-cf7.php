<?php 
/*
 * Plugin Name: CFS - Contact Form 7 Field
 * Description: Custom Field Suite addon for Contact Form 7 Field
 * Version: 1.1
 * Author: Felipe Elia
 * Author URI: http://felipeelia.com.br/
 * Text Domain: cfs-cf7
 * Domain Path: /languages
 * License: GPLv2 or later
*/

function cfs_cf7_add_field_type( $types ) {
    include( 'cfs_cf7.php' );
	$types['cf7'] = dirname( __FILE__ ) . '/cfs_cf7.php';
	return $types;
}
add_filter( 'cfs_field_types', 'cfs_cf7_add_field_type' );

function cfs_cf7_load_textdomain() {
	load_plugin_textdomain( 'cfs-cf7', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'cfs_cf7_load_textdomain' );