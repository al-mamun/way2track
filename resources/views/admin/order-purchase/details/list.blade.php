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
<<<<<<< HEAD
        .form-group.input-from {
            width: 250px;
        }
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
            width: 250px;
            float: left;
            margin-top: 10px;
            margin-left: 30px;
        }
        .card-foote.date-formr {
            margin-top: 0px;
        }
        .date-formr {
            width: 250px;
=======
            width: 46%;
            float: left;
            margin-top: 10px;
            margin-right: 4%;
        }
        .card-foote.date-formr {
            margin-top: 40px;
        }
        .date-formr {
            width: 18%;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
            margin-top: 3px;
            /*margin-right: 20px;*/
            padding-left:56px;
=======
            margin-top: 10px;
            margin-right: 20px;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
        
        .date-filter {
            width: 61px;
            margin-left: 0px;
        }
=======
  
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        
    </style>
    
    <style>
        
    </style>
    <style>

</style>



<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
<<<<<<< HEAD
                <h1>@if(!empty($poDetailsToken)) Import @else  Export P.O. Details @endif </h1>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <!--<ol class="breadcrumb float-sm-right">-->
                <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>-->
                <!--  <li class="breadcrumb-item active"> Export P.O. Details-->
                <!--  </li>-->
                <!--</ol>-->
                @if(empty($poDetailsToken))
                <div class="dropdown column_list_dropdown" >
                    <button class="btn btn-secondary" type="button" style="float:right" onclick="dropdownList()">
                        Customize column
                    </button>
                    <div class="dropdown-menu dropdown_menu_list">
                        <ul id="sortable">
                            @if(!empty($columnSync))
                                @foreach($columnSync as $key => $value)
                                    @if(!empty($value))
                                     @php
                                        $exp = explode('_', $value);
                                        
                                        $settingTableInfo = DB::table('w2t_setting_column_table')
                                            ->where('page_name', $exp[1])
                                            ->where('type',  4)
                                            ->first();
    
                                    @endphp
                                    
                                    <li class="ui-state-default" id="{{ $value }}" switch_value="0">
                                        <label class="switch">
                                          <input type="checkbox"   name="checkbox_list_{{ $key }}" onchange="saveChecked_data('{{  $key }}','{{ $exp[1] }}','4')" @if(!empty($settingTableInfo) && $settingTableInfo->status == 1)  checked  value="1" @else value="1" @endif>
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
                @endif
=======
                <h1> Export P.O. Details
                   </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"> Export P.O. Details
                  </li>
                </ol>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
        	        @if(!empty($poDetailsToken))
        	            
        	            {!! Form::open(array('url'=>'/create/purchase/order/details/submit/temp','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
               	         <input type="hidden" value="{{$token}}" name="token">
        	                <!-- /.card-header -->
                            <div class="card-body">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title">P.O. Details Import Preview </h3>
                              </div>
                              <!-- /.card-header -->
                                <div class="card-content">
                		            <table class="table table-bordered" border="1">
                		              <tr style="color:#000">
                                        <th>PO No</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Comments</th>
<<<<<<< HEAD
                                        <th>Exp GRD</th>
                                        <th>Confirmed GRD</th>
=======
                                        <th>EXP EXF DT</th>
                                        <th>Confirmed EXF</th>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                        <th>ETD</th>
                                        <th>ETA</th>
                		              </tr>
                		             @foreach($poDetailsToken as $key=>$data)
                		               <tr>
                		                  
                		                  <td style="background-color:#E8ECF1;" id="{{ $data->ID }}">
                            						<span id="wip_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
                            						<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
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
                    		           
                    		                  <td style="background-color:#E8ECF1;" class="editCOMMENTSTEMP" id="{{ $data->ID }}">
                            						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
                            						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
                            				  </td>
<<<<<<< HEAD
                            				  <!--<td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="{{ $data->ID }}">-->
                            		            <td style="background-color:#E8ECF1;"  id="{{ $data->ID }}">
=======
                            		            <td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="{{ $data->ID }}">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            		                  @if(!empty($data->EXP_EXF_DT))
                                    				    @php 
                                                            $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                                        @endphp
                                                    @else
                                                        @php 
                                                            $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                                        @endphp
                                                    @endif
                            						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
                            						<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                            				    </td>
<<<<<<< HEAD
                            				    <!--<td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXFTEMP" id="{{ $data->ID }}">-->
                            				    <td style="background-color:#E8ECF1;"  id="{{ $data->ID }}">
=======
                            				    <td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXFTEMP" id="{{ $data->ID }}">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            				          @if(!empty($data->CONFIRMED_EXF))
                                        				    @php 
                                                                $CONFIRMED_EXF = date("d M  Y", strtotime( $data->CONFIRMED_EXF)); 
                                                            @endphp
                                                        @else
                                                            @php 
<<<<<<< HEAD
                                                                $CONFIRMED_EXF =  $data->CONFIRMED_EXF; 
=======
                                                                $CONFIRMED_EXF =  $data->ETA; 
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                                            @endphp
                                                        @endif
                            						<span id="CONFIRMED_EXF_{{ $data->ID }}" class="text">{{ $CONFIRMED_EXF }}</span>
                            						<input type="date" value="{{ $data->CONFIRMED_EXF }}" class="editbox" id="CONFIRMED_EXF_input_{{ $data->ID }}" style="display:none">
                            				    </td>
<<<<<<< HEAD
                            				     <td style="background-color:#E8ECF1;"  id="{{ $data->ID }}">
                            				    <!--<td style="background-color:#E8ECF1;" class="editETDTEMP" id="{{ $data->ID }}">-->
=======
                            				    <td style="background-color:#E8ECF1;" class="editETDTEMP" id="{{ $data->ID }}">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            				         @if(!empty($data->ETD))
                                    				    @php 
                                                            $ETD = date("d M  Y", strtotime( $data->ETD)); 
                                                        @endphp
                                                    @else
                                                        @php 
                                                            $ETD =  $data->ETD; 
                                                        @endphp
                                                    @endif
                            						<span id="ETD_{{ $data->ID }}" class="text">{{ $ETD }}</span>
                            						<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
                            				    </td>
<<<<<<< HEAD
                            				    <!--<td style="background-color:#E8ECF1;" class="editETATEMP" id="{{ $data->ID }}">-->
                            				    <td style="background-color:#E8ECF1;" id="{{ $data->ID }}">
=======
                            				    <td style="background-color:#E8ECF1;" class="editETATEMP" id="{{ $data->ID }}">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            				         @if(!empty($data->ETA))
                                    				    @php 
                                                            $ETA = date("d M  Y", strtotime( $data->ETA)); 
                                                        @endphp
                                                    @else
                                                        @php 
                                                            $ETA =  $data->ETA; 
                                                        @endphp
                                                    @endif
                            						<span id="ETA_{{ $data->ID }}" class="text">{{ $ETA }}</span>
                            						<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
                            				    </td>
                		                
                		                </tr>
                		              @endforeach
                		          </table>
        		                    
        	                    </div>
        	                  
                            </div>
                        </div>
                            <button type="submit" clsss="btn btn-success" style="background: green;color: #fff;border: 0px;padding: 7px 30px;margin: 20px auto;display: block;border-radius: 5px;"> Save </div>
                            <!-- /.card-body -->
                          {!!Form::close()!!}
        	        @else
            	        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                <div class="col-md-12 pull-right" style="float:right">
                                    <div class="row">
                                 
<<<<<<< HEAD
                                           <div class="col-sm-5" >
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-group input-from">
                                                        <label >PO No  </label>
                                                        <!--onKeyup="searchInputFilterWIP()"-->
                                                        <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="PO NO" required >
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            <div class="col-sm-7" style="float:left;margin-top: 0px; margin-left:0px;">
                                                <h5 class="by_date_check by_date"  style="float:left;margin-top: 0px;margin-bottom: 0px;">Expected GRD</h5>
                            	                <div class="form-group date-form" style=" margin-left:0px;">
                                                    <label style="width: 56px;float: left;">From</label>
                                                    <input style="width: 194px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="from" name="from" placeholder="from" required>
                                                </div>
                                                <div class="form-group date-form">
                                                    <label style="width: 40px;float: left;">To</label>
                                                    <input style="width: 194px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="to" name="to" placeholder="to" required>
                                                </div>
                                            </div>
                                            <!--<div class="col-sm-6" >-->
                                                <!-- checkbox -->
                                            <!--    <div class="form-group input-from">-->
                                            <!--        <h5 class="by_date_check by_staus">Is Image Null?</h5>-->
                                            <!--        <div class="form-check">-->
                                            <!--          <input class="form-check-input" type="radio" value="Yes" name="checkobx" onclick="checkboxFilter()">-->
                                            <!--          <label class="form-check-label">Yes </label>-->
                                            <!--        </div>-->
                                            <!--        <div class="form-check">-->
                                            <!--          <input class="form-check-input" type="radio"  value="No" name="checkobx" onclick="checkboxFilter()">-->
                                            <!--          <label class="form-check-label">No</label>-->
                                            <!--        </div>-->
                                            <!--          <div class="form-check">-->
                                            <!--          <input class="form-check-input" type="radio"  value="Both" name="checkobx" onclick="checkboxFilter()">-->
                                            <!--          <label class="form-check-label">Both</label>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12 pull-right" style="float:right">
                                        <div class="row">
                                        <div class="col-sm-5" >
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-group input-from">
                                                    <label class="by_date_check by_date" >Comments </label>
=======
                                       <div class="col-sm-3" >
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-group input-from">
                                                    <label >PO No  </label>
                                                    <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="PO NO" required onKeyup="searchInputFilterWIP()">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-3" >
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-group input-from">
                                                    <label >Comments </label>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                                    <select name="COMMENTS" id="COMMENTS" class="form-control"  required >
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
<<<<<<< HEAD
                                        <div class="col-sm-7" style="float:left">
                                        
                                            <h5 class="by_date_check by_date"> Confirmed GRD</h5>
                        	                <div class="form-group date-form" style="margin-top: 0px; margin-left:0px">
                                                  <label style="width: 56px;float: left;">From</label>
                                                <input type="date" style="width: 194px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_from" name="hand_over_from" placeholder="from" required>
                                            </div>
                                            <div class="form-group date-form"  style="margin-top: 0px;">
                                                  <label style="width: 40px;float: left;">To</label>
                                                <input type="date" style="width: 194px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_to" name="hand_over_to" placeholder="to" required>
                                            </div>
                                            <div class="date-filter" style="float:left">
                                                <div class="card-foote date-formr">
                                                  <button type="submit" class="btn btn-primary" onclick="handoverDate()">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                     </div>
=======
                                         <div class="col-sm-6" style="float:left;margin-top: 0px;">
                                            <h5 class="by_date_check by_date"  style="float:left;margin-top: 0px;margin-bottom: 0px;">Expected ExF Date</h5>
                        	                <div class="form-group date-form">
                                                <label style="width: 50px;float: left;">From</label>
                                                <input style="width: 160px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="from" name="from" placeholder="from" required>
                                            </div>
                                            <div class="form-group date-form">
                                                <label style="width: 50px;float: left;">To</label>
                                                <input style="width: 160px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="to" name="to" placeholder="to" required>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6" >-->
                                            <!-- checkbox -->
                                        <!--    <div class="form-group input-from">-->
                                        <!--        <h5 class="by_date_check by_staus">Is Image Null?</h5>-->
                                        <!--        <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio" value="Yes" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">Yes </label>-->
                                        <!--        </div>-->
                                        <!--        <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio"  value="No" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">No</label>-->
                                        <!--        </div>-->
                                        <!--          <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio"  value="Both" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">Both</label>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                    </div>
                                    <div class="col-sm-6" style="float:left">
                                      
    
                                        <!--<div class="card-foote date-formr">-->
                                        <!--  <button type="submit" class="btn btn-primary" onclick="exprected_date()">Filter</button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="col-sm-6" style="float:left">-->
                                        <h5 class="by_date_check by_date"> Confirmed ExF Date</h5>
                    	                <div class="form-group date-form">
                                              <label style="width: 50px;float: left;">From</label>
                                            <input type="date" style="width: 160px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_from" name="hand_over_from" placeholder="from" required>
                                        </div>
                                        <div class="form-group date-form">
                                              <label style="width: 50px;float: left;">To</label>
                                            <input type="date" style="width: 160px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_to" name="hand_over_to" placeholder="to" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="float:left">
                                        <div class="card-foote date-formr">
                                          <button type="submit" class="btn btn-primary" onclick="handoverDate()">Filter</button>
                                        </div>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                        <!--<div class="card-body">-->
                            
                  
                        <!--</div>-->
=======
                        <div class="card-body">
                            <div class="dropdown column_list_dropdown" >
                                <button class="btn btn-secondary" type="button" style="float:right" onclick="dropdownList()">
                                    Customize column
                                </button>
                                <div class="dropdown-menu dropdown_menu_list">
                                    <ul id="sortable">
                                        @if(!empty($columnSync))
                                            @foreach($columnSync as $key => $value)
                                                @if(!empty($value))
                                                 @php
                                                    $exp = explode('_', $value);
                                                    
                                                    $settingTableInfo = DB::table('w2t_setting_column_table')
                                                        ->where('page_name', $exp[1])
                                                        ->where('type',  4)
                                                        ->first();
                
                                                @endphp
                                                
                                                <li class="ui-state-default" id="{{ $value }}" switch_value="0">
                                                    <label class="switch">
                                                      <input type="checkbox"   name="checkbox_list_{{ $key }}" onchange="saveChecked_data('{{  $key }}','{{ $exp[1] }}','4')" @if(!empty($settingTableInfo) && $settingTableInfo->status == 1)  checked  value="1" @else value="1" @endif>
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
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        	            <div class="card-body">
        	                <div class="card card-primary">
        	                  {{ csrf_field() }}
                              <!-- /.card-header -->
<<<<<<< HEAD
                              
                                <div class="card-content list_of_card_result table-responsive" style="padding: 2px 13px;">
                                    <div class="large-table-fake-top-scroll-container-3">
                                        <div>&nbsp;</div>
                                    </div>
                                    <div class="top_scroll">
                		                <table class="table table-bordered"  id="listOfOrderDetails">
                    		                    <thead>
                            		              <tr style="color:#000">
                            		                  <th style="display:none">SL.</th>
                            		                    @foreach($columnSync as $key => $value)
                                                            @if(!empty($value))
                                                                @php
                                                                    $exp = explode('_', $value);
                                                                    
                                                                    $settingTableInfo = DB::table('w2t_setting_column_table')
                                                                        ->where('page_name', $exp[1])
                                                                        ->where('type',  4)
                                                                        ->first();
                                
                                                                @endphp
                                                                @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                                 <th scope="col">{{ $exp[1] }} </th>
                                                                 @endif
                                                            @endif
                                                         
                                                         @endforeach
                            		                  <th>Action</th>
                            		              </tr>
                            		          </thead>
                        		                <tbody>
=======
                                <div class="card-content list_of_card_result table-responsive" style="padding: 2px 13px;">
                		            <table class="table table-bordered"  id="listOfOrderDetails">
                		                <thead>
                        		              <tr style="color:#000">
                        		                  <th style="display:none">SL.</th>
                        		                    @foreach($columnSync as $key => $value)
                                                        @if(!empty($value))
                                                            @php
                                                                $exp = explode('_', $value);
                                                                
                                                                $settingTableInfo = DB::table('w2t_setting_column_table')
                                                                    ->where('page_name', $exp[1])
                                                                    ->where('type',  4)
                                                                    ->first();
                            
                                                            @endphp
                                                            @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                             <th scope="col">{{ $exp[1] }} </th>
                                                             @endif
                                                        @endif
                                                     
                                                     @endforeach
                        		                  <th>Action</th>
                        		              </tr>
                        		          </thead>
                        		      <tbody>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                		                @foreach($poDetails as $key=>$data)
                		                    <tr id="purchase_id_{{$data->ID}}">
                    		                   <td style="display:none">{{ $key + 1 }}</td>
                    		                    @foreach($columnSync as $key => $value)
                    		                         @php
                                                        $exp = explode('_', $value);
                                                        
                                                        $settingTableInfo = DB::table('w2t_setting_column_table')
                                                            ->where('page_name', $exp[1])
                                                            ->where('type',  4)
                                                            ->first();
                                
                                                    @endphp
                                                    @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
<<<<<<< HEAD
                                    						<span id="wip_{{ $data->ID }}" class="text" style=" width: 138px;display: block;">{{ $data->PO_NO }}</span>
=======
                                    						<span id="wip_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
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
<<<<<<< HEAD
                                    						<span id="DESCRIPTION_{{ $data->ID }}" class="text" style=" width: 250px;display: block;">{{ $data->DESCRIPTION }}</span>
=======
                                    						<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
                                                    
                                                    @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
<<<<<<< HEAD
                                    						<span id="QTY_{{ $data->ID }}" class="text" >{{ $data->QTY }}</span>
=======
                                    						<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
                                    				  </td>
                                                    @endif
                                                    
                                                    @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
                                    						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
                                    						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
                                    				  </td>
                                                    @endif
<<<<<<< HEAD
                                                     @if($exp[1] == 'Exp GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                                                    
                                                    @if($exp[1] == 'Confirmed EXF' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                                        <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="{{ $data->ID }}">
                                    		                @if(!empty($data->EXP_EXF_DT))
                                            				    @php 
                                                                    $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                                                @endphp
                                                            @else
                                                                @php 
                                                                    $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                                                @endphp
                                                            @endif
<<<<<<< HEAD
                                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $EXP_EXF_DT }}</span>
=======
                                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
                                                    
<<<<<<< HEAD
                                                    @if($exp[1] == 'Confirmed GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXF" id="{{ $data->ID }}">
                                    		                @if(!empty($data->CONFIRMED_EXF))
                                            				    @php 
                                                                    $CONFIRMED_EXF = date("d M  Y", strtotime( $data->CONFIRMED_EXF)); 
                                                                @endphp
                                                            @else
                                                                @php 
                                                                    $CONFIRMED_EXF =  $data->CONFIRMED_EXF; 
                                                                @endphp
                                                            @endif
                                    							<span id="CONFIRMED_EXF_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $CONFIRMED_EXF }}</span>
            			                                    	<input type="date" value="{{ $data->CONFIRMED_EXF }}" class="editbox" id="CONFIRMED_EXF_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
                                                    
                                                   
=======
                                                    @if($exp[1] == 'EXP EXF DT' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="{{ $data->ID }}">
                                    		                @if(!empty($data->EXP_EXF_DT))
                                            				    @php 
                                                                    $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                                                @endphp
                                                            @else
                                                                @php 
                                                                    $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                                                @endphp
                                                            @endif
                                    						<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
                                    						<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                    		                        
                    		                      
                                                    @if($exp[1] == 'ETA' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editETD" id="{{ $data->ID }}">
                                    				       
                                                            @if(!empty($data->ETA))
                                            				    @php 
                                                                    $ETA = date("d M  Y", strtotime( $data->ETA)); 
                                                                @endphp
                                                            @else
                                                                @php 
                                                                    $ETA =  $data->ETA; 
                                                                @endphp
                                                            @endif
<<<<<<< HEAD
                                    						<span id="ETD_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $ETA }}</span>
=======
                                    						<span id="ETD_{{ $data->ID }}" class="text">{{ $ETA }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
                                                    
                                                    @if($exp[1] == 'ETD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                        <td style="background-color:#E8ECF1;" class="editETA" id="{{ $data->ID }}">
                                    				         @if(!empty($data->ETD))
                                            				    @php 
                                                                    $ETD = date("d M  Y", strtotime($data->ETD)); 
                                                                @endphp
                                                            @else
                                                                @php 
                                                                    $ETD =  $data->ETD; 
                                                                @endphp
                                                            @endif
<<<<<<< HEAD
                                    						<span id="ETA_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $ETD }}</span>
=======
                                    						<span id="ETA_{{ $data->ID }}" class="text">{{ $ETD }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    						<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
                                    				    </td>
                                                    @endif
                    		                    @endforeach
                    		                  
                    		                  
                    		                  <td>
                    		                     <!--<a href="{{ URL::to( '/list/purchase/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                    		                     <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                    		                     <!--<a href="{{ route('purchase_order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
                    		                     <button onclick="purchase_duplicate('{{ $data->ID }}')"  id="purchase_duplicate" type="button" class="btn  btn-info btn-sm">Duplicate </button>
                    		                     <button  onClick="deleteData('{{$data->ID}}')" id="purchase_delete" type="button" class="btn  btn-danger btn-sm">Delete</button>
                    		                  </td>
                		                </tr>
                		                @endforeach
                		              </tbody>
<<<<<<< HEAD
                		                        <tfoot>
                            		              <tr style="color:#000">
                            		                  <th style="display:none">SL.</th>
                            		                    @foreach($columnSync as $key => $value)
                                                            @if(!empty($value))
                                                                @php
                                                                    $exp = explode('_', $value);
                                                                    
                                                                    $settingTableInfo = DB::table('w2t_setting_column_table')
                                                                        ->where('page_name', $exp[1])
                                                                        ->where('type',  4)
                                                                        ->first();
                                
                                                                @endphp
                                                                @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                                                 <th scope="col">{{ $exp[1] }} </th>
                                                                 @endif
                                                            @endif
                                                         
                                                         @endforeach
                            		                  <th>Action</th>
                            		              </tr>
                            		            </tfoot>
                		                </table>
        		                    </div>
=======
                		          </table>
        		                    
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        	                    </div>
                            </div>
                        </div>
                      <!-- /.card-body -->
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
<!-- /.content-wrapper -->
  <!-- data table Jquery -->
   <script>
        
  </script>
<!-- /.content-wrapper -->
<script type="text/javascript">
    

    
    function purchase_duplicate(ID) {
         $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'ID': ID,
              
            },
            url: baseUrl +'/purchase/details/duplicate', 
            success: function(HTML) {
                 $("#purchase_id_" + ID ).after(HTML);
            }
        
        });
       
    }  
    
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
                    url: baseUrl +'/list/purchase/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('#purchase_id_'+ID).hide();
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
    
    
      // Edit input box click action
    $(".editbox").mouseup(function() {
        return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });
    
    function edit(ID) {
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
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
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
        url: baseUrl +'/purchase_details_update' , 
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
            url: baseUrl +'/purchase_details_update' , 
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
            url: baseUrl +'/purchase_details_update' , 
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
            url: baseUrl +'/purchase_details_update' , 
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
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(html);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_CONFIRMED_EXF', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_EXF_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_EXF': $("#CONFIRMED_EXF_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(data1) {
                $("#CONFIRMED_EXF_"+ID).html(data1);
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
            url: baseUrl +'/purchase_details_update' , 
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
                'type':6
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    $(document).on('keyup click change', '.editETD', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETD_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETD': $("#ETD_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#ETD_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editETA', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETA': $("#ETA_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#ETA_"+ID).html(date);
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
                'type':20
            },
            url: baseUrl +'/purchase_details_update' , 
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
                'type': 21
            },
            url: baseUrl +'/purchase_details_update' , 
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
                'type':22
            },
            url: baseUrl +'/purchase_details_update' , 
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
                'type':23
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#EXP_DELIVERY_"+ID).html(date);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_CONFIRMED_EXFTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_EXF_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_EXF': $("#CONFIRMED_EXF_input_"+ID).val(),
                'type':24
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#CONFIRMED_EXF_"+ID).html(date);
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
                'type': 25
            },
            url: baseUrl +'/purchase_details_update' , 
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
                'type':26
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    $(document).on('keyup click change', '.editETDTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETD_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETD': $("#ETD_input_"+ID).val(),
                'type':27
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ETD_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editETATEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETA': $("#ETA_input_"+ID).val(),
                'type':28
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ETA_"+ID).html(first);
            }
        });
    }).change(function() { });
    


    function exprected_date(){
        
        var from = $("#from").val();
        var to   = $("#to").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'from': from,
                'to': to,
                'type': $('select[name=type]').val(),
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }
    
    function handoverDate(){
        
        var from           = $("#from").val();
        var to             = $("#to").val();
        var WIP            = $("#WIP").val();
        var hand_over_from = $("#hand_over_from").val();
        var hand_over_to   = $("#hand_over_to").val();
        var checkbox       = $('input[name="checkobx"]:checked').val();
        var COMMENTS       = $("#COMMENTS").val();
        
        $('.list_of_card_result').html(' <div class="loader"></div>');
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'checkbox': checkbox,
                'COMMENTS': COMMENTS,
                'from': from,
                'to': to,
                'hand_over_from': hand_over_from,
                'hand_over_to': hand_over_to,
                'WIP': WIP,
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
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
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
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
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
<<<<<<< HEAD
        //   {
        //         extend: 'excelHtml5',
        //         text: 'Export',
        //         title:'Export P.O. Details',
        //         exportOptions: {
        //             columns: [ 1,2,3,4,5,6,7,8,9 ]
        //         }
        //     }
=======
          {
                extend: 'excelHtml5',
                text: 'Export',
                title:'Export P.O. Details',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,9 ]
                }
            }
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        ],
    
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
