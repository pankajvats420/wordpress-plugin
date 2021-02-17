<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Food
 * @subpackage Food/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Food
 * @subpackage Food/admin
 * @author     pankaj <pankajsharma7863134@gmail.com>
 */
class Food_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once PLUGIN_PATH . 'includes/class-food-activator.php';
	    $this->table_activator = new Food_Activator();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

       $page = isset($_REQUEST['page']) ? trim($_REQUEST['page']) : "";

        $plugin_valid_pages = array(
            "form",
            "index",
            "table",
            "category",
            "category-manage",
            "user",
            "user-manage",
            "delivery-boy",
            "delivery-boy-manage",
            "coupon-code",
            "coupon-code-manage",
            "dish",
            "dish-manage",
            "contact-us",
            "order",
            "order-details"
         
        );
        if (in_array($page, $plugin_valid_pages)) {
            //stylesheet files
            wp_enqueue_style("style-1", PLUGIN_URL . 'admin/assets/css/materialdesignicons.min.css', array(), $this->version, 'all');

            wp_enqueue_style("style-2", PLUGIN_URL . 'admin/assets/css/vendor.bundle.base.css', array(), $this->version, 'all');

            wp_enqueue_style("style-3", PLUGIN_URL . 'admin/assets/css/dataTables.bootstrap4.css', array(), $this->version, 'all');

            wp_enqueue_style("style-4", PLUGIN_URL . 'admin/assets/css/bootstrap-datepicker.min.css', array(), $this->version, 'all');

             wp_enqueue_style("style-5", PLUGIN_URL . 'admin/assets/css/style.css', array(), $this->version, 'all');
            
            
        }


		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$page = isset($_REQUEST['page']) ? trim($_REQUEST['page']) : "";

        $plugin_valid_pages = array(
            "form",
            "index",
            "table",
            "category",
            "category-manage",
            "user",
            "user-manage",
            "delivery-boy",
            "delivery-boy-manage",
             "coupon-code",
            "coupon-code-manage",
            "dish",
            "dish-manage",
            "contact-us",
            "order",
            "order-details"
         
        );

        if (in_array($page, $plugin_valid_pages)) {
            //scripts files

            wp_enqueue_script("script-1", PLUGIN_URL . 'admin/assets/js/vendor.bundle.base.js', array(), $this->version, true);
            wp_enqueue_script("script-2", PLUGIN_URL . 'admin/assets/js/jquery.dataTables.js', array(), $this->version, true);
            wp_enqueue_script("script-3", PLUGIN_URL . 'admin/assets/js/dataTables.bootstrap4.js', array(), $this->version, true);
            wp_enqueue_script("script-4", PLUGIN_URL . 'admin/assets/js/Chart.min.js', array(), $this->version, true);
            wp_enqueue_script("script-5", PLUGIN_URL . 'admin/assets/js/bootstrap-datepicker.min.js', array(), $this->version, true);
            wp_enqueue_script("script-6", PLUGIN_URL . 'admin/assets/js/off-canvas.js', array(), $this->version, true);
            wp_enqueue_script("script-7", PLUGIN_URL . 'admin/assets/js/hoverable-collapse.js', array(), $this->version, true);
            wp_enqueue_script("script-8", PLUGIN_URL . 'admin/assets/js/template.js', array(), $this->version, true);
            wp_enqueue_script("script-9", PLUGIN_URL . 'admin/assets/js/settings.js', array(), $this->version, true);
            wp_enqueue_script("script-10", PLUGIN_URL . 'admin/assets/js/todolist.js', array(), $this->version, true);
            wp_enqueue_script("script-11", PLUGIN_URL . 'admin/assets/js/dashboard.js', array(), $this->version, true);
            wp_enqueue_script("script-12", PLUGIN_URL . 'admin/assets/js/data-table.js', array(), $this->version, true);
            wp_enqueue_script("script-15", PLUGIN_URL . 'admin/assets/js/sweetalert2.all.min.js', array(), $this->version, true);
            wp_enqueue_script("script-13", PLUGIN_URL . 'admin/assets/js/script.js', array('jquery'), $this->version, true);
            wp_localize_script("script-13", "food1", array(
                "ajaxurl" => admin_url("admin-ajax.php")
              
            ));      
            
        }
    }   


        public function admin_menus() {

	        add_menu_page("Food Ordreing", "Food Ordreing", "manage_options", "index", array($this, "index"), "dashicons-visibility", 3);
          add_submenu_page("index", "", "", "manage_options", "index", array($this, "index"));

            add_submenu_page("index", "", "", "manage_options", "category", array($this, "category"));

            add_submenu_page("index", "", "", "manage_options", "category-manage", array($this, "category_manage"));

            add_submenu_page("index", "", "", "manage_options", "user", array($this, "user"));

            add_submenu_page("index", "", "", "manage_options", "user-manage", array($this, "user_manage"));

            add_submenu_page("index", "", "", "manage_options", "delivery-boy", array($this, "delivery_boy"));

            add_submenu_page("index", "", "", "manage_options", "delivery-boy-manage", array($this, "delivery_boy_manage"));

            add_submenu_page("index", "", "", "manage_options", "coupon-code", array($this, "coupon_code"));

            add_submenu_page("index", "", "", "manage_options", "coupon-code-manage", array($this, "coupon_code_manage"));

            add_submenu_page("index", "", "", "manage_options", "dish", array($this, "dish"));

            add_submenu_page("index", "", "", "manage_options", "dish-manage", array($this, "dish_manage"));
            add_submenu_page("index", "", "", "manage_options", "contact-us", array($this, "contact_us"));

            add_submenu_page("index", "", "", "manage_options", "order", array($this, "order"));
            add_submenu_page("index", "", "", "manage_options", "order-details", array($this, "order_details"));

      
        
       }


       
       public function index(){

       	    $this->include_template_file("header");
       }
       


        // order list
        public function order(){
          global $wpdb;

             $order = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_order_master_table(). " ORDER by id ASC"  

                    ),ARRAY_A
             );

             

            $this->include_template_file("order",array("order" =>$order));
       }


       // order Manage
        public function order_details(){
          global $wpdb;

            if(isset($_GET['order_id']) && $_GET['order_id']>0){
    
                $id=  isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] :"";

                $order = $wpdb->get_results(
                    $wpdb->prepare('select wp_pkj_order_master.*,wp_pkj_order_status.order_status as order_status_str from wp_pkj_order_master,wp_pkj_order_status where wp_pkj_order_master.order_status=wp_pkj_order_status.id and wp_pkj_order_master.id='.$id.' order by wp_pkj_order_master.id desc'
                    ),ARRAY_A
                );

                $orderStatusRow = $wpdb->get_results(
                    $wpdb->prepare('select * from wp_pkj_order_status order by order_status'
                    ),ARRAY_A
                );

                $orderDeliveryBoyRow = $wpdb->get_results(
                    $wpdb->prepare('select * from delivery_boy where status=1 order by name'
                    ),ARRAY_A
                );
              

              if(isset($_GET['order_status'])){
                $order_status =  isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] :"";

                    if($order_status==5){
                        $cancel_at=date('Y-m-d h:i:s');
                        $wpdb->update($this->table_activator->get_order_master_table(),array( 
                        "order_status" => $order_status,
                        "cancel_at" => $cancel_at
                          ), array(
                            "id" => $id
                                )
                           
                             );
                    }else{
                        $wpdb->update($this->table_activator->get_order_master_table(),array( 
                        "order_status" => $order_status
                          ), array(
                            "id" => $id
                                )
                           
                             );
                    }
              }

              
            }

            $this->include_template_file("order-details",array("order" =>$order,"id" =>$id,"orderStatusRow" => $orderStatusRow,"orderDeliveryBoyRow" =>$orderDeliveryBoyRow));
       }



       
 
        // category list
        public function category(){
          global $wpdb;

             $category = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_category_table(). " ORDER by order_number ASC"  

                    )
             );

             

            $this->include_template_file("category",array("category" =>$category));
       }

       // contact-us
       public function contact_us(){
          global $wpdb;

             $contact_us = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_contact_us_table() 

                    )
             );

             

            $this->include_template_file("contact-us",array("contact_us" =>$contact_us));
       }


       public function category_manage(){
            global $wpdb;

            $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] :"add";

            if(!empty($action) && $action == "edit_cat"){

                $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] :0;
                

                if($cid > 0){
                  
                    $category = $wpdb->get_row(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_category_table() . " WHERE id = %d", $cid
                        ), ARRAY_A
                ); 

                }
            }


            $this->include_template_file("category-manage",array("action"=>$action, "category" =>$category));
       }

       // user list
       public function user(){
         global $wpdb;

             $user = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_user_table() 

                    )
             );

             

            $this->include_template_file("user",array("user" =>$user));
       }
    
       // user manage
       public function user_manage(){
            global $wpdb;

            $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] :"add";

            if(!empty($action) && $action == "edit_user"){

                $uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] :0;
                

                if($uid > 0){
                  
                    $user = $wpdb->get_row(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_user_table() . " WHERE id = %d", $uid
                        ), ARRAY_A
                ); 

                }
            }


            $this->include_template_file("user-manage",array("action"=>$action, "user" =>$user));
       }

       // delivery boy list
        public function delivery_boy(){
         global $wpdb;

             $delivery_boy = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_delivery_boy_table() 

                    )
             );

             

            $this->include_template_file("delivery-boy",array("delivery_boy" =>$delivery_boy));
        }

       // manage delivery boy

       public function delivery_boy_manage(){
            global $wpdb;

            $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] :"add";

            if(!empty($action) && $action == "edit_delivery_boy"){

                $did = isset($_REQUEST['did']) ? $_REQUEST['did'] :0;

                

                if($did > 0){
                  
                    $delivery_boy = $wpdb->get_row(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_delivery_boy_table() . " WHERE id = %d", $did
                        ), ARRAY_A
                ); 

                }
            }


            $this->include_template_file("delivery-boy-manage",array("action"=>$action, "delivery_boy" =>$delivery_boy));
       }


       // coupon code  list
        public function coupon_code(){
         global $wpdb;

             $coupon_code = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_coupon_code_table() 

                    )
             );

             

            $this->include_template_file("coupon-code",array("coupon_code" =>$coupon_code));
        }


       // coupon code manage

       public function coupon_code_manage(){
            global $wpdb;

            $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] :"add";

            if(!empty($action) && $action == "edit_coupon_code"){

                $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] :0;

                

                if($cid > 0){
                  
                    $coupon_code = $wpdb->get_row(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_coupon_code_table() . " WHERE id = %d", $cid
                        ), ARRAY_A
                ); 
                  
                }
            }


            $this->include_template_file("coupon-code-manage",array("action"=>$action, "coupon_code" =>$coupon_code, "arr" =>$arr ));
       }


       // dish list
        public function dish(){
         global $wpdb;

             $dish = $wpdb->get_results(
                    $wpdb->prepare(
                      "SELECT * from " . $this->table_activator->get_dish_table() 

                    )
             );

             

            $this->include_template_file("dish",array("dish" =>$dish));
        }
       
       // dish manage
       public function dish_manage(){
            global $wpdb;

            $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] :"add";
            

            if(!empty($action) && $action == "edit_dish"){
               
                $did = isset($_REQUEST['did']) ? $_REQUEST['did'] :0;
                
                if($did > 0){
                  
                    $dish = $wpdb->get_row(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_dish_table() . " WHERE id = %d", $did
                        ), ARRAY_A
                    ); 

                    $dish_details = $wpdb->get_results(
                        $wpdb->prepare(
                                "SELECT * from " . $this->table_activator->get_dish_details_table() . " WHERE dish_id = %d", $did
                        )
                    ); 

                    
                    
                }
            }
             
             
            $category = $wpdb->get_results(
                $wpdb->prepare(
                        "SELECT * from " . $this->table_activator->get_category_table() . " WHERE status = %d", 1
                )
             );

            

            wp_enqueue_media();


            $this->include_template_file("dish-manage",array("action"=>$action, "dish" =>$dish, "category" =>$category,"dish_details" => $dish_details,"did" => $did ));
       }


       // admin ajax request
       public function admin_ajax_request(){
         global $wpdb;

             $param = isset($_REQUEST['param']) ? $_REQUEST['param'] :"";

        if(!empty($param)){
            if($param == "category_delete"){

                $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] :"";

                 if(!empty($category_id)){
                    $wpdb->delete($this->table_activator->get_category_table(),array(
                      "id" => $category_id
                ));
                    $this->json(1, "category deleted successfully");
                }
                
            }elseif($param == "update_category_status"){
                

                 $category_id = isset($_REQUEST['status_id']) ? $_REQUEST['status_id'] :"";
                 $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";

                 if($type == "deactive"){

                    $status = 0;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_category_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"Category deactive Successfully");
                    }
                 }

                 if($type == "active"){

                    $status = 1;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_category_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"Category active Successfully");
                    }


                 }        
            }elseif($param == "category_add"){

                $category =  isset($_REQUEST['category']) ? $_REQUEST['category'] :"";
                $order_number =  isset($_REQUEST['order_number']) ? $_REQUEST['order_number'] :"";

                $action = isset($_REQUEST['opt_action']) ? $_REQUEST['opt_action'] :"add";



                if($category == "" && $action == "add"){
                  $this->json(0,"", array("category_error" => "***please fiil category***"));
                  }

                if($order_number == ""){
                  $this->json(0,"", array("order_number_error" => "***please fill order number***"));
                  }  

                if($action == "add"){

                    if (!empty($category)) { 
                        $find_category = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_category_table() . " WHERE category = %s", $category
                                )
                        );
                        if (!empty($find_category)) {
                            $this->json(0, "",array("category_error" => "category already exists, try another one"));
                            
                        }

                       
                    }


                       $wpdb->insert($this->table_activator->get_category_table(),array(

                        "order_number" => $order_number,
                        "category" => $category,
                        "status" => 1
                             ));

                       if($wpdb->insert_id > 0){

                            $this->json(1,"category Created Successfully");
                         }else{
                            $this->json(0,"category to Created Book");
                         }
                }elseif($action == "edit_cat"){
                 
                    $find_category = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_category_table() . " WHERE category = %s", $category
                                )
                        );

                    if(!empty($find_category)){
                        $wpdb->update($this->table_activator->get_category_table(),array( 
                            "order_number" => $order_number,
                            "status" => 1
                        
                          ), array(
                            "id" => $find_category->id
                                )
                           
                             );

                         $this->json(1,"category updated Successfully");
                    }else{
                         $this->json(0,"category to updated Book");
                    }

                }  

            }elseif($param == "user_add"){

                $name =  isset($_REQUEST['name']) ? $_REQUEST['name'] :"";
                $email =  isset($_REQUEST['email']) ? $_REQUEST['email'] :"";
                $mobile =  isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] :"";
                $password =  isset($_REQUEST['password']) ? $_REQUEST['password'] :"";
                $action = isset($_REQUEST['opt_action']) ? $_REQUEST['opt_action'] :"add";



                if($name == ""){
                  $this->json(0,"", array("name_error" => "***please fiil name***"));
                  }

                if($email == ""){
                  $this->json(0,"", array("email_error" => "***please fill email***"));
                  }  

                if($mobile == "" && $action == "add"){
                  $this->json(0,"", array("mobile_error" => "***please fill mobile***"));
                }  

                if($password == ""){
                  $this->json(0,"", array("password_error" => "***please fill password***"));
                 }  

                if($action == "add"){

                    if (!empty($mobile)) { 
                        $find_mobile = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_user_table() . " WHERE mobile = %d", $mobile
                                )
                        );
                        if (!empty($find_mobile)) {
                            $this->json(0, "",array("mobile_error" => "mobile already exists, try another one"));
                            
                        }

                       
                    }


                       $wpdb->insert($this->table_activator->get_user_table(),array(
                        "name"   => $name,
                        "email"   => $email,
                        "mobile" => $mobile,
                        "password" => $password,
                             ));

                       if($wpdb->insert_id > 0){

                            $this->json(1,"user Created Successfully");
                         }else{
                            $this->json(0,"user to Created Book");
                         }
                }elseif($action == "edit_user"){
                 
                    $find_user = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_user_table() . " WHERE mobile = %d", $mobile
                                )
                        );

                    if(!empty($find_user)){
                        $wpdb->update($this->table_activator->get_user_table(),array( 
                            "name"   => $name,
                            "email"   => $email,
                            "password" => $password,
                        
                          ), array(
                            "id" => $find_user->id
                                )
                           
                             );

                         $this->json(1,"user updated Successfully");
                    }else{
                         $this->json(0,"user to updated Book");
                    }

                }  
            }elseif($param == "user_delete"){

                $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] :"";

                 if(!empty($user_id)){
                    $wpdb->delete($this->table_activator->get_user_table(),array(
                      "id" => $user_id
                ));
                    $this->json(1, "user deleted successfully");
                }
                
            }elseif($param == "contact_delete"){

                $contact_id = isset($_REQUEST['contact_id']) ? $_REQUEST['contact_id'] :"";

                 if(!empty($contact_id)){
                    $wpdb->delete($this->table_activator->get_contact_us_table(),array(
                      "id" => $contact_id
                ));
                    $this->json(1, "contact deleted successfully");
                }
                
            }elseif($param == "delivery_boy_add"){
 
                $name =  isset($_REQUEST['name']) ? $_REQUEST['name'] :"";
                
                $mobile =  isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] :"";
                $password =  isset($_REQUEST['password']) ? $_REQUEST['password'] :"";

                $action = isset($_REQUEST['opt_action']) ? $_REQUEST['opt_action'] :"add";



                if($name == ""){
                  $this->json(0,"", array("name_error" => "***please fiil name***"));
                  } 

                if($mobile == "" && $action == "add"){
                  $this->json(0,"", array("mobile_error" => "***please fill mobile***"));
                }  

                if($password == ""){
                  $this->json(0,"", array("password_error" => "***please fill password***"));
                 }  

                if($action == "add"){

                    if (!empty($mobile)) { 
                        $find_mobile = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_delivery_boy_table() . " WHERE mobile = %d", $mobile
                                )
                        );
                        if (!empty($find_mobile)) {
                            $this->json(0, "",array("mobile_error" => "mobile already exists, try another one"));
                            
                        }

                       
                    }


                       $wpdb->insert($this->table_activator->get_delivery_boy_table(),array(
                        "name"   => $name,
                        "mobile" => $mobile,
                        "password" => $password,
                        "status"  => 1
                             ));

                       if($wpdb->insert_id > 0){

                            $this->json(1,"delivery boy Created Successfully");
                         }else{
                            $this->json(0,"delivery boy to Created Book");
                         }
                }elseif($action == "edit_delivery_boy"){
                 
                    $find_delivery_boy = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_delivery_boy_table() . " WHERE mobile = %d", $mobile
                                )
                        );

                    if(!empty($find_delivery_boy)){
                        $wpdb->update($this->table_activator->get_delivery_boy_table(),array( 
                            "name"   => $name,
                            "password" => $password,
                            "status"   => 1
                        
                          ), array(
                            "id" => $find_delivery_boy->id
                                )
                           
                             );

                         $this->json(1,"delivery boy updated Successfully");
                    }else{
                         $this->json(0,"delivery boy to updated Book");
                    }

                }  
            }elseif($param == "update_delivery_boy_status"){
                

                 $category_id = isset($_REQUEST['status_id']) ? $_REQUEST['status_id'] :"";
                 $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";

                 if($type == "deactive"){

                    $status = 0;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_delivery_boy_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"delivery boy deactive Successfully");
                    }
                 }

                 if($type == "active"){

                    $status = 1;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_delivery_boy_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"delivery boy active Successfully");
                    }


                 }        
            }elseif($param == "coupon_code_add"){
          
                $coupon_code =  isset($_REQUEST['coupon_code']) ? $_REQUEST['coupon_code'] :"";
                
                $coupon_type =  isset($_REQUEST['coupon_type']) ? $_REQUEST['coupon_type'] :"";
                $coupon_value =  isset($_REQUEST['coupon_value']) ? $_REQUEST['coupon_value'] :"";
                $cart_min_value =  isset($_REQUEST['cart_min_value']) ? $_REQUEST['cart_min_value'] :"";
                $expired_on =  isset($_REQUEST['expired_on']) ? $_REQUEST['expired_on'] :"";

                $action = isset($_REQUEST['opt_action']) ? $_REQUEST['opt_action'] :"add";

           
             
                if($coupon_code == "" && $action = "add"){
                  $this->json(0,"", array("coupon_code" => "***please fiil coupon code***"));
                  } 

                if($coupon_type == ""){
                  $this->json(0,"", array("coupon_type" => "***please fill coupon type***"));
                }  

                if($coupon_value == ""){
                  $this->json(0,"", array("coupon_value" => "***please fill coupon value***"));
                 } 

                if($cart_min_value == ""){
                  $this->json(0,"", array("cart_min_value" => "***please fill cart min value***"));
                } 

                if($expired_on == ""){
                  $this->json(0,"", array("expired_on" => "***please fill expired on***"));
                 }

                if($action == "add"){

                    if (!empty($coupon_code)) { 
                        $find_coupon_code = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_coupon_code_table() . " WHERE coupon_code = %s", $coupon_code
                                )
                        );
                        if (!empty($find_coupon_code)) {
                            $this->json(0, "",array("coupon_code_error" => "coupon code already exists, try another one"));
                            
                        }

                       
                    }

        
                       $wpdb->insert($this->table_activator->get_coupon_code_table(),array(
                        "coupon_code"   => $coupon_code,
                        "coupon_type"   => $coupon_type,
                        "coupon_value"   => $coupon_value,
                        "cart_min_value"   => $cart_min_value,
                        "expired_on"   => $expired_on,
                        "status"   => 1
                        
                             ));

                       if($wpdb->insert_id > 0){

                            $this->json(1,"coupon code Created Successfully");
                         }else{
                            $this->json(0,"coupon code to Created Book");
                         }
                }elseif($action == "edit_coupon_code"){
                 
                    $find_coupon_code = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_coupon_code_table() . " WHERE coupon_code = %s", $coupon_code
                                )
                        );

                    if(!empty($find_coupon_code)){
                        $wpdb->update($this->table_activator->get_coupon_code_table(),array( 
                              "coupon_type"   => $coupon_type,
                              "coupon_value"   => $coupon_value,
                              "cart_min_value"   => $cart_min_value,
                              "expired_on"   => $expired_on,
                              "status"   => 1
                              
                          ), array(
                            "id" => $find_coupon_code->id
                                )
                           
                             );

                         $this->json(1,"coupon code updated Successfully");
                    }else{
                         $this->json(0,"coupon code to updated Book");
                    }

                }  
            }elseif($param == "update_coupon_code_status"){
                

                 $category_id = isset($_REQUEST['status_id']) ? $_REQUEST['status_id'] :"";
                 $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";

                 if($type == "deactive"){

                    $status = 0;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_coupon_code_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"coupon code deactive Successfully");
                    }
                 }

                 if($type == "active"){

                    $status = 1;

                    if(!empty($category_id)){
                        $wpdb->update($this->table_activator->get_coupon_code_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $category_id
                                )
                           
                             );

                         $this->json(1,"coupon code active Successfully");
                    }


                 }        
            }elseif($param == "coupon_code_delete"){

                $coupon_code_id = isset($_REQUEST['coupon_code_id']) ? $_REQUEST['coupon_code_id'] :"";

                 if(!empty($coupon_code_id)){
                    $wpdb->delete($this->table_activator->get_coupon_code_table(),array(
                      "id" => $coupon_code_id
                ));
                    $this->json(1, "coupon code deleted successfully");
                }       
            }elseif($param == "dish_add"){

                $dish =  isset($_REQUEST['dish']) ? $_REQUEST['dish'] :"";
                $dish_detail =  isset($_REQUEST['dish_detail']) ? $_REQUEST['dish_detail'] :"";
                $image =  isset($_REQUEST['image']) ? $_REQUEST['image'] :"";
                $category_id =  isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] :"";
                $attributeArr =  isset($_REQUEST['attribute']) ? $_REQUEST['attribute'] :"";
                $priceArr =  isset($_REQUEST['price']) ? $_REQUEST['price'] :"";
                $type =  isset($_REQUEST['type']) ? $_REQUEST['type'] :"";
                $action = isset($_REQUEST['opt_action']) ? $_REQUEST['opt_action'] :"add";

                // if($dish == "" && $action == "add" ){
                //   $this->json(0,"", array("dish_error" => "***please fiil dish***"));
                //   }

                // if($dish_detail == ""){
                //   $this->json(0,"", array("dish_detail_error" => "***please fill dish_detail***"));
                //   }  

                // if($image == ""){
                //   $this->json(0,"", array("image_error" => "***please fill image***"));
                // }  

                // if($category_id == ""){
                //   $this->json(0,"", array("category_id_error" => "***please fill password***"));
                //  }  

                if($action == "add"){

                    // if (!empty($dish)) { 
                    //     $find_dish = $wpdb->get_row(
                    //             $wpdb->prepare(
                    //                     "SELECT * from " . $this->table_activator->get_dish_table() . " WHERE dish = %s", $dish
                    //             )
                    //     );
                    //     if (!empty($find_dish)) {
                    //         $this->json(0, "",array("dish_error" => "dish already exists, try another one"));
                            
                    //     }

                       
                    // }
                       $wpdb->insert($this->table_activator->get_dish_table(),array( 
                        "dish"   => $dish,
                        "dish_detail"   => $dish_detail,
                        "image" => $image,
                        "type" => $type,
                        "category_id" => $category_id,
                        "status" => 1
                             ));

                       if($wpdb->insert_id > 0){
                                   
                         foreach($attributeArr as $key=>$value){
                            
                           $attribute = $value;
                           $price   =  $priceArr[$key];
                           
                           $wpdb->insert($this->table_activator->get_dish_details_table(),array( 
                                    "dish_id"   => $wpdb->insert_id,
                                    "attribute"   => $attribute,
                                    "price" => $price,
                                    "status" => 1
                                         ));
                         }
                            $this->json(1,"dish Created Successfully");
                         }else{
                            $this->json(0,"dish to Created Book");
                         }
                }elseif($action == "edit_dish"){
                 
                    $find_dish = $wpdb->get_row(
                                $wpdb->prepare(
                                        "SELECT * from " . $this->table_activator->get_dish_table() . " WHERE dish = %s", $dish
                                )
                        );

                    if(!empty($find_dish)){
                        $wpdb->update($this->table_activator->get_dish_table(),array( 
                          "dish_detail"   => $dish_detail,
                          "image" => $image,
                          "category_id" => $category_id,
                          "type" => "veg",
                          "status" => 1
                        
                          ), array(
                            "id" => $find_dish->id
                                )
                           
                             );
                         
                         

                           $wpdb->delete($this->table_activator->get_dish_details_table(),array(
                                "dish_id" => $find_dish->id
                             ));
                           foreach($attributeArr as $key=>$value){
                            
                           $attribute = $value;
                           $price   =  $priceArr[$key];
                           
                           $wpdb->insert($this->table_activator->get_dish_details_table(),array( 
                                    "dish_id"   => $find_dish->id,
                                    "attribute"   => $attribute,
                                    "price" => $price,
                                    "status" => 1
                                         ));
                         }
                         $this->json(1,"dish updated Successfully");
                         
                    }else{
                         $this->json(0,"dish to updated Book");
                    }

                }  
            }elseif($param == "update_dish_status"){
                

                 $status_id = isset($_REQUEST['status_id']) ? $_REQUEST['status_id'] :"";
                 $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";

                 if($type == "deactive"){

                    $status = 0;

                    if(!empty($status_id)){
                        $wpdb->update($this->table_activator->get_dish_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $status_id
                                )
                           
                             );

                         $this->json(1,"dish deactive Successfully");
                    }
                 }

                 if($type == "active"){

                    $status = 1;

                    if(!empty($status_id)){
                        $wpdb->update($this->table_activator->get_dish_table(),array( 
                        "status" => $status
                          ), array(
                            "id" => $status_id
                                )
                           
                             );

                         $this->json(1,"dish active Successfully");
                    }


                 }        
            }elseif($param == "dish_delete"){

                $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] :"";

                 if(!empty($user_id)){
                    $wpdb->delete($this->table_activator->get_dish_table(),array(
                      "id" => $user_id
                ));
                    $this->json(1, "dish deleted successfully");
                }
            }














         }

         wp_die();

       }

        public function get_category_info($category_id) {

        global $wpdb;
        $category_info = $wpdb->get_row(
                $wpdb->prepare(
                        "SELECT * from " . $this->table_activator->get_category_table() . " WHERE id = %d AND status = %d", $category_id, 1
                )
        );

        if (!empty($category_info)) {
            return $category_info->category;
        }
        return '';
       }

       
       function getOrderDetails($oid){
        global $wpdb;
         $orders = $wpdb->get_results(
        $wpdb->prepare('select wp_pkj_order_detail.price,wp_pkj_order_detail.qty,wp_pkj_dish_details.attribute,wp_pkj_dish.dish,wp_pkj_order_detail.dish_details_id
        from wp_pkj_order_detail,wp_pkj_dish_details,wp_pkj_dish
        WHERE
        wp_pkj_order_detail.order_id='.$oid.' AND
        wp_pkj_order_detail.dish_details_id=wp_pkj_dish_details.id AND
        wp_pkj_dish_details.dish_id=wp_pkj_dish.id'
                    ),ARRAY_A
                );
        
        return $orders; 
    }



       public function json($status,$message,$arr = array()){

        $ar = array("status" =>$status, "message" =>$message, "array" =>$arr);
      echo json_encode($ar);
       die();

       }

       public function pr($arr){
            echo '<pre>';
            print_r($arr);
        }

       public function prx($arr){
            echo '<pre>';
            print_r($arr);
            die();
        }

       public function include_template_file($template, $lib_params = array()) {

        ob_start();
        $info = $lib_params;
        include_once PLUGIN_PATH . 'admin/views/' . $template . ".php";
        $template = ob_get_contents();
        ob_end_clean();

        echo $template;
    }

    function bookil_setup_post_type() {
    $args = array(
        'public'    => true,
        'label'     => __( 'Books', 'textdomain' ),
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'book', $args );
}
// add_action( 'init', 'bookil_setup_post_type' );



function twentyseventeen_widgets_init1() {
  register_sidebar(
    array(
      'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'new Sidebar', 'twentyseventeen' ),
      'id'            => 'sidebar-2',
      'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );





}

// add_action( 'widgets_init', 'twentyseventeen_widgets_init1' );




}
