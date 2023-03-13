<div style="background-color:#E8ECF1;" class="editThumbnailImage" id="<?php echo e($dataInfo->ID); ?>"> 
    <div id="image_upload_<?php echo e($dataInfo->ID); ?>" style="display:none">
        <form id="profileSaveAndContinue_<?php echo e($dataInfo->ID); ?>" method="post" action="javascript:void(0)" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div style="width: 250px;" >
                <div class="custom-file">
                    <input required type="file" class="custom-file-input"  id="THUMBNAIL_IMAGE_<?php echo e($dataInfo->ID); ?>" name="THUMBNAIL_IMAGE"/>
                    <input required type="hidden" class="custom-file-input"  value="<?php echo e($dataInfo->ID); ?>" name="SALES_ID" />
                    <label class="custom-file-label" for="customFile" id="customFiles_<?php echo e($dataInfo->ID); ?>"  style="display:none" >Choose file</label>
                    <small id="upload_msg_<?php echo e($dataInfo->ID); ?>" class="form-text" style="display: none;"></small>
                </div>
                <div class="upload">
                    <button name="upload" id="upload_id_<?php echo e($dataInfo->ID); ?>" style="    width: 100%;margin-bottom: 10px;" type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    	<!--<input type="file" value="<?php echo e($dataInfo->THUMBNAIL_IMAGE); ?>" id="image_upload_input_<?php echo e($dataInfo->ID); ?>" >-->
    </div>

    <script type="text/javascript">
        
          $('#profileSaveAndContinue_<?php echo e($dataInfo->ID); ?>').on('submit', function(event) {

    		event.preventDefault();                          // for demo
    	    
    	    $.ajax({
    	        data:new FormData(this),
    	        dataType:'JSON',
    	        contentType: false,
    	        cache: false,
    	        processData: false,
    	        type: "POST",
    	        url: window.baseUrl + '/single-sales-image-update',
    	        success:function(data) {
    	        	if(data.status == 200) {
                        $("#image_upload_view_<?php echo e($dataInfo->ID); ?>").show();
                        $("#image_upload_<?php echo e($dataInfo->ID); ?>").hide();
    	        		$('#sales_image_<?php echo e($dataInfo->ID); ?>').attr("src", data.image_url);
    	        		
    	        		 $(".image_upload_view_<?php echo e($dataInfo->ID); ?>").removeClass("red_color_image");
    
    	        	} else if(data.status == 400) {
    	        		   $('.error_profie').html('<span style="color:red">' + data.error + '</span>');
    
    	        	}
    	           
    	           
    	        }
    	    }); 
    	}); 
    </script>
<?php 
   $totalImage = explode(',',$dataInfo->IMAGE_ID) ;
   $total=  count($totalImage);
 
?>
<?php if($total > 1): ?>
    <a  class="red_color_image example-image-link image_upload_view_<?php echo e($dataInfo->ID); ?>" href="javacript:void(0)" data-lightbox="example-1">
        <img style="max-width: 80px; display: block;" id="sales_image_<?php echo e($dataInfo->ID); ?>" class="example-image-link" src="<?php echo e(URL::asset( 'images/'. $dataInfo->THUMBNAIL_IMAGE)); ?>" >
    </a>
<?php else: ?>
	<a style=" display: block;" class="example-image-link image_upload_view_<?php echo e($dataInfo->ID); ?>" href="javacript:void(0)" data-lightbox="example-1">
        <img style="max-width: 80px; display: block;" id="sales_image_<?php echo e($dataInfo->ID); ?>" class="example-image-link" src="<?php echo e(URL::asset( 'images/'. $dataInfo->THUMBNAIL_IMAGE)); ?>" >
    </a>
    
<?php endif; ?>
</div><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order/details/image_preview.blade.php ENDPATH**/ ?>