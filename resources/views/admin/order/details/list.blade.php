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
.globalcss  {
    background:#E8ECF1
}
div#DataTables_Table_0_wrapper .row .col-md-6:nth-child(1){
    display:none !important;
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
.custom-file-input {

    opacity: 1;
}
table#joblist {
    background: #fff;
    border-radius: 13px;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}

.custom-file-input {
    opacity: 1;
    background: #fff;
    border-radius: 7px;
    margin-bottom: 13px !important;
    text-align: left;
    overflow: hidden;
    cursor: pointer;
}
.red_color_image {
    display: block; border:2px solid red 
}
#moreText {
      
    /* Display nothing for the element */
    display: none;
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
<style>
    /* Initially, hide the extra text that
        can be revealed with the button */
    
</style>
  


<script>
    function toggleText() {
      
        // Get all the elements from the page
        var points = 
            document.getElementById("points");
      
        var showMoreText =
            document.getElementById("moreText");
      
        var buttonText =
            document.getElementById("textButton");
      
        // If the display property of the dots 
        // to be displayed is already set to 
        // 'none' (that is hidden) then this 
        // section of code triggers
        if (points.style.display === "none") {
      
            // Hide the text between the span
            // elements
            showMoreText.style.display = "none";
      
            // Show the dots after the text
            points.style.display = "inline";
      
            // Change the text on button to 
            // 'Show More'
            buttonText.innerHTML = "Show More";
        }
      
        // If the hidden portion is revealed,
        // we will change it back to be hidden
        else {
      
            // Show the text between the
            // span elements
            showMoreText.style.display = "inline";
      
            // Hide the dots after the text
            points.style.display = "none";
      
            // Change the text on button
            // to 'Show Less'
            buttonText.innerHTML = "Show Less";
        }
    }
