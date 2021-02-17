<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;
    $coupon = $info['coupon_code']['coupon_type'];

 ?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<div class="card-title-1">
              <?php 
                   if(isset($info['action']) && $info['action'] == "edit_coupon_code"){

                    echo 'Edit coupon code';
                   }else{
                    echo "Add coupon code";
                   }
               ?>
      </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="javascript:void(0)" id="frm-create-new-coupon-code">
                       
                    <div class="form-group">
                      <label for="coupon_code">Coupon code Name</label>
                      <input type="text" value="<?php echo isset($info['coupon_code']['coupon_code']) ? esc_attr($info['coupon_code']['coupon_code']) : ''; ?>" class="form-control" id="coupon_code" name="coupon_code" placeholder="Add coupon code"

                            <?php
                                if (isset($info['action']) && $info['action'] == "edit_coupon_code"){
                                 echo 'readonly';
                                } 
                            ?> >
                      <span class="error" id="coupon_code_error"></span>
                    </div>
                    <div class="form-group">
                       <label for="coupon_type">Coupon Type</label>
                                <select class="form-control" id="coupon_type" name="coupon_type">
                                  <option value="">Select Type</option>
                                  <?php 
                                   $arr = array("P" => "Percentage","F" => "Fixed"); 
                                   foreach($arr as $key=>$value){

                                       if($key == $coupon){

                                            echo "<option value='".$key."' selected>".$value."</option>";
                                       }else{
                                            
                                            echo "<option value='".$key."'>".$value."</option>";
                                       }
                                    }

                                   ?>
                                   
                                </select>
                      <span class="error" id="coupon_type_error"></span>
                    </div>
                     <div class="form-group">
                      <label for="coupon_value">Coupon Value</label>
                      <input type="number" value="<?php echo isset($info['coupon_code']['coupon_value']) ? esc_attr($info['coupon_code']['coupon_value']) : ''; ?>" class="form-control" id="coupon_value" name="coupon_value" placeholder="Add coupon value">
                      <span class="error" id="coupon_value_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="cart_min_value">Cart Min Value</label>
                      <input type="number" value="<?php echo isset($info['coupon_code']['cart_min_value']) ? esc_attr($info['coupon_code']['cart_min_value']) : ''; ?>" class="form-control" id="cart_min_value" name="cart_min_value" placeholder="Add cart min value">
                      <span class="error" id="cart_min_value_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="expired_on">Expired on</label>
                      <input type="date" value="<?php echo isset($info['coupon_code']['expired_on']) ? esc_attr($info['coupon_code']['expired_on']) : ''; ?>" class="form-control" id="expired_on" name="expired_on" placeholder="expired on">
                      <span class="error" id="expired_on_error"></span>
                    </div>
                    <div class="form-group"> 
                      <input type="hidden" name="opt_action" value="<?php echo $info['action']; ?>"/>
                     </div>           
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="admin.php?page=category">Cancel</a>
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