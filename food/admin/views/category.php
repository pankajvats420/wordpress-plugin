<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;
 
 ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
      <a class="btn btn-success" href="admin.php?page=category-manage" style="margin-top:-35px;margin-bottom: 0px; color:white;">Add Category</a>
      <div class="col-12 grid-margin stretch-card">

            
          <div class="card">
            <div class="card-body">
              <div class="card-title-1">Category Master</div>
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="15%">S.NO #</th>
                            <th width="25%">Category</th>
                            <th width="15%">Order Number</th>
                            <th width="45%" style="margin-left: 10px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                          if(isset($info['category'])){
                            if(count($info['category']) > 0){
                              $category_count =1;
                              foreach($info['category'] as $category){                                  
                       ?>
                        <tr>
                            <td><?php echo $category_count++; ?></td>
                            <td><?php echo $category->category ?></td>
                            <td><?php echo $category->order_number ?></td> 
                            
                            <td>
                               <?php 
                                if($category->status == 1){ 
                                  ?>
                                    <a href="javascript:void(0)"><label class="badge badge-success category" data-id="<?php echo $category->id?>"  type="deactive">Active</label></a> &nbsp;
                                  <?php
                                   }elseif($category->status == 0){ 
                                    ?>
                                    <a href="javascript:void(0)" class="badge badge-danger category" data-id="<?php echo $category->id ?>" type="active"><label >Deactive</label></a>&nbsp; 
                                    <?php
                                   }
                                ?>
                                <a href="admin.php?page=category-manage&action=edit_cat&cid=<?php echo $category->id ?>"><label class="badge badge-success">Edit</label></a>
                               &nbsp;
                               <a href=""><label class="badge badge-danger">Pending</label></a>
                               &nbsp;
                              <a href="javascript:void(0)"><label class="badge badge-danger delete_red deletecategory" data-id="<?php echo $category->id ?>">Delete</label></a>

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