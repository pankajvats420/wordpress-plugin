
<?php 

include_once PLUGIN_PATH.'admin/views/header.php' ;

 ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
    
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title-1">Contact Us</div>
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                                <th>S.NO #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th width="30%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                          if(isset($info['contact_us'])){
                            if(count($info['contact_us']) > 0){
                              $user_count =1;
                              foreach($info['contact_us'] as $contact_us){                                  
                       ?>
                        <tr>
                            <td><?php echo $user_count++; ?></td>
                            <td><?php echo $contact_us->name ?></td>
                            <td><?php echo $contact_us->email ?></td>
                            <td><?php echo $contact_us->subject?></td>
                            <td><?php echo $contact_us->message ?></td> 
                            
                            <td>
                              <a href="javascript:void(0)"><label class="badge badge-danger delete_red deletecontact" data-id="<?php echo $contact_us->id ?>">Delete</label></a>

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