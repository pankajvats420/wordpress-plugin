<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Food
 * @subpackage Food/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Food
 * @subpackage Food/includes
 * @author     pankaj <pankajsharma7863134@gmail.com>
 */
class Food_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	private $table_activator;

	public function __construct($activator)
    {
        $this->table_activator = $activator;
    }


	public function deactivate() {
   
          global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_category_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_coupon_code_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_delivery_boy_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_dish_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_dish_details_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_order_detail_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_order_master_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_order_status_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_user_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_contact_us_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_wallet_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_setting_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_rating_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_dish_cart_table());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->get_banner_table());
       


        // product
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'product'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

        // about-us
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'about-us'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }
       

        // cart
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'cart'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

        // checkout
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'checkout'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

        // contact
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'contact'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

        // logout
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'logout'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

        // login
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'login'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }

         // account
        $get_data = $wpdb->get_row(
                    $wpdb->prepare(
                        "SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s", 'account'
                    ));
        $page_id = $get_data->ID;
        if($page_id > 0){

            wp_delete_post($page_id, true);
        }
      







	}

}
