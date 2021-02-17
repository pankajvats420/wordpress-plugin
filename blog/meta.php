<?php


function pnk_create_metabox(){

	add_meta_box("Image","Image","wpl_image_callback_function","banner","normal","low");
  add_meta_box("Price","Price","wpl_Price_callback_function","banner","normal","low");

  add_meta_box("category","category","wpl_category_function","banner","normal","low");


}


add_action("admin_menu","pnk_create_metabox");



// image call back
function wpl_image_callback_function($post){
     
        wp_enqueue_media(); 

             $image = get_post_meta($post->ID,"image",true);
      ?>         
         <button id="image_upload" class="btn btn-success" style="width: 100%;">Choose Image</button>
         <input type="hidden" id="image_upload_save" name="image" value="<?php echo $image; ?>">
         <img src="<?php echo $image; ?>" id="image_upload_show" style="width: 20%;">
         <?php if(!empty($image)) {

          ?>
         <button id="image_remove">Remove</button>
       
      <?php
    }
}



function wpl_category_function($post){
        $category = get_post_meta($post->ID,"category",true);           
  ?>
        
       <div>
         <select name="category" class="form-control" >
           
        <?php  $category_fetch = new WP_Query(array(
                                        "post_type" => "category"
        ));
             
        foreach ($category_fetch->posts as $key => $value) {
          $selected = "";
          if($category == $value->post_title){
            $selected = 'selected="selected"';
          }
         ?>
         <option value="<?php echo $value->post_title; ?>" <?php echo $selected ?>><?php echo $value->post_title; ?></option>

          <?php   

        }


        ?>  
         
          </select>
       </div>
       <?php
}

function wpl_Price_callback_function($post){

       
       ?>
        
       <div>
        
          <?php  $price = get_post_meta($post->ID,"dish_detail_price",true); ?>
        <input type="text" name="price" value="<?php echo $price; ?>" class="form-control" >
       </div>
       <?php
}


// save data

function save_image_detail($post_id,$post){
    	global $typenow;
    	if($typenow == "banner"){

           $image= isset($_REQUEST["image"]) ? $_REQUEST["image"] :"";
           update_post_meta($post_id,"image",$image);

           $price= isset($_REQUEST["price"]) ? $_REQUEST["price"] :"";
            update_post_meta($post_id,"dish_detail_price",$price);

            $category= isset($_REQUEST["category"]) ? $_REQUEST["category"] :"";
            update_post_meta($post_id,"category",$category);



      }
	}

add_action("save_post","save_image_detail",10,2);



 ?>


