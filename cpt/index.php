<?php


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
       	<label>image:</label>
       	<?php  $image = get_post_meta($post->ID,"dish_detail_image",true); ?>
       	<input type="file" name="image" value="<?php echo $image; ?>">

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



 ?>