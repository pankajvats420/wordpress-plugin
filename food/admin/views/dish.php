<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;
  
 ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
      <a class="btn btn-success" href="admin.php?page=dish-manage" style="margin-top:-35px;margin-bottom: 0px; color:white;">Add dish</a>
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title-1">Dish Master</div>
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                           
                            <th>Dish</th>
                            <th>Category name</th>
                            <th>detail</th>
                            <th>image</th>
                            <th>Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                          if(isset($info['dish'])){
                            if(count($info['dish']) > 0){
                              $dish_count =1;
                              foreach($info['dish'] as $dish){                                  
                       ?>
                        <tr> 
                            
                            <td><?php echo $dish->dish ?></td>
                            <td><?php  echo $this->get_category_info($dish->category_id); ?></td>
                            <td><?php echo $dish->dish_detail ?></td>
                            <td><img src="<?php echo $dish->image ?>" style="width: 80px; height: 80px;"></td>  
                            
                            <td>
                                <a href="admin.php?page=dish-manage&action=edit_dish&did=<?php echo $dish->id ?>"><label class="badge badge-success">Edit</label></a>
                                 &nbsp;&nbsp;

                                  <?php 
                                if($dish->status == 1){ 
                                  ?>
                                    <a href="javascript:void(0)"><label class="badge badge-success dish" data-id="<?php echo $dish->id?>"  type="deactive">Active</label></a> &nbsp;
                                  <?php
                                   }elseif($dish->status == 0){ 
                                    ?>
                                    <a href="javascript:void(0)" class="badge badge-danger dish" data-id="<?php echo $dish->id ?>" type="active"><label >Deactive</label></a>&nbsp; 
                                    <?php
                                   }
                                ?>
                                
                                <a href="javascript:void(0)"><label class="badge badge-danger delete_red deletedish" data-id="<?php echo $dish->id ?>">Delete</label></a>

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