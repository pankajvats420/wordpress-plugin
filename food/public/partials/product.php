<?php 
require(PLUGIN_PATH.'public/partials/header.php');
$cat_dish = "";
$cat_dish_arr= "";

     echo $_SESSION['FOOD_USER_ID'];
 ?>

        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        
                        
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <?php if(count($info["dish"]) > 0){
                                   ?>
                                <div class="row">
                                    <?php foreach ($info["dish"] as $dish){
                                        ?>



                        
                        <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="<?php echo $dish->image ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="javascript:void(0)"><?php echo $dish->dish ?> </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                    
                                     
                         <?php 
                                 $dish_details = $this->get_dish_detail_info($dish->id);

                                 foreach ($dish_details as $key => $value) {
                                    echo $value["attribute"].'&nbsp;';
                                    
                                    echo '<span>('.$value["price"].')</span>';
                                    echo "<input type='radio' class='dish_radio' name='radio_".$dish->id."' value='".$value['id']."'/>";

                                 }


                          ?>


                                
                                        
                                         
                                         
                                    </div>
                                </div>
                            </div>
                        </div>



                                    <?php
                                    } ?> 
                                </div>
                            <?php }else{

                                echo "<p class='msg'>No dish found</p>";
                            } ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq" class="category_list">

                                    <li><a href="<?php echo site_url('/product/?cat_dish=');?>"><u>Clear</u></a></li>

                                 <?php foreach ($info["category"] as $category){
                                        ?>  

                                   <?php $cat_dish_arr = $info["cat_dish_arr"] ?>
                                     
                                       
                                 <?php 
                                   $is_checked = "";
                                   
                                 if(in_array($category->id, $cat_dish_arr)){

                                       $is_checked = "checked='checked'";
                                 }?>

                                        <li><input type="checkbox"onclick="set_cat(<?php echo $category->id ?>)" name="cat_arr[]" value="<?php echo $category->id ?>" <?php echo $is_checked;?> class="cat_checkbox" ><?php echo $category->category ?></li>




                                       <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="get" id="frmCatDish" >
            <input type="hidden" name="cat_dish" id="cat_dish" value="<?php echo $info["cat_dish"] ?>">
        </form>
        
<?php 
include_once PLUGIN_PATH.'public/partials/footer.php' ;
 ?>