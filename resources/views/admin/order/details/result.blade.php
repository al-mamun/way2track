<style>
    span.copy_to_all {
        font-size: 10px;
        position: relative;
        top: 0px;
        right: 0px;
        background: green;
        color: #fff;
        padding: 3px;
        text-align: center;
        border-radius: 5px;
        clear: both;
        float: none;
        display: inline-block;
        width: auto;
        min-width: 70px;
    }
    .box_header {
        display: none;
    }
    th {
        position: relative;
    }
    .red_color_image {
        display: block; border:2px solid red 
    }
    .top_scroll table {
    display: block;
    clear: both;
}
</style>
@foreach($salesOrderDetails as $key=>$data)
<input type="text" value="{{ $data->ID }}" name="details_id" id="detailsID_{{ $data->ID }}" style="display:none">
@endforeach
<div class="large-table-fake-top-scroll-container-3">
    <div>&nbsp;</div>
</div>
<div class="top_scroll">
<table class="table table-bordered" id="listOfOrderDetails" border="1">
    <thead>
        <tr style="color:#000">
            <th style="display:none">SL.</th>
            @foreach($columnSync as $key => $value)
                @if(!empty($value))
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  2)
                            ->first();

                    @endphp
                  
                    @if($exp[1] == 'WIP' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>WIP<br><span class="wip_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                    @endif
                    @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Description <br><span class="description_copy_to_all copy_to_all"><i class="fas fa-copy"></i></span></th>
                    @endif
                    @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                    @endif
                    @if($exp[1] == 'EXP Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <th>EXP Delivery <br><span class="exp_delivery_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                    @endif
                    
                    @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <th>EXP Handover <br><span class="exp_handover_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                    @endif
                    
                    @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Ex Comments <br><span class="ex_comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
                    @endif
                    
                    @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
                    @endif
                    
                    @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Supplier <br><span class="supplierCopyToAll copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
                    @endif
                    @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <th>Image </th>
                    @endif
                @endif
            @endforeach        
              
            <th>Action</th>
          </tr>
         <tr class="showCommentsDetails" style="display:none">
            <td style="display:none"></td>
                @foreach($columnSync as $key => $value)
                    @if(!empty($value))
                        @php
                            $exp = explode('_', $value);
                            
                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                ->where('page_name', $exp[1])
                                ->where('type',  2)
                                ->first();

                        @endphp
                      
                        @if($exp[1] == 'WIP' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                           <td>
                                <div class="WIP_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="WIP_box" id="WIP_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveWIP()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                                
                            </td>
                        @endif
                        @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="item_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                            
                           
                           
                        @endif
                        @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="description_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="description_box" id="description_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                        @endif
                        @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                           <td>
                                <div class="qty_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                        @endif
                        @if($exp[1] == 'EXP Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                
                                <div class="exp_delivery_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="EXP_DELIVERY_box_text" id="exp_delivery_box" name="exp_delivery_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveexDelivery()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                            
                        @endif
                        
                        @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="exp_handover_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="exp_handover_box" id="exp_handover_box" name="exp_handover_box"  style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveexpHandover()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                        @endif
                        
                        @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="ex_comments_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="ex_comments_box" id="ex_comments_box" name="ex_comments_box"  style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveEXComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>  
                        @endif
                        
                        @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="comments_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="comments_box" id="comments_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td>
                        @endif
                        
                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td>
                                <div class="suppler_td box_header" style="display:none; width:150px;">
                                    <input type="text"  class="supplier_box" id="supplier_box" name="supplier_box" style="width: 65%;float: left;font-size: 15px;">
                                    <button class="btn btn-success" onclick="saveSupplierBox()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                                </div>
                            </td> 
                        @endif
                        @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td></td>
                        @endif
                    @endif
                @endforeach
            
            <td></td>
        </tr>
    </thead>
    <tbody>
        @php $sl =1 @endphp
        @foreach($salesOrderDetails as $key=>$data)
             <tr id="sales_id_{{$data->ID}}">
                    <td style="display:none">{{ $sl++}}</td>
                    @foreach($columnSync as $key => $value)
                        @if(!empty($value))
                            @php
                                $exp = explode('_', $value);
                                
                                $settingTableInfo = DB::table('w2t_setting_column_table')
                                    ->where('page_name', $exp[1])
                                    ->where('type',  2)
                                    ->first();
        
                            @endphp
                          
                            @if($exp[1] == 'WIP' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
            						<span id="wip_{{ $data->ID }}" class="text">{{ $data->WIP }}</span>
            						<input type="text" value="{{ $data->WIP }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
            						<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
            						<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
            				    </td>
                            @endif
                            @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
        						    <span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
            						<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
            						<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
            						<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
            				    </td>
                            @endif
                            @if($exp[1] == 'EXP Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                               <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="{{ $data->ID }}">
            						@if(!empty($data->EXP_DELIVERY))
            				            @php $EXP_DELIVERY = date("d M  Y", strtotime($data->EXP_DELIVERY))  @endphp
            				        @else
            				            @php $EXP_DELIVERY =$data->EXP_DELIVERY; @endphp
            				        @endif
            						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text EXP_DELIVERY_box_text">{{ $EXP_DELIVERY }}</span>
            						<input type="date" value="{{ $data->EXP_DELIVERY }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            
                            @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editEXP_HANDOVER_DT" id="{{ $data->ID }}">
            						 @if(!empty($data->EXP_HANDOVER_DT))
            				            @php $EXP_HANDOVER_DT = date("d M  Y", strtotime($data->EXP_HANDOVER_DT))  @endphp
            				        @else
            				            @php $EXP_HANDOVER_DT = $data->EXP_HANDOVER_DT; @endphp
            				        @endif
            				        <span id="EXP_HANDOVER_DT_{{ $data->ID }}" class="text exp_handover_box_text">{{ $EXP_HANDOVER_DT }}</span>
            						<input type="date" value="{{ $data->EXP_HANDOVER_DT }}" class="editbox" id="EXP_HANDOVER_DT_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            
                            @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editEX_COMMENTS" id="{{ $data->ID }}">
            						<span id="EX_COMMENTS_{{ $data->ID }}" class="text">{{ $data->EX_COMMENTS }}</span>
            						<input type="text" value="{{ $data->EX_COMMENTS }}" class="editbox" id="EX_COMMENTS_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            
                            @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
            						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
            						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
            				  </td>
                            @endif
                            
                            @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editSUPPLIER" id="{{ $data->ID }}">
                					<span id="SUPPLIER_{{ $data->ID }}" class="text">{{ $data->SUPPLIER }}</span>
                					<input type="text" value="{{ $data->SUPPLIER }}" class="editbox" id="SUPPLIER_input_{{ $data->ID }}" style="display:none">
                				 </td>
                            @endif
                            @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                <td style="background-color:#E8ECF1;" class="editThumbnailImage" id="{{ $data->ID }}"> 
                                    <div id="image_upload_{{ $data->ID }}" style="display:none">
                                        <form id="profileSaveAndContinue_{{ $data->ID }}" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                                            @csrf
                                            <div style="width: 250px;" >
                                                <div class="custom-file">
                                                    <input required type="file" class="custom-file-input"  id="THUMBNAIL_IMAGE_{{ $data->ID }}" name="THUMBNAIL_IMAGE"/>
                                                    <input required type="hidden" class="custom-file-input"  value="{{ $data->ID }}" name="SALES_ID" />
                                                    <label class="custom-file-label" for="customFile" id="customFiles_{{ $data->ID }}"  style="display:none" >Choose file</label>
                                                    <small id="upload_msg_{{ $data->ID }}" class="form-text" style="display: none;"></small>
                                                </div>
                                                <div class="upload">
                                                    <button name="upload" id="upload_id_{{ $data->ID }}" style="    width: 100%;margin-bottom: 10px;" type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    	<!--<input type="file" value="{{ $data->THUMBNAIL_IMAGE }}" id="image_upload_input_{{ $data->ID }}" >-->
                                    </div>
                                    <script type="">
                                          // $("#THUMBNAIL_IMAGE_{{ $data->ID }}").on("change",function(){
                                          //        /* Current this object refer to input element */          
                                    //               var $input = $(this);
                                    //               var reader = new FileReader(); 
                                    //               reader.onload = function(){
                                    //                     $("#THUMBNAIL_IMAGE_{{ $data->ID }}").attr("src", reader.result);
                                    //               } 
                                    //               alert(reader.result]);
                                    //               reader.readAsDataURL($input[0].files[0]);
                                          // });
                                          
                                          $('#profileSaveAndContinue_{{ $data->ID }}').on('submit', function(event) {
            
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
                                                        $("#image_upload_view_{{ $data->ID }}").show();
                                                        $("#image_upload_{{ $data->ID }}").hide();
                                    	        		$('#sales_image_{{ $data->ID }}').attr("src", data.image_url);
                                    	        		$(".image_upload_view_{{ $data->ID }}").removeClass("red_color_image");
                                    
                                    	        	} else if(data.status == 400) {
                                    	        		   $('.error_profie').html('<span style="color:red">' + data.error + '</span>');
                                    
                                    	        	}
                                    	           
                                    	           
                                    	        }
                                    	    }); 
                                    	}); 
                                    </script>
                                @php 
                                   $totalImage = explode(',',$data->IMAGE_ID) ;
                                   $total=  count($totalImage);
                                 
                                @endphp
                                @if($total > 1)
                                    <a  class="red_color_image example-image-link image_upload_view_{{ $data->ID }}" href="javacript:void(0)" data-lightbox="example-1">
            				            <img style="max-width: 80px; display: block;" id="sales_image_{{ $data->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
            				        </a>
                                @else
            						<a style=" display: block;" class="example-image-link image_upload_view_{{ $data->ID }}" href="javacript:void(0)" data-lightbox="example-1">
            				            <img style="max-width: 80px; display: block;" id="sales_image_{{ $data->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
            				        </a>
            				        
            				    @endif
            					
            					</td>
                              <td>
                            @endif
                        @endif
                    @endforeach   
                  
                     <!--<a href="{{ URL::to( '/list/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                      <!--<a href="javascript:void(0)" onclick="edit('{{ $data->ID }}')" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                     <!--<a href="{{ route('order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
                      <button  onClick="deleteData('{{$data->ID}}')" id="salesOrderDelete" type="button" class="btn btn-danger btn-sm">Delete</button>
                  </td>
            </tr>
        @endforeach
  </tbody>
</table>
</div>
<script type="text/javascript">
 $(function () {
          var tableContainer = $(".top_scroll");
          var table = $(".top_scroll table");
          var fakeContainer = $(".large-table-fake-top-scroll-container-3");
          var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");
        
          var tableWidth = table.width();
          fakeDiv.width(tableWidth);
        
          fakeContainer.scroll(function () {
            tableContainer.scrollLeft(fakeContainer.scrollLeft());
          });
          tableContainer.scroll(function () {
            fakeContainer.scrollLeft(tableContainer.scrollLeft());
          });
    function deleteData(ID) {
             Swal.fire({
              title: 'Are you sure?',
              text: "Be careful please !  All related details will be deleted with this.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                
              if (result.isConfirmed) {
                // window.location.href = link;
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'ID': ID,
                      
                    },
                    url: baseUrl +'/list/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('#sales_id_'+ID).hide();
                        Swal.fire(
                          'Deleted!',
                          'Your record has been deleted',
                          'success'
                        );
                    }
                
                });
              }
            
        
        });
  
    }
</script>
<script src="{{ URL::asset( 'js/order_details.js') }}"></script>
