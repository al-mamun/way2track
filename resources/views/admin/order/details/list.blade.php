@extends('admin.master.app')

@section('content')
<style>
tr {
    cursor: pointer;
}
tr.selected {
    background: #eee;
}
<<<<<<< HEAD
.displayNone {
    display:none;
}
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
.fixedHeader-floating thead {
   
    padding-top: 10px !important;
}
.fixedHeader-floating thead tr{
   
    padding-top: 10px !important;
}
.fixedHeader-floating thead tr th {
   
    padding-top: 10px !important;
}
table.dataTable.fixedHeader-floating, table.dataTable.fixedHeader-locked {
    background-color: white;
    margin-top: 19px !important;
    margin-bottom: 0 !important;
}

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
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
</style>
{{ csrf_field() }}
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
<<<<<<< HEAD
        <div class="row"  style="width:100%;">
            <div class="col-sm-6" >
                <h1>@if(!empty($salesOrderDetailsTemp)) Import @else Export S.O Details @endif</h1>
            </div>
            <div class="col-sm-4" >
            
            </div>
            @if(empty($salesOrderDetailsTemp))
            <div class="col-sm-2 pull-right" style="float:right;padding-right: 0px;">
                <div class="dropdown column_list_dropdown" >
                    <button class="btn btn-secondary" type="button" style="float:right" onclick="dropdownList()">
                        Customize column
                    </button>
                    <div class="dropdown-menu dropdown_menu_list">
                        <ul id="sortableOrderDetails" class="sortable">
                            @if(!empty($columnSync))
                                @foreach($columnSync as $key => $value)
                                    @if(!empty($value))
                                     @php
                                        $exp = explode('_', $value);
                                        
                                        $settingTableInfo = DB::table('w2t_setting_column_table')
                                            ->where('page_name', $exp[1])
                                            ->where('type',  2)
                                            ->first();
    
                                    @endphp
                                    
                                    <li class="ui-state-default" id="{{ $value }}" switch_value="0">
                                        <label class="switch">
                                          <input type="checkbox"   name="checkbox_list_{{ $key }}" onchange="saveChecked_data('{{  $key }}','{{ $exp[1] }}','2')" @if(!empty($settingTableInfo) && $settingTableInfo->status == 1)  checked  value="1" @else value="1" @endif>
                                          <span class="slider round"></span>
                                        </label>
                                        @if(!empty($exp[1]))
                                         {{ $exp[1] }} 
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                            
                          
                        </ul>
                        <div class="ui-state-default save_button" >
                            <button class="btn btn-info" onclick="save()"> Save </button>     
                        </div>
                    </div>
                </div>
            </div>
            @endif
=======
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export S.O Details</h1>
            </div>

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
                		                  <th>Exp Delivery</th>
                		                  <th>Exp Handover</th>
                		                  <th>Ex Comments</th>
=======
                		                  <th>EXP Delivery</th>
                		                  <th>EXP Handover DT</th>
                		                  <th>EX Comments</th>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
                    				  <td style="background-color:#E8ECF1;" class="" id="{{ $data->ID }}">
                    				  <!--<td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="{{ $data->ID }}">-->
                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text" style="width: 97px; display: block; text-align: center;"> {{  date("d M  Y", strtotime($data->EXP_DELIVERY)) }}</span>
                    						<input type="date" value="{{ $data->EXP_DELIVERY }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editEXP_HANDOVER_DTTEMP" id="{{ $data->ID }}">
                    						<span id="EXP_HANDOVER_DT_{{ $data->ID }}" class="text"  style="width: 97px; display: block; text-align: center;">{{ date("d M  Y", strtotime($data->EXP_HANDOVER_DT)) }}</span>
=======
                    				  <td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="{{ $data->ID }}">
                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text"> {{  date("d M  Y", strtotime($data->EXP_DELIVERY)) }}</span>
                    						<input type="date" value="{{ $data->EXP_DELIVERY }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editEXP_HANDOVER_DTTEMP" id="{{ $data->ID }}">
                    						<span id="EXP_HANDOVER_DT_{{ $data->ID }}" class="text">{{ date("d M  Y", strtotime($data->EXP_HANDOVER_DT)) }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
            		 
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            		                        <!--<div id="image_upload_{{ $data->ID }}">-->
            		                        <!--    <input type="file" value="{{ $data->THUMBNAIL_IMAGE }}"  id="COMMENTS_input_{{ $data->ID }}">-->
            		                        <!--</div>-->
    									  @php 
            		                           $totalImage = explode(',',$data->IMAGE_ID) ;
            		                           $total=  count($totalImage);
            		                         
            		                        @endphp
            		                        @if($total > 1)
            		                            <a style="display: block; border:2px solid red" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
<<<<<<< HEAD
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ $uploadPath.'images/'.$data->THUMBNAIL_IMAGE }}" >
        								        </a>
            		                        @else
        										<a style=" display: block;" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
        										     <!--<img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'.$data->THUMBNAIL_IMAGE) }}" >-->
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ $uploadPath.'images/'.$data->THUMBNAIL_IMAGE }}" >
=======
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'. $data->THUMBNAIL_IMAGE) }}" >
        								        </a>
            		                        @else
        										<a style=" display: block;" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
        								            <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'.$data->THUMBNAIL_IMAGE) }}" >
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
                    
