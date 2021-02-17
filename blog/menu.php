<?php

function pnk_create_menu(){

	add_menu_page("Blog","Blog","manage_options","blog","pnk_main_menu_callback_function","dashicons-admin-home",82);

	add_submenu_page("blog", "Contact", "Contact", "manage_options", "Contact","pnk_contact_callback_function");

}

add_action("admin_menu","pnk_create_menu");


function pnk_main_menu_callback_function(){


         echo plugin_dir_path(__FILE__);
}






function pnk_contact_callback_function(){



global $wpdb;


	$record = $wpdb->get_results(


              $wpdb->prepare(

                    "select * from wp_form "
              ),ARRAY_A
	);

	     ob_start();
         require_once(plugin_dir_path(__FILE__).'table.php');
        $template = ob_get_contents();
        ob_end_clean();

        echo $template;

}











 ?>