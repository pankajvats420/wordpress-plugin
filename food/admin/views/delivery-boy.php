<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;

 ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
      <a class="btn btn-success" href="admin.php?page=delivery-boy-manage" style="margin-top:-35px;margin-bottom: 0px; color:white;">Add delivery boy</a>
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title-1">Delivery Boy Master</div>
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>S.NO #</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Password</th>
                            <th width="30%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                          if(isset($info['delivery_boy'])){
                            if(count($info['delivery_boy']) > 0){
                              $delivery_boy_count =1;
                              foreach($info['delivery_boy'] as $delivery_boy){                                  
                       ?>
                        <tr>
                            <td><?php echo $delivery_boy_count++; ?></td>
                            <td><?php echo $delivery_boy->name ?></td>
                            <td><?php echo $delivery_boy->mobile ?></td>
                            <td><?php echo $delivery_boy->password ?></td> 
                            
                            <td>
                                <a href="admin.php?page=delivery-boy-manage&action=edit_delivery_boy&did=<?php echo $delivery_boy->id ?>"><label class="badge badge-success">Edit</label></a>
                                 &nbsp;

                                  <?php 
                                if($delivery_boy->status == 1){ 
                                  ?>
                                    <a href="javascript:void(0)"><label class="badge badge-success delivery-boy" data-id="<?php echo $delivery_boy->id?>"  type="deactive">Active</label></a> &nbsp;
                                  <?php
                                   }elseif($delivery_boy->status == 0){ 
                                    ?>
                                    <a href="javascript:void(0)" class="badge badge-danger delivery-boy" data-id="<?php echo $delivery_boy->id ?>" type="active"><label >Deactive</label></a>&nbsp; 
                                    <?php
                                   }
                                ?>
                              

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