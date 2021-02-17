jQuery(document).ready(function(){

        jQuery("#image_upload").on("click",function(e){
          jQuery("#image_remove").show();

            e.preventDefault();

            var image = wp.media({

                    title: "upload that",
                    multiple: false
                  }).open().on("select",function(){

                      var uploaded_image = image.state().get('selection').first();  

                      var image_url =    uploaded_image.toJSON().url; 
                      
                        jQuery("#image_upload_show").attr('src', image_url);
                        jQuery("#image_upload_save").val(image_url);
                     

                  });

        });

        jQuery("#image_remove").on("click",function(e){

            e.preventDefault();
                      
                jQuery("#image_upload_show").attr('src', '');
                jQuery("#image_upload_save").attr('value','');
                jQuery("#image_remove").hide();

 
        });







});