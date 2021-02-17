<?php

/**
 * Fired during plugin activation
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Food
 * @subpackage Food/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Food
 * @subpackage Food/includes
 * @author     pankaj <pankajsharma7863134@gmail.com>
 */
class Food_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		global $wpdb;
// show create table table_name
		 if ($wpdb->get_var("show tables like '" . $this->get_category_table() . "'") != $this->get_category_table()) {

           $sql_category = 'CREATE TABLE `' . $this->get_category_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `category` varchar(50) NOT NULL,
                                `order_number` int(11) NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql_category);

            $sqlcategoryinsert = "INSERT INTO ".$this->get_category_table()." ( `id`, `category`, `order_number`, `status`) VALUES
             (1, 'Drinks', 1, 1),
				     (2, 'Chinese', 2, 1),
				     (3, 'South Indian', 3, 1),
				     (4, 'Desserts', 4, 1)";
            $wpdb->query(
                    $sqlcategoryinsert
            );
        }

        if ($wpdb->get_var("show tables like '" . $this->get_coupon_code_table() . "'") != $this->get_coupon_code_table()) {

           $sql_get_coupon_code_table = 'CREATE TABLE `' . $this->get_coupon_code_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `coupon_code` varchar(50) NOT NULL,
                                `coupon_type` enum("P","F") NOT NULL,
                                `coupon_value` int(11) NOT NULL,
                                `cart_min_value` int(11) NOT NULL,
                                `expired_on` date NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql_get_coupon_code_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_delivery_boy_table() . "'") != $this->get_delivery_boy_table()) {

           $get_delivery_boy_table = 'CREATE TABLE `' . $this->get_delivery_boy_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `name` varchar(50) NOT NULL,
                                `mobile` varchar(50) NOT NULL,
                                `password` varchar(50) NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_delivery_boy_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_dish_table() . "'") != $this->get_dish_table()) {

           $get_dish_table = 'CREATE TABLE `' . $this->get_dish_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `category_id` int(11) NOT NULL,
                                `dish` varchar(100) NOT NULL,
                                `dish_detail` text NOT NULL,
                                `image` varchar(100) NOT NULL,
                                `type` enum("veg","non-veg") NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_dish_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_dish_details_table() . "'") != $this->get_dish_details_table()) {

           $get_dish_details_table = 'CREATE TABLE `' . $this->get_dish_details_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `dish_id` int(11) NOT NULL,
                                `attribute` varchar(100) NOT NULL,
                                `price` int(11) NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_dish_details_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_order_detail_table() . "'") != $this->get_order_detail_table()) {

           $get_order_detail_table = 'CREATE TABLE `' . $this->get_order_detail_table() . '` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `order_id` int(11) NOT NULL,
                                  `dish_details_id` int(11) NOT NULL,
                                  `price` float NOT NULL,
                                  `qty` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_order_detail_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_order_master_table() . "'") != $this->get_order_master_table()) {

           $get_order_master_table = 'CREATE TABLE `' . $this->get_order_master_table() . '` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                              `user_id` int(11) NOT NULL,
                              `name` varchar(50) NOT NULL,
                              `email` varchar(50) NOT NULL,
                              `mobile` varchar(50) NOT NULL,
                              `address` text NOT NULL,
                              `total_price` float NOT NULL,
                              `coupon_code` varchar(20) NOT NULL,
                              `final_price` float NOT NULL,
                              `zipcode` varchar(10) NOT NULL,
                              `delivery_boy_id` int(11) NOT NULL,
                              `payment_status` varchar(20) NOT NULL,
                              `payment_type` varchar(10) NOT NULL,
                              `payment_id` varchar(100) NOT NULL,
                              `order_status` int(11) NOT NULL,
                              `cancel_by` enum("user","admin") NOT NULL,
                              `cancel_at` datetime NOT NULL ,
                              `delivered_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_order_master_table);
        }

        if ($wpdb->get_var("show tables like '" . $this->get_order_status_table() . "'") != $this->get_order_status_table()) {

           $get_order_status_table = 'CREATE TABLE `' . $this->get_order_status_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `order_status` varchar(50) NOT NULL,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_order_status_table);

            $order_status = "INSERT INTO ".$this->get_order_status_table()." ( `id`, `order_status`) VALUES
                (1, 'Pending'),
                (2, 'Cooking '),
                (3, 'On the Way'),
                (4, 'Delivered'),
                (5, 'Cancel')";
            $wpdb->query(
                    $order_status
            );
        }

        if ($wpdb->get_var("show tables like '" . $this->get_user_table() . "'") != $this->get_user_table()) {

           $get_user_table = 'CREATE TABLE `' . $this->get_user_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `name` varchar(50) NOT NULL,
							    `email` varchar(50) NOT NULL,
							    `mobile` varchar(15) NOT NULL,
							    `password` varchar(50) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_user_table);
        }

        // contact us 

        if ($wpdb->get_var("show tables like '" . $this->get_contact_us_table() . "'") != $this->get_contact_us_table()) {

           $get_contact_us_table = 'CREATE TABLE `' . $this->get_contact_us_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `name` varchar(50) NOT NULL,
                                `email` varchar(50) NOT NULL,
                                `subject` varchar(15) NOT NULL,
                                `message` varchar(50) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_contact_us_table);
        }


        // baner

        if ($wpdb->get_var("show tables like '" . $this->get_banner_table() . "'") != $this->get_banner_table()) {

           $get_banner_table = 'CREATE TABLE `' . $this->get_banner_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `image` varchar(100) NOT NULL,
                                `heading` varchar(500) NOT NULL,
                                `sub_heading` varchar(500) NOT NULL,
                                `link` varchar(100) NOT NULL,
                                `link_txt` varchar(100) NOT NULL,
                                `order_number` int(11) NOT NULL,
                                `status` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_banner_table);
        }


        // dish_cart

        if ($wpdb->get_var("show tables like '" . $this->get_dish_cart_table() . "'") != $this->get_dish_cart_table()) {

           $get_dish_cart_table = 'CREATE TABLE `' . $this->get_dish_cart_table() . '` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `user_id` int(11) NOT NULL,
                                `dish_detail_id` int(11) NOT NULL,
                                `qty` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_dish_cart_table);
        }

        // rating


        if ($wpdb->get_var("show tables like '" . $this->get_rating_table() . "'") != $this->get_rating_table()) {

           $get_rating_table = 'CREATE TABLE `' . $this->get_rating_table() . '` (
                                `id` int(11) NOT NULL,
                                `user_id` int(11) NOT NULL,
                                  `order_id` int(11) NOT NULL,
                                  `dish_detail_id` int(11) NOT NULL,
                                  `rating` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_rating_table);
        }


         // setting
        if ($wpdb->get_var("show tables like '" . $this->get_setting_table() . "'") != $this->get_setting_table()) {

           $get_setting_table = 'CREATE TABLE `' . $this->get_setting_table() . '` (
                                `id` int(11) NOT NULL,
                                  `cart_min_price` int(11) NOT NULL,
                                  `cart_min_price_msg` varchar(250) NOT NULL,
                                  `website_close` int(11) NOT NULL,
                                  `wallet_amt` int(11) NOT NULL,
                                  `website_close_msg` varchar(250) NOT NULL,
                                  `referral_amt` int(11) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_setting_table);
        }



         // wallet
        if ($wpdb->get_var("show tables like '" . $this->get_wallet_table() . "'") != $this->get_wallet_table()) {

           $get_wallet_table = 'CREATE TABLE `' . $this->get_wallet_table() . '` (
                                `id` int(11) NOT NULL,
                                  `user_id` int(11) NOT NULL,
                                  `amt` int(11) NOT NULL,
                                  `msg` varchar(500) NOT NULL,
                                  `type` enum("in","out") NOT NULL,
                                  `payment_id` varchar(50) NOT NULL,
                                `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($get_wallet_table);
        }






        // about page
     $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'about-us'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'About Us',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'about-us',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }

        // product page 

        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'product'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'product',
                'post_content' => 'product',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'product',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }

        // cart page

        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'cart'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'cart',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'cart',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }

        // checkout page


        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'checkout'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'checkout',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'checkout',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }

        // contact page

        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'contact'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'contact',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'contact',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }



        // login

        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'login'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'login',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'login',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }

        


        // account


        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'account'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'account',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'account',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }


         // logout
        $is_page_exists = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $wpdb->prefix . "posts WHERE post_name = %s", 'logout'
                )
        );

         if (!empty($is_page_exists)) {
            // we have already that page
           } else {
            $pankaj_page = array(
                'post_title' => 'logout',
                'post_content' => 'this is me',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name' => 'logout',
                'post_type' => 'page',
            );
            wp_insert_post($pankaj_page);
        }






        











     // activate function end
	}
     // activate function end
    public function get_wallet_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_wallet";
    }

    public function get_setting_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_setting";
    }

    public function get_rating_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_rating";
    }

    public function get_dish_cart_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_dish_cart";
    }


    public function get_banner_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_banner";
    }

    public function get_contact_us_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_contact_us";
    }

	public function get_category_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_category";
    }

    public function get_coupon_code_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_coupon_code";
    }

    public function get_delivery_boy_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_delivery_boy";
    }


    public function get_dish_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_dish";
    }


    public function get_dish_details_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_dish_details";
    }


    public function get_order_detail_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_order_detail";
    }

    public function get_order_master_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_order_master";
    }

    public function get_order_status_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_order_status";
    }

    public function get_user_table() {

      global $wpdb;
      return $wpdb->prefix . "pkj_user";
    }

    public function get_dish_detail_info($dish_id) {

        global $wpdb;
        $dish_detail_info = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $this->table_activator->get_dish_detail_table() . " WHERE dish_id = %d AND status = %d", $dish_id, 1
                )
        );

        if (!empty($dish_detail_info)) {
            return $dish_detail_info->price;
        }
        return '';
       }



}