</script>
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
        	   
        	   
        	   @if(!empty($salesOrderDetailsTemp))
        	   {!! Form::open(array('url'=>'/new/order/details/submit/temp','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
        	   
        	        <input type="hidden" value="{{$token}}" name="token">
        	   
            	    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">S.O. Details Import Preview </h3>
                          </div>
                          <!-- /.card-header -->
                            <div class="card-content">
            		            <table class="table table-bordered" border="1">
            		              <tr style="color:#000">
            		                 
            		                      <th>WIP</th>
                		                  <th>Item</th>
                		                  <th>Description </th>
                		                  <th>Qty</th>
                		                  <th>EXP Delivery</th>
                		                  <th>EXP Handover DT</th>
                		                  <th>EX Comments</th>
                		                  <th>Comments</th>
                		                  <th>Supplier</th>
                		                  <th>Image</th>
            		                 
            		                  <!--<th>ACTION</th>-->
            		              </tr>
            		             @foreach($salesOrderDetailsTemp as $key=>$data)
            		               <tr>
            		                  <td style="background-color:#E8ECF1;"  id="{{ $data->ID }}">
                    						<span id="wip_{{ $data->ID }}" class="text">{{ $data->WIP }}</span>
                    						<input type="text" value="{{ $data->WIP }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editITEMTEMP" id="{{ $data->ID }}">
                    						<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
                    						<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    			
                    				  <td style="background-color:#E8ECF1;" class="editDESCRIPTIONTEMP" id="{{ $data->ID }}">
                    						<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
                    						<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editQtyTEMP" id="{{ $data->ID }}">
                    						<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
                    						<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="{{ $data->ID }}">
                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text"> {{  date("d M  Y", strtotime($data->EXP_DELIVERY)) }}</span>
                    						<input type="date" value="{{ $data->EXP_DELIVERY }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editEXP_HANDOVER_DTTEMP" id="{{ $data->ID }}">
                    						<span id="EXP_HANDOVER_DT_{{ $data->ID }}" class="text">{{ date("d M  Y", strtotime($data->EXP_HANDOVER_DT)) }}</span>
                    						<input type="date" value="{{ $data->EXP_HANDOVER_DT }}" class="editbox" id="EXP_HANDOVER_DT_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editEX_COMMENTSTEMP" id="{{ $data->ID }}">
                    						<span id="EX_COMMENTS_{{ $data->ID }}" class="text">{{ $data->EX_COMMENTS }}</span>
                    						<input type="text" value="{{ $data->EX_COMMENTS }}" class="editbox" id="EX_COMMENTS_input_{{ $data->ID }}" style="display:none">
                    				  </td>
            		                  <td style="background-color:#E8ECF1;" class="editCOMMENTSTEMP" id="{{ $data->ID }}">
                    						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
                    						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editSUPPLIERTemp" id="{{ $data->ID }}">
                    						<span id="SUPPLIER_{{ $data->ID }}" class="text">{{ $data->SUPPLIER }}</span>
                    						<input type="text" value="{{ $data->SUPPLIER }}" class="editbox" id="SUPPLIER_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				 
                    		   
            		                  <td style="background-color:#E8ECF1;" class="editThumbnailImage" id="{{ $data->ID }}"> 
            		                        <!--<div id="image_upload_{{ $data->ID }}">-->
            		                        <!--    <input type="file" value="{{ $data->THUMBNAIL_IMAGE }}"  id="COMMENTS_input_{{ $data->ID }}">-->
            		                        <!--</div>-->
    									  @php 
            		                           $totalImage = explode(',',$data->IMAGE_ID) ;
            		                           $total=  count($totalImage);
            		                         
            		                        @endphp
            		                        @if($total > 1)
            		                            <a style="display: block; border:2px solid red" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
        								        </a>
            		                        @else
        										<a style=" display: block;" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'.$data->THUMBNAIL_IMAGE) }}" >
        								        </a>
        								        
        								    @endif
    									</td>
            		                  <!--<td>-->
            		                  <!--   <a href="{{ URL::to( '/list/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
            		                  <!--   <a href="{{ route('order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
            		                  <!--</td>-->
        		                    </tr>
            		              @endforeach
            		          </table>
    		                    
    	                    </div>
    	                  
                        </div>
                        <button type="submit" clsss="btn btn-success" style="background: green;color: #fff;border: 0px;padding: 7px 30px;margin: 0 auto;display: block;border-radius: 5px;"> Save </div>
                    </div>
              
              <!-- /.card-body -->
              {!!Form::close()!!}
              @else
                <div class="">
                    <div class="card">
                        <div class="card-body">
                        <div class="card-content">
                            <div class="col-md-12 pull-right" style="float:right">
                                <div class="row">
                             
                                   <div class="col-sm-3" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >WIP</label>
                                                <!--<input type="text"  class="form-control" id="WIP" name="WIP" placeholder="WIP" required onKeyup="searchInputFilterWIP()">-->
                                                <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="WIP" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group check_po_no">
                                            <div class="form-group input-from">
                                                @can('check po and details')
                                                <button type="submit" class="btn btn-primary" id="checkPONumber">Check PO</button>
                                                @else
                                                <button class="btn btn-secondary">Check PO</button>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >Ex Comments </label>
                                                 <select name="COMMENTS" id="COMMENTS" class="form-control"  required>
                                                     <!--<select name="COMMENTS" id="COMMENTS" class="form-control"  required  onChange="searchInputFilterCOMMENTS()">-->
                    							     <option value="" selected>Select Status</option>
                    							     @foreach($sodCommentValue as $key=>$data)
                    			                       <option value="{{ $data->VALID_EX_COMMENT }}"> {{ $data->VALID_EX_COMMENT }} </option>
                    							     @endforeach
                    							 </select>
                                                <!--<input type="text"  class="form-control" id="COMMENTS" name="COMMENTS" placeholder="COMMENTS" required >-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="margint-top:10px">
                                        <!-- checkbox -->
                                        <div class="form-group input-from">
                                            <h5 class="by_date_check by_staus" style="width: 100%;text-align: center;">Is Image Null?</h5>
                                            <div class="from_box_checkbox">
                                                <div class="form-check">
                                                  <!--<input class="form-check-input" type="radio" value="Yes" name="checkobx" onclick="checkboxFilter()">-->
                                                  <input class="form-check-input" type="radio" value="Yes" name="checkobx">
                                                  <label class="form-check-label">Yes </label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio"  value="No" name="checkobx">
                                                  <label class="form-check-label">No</label>
                                                </div>
                                                  <div class="form-check">
                                                  <input class="form-check-input" type="radio"  value="Both" name="checkobx">
                                                  <label class="form-check-label">Both</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-5" style="float:left">
                                    <h5 class="by_date_check by_date">  Expected Delivery Date </h5>
                	                <div class="form-group date-form" style="width: 45%;">
                                        <label >From</label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="from" name="from" placeholder="from" required>
                                    </div>
                                    <div class="form-group date-form" style="width: 45%;">
                                        <label >To</label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="to" name="to" placeholder="to" required>
                                    </div>
                  <!--                  <div class="form-group date-form">-->
                  <!--                      <label >Search type <span style="color:red">*</span> </label>-->
                  <!--                      <select name="type" id="type" class="form-control"  required>-->
            						<!--	     <option value="" selected>Select Status</option>-->
            						<!--	     <option value="1" selected>Expected Delivery</option>-->
            						<!--	     <option value="3" selected>Handover date</option>-->
            						<!--	 </select>-->
            						<!--</div>-->
                                    <!--<div class="card-foote date-formr">-->
                                    <!--  <button type="submit" class="btn btn-primary" onclick="exprected_date()">Filter</button>-->
                                    <!--</div>-->
                                </div>
                                <div class="col-sm-6" style="float:left">
                                    <h5 class="by_date_check by_date">Expected Handover Date</h5>
                	                <div class="form-group date-form">
                                        <label >From </label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_from" name="hand_over_from" placeholder="from" required>
                                    </div>
                                    <div class="form-group date-form">
                                        <label >To </label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_to" name="hand_over_to" placeholder="to" required>
                                    </div>
                                
                                    <div class="card-foote date-formr">
                                      <button type="submit" class="btn btn-primary" onclick="handoverDate()">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-primary">
                        
                          <!-- /.card-header -->
                            <div class="card-content list_of_card_result" style="padding:10px">
                                <div class="large-table-fake-top-scroll-container-3">
                                <div>&nbsp;</div>
                            </div>
                            <div class="top_scroll">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>WIP</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>EXP Delivery</th>
                                            <th>Exp Handover</th>
                                            <th>Ex Comments</th>
                                            <th>Comments </th>
                                            <th>Supplier</th>
                                            <th>Image</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
            		            </div>
    	                    </div>
    	                 
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
              @endif
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
     <!-- /.card-header -->

<!-- /.content-wrapper -->
<script type="text/javascript">
    
    
//  var loadFile = function(event) {
//     var reader = new FileReader();
//     reader.onload = function(){
//       var output = document.getElementById('output');
//       output.src = reader.result;
//     };
//     alert(reader.readAsDataURL(event.target.files[0]));
//     reader.readAsDataURL(event.target.files[0]);
//  };

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
    
    $(document).on('keyup click', '.editSUPPLIER', function() {

        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER': $("#SUPPLIER_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#SUPPLIER_"+ID).html(first);
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
    
    $(document).on('keyup click', '.editSUPPLIERTemp', function() {

        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER': $("#SUPPLIER_input_"+ID).val(),
                'type':18
            },
            url: baseUrl +'/sales_details_update' , 
            success: function(html) {
                $("#SUPPLIER_"+ID).html(first);
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
                title:'Export S.O Details',
                text: 'Export',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8]
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
    
      $(function () {
        
        var table = $('.data-table').DataTable({
            
            processing: true,
            serverSide: true,
            ajax: baseUrl +'/list/order/details/ajax',
            columns: [
                {data: 'WIP', name: 'WIP',className: "edit_wip_no globalcss"},
                {data: 'ITEM', name: 'ITEM',className: "editITEM globalcss"},
                {data: 'DESCRIPTION', name: 'DESCRIPTION',className: "globalcss"},
                {data: 'QTY', name: 'QTY',className: "editQty globalcss"},
                 {data: 'EXP_DELIVERY', name: 'EXP_DELIVERY',className: "editEXP_DELIVERY globalcss"},
                {data: 'EXP_HANDOVER_DT', name: 'EXP_HANDOVER_DT',className: "editEXP_HANDOVER_DT globalcss"},
                {data: 'EX_COMMENTS', name: 'EX_COMMENTS',className: "editEX_COMMENTS globalcss"},
                {data: 'COMMENTS', name: 'COMMENTS',className: "editCOMMENTS globalcss"},
                {data: 'SUPPLIER', name: 'SUPPLIER',className: "editSUPPLIER globalcss"},
          
                {data: 'THUMBNAIL_IMAGE', name: 'THUMBNAIL_IMAGE' ,className: "editThumbnailImage globalcss"},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
              createdRow: function( row, data, dataIndex ) {
                $( row ).find('td').attr('id', data.ID);
            },
             info: false,
        });
        
      });
</script>
@endsection
