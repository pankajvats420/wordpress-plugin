<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;

 ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
      <a class="btn btn-success" href="admin.php?page=coupon-code-manage" style="margin-top:-35px;margin-bottom: 0px; color:white;">Add coupon code</a>
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title-1">Coupon Boy Master</div>
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>S.NO #</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Cart min</th>
                            <th>Expired on</th>
                            <th width="30%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                          if(isset($info['coupon_code'])){
                            if(count($info['coupon_code']) > 0){
                              $coupon_code_count =1;
                              foreach($info['coupon_code'] as $coupon_code){                                  
                       ?>
                        <tr>
                            <td><?php echo $coupon_code_count++; ?></td>
                            <td><?php echo $coupon_code->coupon_code ?></td>
                            <td><?php echo $coupon_code->coupon_type ?></td>
                            <td><?php echo $coupon_code->coupon_value ?></td>
                            <td><?php echo $coupon_code->cart_min_value ?></td>
                            <td><?php echo $coupon_code->expired_on ?></td> 
                            
                            <td>
                                <a href="admin.php?page=coupon-code-manage&action=edit_coupon_code&cid=<?php echo $coupon_code->id ?>"><label class="badge badge-success">Edit</label></a>
                                 &nbsp;

                                  <?php 
                                if($coupon_code->status == 1){ 
                                  ?>
                                    <a href="javascript:void(0)"><label class="badge badge-success coupon-code" data-id="<?php echo $coupon_code->id?>"  type="deactive">Active</label></a> &nbsp;
                                  <?php
                                   }elseif($coupon_code->status == 0){ 
                                    ?>
                                    <a href="javascript:void(0)" class="badge badge-danger coupon-code" data-id="<?php echo $coupon_code->id ?>" type="active"><label >Deactive</label></a>&nbsp; 
                                    <?php
                                   }
                                ?>
                              
                                  <a href="javascript:void(0)"><label class="badge badge-danger delete_red deletecoupon" data-id="<?php echo $coupon_code->id ?>">Delete</label></a>
                                
                            </td>
                           
                        </tr>
                         <?php   
                                }
                              }
                            }

                          ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
        
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  <!-- container-scroller -->

  
</body>
</html>