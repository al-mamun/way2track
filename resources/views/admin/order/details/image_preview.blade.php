<div style="background-color:#E8ECF1;" class="editThumbnailImage" id="{{ $dataInfo->ID }}"> 
    <div id="image_upload_{{ $dataInfo->ID }}" style="display:none">
        <form id="profileSaveAndContinue_{{ $dataInfo->ID }}" method="post" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf
            <div style="width: 250px;" >
                <div class="custom-file">
                    <input required type="file" class="custom-file-input"  id="THUMBNAIL_IMAGE_{{ $dataInfo->ID }}" name="THUMBNAIL_IMAGE"/>
                    <input required type="hidden" class="custom-file-input"  value="{{ $dataInfo->ID }}" name="SALES_ID" />
                    <label class="custom-file-label" for="customFile" id="customFiles_{{ $dataInfo->ID }}"  style="display:none" >Choose file</label>
                    <small id="upload_msg_{{ $dataInfo->ID }}" class="form-text" style="display: none;"></small>
                </div>
                <div class="upload">
                    <button name="upload" id="upload_id_{{ $dataInfo->ID }}" style="    width: 100%;margin-bottom: 10px;" type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    	<!--<input type="file" value="{{ $dataInfo->THUMBNAIL_IMAGE }}" id="image_upload_input_{{ $dataInfo->ID }}" >-->
    </div>

    <script type="text/javascript">
        
          $('#profileSaveAndContinue_{{ $dataInfo->ID }}').on('submit', function(event) {

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
                        $("#image_upload_view_{{ $dataInfo->ID }}").show();
                        $("#image_upload_{{ $dataInfo->ID }}").hide();
    	        		$('#sales_image_{{ $dataInfo->ID }}').attr("src", data.image_url);
    	        		
    	        		 $(".image_upload_view_{{ $dataInfo->ID }}").removeClass("red_color_image");
    
    	        	} else if(data.status == 400) {
    	        		   $('.error_profie').html('<span style="color:red">' + data.error + '</span>');
    
    	        	}
    	           
    	           
    	        }
    	    }); 
    	}); 
    </script>
@php 
   $totalImage = explode(',',$dataInfo->IMAGE_ID) ;
   $total=  count($totalImage);
 
@endphp
@if($total > 1)
    <a  class="red_color_image example-image-link image_upload_view_{{ $dataInfo->ID }}" href="javacript:void(0)" data-lightbox="example-1">
        <img style="max-width: 80px; display: block;" id="sales_image_{{ $dataInfo->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $dataInfo->THUMBNAIL_IMAGE) }}" >
    </a>
@else
	<a style=" display: block;" class="example-image-link image_upload_view_{{ $dataInfo->ID }}" href="javacript:void(0)" data-lightbox="example-1">
        <img style="max-width: 80px; display: block;" id="sales_image_{{ $dataInfo->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $dataInfo->THUMBNAIL_IMAGE) }}" >
    </a>
    
@endif
</div>