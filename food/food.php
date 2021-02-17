<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://onlinewebtutorhub.blogspot.com/
 * @since             1.0.0
 * @package           Food
 *
 * @wordpress-plugin
 * Plugin Name:       food
 * Plugin URI:        https://wppb.me/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            pankaj
 * Author URI:        http://onlinewebtutorhub.blogspot.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       food
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if (!defined('FS_METHOD')) {
    define("FS_METHOD", "direct");
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FOOD_VERSION', '1.0.0' );
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-food-activator.php
 */
function activate_food() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-food-activator.php';
	         $table_activator = new Food_Activator();
	         $table_activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-food-deactivator.php
 */
function deactivate_food() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-food-activator.php';
	         $activator = new Food_Activator();

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-food-deactivator.php';
	    $table_deactivator = new Food_Deactivator($activator);
	    $table_deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_food' );
register_deactivation_hook( __FILE__, 'deactivate_food' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-food.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_food() {

	$plugin = new Food();
	$plugin->run();

}
run_food();
