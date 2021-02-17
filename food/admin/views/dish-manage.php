<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;
$arrType=array("veg","non-veg");
 ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<div class="card-title-1">
              <?php 
                   if(isset($info['action']) && $info['action'] == "edit_dish"){

                    echo 'Edit dish';
                   }else{
                    echo "Add dish";
                   }
                 
               ?>
      </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="javascript:void(0)" id="frm-create-new-dish">
                    <div class="form-group">
                      <label for="dish">Dish Name</label>
                      <input type="text" value="<?php echo isset($info['dish']['dish']) ? esc_attr($info['dish']['dish']) : ''; ?>" class="form-control" id="dish" name="dish" placeholder="Add dish"  

                         <?php
                                if (isset($info['action']) && $info['action'] == "edit_dish"){
                                 echo 'readonly';
                                } 
                            ?>
                      >
                      <span class="error" id="dish_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" id="category_id" name="category_id">
                                    <option value="">Choose category</option>
                                    <?php
                                    if (isset($info['category']) && count($info['category']) > 0) {

                                        $saved_id = isset($info['dish']['category_id']) ? intval($info['dish']['category_id']) : '';

                                        foreach ($info['category'] as $category) {

                                            $selected = '';
                                            if ($saved_id == $category->id) {
                                                $selected = 'selected="selected"';
                                            }
                                            ?>
                                            <option value="<?php echo $category->id; ?>" <?php echo $selected; ?>><?php echo $category->category; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                      <span class="error" id="category_id_error"></span>
                     
                    </div>
                    <div class="form-group">
                      <label for="dish_detail">Dish detail</label>
                      <textarea class="form-control" rows="5" id="txt-description-info" name='dish_detail' ><?php echo isset($info['dish']['dish_detail']) ? esc_attr($info['dish']['dish_detail']) : ''; ?></textarea>
                      <span class="error" id="dish_detail_error"></span>
                    </div>
                    <div class="form-group">
                      <label>Image upload</label>
                      
                      <div class="input-group col-xs-12"> 
                        <input type="hidden" value="<?php echo isset($info['dish']['image']) ? esc_attr($info['dish']['image']) : PLUGIN_URL . 'assets/images/logo.png'; ?>" name="image" id="image"/ >
                        <input type="" name="" class="form-control file-upload-info">
                        <span class="error" id="image_error">
                         
                        </span>
                         <button id="btnUploadImage" type="button" class="file-upload-browse btn btn-primary">Upload Image</button>
                      </div>
                          <img class="" disabled placeholder="Upload Image" src="<?php echo isset($info['dish']['image']) ? esc_attr($info['dish']['image']) : PLUGIN_URL . 'admin/assets/images/logo.png'; ?>" style="height: 150px; width: 150px; margin-left: 400px;" id="img-prev">
                    </div>

                    <div class="form-group" id="dish_box_1">
                      <label for="add_more">Add More</label>  
                       <?php if($info["did"] == 0) {
                        ?> 
                       <div class="row">
                          <div class="col-md-5">
                            <input type="text" name="attribute[]" class="form-control" placeholder="Attribute">
                          </div>
                          <div class="col-md-5">
                            <input type="text" name="price[]" class="form-control" placeholder="Price">
                          </div>
                        </div> 

                        <?php    
                       }else{  
                             foreach ($info["dish_details"] as $dish_detail) {
                          ?> 
                          <div class="row mt10" id="box<?php echo $dish_detail->id ?>">
                              <div class="col-md-5">
                                <input type="text" name="attribute[]" class="form-control" placeholder="Attribute" value="<?php echo $dish_detail->attribute ?>" >
                              </div>
                              <div class="col-md-5">
                                <input type="text" name="price[]" class="form-control" placeholder="Price" value="<?php echo $dish_detail->price ?>">
                              </div>
                              <div class="col-md-2"><button type="button" class="btn btn-danger" onclick=remove_more(<?php echo $dish_detail->id ?>)>Remove</button></div>
                        </div>    

                       <?php
                    }
                    }  
                       ?>

                      
                    </div>





  <div class="form-group">
                      <label for="type">Food Type</label>
                      <select class="form-control" id="type" name="type">
                                    <option value="">Choose Food Type</option>
                                    <?php

                                        foreach ($arrType as $type){

                                           
                                            ?>
                                            <option value="<?php echo $type; ?>"><?php echo strtoupper($type); ?></option>
                                            <?php
                                        }
                                  
                                    ?>
                                </select>
                      <span class="error" id="category_id_error"></span>
                     
                    </div>



   



                           
                    <div class="form-group"> 
                      <input type="hidden" name="opt_action" value="<?php echo $info['action']; ?>"/>
                     </div>   
                     <input type="hidden" name="" id="hidden_box" value="1">        
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="add_more()" >Add More</button>
                    
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
		</div>
        
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>
</html>