<<<<<<< HEAD
                   
=======
                    <div class="card-body">
                            <div class="dropdown column_list_dropdown" >
                                <button class="btn btn-secondary" type="button" style="float:right" onclick="dropdownList()">
                                    Customize column
                                </button>
                                <div class="dropdown-menu dropdown_menu_list">
                                    <ul id="sortableOrderDetails" class="sortable">
                                        @if(!empty($columnSync))
                                            @foreach($columnSync as $key => $value)
                                                @if(!empty($value))
                                                 @php
                                                    $exp = explode('_', $value);
                                                    
                                                    $settingTableInfo = DB::table('w2t_setting_column_table')
                                                        ->where('page_name', $exp[1])
                                                        ->where('type',  2)
                                                        ->first();
                
                                                @endphp
                                                
                                                <li class="ui-state-default" id="{{ $value }}" switch_value="0">
                                                    <label class="switch">
                                                      <input type="checkbox"   name="checkbox_list_{{ $key }}" onchange="saveChecked_data('{{  $key }}','{{ $exp[1] }}','2')" @if(!empty($settingTableInfo) && $settingTableInfo->status == 1)  checked  value="1" @else value="1" @endif>
                                                      <span class="slider round"></span>
                                                    </label>
                                                    @if(!empty($exp[1]))
                                                     {{ $exp[1] }} 
                                                    @endif
                                                </li>
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                      
                                    </ul>
                                    <div class="ui-state-default save_button" >
                                        <button class="btn btn-info" onclick="save()"> Save </button>     
                                    </div>
                                </div>
                            </div>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                        </div>
                     <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-primary">
                        
                          <!-- /.card-header -->
                            <div class="card-content list_of_card_result" style="padding:10px">
<<<<<<< HEAD
                                <div class="large-table-fake-top-scroll-container-3" >
                                    <div>&nbsp;</div>
                                </div>
                               
                                <div class="top_scroll" id="top_scroll_result">
                                  
                                    <table class="table table-bordered data-table"  style="width:110%">
                                        <thead>
                                            <tr>
                                                @foreach($columnSync as $key => $value)
                                                    @if(!empty($value))
                                                        @php
                                                            $exp = explode('_', $value);
                                                            
                                                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                                                ->where('page_name', $exp[1])
                                                                ->where('type',  2)
                                                                ->first();
                        
                                                        @endphp
                                                        @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                         <th scope="col">{{ $exp[1] }} </th>
                                                         @endif
                                                    @endif
                                                 
                                                 @endforeach
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @foreach($columnSync as $key => $value)
                                                    @if(!empty($value))
                                                        @php
                                                            $exp = explode('_', $value);
                                                            
                                                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                                                ->where('page_name', $exp[1])
                                                                ->where('type',  2)
                                                                ->first();
                        
                                                        @endphp
                                                        @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                         <th scope="col">{{ $exp[1] }} </th>
                                                         @endif
                                                    @endif
                                                 
                                                 @endforeach
                                                <th width="100px">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
=======
                                <div class="large-table-fake-top-scroll-container-3">
                                <div>&nbsp;</div>
                            </div>
                            <div class="top_scroll">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            @foreach($columnSync as $key => $value)
                                                @if(!empty($value))
                                                    @php
                                                        $exp = explode('_', $value);
                                                        
                                                        $settingTableInfo = DB::table('w2t_setting_column_table')
                                                            ->where('page_name', $exp[1])
                                                            ->where('type',  2)
                                                            ->first();
                    
                                                    @endphp
                                                    @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                     <th scope="col">{{ $exp[1] }} </th>
                                                     @endif
                                                @endif
                                             
                                             @endforeach
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
<script src="{{ URL::asset( 'js/order_details.js') }}"></script>
=======

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
<!-- /.content-wrapper -->
<script type="text/javascript">
    

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
<<<<<<< HEAD
                
                // $("#DESCRIPTION_"+ID).html(first);
                
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': ID,
                    },
                    url: baseUrl +'/sales-details-descraption' , 
                    success: function(resultDecraption) {
                        $(".descraption_result_" + ID).html(resultDecraption);
                    }
                });
            }
        });
