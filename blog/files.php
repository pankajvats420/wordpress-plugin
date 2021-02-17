<?php
            
            wp_enqueue_script("script-1",  plugin_dir_url(__FILE__) . 'asset/js/jquery-1.12.0.min.js', array(), "1.0", true);

            wp_enqueue_script("script-2",  plugin_dir_url(__FILE__) . 'asset/js/script.js', array('jquery'), "1.0", true);

            wp_enqueue_script("script-3",  plugin_dir_url(__FILE__) . 'asset/js/bootstrap.min.js', array(), "1.0", true);


               wp_localize_script("script-2", "blog1", array( "ajaxurl" => admin_url("admin-ajax.php")));




               wp_enqueue_style("style-1",  plugin_dir_url(__FILE__) . 'asset/css/bootstrap.min.css', array(), "1.0");


?>

 