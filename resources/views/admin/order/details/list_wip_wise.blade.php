@extends('admin.master.app')

@section('content')
<style>
tr {
    cursor: pointer;
}
tr.selected {
    background: #eee;
}
input#file {
    float: left;
    width: 176px;
    border: 1px solid #218838;
    padding: 3px;
    background: #218838;
}
button.btn.btn-success {
    border-radius: 0px;
}
.row.data-button {
    margin-bottom: 15px;
}

.row.data-button {
    padding: 14px 19px;
}
input#file {
    width: 100px;
    float: left;
}
svg.w-5.h-5 {
    font-size: .875rem!important;
    width: 21px;
}
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
    float: left;
    margin-right: 13px;
}
.date-form {
    width: 33%;
    float: left;
    margin-top: 10px;
    margin-right: 4%;
}
.card-foote.date-formr {
    margin-top: 40px;
}
.date-formr {
    width: 18%;
    float: left;
    margin-top: 10px;
    margin-right: 0%;
}
h5.by_date_check.by_staus {
    float: left;
    margin-top: 0px;
    margin-right: 20px;
    font-weight: bold;
    font-size: 17px;
}
h5.by_date_check.by_date {
    font-weight: bold;
    font-size: 16px;
    float: left;
    margin-top: 5px;
    margin-right: 20px;
}
h5.by_date_check {
    font-weight: normal;
    margin-top: 21px;
}
h5.by_date_check.by_date {
    width: 100%;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
button.btn.btn-secondary.buttons-excel.buttons-html5 {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.form-group.check_po_no {
    margin-top: 32px;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.from_box_checkbox {
    overflow: hidden;
    width: 173px;
    margin: 7px auto;
    display: block;
}
th.sorting {
    position: relative;
}
span.copy_to_all {
    font-size: 12px;
    position: absolute;
    top: 0px;
    left: 0px;
}
th {
    position: relative;
}
</style>
{{ csrf_field() }}
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export S.O Details</h1>
            </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
              	        @if ($errors->any())
            			    <div class="alert alert-danger">
            			        <ul>
            			            @foreach ($errors->all() as $error)
            			                <li>{{ $error }}</li>
            			            @endforeach
            			        </ul>
            			    </div>
            			@endif
            	    
                    
        	       @if(Session::has('success'))
        	          <div class="alert alert-success alert-dismissible fade show" role="alert">
        	            <strong>{{ Session::get('success')}}</strong>
        	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	            	 <span aria-hidden="true">&times;</span>
        	            </button>
        	          </div>
        	        @endif
        	   
        	  
                <div class="">
                    <div class="card">
                        
                     <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-primary">
                        
                          <!-- /.card-header -->
                            <div class="card-content list_of_card_result" style="padding:10px">
            		            <table class="table table-bordered" id="listOfOrderDetails" border="1">
            		                <thead>
                		                <tr style="color:#000">
                		                  <th>WIP</th>
                		                  <th>Item</th>
                		                  <th>Descraption</th>
                		                  <th>Qty</th>
                		                  <th>EXP Delivery</th>
                		                  <th>EXP Handover DT</th>
                		                  <th>EX Comments</th>
                		                  <th>Comments </th>
                		                  <th>Image</th>
                		                  <th>Action</th>
                		                </tr>
                		            </thead>
                		            <tbody>
                		                @foreach($salesOrderDetails as $key=>$data)
                		                     <tr>
                        		                 
                        		                  <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
                                						<span id="wip_{{ $data->ID }}" class="text">{{ $data->WIP }}</span>
                                						<input type="text" value="{{ $data->WIP }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                				  <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
                                						<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
                                						<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                			
                                				  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
                                						<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
                                						<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                				  <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
                                						<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
                                						<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                				  <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="{{ $data->ID }}">
                                						@if(!empty($data->EXP_DELIVERY))
                                				            @php $EXP_DELIVERY = date("d M  Y", strtotime($data->EXP_DELIVERY))  @endphp
                                				        @else
                                				            @php $EXP_DELIVERY =$data->EXP_DELIVERY; @endphp
                                				        @endif
                                						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text EXP_DELIVERY_box_text">{{ $EXP_DELIVERY }}</span>
                                						<input type="date" value="{{ $data->EXP_DELIVERY }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                				  <td style="background-color:#E8ECF1;" class="editEXP_HANDOVER_DT" id="{{ $data->ID }}">
                                						 @if(!empty($data->EXP_HANDOVER_DT))
                                				            @php $EXP_HANDOVER_DT = date("d M  Y", strtotime($data->EXP_HANDOVER_DT))  @endphp
                                				        @else
                                				            @php $EXP_HANDOVER_DT = $data->EXP_HANDOVER_DT; @endphp
                                				        @endif
                                				        <span id="EXP_HANDOVER_DT_{{ $data->ID }}" class="text exp_handover_box_text">{{ $EXP_HANDOVER_DT }}</span>
                                						<input type="date" value="{{ $data->EXP_HANDOVER_DT }}" class="editbox" id="EXP_HANDOVER_DT_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                				  <td style="background-color:#E8ECF1;" class="editEX_COMMENTS" id="{{ $data->ID }}">
                                						<span id="EX_COMMENTS_{{ $data->ID }}" class="text">{{ $data->EX_COMMENTS }}</span>
                                						<input type="text" value="{{ $data->EX_COMMENTS }}" class="editbox" id="EX_COMMENTS_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                        		                   <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
                                						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
                                						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
                                				  </td>
                                		   
                        		                  <td style="background-color:#E8ECF1;" class="editThumbnailImage" id="{{ $data->ID }}"> 
                    		                            <div id="image_upload_{{ $data->ID }}" style="display:none">
                    		                                <form id="profileSaveAndContinue_{{ $data->ID }}" method="post" action="javascript:void(0)" enctype="multipart/form-data">
	                                                            @csrf
                        		                                <div class="d-flex"  style="width: 250px;" >
                                                                    <div class="custom-file">
                                                                        <input required type="file" class="custom-file-input"  id="THUMBNAIL_IMAGE_{{ $data->ID }}" name="THUMBNAIL_IMAGE" />
                                                                        <input required type="hidden" class="custom-file-input"  value="{{ $data->ID }}" name="SALES_ID" />
                                                                        <label class="custom-file-label" for="customFile" id="customFiles_{{ $data->ID }}">Choose file</label>
                                                                        <small id="upload_msg_{{ $data->ID }}" class="form-text" style="display: none;"></small>
                                                                    </div>
                                                                    <button name="upload" id="upload_id_{{ $data->ID }}" type="submit" class="btn btn-primary">Upload</button>
                                                                </div>
                                                            </form>
                    		                            	<!--<input type="file" value="{{ $data->THUMBNAIL_IMAGE }}" id="image_upload_input_{{ $data->ID }}" >-->
                    		                            </div>
                    		                            <script type="">
                    		                                
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
                    		                            <a style=" display: block; border:2px solid red" class="example-image-link image_upload_view_{{ $data->ID }}" href="javacript:void(0)" data-lightbox="example-1">
                								            <img style="max-width: 80px; display: block;" id="sales_image_{{ $data->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
                								        </a>
                    		                        @else
                										<a style=" display: block;" class="example-image-link image_upload_view_{{ $data->ID }}" href="javacript:void(0)" data-lightbox="example-1">
                								            <img style="max-width: 80px; display: block;" id="sales_image_{{ $data->ID }}" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
                								        </a>
                								        
                								    @endif
                									
                									</td>
                        		                  <td>
                        		                     <!--<a href="{{ URL::to( '/list/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                        		                      <a href="javascript:void(0)" onclick="edit('{{ $data->ID }}')" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> 
                        		                     <a href="{{ route('order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                        		                  </td>
                		                    </tr>
                		                @endforeach
            		              </tbody>
            		          </table>
    		                    
    	                    </div>
    	                 
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
             
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<script type="text/javascript">
      function readURL(event, input) {
          var output = document.getElementById(input);
          output.innerHTML = event.target.files[0].name;
        }
      // Edit input box click action
    $(".editbox").mouseup(function() {
        return false
    });
    
    $(document).on('keyup click', '#checkPONumber', function() {
        var WIP = $("#WIP").val();
        window.location =   baseUrl +'/list/purchase/order/header_export?WIP=' + WIP;
    });
    

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });
    
    function edit(ID){
        $("#wip_"+ID).hide();
        $("#wip_input_"+ID).show();
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
         $("#image_upload_view_"+ID).show();
        $("#image_upload_"+ID).show();
    }

     $(document).on('keyup click', '.edit_wip_no', function() {

        var ID    = $(this).attr('id');
        
        $("#wip_"+ID).hide();
        $("#wip_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#wip_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'wip_id': $("#wip_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#wip_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
     $(document).on('keyup click', '.editITEM', function() {

        var ID    = $(this).attr('id');
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ITEM_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ITEM': $("#ITEM_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});

     $(document).on('keyup click', '.editDESCRIPTION', function() {

        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
    
    }).change(function() {});
     
     $(document).on('keyup click', '.editQty', function() {

        var ID    = $(this).attr('id');
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editEXP_DELIVERY', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_DELIVERY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_DELIVERY': $("#EXP_DELIVERY_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_HANDOVER_DT', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_HANDOVER_DT_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_HANDOVER_DT': $("#EXP_HANDOVER_DT_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_HANDOVER_DT_"+ID).html(first);
                }
            });
    
    }).change(function() { });

    $(document).on('keyup click', '.editEX_COMMENTS', function() {

        var ID    = $(this).attr('id');
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EX_COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EX_COMMENTS': $("#EX_COMMENTS_input_"+ID).val(),
                'type': 7
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EX_COMMENTS_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
    $(document).on('keyup click', '.editCOMMENTS', function() {

        var ID    = $(this).attr('id');
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'COMMENTS': $("#COMMENTS_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
   
    $(document).on('keyup click', '.editITEMTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ITEM_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ITEM': $("#ITEM_input_"+ID).val(),
                'type':11
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editDESCRIPTIONTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type': 12
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
    
    }).change(function() {});
     
     $(document).on('keyup click', '.editQtyTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type':13
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editEXP_DELIVERYTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_DELIVERY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_DELIVERY': $("#EXP_DELIVERY_input_"+ID).val(),
                'type':14
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_HANDOVER_DTTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#EXP_HANDOVER_DT_"+ID).hide();
        $("#EXP_HANDOVER_DT_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_HANDOVER_DT_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_HANDOVER_DT': $("#EXP_HANDOVER_DT_input_"+ID).val(),
                'type':15
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EXP_HANDOVER_DT_"+ID).html(first);
                }
            });
    
    }).change(function() { });

     $(document).on('keyup click', '.editEX_COMMENTSTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EX_COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EX_COMMENTS': $("#EX_COMMENTS_input_"+ID).val(),
                'type': 16
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#EX_COMMENTS_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
     $(document).on('keyup click', '.editCOMMENTSTEMP', function() {

        var ID    = $(this).attr('id');
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'COMMENTS': $("#COMMENTS_input_"+ID).val(),
                'type':17
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
     $(document).on('keyup click', '.editThumbnailImage', function() {

        var ID    = $(this).attr('id');
    
        $("#image_upload_view_"+ID).show();
        $("#image_upload_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#image_upload_"+ID).val();
            
        // $.ajax({
        //     type: "POST",
        //     data: {
        //         '_token': $('input[name=_token]').val(),
        //         'id': $(this).attr('id'),
        //         'COMMENTS': $("#COMMENTS_input_"+ID).val(),
        //         'type':17
        //     },
        //     url: baseUrl +'/sales_details_update' , 
        //     success: function(html) {
        //         $("#COMMENTS_"+ID).html(first);
        //     }
        // });
    }).change(function() { });
    
    
    // function exprected_date(){
        
    //     var from = $("#from").val();
    //     var to   = $("#to").val();
    //     $('.list_of_card_result').html(' <div class="loader"></div>');
        
    //     $.ajax({
    //         type: "POST",
    //         url: baseUrl +'/list/order/details/expected/delivery', 
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'from': from,
    //             'to': to,
    //             'type': $('select[name=type]').val(),
    //         },
    //         success: function(result) { 
    //             $('.list_of_card_result').html(result);
            
    //         }
    //     });  
    // }
    
    function handoverDate() {
        
         var WIP   = $("#WIP").val();
        var COMMENTS   = $("#COMMENTS").val();
        var from = $("#from").val();
        var to   = $("#to").val();
        var hand_over_from = $("#hand_over_from").val();
        var hand_over_to   = $("#hand_over_to").val();
        var checkbox = $('input[name="checkobx"]:checked').val();
        
        $('.list_of_card_result').html(' <div class="loader"></div>');
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'COMMENTS': COMMENTS,
                'WIP': WIP,
                'checkbox': checkbox,
                'from': from,
                'to': to,
                'hand_over_from': hand_over_from,
                'hand_over_to': hand_over_to,
                'type': 3
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }
    
    
    
    function checkboxFilter() {
        
    //   var checkbox = $('input[name="checkobx"]:checked').serialize();
       var checkbox = $('input[name="checkobx"]:checked').val();
       $('.list_of_card_result').html(' <div class="loader"></div>');
       
       $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'checkbox': checkbox,
                'type': 2,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
        
    }
    
    function searchInputFilterWIP() {
        
        var WIP   = $("#WIP").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'WIP': WIP,
                'type': 4,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });
    }
    
    function searchInputFilterCOMMENTS() {
        
        var COMMENTS   = $("#COMMENTS").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
       
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'COMMENTS': COMMENTS,
                'type': 5,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });
    }
    
    $('#listOfOrderDetails').DataTable( {
        buttons: [
          {
                extend: 'excelHtml5',
                title:'Export',
                text: 'Export',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
         "ordering": false,
        retrieve: true,
        language: {
          "emptyTable": "No result found"
        },
        pageLength: 10,
        paging: true,
        // sDom: "Rlfrtip",
        dom: 'Bfrtip',
    } );
</script>
@endsection