=======
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    
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
<<<<<<< HEAD
                $("#EXP_DELIVERY_"+ID).html(html);
=======
                $("#EXP_DELIVERY_"+ID).html(first);
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
                $("#EXP_HANDOVER_DT_"+ID).html(html);
=======
                $("#EXP_HANDOVER_DT_"+ID).html(first);
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
    
<<<<<<< HEAD
   
    
    
    
    // function checkboxFilter() {
        
    // //   var checkbox = $('input[name="checkobx"]:checked').serialize();
    //   var checkbox = $('input[name="checkobx"]:checked').val();
    //   $('.list_of_card_result').html(' <div class="loader"></div>');
       
    //   $.ajax({
    //         type: "POST",
    //         url: baseUrl +'/list/order/details/expected/delivery', 
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'checkbox': checkbox,
    //             'type': 2,
    //         },
    //         success: function(result) { 
    //             $('.list_of_card_result').html(result);
            
    //         }
    //     });  
        
    // }
    
    // function searchInputFilterWIP() {
        
    //     var WIP   = $("#WIP").val();
    //     $('.list_of_card_result').html(' <div class="loader"></div>');
    //     $.ajax({
    //         type: "POST",
    //         url: baseUrl +'/list/order/details/expected/delivery', 
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'WIP': WIP,
    //             'type': 4,
    //         },
    //         success: function(result) { 
    //             $('.list_of_card_result').html(result);
            
    //         }
    //     });
    // }
    
    // function searchInputFilterCOMMENTS() {
        
    //     var COMMENTS   = $("#COMMENTS").val();
    //     $('.list_of_card_result').html(' <div class="loader"></div>');
       
    //     $.ajax({
    //         type: "POST",
    //         url: baseUrl +'/list/order/details/expected/delivery', 
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'COMMENTS': COMMENTS,
    //             'type': 5,
    //         },
    //         success: function(result) { 
    //             $('.list_of_card_result').html(result);
            
    //         }
    //     });
    // }
    

    
     function handoverDate() {
        
        // alert();
=======
    function handoverDate() {
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
         var WIP   = $("#WIP").val();
        var COMMENTS   = $("#COMMENTS").val();
        var from = $("#from").val();
        var to   = $("#to").val();
        var hand_over_from = $("#hand_over_from").val();
        var hand_over_to   = $("#hand_over_to").val();
        var checkbox = $('input[name="checkobx"]:checked').val();
        
<<<<<<< HEAD
        
      
        if (WIP == "" && COMMENTS == "" && from == "" && to == "" && hand_over_from == ""  && hand_over_to == "" && typeof  checkbox === 'undefined' ) {
          
            return true;
        }
        if ( $.fn.dataTable.isDataTable('.data-table') ) {
            $('#top_scroll_result').html('<table class="table table-bordered data-table" style="width:110%"> <thead><tr style="color:#000">  @foreach($columnSync as $key=> $value) @if(!empty($value)) @php $exp=explode('_', $value); $settingTableInfo=DB::table('w2t_setting_column_table') ->where('page_name', $exp[1]) ->where('type', 2) ->first(); @endphp @if($exp[1]=='WIP' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>WIP<br><span class="wip_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> @endif @if($exp[1]=='Item' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th> @endif @if($exp[1]=='Description' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Description <br><span class="description_copy_to_all copy_to_all"><i class="fas fa-copy"></i></span></th> <th style="display:none">Description <br><span class="description_copy_to_all copy_to_all"><i class="fas fa-copy"></i></span></th> @endif @if($exp[1]=='Qty' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th> @endif @if($exp[1]=='Exp Delivery' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Exp Delivery <br><span class="exp_delivery_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th> @endif @if($exp[1]=='Exp Handover' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Exp Handover <br><span class="exp_handover_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th> @endif @if($exp[1]=='Ex Comments' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Ex Comments <br><span class="ex_comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> @endif @if($exp[1]=='Comments' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> @endif @if($exp[1]=='Supplier' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Supplier <br><span class="supplierCopyToAll copy_to_all"> <i class="fas fa-copy"></i></span> </th> @endif @if($exp[1]=='Image' && !empty( $settingTableInfo) && $settingTableInfo->status==1) <th>Image </th> @endif @endif @endforeach <th>Action</th> </tr><tr class="showCommentsDetails  ellipsis  style="display:none"> <td style="display:none"></td>@foreach($columnSync as $key=> $value) @if(!empty($value)) @php $exp=explode('_', $value); $settingTableInfo=DB::table('w2t_setting_column_table') ->where('page_name', $exp[1]) ->where('type', 2) ->first(); @endphp @if($exp[1]=='WIP' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="WIP_td box_header" style="display:none; width:150px;"> <input type="text" class="WIP_box" id="WIP_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveWIP()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Item' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="item_td box_header" style="display:none; width:150px;"> <input type="text" class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Description' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="description_td box_header" style="display:none; width:150px;"> <input type="text" class="description_box" id="description_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Qty' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="qty_td box_header" style="display:none; width:150px;"> <input type="text" class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Exp Delivery' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="exp_delivery_td box_header" style="display:none; width:150px;"> <input type="text" class="EXP_DELIVERY_box_text" id="exp_delivery_box" name="exp_delivery_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveexDelivery()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Exp Handover' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="exp_handover_td box_header" style="display:none; width:150px;"> <input type="text" class="exp_handover_box" id="exp_handover_box" name="exp_handover_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveexpHandover()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Ex Comments' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="ex_comments_td box_header" style="display:none; width:150px;"> <input type="text" class="ex_comments_box" id="ex_comments_box" name="ex_comments_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveEXComments()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Comments' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="comments_td box_header" style="display:none; width:150px;"> <input type="text" class="comments_box" id="comments_box" style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Supplier'  && !empty( $settingTableInfo) && $settingTableInfo->status==1) <td> <div class="suppler_td box_header" style="display:none; width:150px;"> <input type="text" class="supplier_box" id="supplier_box" name="supplier_box"  class="ellipsis " style="width: 65%;float: left;font-size: 15px;"> <button class="btn btn-success" onclick="saveSupplierBox()" style="width: 35%;float: left;font-size: 10px;">Save</button> </div></td>@endif @if($exp[1]=='Image' &&!empty( $settingTableInfo) && $settingTableInfo->status==1) <td></td>@endif @endif @endforeach <td></td></tr></thead> <tbody> </tbody> <tfoot><tr>@foreach($columnSync as $key => $value) @if(!empty($value)) @php $exp = explode('_', $value); $settingTableInfo = DB::table('w2t_setting_column_table') ->where('page_name', $exp[1]) ->where('type', 2) ->first(); @endphp @if(!empty( $settingTableInfo) && $settingTableInfo->status == 1)<th scope="col">{{ $exp[1] }}</th>@endif @endif @endforeach<th width="100px">Action</th></tr></tfoot></table>');
       
        }

         var table = $('.data-table').DataTable({
             dom: 'Bfrtip',
           
            processing: true,
            serverSide: true,
            // fixedHeader: true,
            ajax: {
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
            },
          
            // ajax: baseUrl +'/list/order/details/expected/delivery',
            columns: [
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
                                {data: 'WIP', name: 'WIP',className: "edit_wip_no globalcss"},
                        @endif
                        @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'ITEM', name: 'ITEM',className: "editITEM globalcss"},
                        @endif
                        @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'DESCRIPTION', name: 'DESCRIPTION',className: "globalcss"},
                            {data: 'DESCRIPTION2', name: 'DESCRIPTION2',className: "displayNone"},
                        @endif
                        @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'QTY', name: 'QTY',className: "editQty globalcss"},
                        @endif
                        @if($exp[1] == 'Exp Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'EXP_DELIVERY', name: 'EXP_DELIVERY',className: "editEXP_DELIVERY globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'EXP_HANDOVER_DT', name: 'EXP_HANDOVER_DT',className: "editEXP_HANDOVER_DT globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'EX_COMMENTS', name: 'EX_COMMENTS',className: "editEX_COMMENTS globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'COMMENTS', name: 'COMMENTS',className: "editCOMMENTS globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'SUPPLIER', name: 'SUPPLIER',className: "editSUPPLIER globalcss"},
                        @endif
                        @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'THUMBNAIL_IMAGE', name: 'THUMBNAIL_IMAGE' ,className: "editThumbnailImage globalcss"},
                        @endif
                    @endif
                   
                 
                 @endforeach
                
               
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
              createdRow: function( row, data, dataIndex ) {
                $( row ).find('td').attr('id', data.ID);
            },
           
            info: false,
            // fixedHeader:           {
            //     header: true,
            //     footer: true
            // },
            buttons: [
              {
                    extend: 'excelHtml5',
                    text:'Export',
                    title:'Export S.O Details',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,8,9,10 ],
                        
                		format: {
                            header: function ( data, columnIdx ) {
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
                                            if(columnIdx=={{ $key }}){ return 'WIP'; }
                                        @endif
                                        @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            if(columnIdx=={{ $key }}){ return 'Item'; }
                                        @endif
                                        @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                             if(columnIdx=={{ $key }}){ return 'Description'; }
                                            if(columnIdx=={{ $key+1 }}){ return 'Description'; }
                                        @endif
                                        @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                           if(columnIdx=={{ $key }}){ return 'Qty'; }
                                        @endif
                                        @if($exp[1] == 'Exp Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            if(columnIdx=={{ $key  }}){ return 'Exp Delivery'; }
                                        @endif
                                        
                                        @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            if(columnIdx=={{ $key  }}){ return 'Exp Handover'; }
                                        @endif
                                        
                                        @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            if(columnIdx=={{ $key+1  }}){ return 'Ex Comments'; }
                                        @endif
                                        
                                        @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                           if(columnIdx=={{ $key+1  }}){ return 'Comments'; }
                                        @endif
                                        
                                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            if(columnIdx=={{ $key }}){ return 'Supplier'; }
                                        @endif
                                        @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                           if(columnIdx=={{ $key }}){ return 'Image'; }
                                        @endif
                                    @endif
                                   
                                 
                                 @endforeach
                               
                                else{
                                    return data;
                                }
                            }
                            
                        }
                       
                    },
                    "action": newexportaction
                }
            ],
        });
        
        //  new $.fn.dataTable.FixedHeader( table );
         
        // $('.list_of_card_result').html(' <div class="loader"></div>');
        // $.ajax({
        //     type: "POST",
        //     url: baseUrl +'/list/order/details/expected/delivery', 
        //     data: {
        //         '_token': $('input[name=_token]').val(),
        //         'COMMENTS': COMMENTS,
        //         'WIP': WIP,
        //         'checkbox': checkbox,
        //         'from': from,
        //         'to': to,
        //         'hand_over_from': hand_over_from,
        //         'hand_over_to': hand_over_to,
        //         'type': 3
        //     },
        //     success: function(result) { 
        //         $('.list_of_card_result').html(result);
            
        //     }
        // });  
    }
    
    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 1) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
      $(function () {
        
        var table = $('.data-table').DataTable({
            // dom: 'Bfrtip',
=======
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
            
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            processing: true,
            serverSide: true,
            ajax: baseUrl +'/list/order/details/ajax?wip=@if(!empty( $wip)){{ $wip }} @endif',
            columns: [
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
                                {data: 'WIP', name: 'WIP',className: "edit_wip_no globalcss"},
                        @endif
                        @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'ITEM', name: 'ITEM',className: "editITEM globalcss"},
                        @endif
                        @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'DESCRIPTION', name: 'DESCRIPTION',className: "globalcss"},
                        @endif
                        @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'QTY', name: 'QTY',className: "editQty globalcss"},
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'Exp Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                        @if($exp[1] == 'EXP Delivery' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            {data: 'EXP_DELIVERY', name: 'EXP_DELIVERY',className: "editEXP_DELIVERY globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Exp Handover' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'EXP_HANDOVER_DT', name: 'EXP_HANDOVER_DT',className: "editEXP_HANDOVER_DT globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Ex Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'EX_COMMENTS', name: 'EX_COMMENTS',className: "editEX_COMMENTS globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            {data: 'COMMENTS', name: 'COMMENTS',className: "editCOMMENTS globalcss"},
                        @endif
                        
                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'SUPPLIER', name: 'SUPPLIER',className: "editSUPPLIER globalcss"},
                        @endif
                        @if($exp[1] == 'Image' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             {data: 'THUMBNAIL_IMAGE', name: 'THUMBNAIL_IMAGE' ,className: "editThumbnailImage globalcss"},
                        @endif
                    @endif
                   
                 
                 @endforeach
                
               
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
              createdRow: function( row, data, dataIndex ) {
                $( row ).find('td').attr('id', data.ID);
            },
<<<<<<< HEAD
   
            info: false,
            // fixedHeader:           {
            //     header: true,
            //     footer: true
            // },
            buttons: [
              {
                    // extend: 'excelHtml5',
                    // text:'Export',
                    // title:'Export S.O Details',
                    // exportOptions: {
                    //     columns: [ 1,2,3,4,5,6,7,8,9]
                    // },
                    // "action": newexportaction
                }
            ],
        });
        //  new $.fn.dataTable.FixedHeader( table );
=======
             info: false,
        });
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
      });
</script>
@endsection
