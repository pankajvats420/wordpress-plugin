<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;

 ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<div class="card-title-1">
              <?php 
                   if(isset($info['action']) && $info['action'] == "edit_delivery_boy"){

                    echo 'Edit delivery boy';
                   }else{
                    echo "Add delivery boy";
                   }
                 
               ?>
      </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="javascript:void(0)" id="frm-create-new-delivery-boy">
                    <div class="form-group">
                      <label for="name">Delivery boy Name</label>
                      <input type="text" value="<?php echo isset($info['delivery_boy']['name']) ? esc_attr($info['delivery_boy']['name']) : ''; ?>" class="form-control" id="name" name="name" placeholder="Add name">
                      <span class="error" id="name_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" value="<?php echo isset($info['delivery_boy']['mobile']) ? esc_attr($info['delivery_boy']['mobile']) : ''; ?>" class="form-control" id="mobile" name="mobile" placeholder="Name mobile"  

                            <?php
                                if (isset($info['action']) && $info['action'] == "edit_delivery_boy"){
                                 echo 'readonly';
                                } 
                            ?> >
                      <span class="error" id="mobile_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="password">password</label>
                      <input type="text" value="<?php echo isset($info['delivery_boy']['password']) ? esc_attr($info['delivery_boy']['password']) : ''; ?>" class="form-control" id="password" name="password" placeholder="Add password">
                      <span class="error" id="password_error"></span>
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