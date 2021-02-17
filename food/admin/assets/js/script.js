jQuery(function(){

	var ajaxurl = food1.ajaxurl;
 
  

  jQuery("#btnUploadImage").on("click", function () {

        var image = wp.media({
            title: "Upload Profile Image",
            multiple: false
        }).open().on("select", function () {
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            var ext = image_url.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      
            } else {
                jQuery("#img-prev").attr('src', image_url);
                jQuery("#image-val").val(image_url);
            }
        });
    });


// delete category
jQuery(document).on("click",".deletecategory",function(){

       var category_id = jQuery(this).attr("data-id");
       var postdata ="action=admin_request&param=category_delete&category_id=" +category_id;

        
       jQuery.post(ajaxurl, postdata, function (response) {
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)
              }
      }); 
  });

// delete contact

jQuery(document).on("click",".deletecontact",function(){

       var category_id = jQuery(this).attr("data-id");
       var postdata ="action=admin_request&param=contact_delete&contact_id=" +category_id;

        
       jQuery.post(ajaxurl, postdata, function (response) {
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)
              }
      }); 
  });

// update category status

jQuery(document).on("click",".category",function(){

       var status_id = jQuery(this).attr("data-id");
       var type = jQuery(this).attr("type");
       var postdata ="action=admin_request&param=update_category_status&status_id=" +status_id+"&type=" +type;

        
       jQuery.post(ajaxurl, postdata, function (response) {

           
                 
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                 },1000)
               }                           
      }); 
  });


// insert category 

jQuery("#frm-create-new-category").submit(function(){

       var formdata = jQuery("#frm-create-new-category").serialize();

       var postdata ="action=admin_request&param=category_add&" +formdata;
       jQuery.post(ajaxurl, postdata, function (response) {  
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:3000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)

              }else{ 
                jQuery("#category_error").text(data.array["category_error"]);
                jQuery("#order_number_error").text(data.array["order_number_error"]);
              }                 
      });

});

// insert user

jQuery("#frm-create-new-user").submit(function(){

       var formdata = jQuery("#frm-create-new-user").serialize();

       var postdata ="action=admin_request&param=user_add&" +formdata;
       jQuery.post(ajaxurl, postdata, function (response) {  
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:3000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)

              }else{ 
                jQuery("#name_error").text(data.array["name_error"]);
                jQuery("#email_error").text(data.array["email_error"]);
                jQuery("#mobile_error").text(data.array["mobile_error"]);
                jQuery("#password_error").text(data.array["password_error"]);
              }                 
      });

});

// delete user
jQuery(document).on("click",".deleteuser",function(){

       var user_id = jQuery(this).attr("data-id");
       var postdata ="action=admin_request&param=user_delete&user_id=" +user_id;

        
       jQuery.post(ajaxurl, postdata, function (response) {
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)
              }
      }); 
  });


// update delivery_boy status

jQuery(document).on("click",".delivery-boy",function(){

       var status_id = jQuery(this).attr("data-id");
       var type = jQuery(this).attr("type");
       var postdata ="action=admin_request&param=update_delivery_boy_status&status_id=" +status_id+"&type=" +type;

        
       jQuery.post(ajaxurl, postdata, function (response) {

           
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                 },1000)
               }                           
      }); 
  });

// delivery boy create

jQuery("#frm-create-new-delivery-boy").submit(function(){

       var formdata = jQuery("#frm-create-new-delivery-boy").serialize();

       var postdata ="action=admin_request&param=delivery_boy_add&" +formdata;
       jQuery.post(ajaxurl, postdata, function (response) { 
       console.log(response); 
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:3000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)

              }else{ 
                jQuery("#name_error").text(data.array["name_error"]);
                jQuery("#mobile_error").text(data.array["mobile_error"]);
                jQuery("#password_error").text(data.array["password_error"]);
              }                 
      });

});


// coupon code create

jQuery("#frm-create-new-coupon-code").submit(function(){

       var formdata = jQuery("#frm-create-new-coupon-code").serialize();

       var postdata ="action=admin_request&param=coupon_code_add&" +formdata;
       jQuery.post(ajaxurl, postdata, function (response) { 
       console.log(response); 
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:3000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)

              }else{ 
                jQuery("#coupon_code_error").text(data.array["coupon_code"]);
                jQuery("#coupon_type_error").text(data.array["coupon_type"]);
                jQuery("#coupon_value_error").text(data.array["coupon_value"]);
                jQuery("#cart_min_value_error").text(data.array["cart_min_value"]);
                jQuery("#expired_on_error").text(data.array["expired_on"]);
              }                 
      });

});

// coupon code delete

jQuery(document).on("click",".deletecoupon",function(){

       var coupon_code_id = jQuery(this).attr("data-id");
       var postdata ="action=admin_request&param=coupon_code_delete&coupon_code_id=" +coupon_code_id;

        
       jQuery.post(ajaxurl, postdata, function (response) {
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)
              }
      }); 
  });



// update coupon code status

jQuery(document).on("click",".coupon-code",function(){

       var status_id = jQuery(this).attr("data-id");
       var type = jQuery(this).attr("type");
       var postdata ="action=admin_request&param=update_coupon_code_status&status_id=" +status_id+"&type=" +type;

        
       jQuery.post(ajaxurl, postdata, function (response) {

           
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                 },1000)
               }                           
      }); 
  });


// dish create

jQuery("#frm-create-new-dish").submit(function(){

       var formdata = jQuery("#frm-create-new-dish").serialize();

      

       var postdata ="action=admin_request&param=dish_add&" +formdata;
       jQuery.post(ajaxurl, postdata, function (response) { 
      
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:3000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)

              }else{     
                jQuery("#category_id_error").text(data.array["category_id_error"]);
                jQuery("#dish_error").text(data.array["dish_error"]);
                jQuery("#dish_detail_error").text(data.array["dish_detail_error"]);
                jQuery("#image_error").text(data.array["image_error"]);
                
              }                 
      });

});

// dish update

jQuery(document).on("click",".dish",function(){

       var status_id = jQuery(this).attr("data-id");
       var type = jQuery(this).attr("type");
       var postdata ="action=admin_request&param=update_dish_status&status_id=" +status_id+"&type=" +type;
  
       jQuery.post(ajaxurl, postdata, function (response) {          
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                 },1000)
               }                           
      }); 
  });


// delete dish
jQuery(document).on("click",".deletedish",function(){

       var user_id = jQuery(this).attr("data-id");
       var postdata ="action=admin_request&param=dish_delete&user_id=" +user_id;

        
       jQuery.post(ajaxurl, postdata, function (response) {
                      
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                  timer:5000
                })
                  setTimeout(function(){
                      location.reload();
                  },1000)
              }
      }); 
  });







jQuery("input").click(function(){      
    jQuery("span").text("");
 });

jQuery(document).ready(function() {
    jQuery("[href]").each(function() {
        if (this.href == window.location.href) {
            jQuery(this).addClass("background");
        }
    });
});


// end main function
});

function add_more() {

     var add_more = jQuery("#hidden_box").val();
      add_more++;
    jQuery("#hidden_box").val(add_more);

   var html ='<div class="row mt10" id="box'+add_more+'"> <div class="col-md-5"><input type="text" name="attribute[]" placeholder="Attribute" class="form-control"></div><div class="col-md-5"><input type="text" name="price[]" placeholder="Price" class="form-control"></div><div class="col-md-2"><button type="button" class="btn btn-danger" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';

   jQuery("#dish_box_1").append(html);   
}

function remove_more(id){

  jQuery("#box"+id).remove();

}


 