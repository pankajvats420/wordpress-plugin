<?php  

/**
 * Plugin Name:       My Blog Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */



 require_once(plugin_dir_path(__FILE__).'menu.php');


require_once(plugin_dir_path(__FILE__).'custom.php');

require_once(plugin_dir_path(__FILE__).'meta.php');


add_action("admin_enqueue_scripts","pnk_add_script");


function pnk_add_script(){

	require_once(plugin_dir_path(__FILE__).'files.php');
}

























?>