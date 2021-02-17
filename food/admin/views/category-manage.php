<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;

 ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<div class="card-title-1">
              <?php 
                   if(isset($info['action']) && $info['action'] == "edit_cat"){

                    echo 'Edit Category';
                   }else{
                    echo "Add Category";
                   }
                 
               ?>
      </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="javascript:void(0)" id="frm-create-new-category">
                    <div class="form-group">
                      <label for="category">Category</label>
                      <input type="text" value="<?php echo isset($info['category']['category']) ? esc_attr($info['category']['category']) : ''; ?>" class="form-control" id="category" name="category" placeholder="Name category"  

                            <?php
                                if (isset($info['action']) && $info['action'] == "edit_cat"){
                                 echo 'readonly';
                                } 
                            ?> >
                      <span class="error" id="category_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="order_number">Order Number</label>
                      <input type="text" value="<?php echo isset($info['category']['order_number']) ? esc_attr($info['category']['order_number']) : ''; ?>" class="form-control" id="order_number" name="order_number" placeholder="Add order_number">
                      <span class="error" id="order_number_error"></span>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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