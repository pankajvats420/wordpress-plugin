<?php 
/**
 * Plugin Name:       My Basics Plugin
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

?>


 <script type="text/javascript">
 	 function yes(){
 	 	var html = jquery("#yes").val();

 	 	alert(html);
 	 }

 </script>

<?php 
function create_home_menu1(){
    add_menu_page(
        'Restaurant ',
        'Restaurant ',
        'manage_options',
        'Restaurant-Menu',
        'my_page',
        'dashicons-admin-home',
        2
    );
    add_submenu_page("Restaurant-Menu", "My Page", "My-page", "manage_options", "Restaurant-Menu","my_page");

    add_meta_box("category-id","Choose Category","wpl_category_callback_function","Dish","normal","low");

    add_meta_box("Dish-detail","Dish-detail","wpl_detail_callback_function","Dish","normal","low");
    add_meta_box("Price","Price","wpl_Price_callback_function","Dish","normal","low");
}
add_action('admin_menu', 'create_home_menu1');

function my_page(){

    	echo site_url(); 
    	echo "<br>";
	    echo get_stylesheet_directory_uri();
	    echo "<br>";
	    echo get_stylesheet();
	    echo "<br>";
	    echo get_template_directory_uri();
	    echo "<br>";
	    echo admin_url();
	    echo "<br>";
	    echo home_url();
	    echo "<br>";
	     echo plugin_dir_path(__FILE__);
	    echo "<br>";
	     echo plugin_dir_url(__FILE__);
	    echo "<br>";

	    require_once(plugin_dir_url(__FILE__).'index.php');
	    add_theme_support( 'post-thumbnails' );
    }


function wpl_Price_callback_function($post){

       
       ?>
        
       <div>
       	<label>Price:</label>
       		<?php  $price = get_post_meta($post->ID,"dish_detail_price",true); ?>
       	<input type="text" name="price" value="<?php echo $price; ?>">
       </div>
       <?php
}


function wpl_category_callback_function($post){
	
       ?>
       <label>Choose Category</label>
       <div>
         <?php
          $saved_id = get_post_meta($post->ID,"dish_category_selected",true);
        wp_dropdown_pages(
        	array(
        		"post_type"=>"category",
        		"name"     =>"dish_category",
        		"selected" =>$saved_id
        	));
         ?>
       </div>
       <?php
}


function wpl_detail_callback_function($post){
	 $saved_id = get_post_meta($post->ID,"dish_category_selected",true);
       ?>
         

       <div>
       	<label>Name:</label>
       	<?php  $name = get_post_meta($post->ID,"dish_detail_name",true); ?>
       	<input type="text" name="name" value="<?php echo $name; ?>">
       	<label>Email:</label>
       		<?php  $email = get_post_meta($post->ID,"dish_detail_email",true); ?>
       	<input type="text" name="email" value="<?php echo $email; ?>">
       </div>
       <?php
}


function save_post_detail($post_id,$post){
	global $typenow;
	if($typenow == "dish"){
		  $category= isset($_REQUEST["dish_category"]) ? intval($_REQUEST["dish_category"]) :"";

		  update_post_meta($post_id,"dish_category_selected",$category);

          $name= isset($_REQUEST["name"]) ? $_REQUEST["name"] :"";
          $email= isset($_REQUEST["email"]) ? $_REQUEST["email"] :"";



          update_post_meta($post_id,"dish_detail_name",$name);
          update_post_meta($post_id,"dish_detail_email",$email);

           $price= isset($_REQUEST["price"]) ? $_REQUEST["price"] :"";
            update_post_meta($post_id,"dish_detail_price",$price);

      }
	}

add_action("save_post","save_post_detail",10,2);



function wpdocs1_codex_Category_init() {
    $labels = array(
        'name'                  => _x( 'Categories', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Category', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Categories', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Category', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Category', 'textdomain' ),
        'new_item'              => __( 'New Category', 'textdomain' ),
        'edit_item'             => __( 'Edit Category', 'textdomain' ),
        'view_item'             => __( 'View Category', 'textdomain' ),
        'all_items'             => __( 'All Categories', 'textdomain' ),
        'search_items'          => __( 'Search Categories', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Categories:', 'textdomain' ),
        'not_found'             => __( 'No Categories found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Categories found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Category Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Category archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Category', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Category', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Categories list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Categories list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Categories list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'Restaurant-Menu',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Category' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail'),
    );
 
    register_post_type( 'Category', $args );
}
 
add_action( 'init', 'wpdocs1_codex_Category_init' );






function wpdocs1_codex_dish_init() {
    $labels = array(
        'name'                  => _x( 'Dish', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Dish', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Dish', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Dish', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Dish', 'textdomain' ),
        'new_item'              => __( 'New Dish', 'textdomain' ),
        'edit_item'             => __( 'Edit Dish', 'textdomain' ),
        'view_item'             => __( 'View Dish', 'textdomain' ),
        'all_items'             => __( 'All Dish', 'textdomain' ),
        'search_items'          => __( 'Search Dish', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Dish:', 'textdomain' ),
        'not_found'             => __( 'No Dish found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Dish found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Dish Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Category archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Category', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Category', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Categories list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Categories list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Categories list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'Restaurant-Menu',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Dish' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail'),
    );
 
    register_post_type( 'Dish', $args );
}
 
add_action( 'init', 'wpdocs1_codex_dish_init' );

add_filter('enter_title_here', 'my_title_place_holder1' , 20 , 2 );
    function my_title_place_holder1($title , $post){

        if( $post->post_type == 'category' ){
            $my_title = "Add New Category";
            return $my_title;
        }

        return $title;

    }





    ?>