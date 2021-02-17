
<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Food
 * @subpackage Food/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Food
 * @subpackage Food/public
 * @author     pankaj <pankajsharma7863134@gmail.com>
 */
class Food_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	private $table_activator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once PLUGIN_PATH . 'includes/class-food-activator.php';
	    $this->table_activator = new Food_Activator();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_style_public() {
        
            wp_enqueue_style("pankja-my-self", PLUGIN_URL.'public/assets/css/animate.css', array(), $this->version, 'all');

            wp_enqueue_style("style-22", PLUGIN_URL.'public/assets/css/owl.carousel.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-32", PLUGIN_URL . 'public/assets/css/slick.css', array(), $this->version, 'all');

            wp_enqueue_style("style-42", PLUGIN_URL . 'public/assets/css/chosen.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-52", PLUGIN_URL . 'public/assets/css/ionicons.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-62", PLUGIN_URL . 'public/assets/css/font-awesome.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-72", PLUGIN_URL . 'public/assets/css/simple-line-icons.css', array(), $this->version, 'all');

            wp_enqueue_style("style-82", PLUGIN_URL . 'public/assets/css/jquery-ui.css', array(), $this->version, 'all');

            wp_enqueue_style("style-92", PLUGIN_URL . 'public/assets/css/meanmenu.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-102", PLUGIN_URL . 'public/assets/css/style.css', array(), $this->version, 'all');

            wp_enqueue_style("style-112", PLUGIN_URL . 'public/assets/css/responsive.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts_public() {

		
		
  
          wp_enqueue_script("script-101", PLUGIN_URL . 'public/assets/js/vendor/modernizr-2.8.3.min.js', array(), $this->version, true);

          wp_enqueue_script("script-102", PLUGIN_URL . 'public/assets/js/vendor/jquery-1.12.0.min.js', array(), $this->version, true);

          wp_enqueue_script("script-103", PLUGIN_URL . 'public/assets/js/popper.js', array(), $this->version, true);

          wp_enqueue_script("script-10111", PLUGIN_URL . 'public/assets/js/bootstrap.min.js', array(), $this->version, true);

          wp_enqueue_script("script-104", PLUGIN_URL . 'public/assets/js/imagesloaded.pkgd.min.js', array(), $this->version, true);

          wp_enqueue_script("script-105", PLUGIN_URL . 'public/assets/js/isotope.pkgd.min.js', array(), $this->version, true);

          
          wp_enqueue_script("script-107", PLUGIN_URL . 'public/assets/js/owl.carousel.min.js', array(), $this->version, true);

          wp_enqueue_script("script-108", PLUGIN_URL . 'public/assets/js/plugins.js', array(), $this->version, true);

          wp_enqueue_script("script-1080", PLUGIN_URL . 'public/assets/js/sweetalert2.all.min.js', array(), $this->version, true);

          wp_enqueue_script("script-109", PLUGIN_URL . 'public/assets/js/main.js', array(), $this->version, true);

        wp_enqueue_script("script-13", PLUGIN_URL . 'public/assets/js/script1.js', array('jquery'), $this->version, true);
        wp_localize_script("script-13", "food1", array(
            "ajaxurl" => admin_url("admin-ajax.php")
          
        ));  
	}
      
    // logout
  public function logout_page(){
       
 
    global $post;

    if($post->post_name == "logout"){
      
        $page_template = $this->include_template_file("logout", array());
        
          die();
     }

    return $page_template;

  }

  // header 

  public function header_page(){
       
 
    global $post;

    if($post->post_name == "header"){
      
        $page_template = $this->include_template_file("header", array());
        
          die();
     }

    return $page_template;

  }


      // about us page
	public function about_us_page(){
       
 
		global $post;

		if($post->post_name == "about-us"){
		  
        $page_template = $this->include_template_file("about-us", array());
        
          die();
     }

	  return $page_template;

	}

	// account page
    public function account_page(){

		global $post;

		if($post->post_name == "account"){

        global $wpdb;

            
            
             $category = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_category_table(). " ORDER by order_number ASC"  

                    )
             );
          
          $page_template = $this->include_template_file("account", array("category" =>$category ));
           die();
		}

		return $page_template;
	}

	 //cart page
     public function cart_page(){

		global $post;

		if($post->post_name == "cart"){

        global $wpdb;
   
          
          $page_template = $this->include_template_file("cart", array());
           die();
		}

		return $page_template;
	}

	// checkout
	public function checkout_page(){

		global $post;

		if($post->post_name == "checkout"){

        global $wpdb;   
          
          $page_template = $this->include_template_file("checkout", array());
           die();
		}

		return $page_template;
	}

	// contact
    public function contact_page(){

		global $post;

		if($post->post_name == "contact"){

        global $wpdb;
   
          $page_template = $this->include_template_file("contact", array());
           die();
		}

		return $page_template;
	}

	// index
	public function index_page(){

		global $post;
    
		if($post->post_name == "index"){
        
        global $wpdb;
            
          $page_template = $this->include_template_file("index", array());
           die();
		}

		return $page_template;
	}

	// product
	public function product_page(){

		global $post;

		if($post->post_name == "product"){

        global $wpdb;

                  
             if(isset($_GET['cat_dish'])){
                $cat_dish = isset($_GET['cat_dish']) ? $_GET['cat_dish'] :"";

              $cat_dish_arr = array_filter(explode(':',$cat_dish));
               
           $cat_dish_str = implode(",",  $cat_dish_arr);

             }

                  
             $category = $wpdb->get_results(
                    $wpdb->prepare(
                      "select * from " . $this->table_activator->get_category_table(). " where status=%d order by order_number desc ", 1  

                    )
             );
           
             $dish_sql = " select * from  wp_pkj_dish where status=1";
             if(isset($_GET['cat_dish']) && $_GET['cat_dish']!=""){
              
             	$dish_sql .= " and category_id in ($cat_dish_str) ";

             }

             $dish_sql .=" order by dish desc";   
             $dish = $wpdb->get_results(
                    $wpdb->prepare(
                      $dish_sql
                    )
             );
             

            
             $cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] :"";
            
          
          $page_template = $this->include_template_file("product", array("category" =>$category,"dish" =>$dish,"cat_id" =>$cat_id, "cat_dish" => $cat_dish ,"cat_dish_arr" => $cat_dish_arr));
          die();
		}

		return $page_template;
	}


	// login
	public function login_page(){

		global $post;

		if($post->post_name == "login"){

        global $wpdb;

          
          $page_template = $this->include_template_file("login", array());
           die();
		}

		return $page_template;
	}

	

	//  ajax request
	public function public_ajax_request(){

           global $wpdb;
          

         $param = isset($_REQUEST['param']) ? $_REQUEST['param'] :"";

        if(!empty($param)){
          if($param == "contact_us"){
            
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] :"";
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] :"";
            $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] :"";
            $message = isset($_REQUEST['message']) ? $_REQUEST['message'] :"";

               if($name == ""){
                  $this->json(0,"", array("name_error" => "***please fiil name***"));
                  }

                if($email == ""){
                  $this->json(0,"", array("email_error" => "***please fill email***"));
                  }  

                if($subject == ""){
                  $this->json(0,"", array("subject_error" => "***please fill subject***"));
                }  

                if($message == ""){
                  $this->json(0,"", array("message_error" => "***please fill message***"));
                 }  
            
                 $wpdb->insert($this->table_activator->get_contact_us_table(),array(
                        "name"   => $name,
                        "email"   => $email,
                        "subject" => $subject,
                        "message" => $message,
                             ));

                 if($wpdb->insert_id > 0){

                            $this->json(1,"message send Successfully");
                 }
          }elseif ($param == "frm-register") {
                
              $name = isset($_REQUEST['name']) ? $_REQUEST['name'] :"";
              $email = isset($_REQUEST['email']) ? $_REQUEST['email'] :"";

              $password = isset($_REQUEST['password']) ? $_REQUEST['password'] :"";
              $mobile = isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] :"";
             
               if($name == ""){
                  $this->json(0,"", array("name_error" => "***please fiil name***"));
                  }

                if($email == ""){
                  $this->json(0,"", array("email_error" => "***please fill email***"));
                  }  

                if($password == ""){
                  $this->json(0,"", array("password_error" => "***please fill password***"));
                  } 
                  
                if($mobile == ""){
                  $this->json(0,"", array("mobile_error" => "***please fill mobile***"));
                  }    
               
                  if(!empty($email)){

                   $find_email = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT * from " . $this->table_activator->get_user_table() . " WHERE email = %s", $email
                     )
                  );
                    
                 


                   if(!empty($find_email)){
                       $this->json(0,"", array("email_error" => "***email alrready exist try another one***"));
                   }
               }

                 
               

                  $wpdb->insert($this->table_activator->get_user_table(),array(
                        "name"   => $name,
                        "email"   => $email,
                        "password" => $password,
                        "mobile" => $mobile,
                             ));
 
                       $this->json(1,"user register successfully");
          }elseif ($param == "frm-login") {
                
              
              $email = isset($_REQUEST['email_login']) ? $_REQUEST['email_login'] :"";
              $password = isset($_REQUEST['Password_login']) ? $_REQUEST['Password_login'] :"";
              

                if($email == ""){
                  $this->json(0,"", array("email_login_error" => "***please fill email***"));
                  }  

                if($password == ""){
                  $this->json(0,"", array("password_login_error" => "***please fill password***"));
                  } 
        
               
               if(!empty($email && $password)){

                      $find_email = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * from " . $this->table_activator->get_user_table() . " WHERE email = %s AND password = %d", $email,$password
                         ),ARRAY_A
                        );


                   

                     if(empty($find_email)){
                         $this->json(0,"", array("password_login_error" => "***please fill correct detail***"));
                     }
                     if(!empty($find_email)){
                         $this->json(1,"login successfully");
                     }
                   
                }
          }

            


        // end main function
        }

                  

        wp_die();
	}

        // function register_my_session(){
        //      if (!session_id()){
        //         session_start();
            
        //     }
        
                
        // }

          
        // function deregister_my_session($find_email){
        //      if (!session_id()){
        //         session_start();
            
        //     }

            
        //     $_SESSION['FOOD_USER_ID'] = $find_email;
        //     unset($_SESSION['FOOD_USER_ID'] );     
                
                     
        // }
           


	
	public function get_dish_detail_info($dish_id) {

        global $wpdb;
        $dish_detail_info = $wpdb->get_results(
                $wpdb->prepare(
                        "SELECT * from " . $this->table_activator->get_dish_details_table() . " WHERE dish_id = %d AND status = %d", $dish_id, 1
                ),ARRAY_A
        );

        if (!empty($dish_detail_info)) {
            return $dish_detail_info;
          

        }
        return '';
       }

   public function json($status,$message,$arr = array()){

        $ar = array("status" =>$status, "message" =>$message, "array" =>$arr);
      echo json_encode($ar);
       die();

       }


	public function include_template_file($template, $lib_params = array()) {

        ob_start();
        $info = $lib_params;
        include_once PLUGIN_PATH . 'public/partials/' . $template . ".php";
        $template = ob_get_contents();
        ob_end_clean();

        echo $template;
      }

      


}
