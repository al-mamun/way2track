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
    margin-top: 12px;
}
.by_status_wise {
    width: 240px;
}
.date-form {
    width: 200px;
    float: left;
    margin-top: 3px;
    margin-right: 22px;
}
.card-foote.date-formr {
    margin-top: 3px;
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
    width:100%;
}
h5.by_date_check.by_date {
    font-weight: bold;
    font-size: 16px;
    float: left;
    margin-top: 13px;
    margin-right: 20px;
    width: 100%;
    margin-left:50px;
}
.form-control-panel {
    width: 150px;
    float: left;
}
h5.by_date_check {
    font-weight: normal;
    margin-top: 21px;
}
label.form-control-label {
    float: left;
    width: 50px;
    padding-top: 8px;
    text-align: revert;
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
                <h1> Export Purchase Order </h1>
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-2">
                <!--<ol class="breadcrumb float-sm-right">-->
                <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>-->
                <!--  <li class="breadcrumb-item active"> Export Purchase Order </li>-->
                <!--</ol>-->
                <div class="dropdown column_list_dropdown" >
                    <button class="btn btn-secondary" type="button" style="float:right" onclick="dropdownList()">
                        Customize column
                    </button>
                    <div class="dropdown-menu dropdown_menu_list">
                        <ul id="sortablepageHeader" class="sortable">
                            @if(!empty($columnSync))
                                @foreach($columnSync as $key => $value)
                                    @if(!empty($value))
                                     @php
                                        $exp = explode('_', $value);
                                        
                                        $settingTableInfo = DB::table('w2t_setting_column_table')
                                            ->where('page_name', $exp[1])
                                            ->where('type',  3)
                                            ->first();
    
                                    @endphp
                                    
                                    <li class="ui-state-default" id="{{ $value }}" switch_value="0">
                                        <label class="switch">
                                          <input type="checkbox"   name="checkbox_list_{{ $key }}" onchange="saveChecked_data('{{  $key }}','{{ $exp[1] }}','3')" @if(!empty($settingTableInfo) && $settingTableInfo->status == 1)  checked  value="1" @else value="1" @endif>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <!--<div class="card-header">-->
                <!--    <h3 class="card-title"> Export Purchase Order</h3>-->
                <!--</div>-->
                
                <div class="card-content">
                    <div class="col-md-12 pull-right">
                        <div class="by_status_wise"  style="float:left; margin-top:14px;">
                            <!-- checkbox -->
                            <div class="form-group">
                                <h5 class="by_date_check by_staus">By status</h5>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Live" name="checkobx">
                                  <label class="form-check-label">Live </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox"  value="Closed" name="checkobx">
                                  <label class="form-check-label">Closed</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="Cancelled" name="checkobx">
                                  <label class="form-check-label">Cancelled</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"  style="float:left;margin-top: 11px;">
                            <!-- checkbox -->
                            <div class="form-group">
                                <div class="form-group input-from">
                                    <label >PO No  </label>
                                    <input type="text" class="form-control" id="PO_NO" name="PO_NO" placeholder="Enter Po No" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="float:left; margin-left:20px">
                            <h5 class="by_date_check by_date">By PO Date</h5>
        	                <div class="form-group date-form">
                                <label class="form-control-label">From</label>
                                <div class="form-control-panel">
                                    <input type="text" required class="form-control" id="from" name="from" placeholder="from" required>
                                </div>
                            </div>
                            <div class="form-group date-form"  style="margin-right: 10px;">
                                <label class="form-control-label" style="width: 30px;"> To </label>
                                <div class="form-control-panel">
                                    <input type="text" required class="form-control" id="to" name="to" placeholder="to" required>
                                </div>
                            </div>
                        
                            <div class="card-foote date-formr">
                              <button type="submit" class="btn btn-primary" onclick="filterStatusAndDateWise()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>   
                <!--<div class="card-body">-->
                    
                <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body" style="position:relative">
                  @if ($errors->any())
        			    <div class="alert alert-danger">
        			        <ul>
        			            @foreach ($errors->all() as $error)
        			                <li> please select header first </li>
        			            @endforeach
        			        </ul>
        			    </div>
        			@endif
                    
                 @if (session('success'))
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ session('success') }}</h3>
                        </div>
                   </div>
                @endif
                @if(!empty($WIP)) Search WIP : {{ $WIP }} @endif
                <div class="table_result">
                    <table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <!--<th scope="col"  style="display:none !important">SL</th>-->
                                 @foreach($columnSync as $key => $value)
                                    @if(!empty($value))
                                        @php
                                            $exp = explode('_', $value);
                                            
                                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                                ->where('page_name', $exp[1])
                                                ->where('type',  3)
                                                ->first();
        
                                        @endphp
                                        @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                         <th scope="col">{{ $exp[1] }} </th>
                                         @endif
                                    @endif
                                 
                                 @endforeach
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach($poOrderHeaders as $poOrderHeadersInfo)
                        <tr id="{{ $poOrderHeadersInfo->PO_NO }}" @if(isset($id)) class="selected table_row_{{$poOrderHeadersInfo->ID }}" @else class="table_row_{{$poOrderHeadersInfo->ID }}" @endif >
                                <!--<td  style="display:none !important"> {{ $sl++ }}</td>-->
                                @foreach($columnSync as $key => $value)
                                    @if(!empty($value))
                                        @php
                                            $exp = explode('_', $value);
                                            
                                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                                ->where('page_name', $exp[1])
                                                ->where('type',  3)
                                                ->first();
                    
                                        @endphp
                                        @if($exp[1] == 'WIP' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editWIPno" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="WIP_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->WIP }}</span>
                        						<input type="text" value="{{ $poOrderHeadersInfo->WIP }}" class="editbox" id="WIP_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                        @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editPONo" id="{{ $poOrderHeadersInfo->ID }}">
                                        		<span id="PO_NO_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
                                        		<input type="text" value="{{ $poOrderHeadersInfo->PO_NO }}" class="editbox" id="PO_NO_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                                          </td>
                                           
                                            
                                           
                                        @endif
                                        @if($exp[1] == 'PO Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editPO_DATE" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="PO_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
                        						     @if(!empty($poOrderHeadersInfo->PO_DATE))
                            				            @php $PO_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->PO_DATE))  @endphp
                            				        @else
                            				            @php $PO_DATE =$poOrderHeadersInfo->PO_DATE; @endphp
                            				        @endif
                            		                    {{ $PO_DATE }}
        
                        						   </span>
                        						<input type="date" value="{{ $poOrderHeadersInfo->PO_DATE }}" class="editbox" id="PO_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                        @if($exp[1] == 'PO Status' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editPO_STATUS" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="PO_STATUS_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->PO_STATUS }}</span>
                        						<input type="text" value="{{ $poOrderHeadersInfo->PO_STATUS }}" class="editbox" id="PO_STATUS_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                        				    
                                        @endif
                                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editSUPPLIER_NAME" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="SUPPLIER_NAME_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->SUPPLIER_NAME }}</span>
                        						<input type="text" value="{{ $poOrderHeadersInfo->SUPPLIER_NAME }}" class="editbox" id="SUPPLIER_NAME_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                        @if($exp[1] == 'Supplier Site' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editSUPPLIER_SITE" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="SUPPLIER_SITE_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->SUPPLIER_SITE }}</span>
                        						<input type="text" value="{{ $poOrderHeadersInfo->SUPPLIER_SITE }}" class="editbox" id="SUPPLIER_SITE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                         @if($exp[1] == 'Reqd GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editREQD_EXF_DATE" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="REQD_EXF_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
                        						     @if(!empty($poOrderHeadersInfo->REQD_EXF_DATE))
                            				            @php $REQD_EXF_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->REQD_EXF_DATE))  @endphp
                            				        @else
                            				            @php $REQD_EXF_DATE =$poOrderHeadersInfo->REQD_EXF_DATE; @endphp
                            				        @endif
                            		                    {{ $REQD_EXF_DATE }}
                        						   </span>
                        						<input type="date" value="{{ $poOrderHeadersInfo->REQD_EXF_DATE }}" class="editbox" id="REQD_EXF_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                        @if($exp[1] == 'Ack No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editACK_NO" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="ACK_NO_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->ACK_NO }}</span>
                        						<input type="text" value="{{ $poOrderHeadersInfo->ACK_NO }}" class="editbox" id="ACK_NO_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                        @if($exp[1] == 'Ack Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                                            <td style="background-color:#E8ECF1;" class="editACK_DATE" id="{{ $poOrderHeadersInfo->ID }}">
                        						<span id="ACK_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
                        						    @if(!empty($poOrderHeadersInfo->ACK_DATE))
                            				            @php $ACK_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->ACK_DATE))  @endphp
                            				        @else
                            				            @php $ACK_DATE =$poOrderHeadersInfo->ACK_DATE; @endphp
                            				        @endif
                            				        {{ $ACK_DATE }}
                        						</span>
                        						<input type="date" value="{{ $poOrderHeadersInfo->ACK_DATE }}" class="editbox" id="ACK_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                        				    </td>
                                        @endif
                                    @endif
                                        
                                @endforeach
                                    
 
                                
                                <td>
                                     @can('check po and details')
                                    <a href="{{ URL::to( 'purchase/order/detail/view/' . $poOrderHeadersInfo->PO_NO) }}" type="button" class="btn btn-block btn-info btn-sm">Details</a>
                                    @endcan
                                    <!--<a href="{{ URL::to( '/purchase/order/list/edit/' . $poOrderHeadersInfo->ID) }}" type="button" class="btn btn-block btn-success btn-sm">Edit</a>-->
                                    <!--<a href="javascript:void(0)" type="button" class="btn btn-block btn-success btn-sm" onclick="edit('{{ $poOrderHeadersInfo->ID }}')">Edit</a>-->
                                    <button  onClick="deleteData('{{$poOrderHeadersInfo->ID}}')" id="po_header_delete" type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
                                    <!--<a href="{{ route('purchase.delete',$poOrderHeadersInfo->ID) }}" type="button" class="btn btn-block btn-danger btn-sm">Delete</a>-->
                                </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                </div>
                </div>
              <!-- /.card-body -->
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
        $(function() {
            $('input[name="from"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,  
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="from"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
            });

            $('input[name="from"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            $('input[name="to"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,  
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="to"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
            });

            $('input[name="to"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
         
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
            url: baseUrl +'/purchase/order/delete/'+ ID , 
            success: function(HTML) {
                $('.table_row_'+ID).hide();
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
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        $("#PO_DATE_"+ID).hide();
        $("#PO_DATE_input_"+ID).show();
        
        $("#PO_STATUS_" + ID ).hide();
        $("#PO_STATUS_input_"+ID).show();
        
        $("#SUPPLIER_NAME_"+ID).hide();
        $("#SUPPLIER_NAME_input_"+ID).show();
        
        $("#SUPPLIER_SITE_"+ID).hide();
        $("#SUPPLIER_SITE_input_"+ID).show();
        
        $("#REQD_EXF_DATE_"+ID).hide();
        $("#REQD_EXF_DATE_input_"+ID).show();
        
        $("#ACK_NO_" + ID ).hide();
        $("#ACK_NO_input_"+ID).show();
        
        $("#ACK_DATE_"+ID).hide();
        $("#ACK_DATE_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
    }
    
    $(document).on('keyup click', '.editWIPno', function() {
    
        var ID    = $(this).attr('id');
        
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WIP_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WIP': $("#WIP_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#WIP_"+ID).html(first);
                }
            });
        
        }).change(function() {});
    
    $(document).on('keyup click', '.editPONo', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_NO': $("#PO_NO_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#PO_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    $(document).on('keyup click change', '.editPO_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_DATE_"+ID).hide();
        $("#PO_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_DATE': $("#PO_DATE_input_"+ID).val(),
                'type':3
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#PO_DATE_"+ID).html(date);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editPO_STATUS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_STATUS_" + ID ).hide();
        $("#PO_STATUS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_STATUS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_STATUS': $("#PO_STATUS_input_"+ID).val(),
                'type': 4
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#PO_STATUS_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editSUPPLIER_NAME', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_NAME_"+ID).hide();
        $("#SUPPLIER_NAME_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_NAME_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER_NAME': $("#SUPPLIER_NAME_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#SUPPLIER_NAME_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editSUPPLIER_SITE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_SITE_"+ID).hide();
        $("#SUPPLIER_SITE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_SITE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER_SITE': $("#SUPPLIER_SITE_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#SUPPLIER_SITE_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editREQD_EXF_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#REQD_EXF_DATE_"+ID).hide();
        $("#REQD_EXF_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#REQD_EXF_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'REQD_EXF_DATE': $("#REQD_EXF_DATE_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#REQD_EXF_DATE_"+ID).html(date);
                }
            });
    
    }).change(function() { });
    
    $(document).on('keyup click', '.editACK_NO', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ACK_NO_" + ID ).hide();
        $("#ACK_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACK_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACK_NO': $("#ACK_NO_input_"+ID).val(),
                'type': 8
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ACK_NO_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
    $(document).on('keyup click change', '.editACK_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ACK_DATE_"+ID).hide();
        $("#ACK_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACK_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACK_DATE': $("#ACK_DATE_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#ACK_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    $(document).on('keyup click', '.editETD', function() {
    
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
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ETD_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editETA', function() {
    
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
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ETA_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    function filterStatusAndDateWise(){
        
        var from  = $("#from").val();
        var to    = $("#to").val();
        var PO_NO = $("#PO_NO").val();
        var checkbox = $.map($('input[name="checkobx"]:checked'), function(c){return c.value; })
        $('.table_result').html(' <div class="loader"></div>');
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/header/export/search', 
            data: {
                '_token': $('input[name=_token]').val(),
                'from': from,
                'to': to,
                'checkbox': checkbox,
                'PO_NO': PO_NO,
                'type': 1,
            },
            success: function(result) { 
                $('.table_result').html(result);
            
            }
        });  
    }
    
    function checkboxFilter() {
        
    //   var checkbox = $('input[name="checkobx"]:checked').serialize();
       var checkbox = $.map($('input[name="checkobx"]:checked'), function(c){return c.value; })
       
       $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/header/export/search', 
            data: {
                '_token': $('input[name=_token]').val(),
                'checkbox': checkbox,
                'type': 2,
            },
            success: function(result) { 
                $('.table_result').html(result);
            
            }
        });  
        
    }

        $('#tableResponsive2').DataTable( {
            buttons: [
            //   {
            //         extend: 'excelHtml5',
            //         text:'Export',
            //         title:'Export Purchase Order',
            //         exportOptions: {
            //             columns: [ 0,1,2,3,4,5,6,7,8 ]
            //         }
            //     }
            ],
            fixedHeader: true,
            retrieve: true,
            language: {
              "emptyTable": "No result found"
            },
            "autoWidth": false,
            pageLength: 10,
            paging: true,
            // sDom: "Rlfrtip",
            dom: 'Bfrtip',
        } );
        $("tbody tr").click(function () {
            $('.selected').removeClass('selected');
            $(this).addClass("selected");
            
            var id = $(this).attr("id");
            $("#wip_hidden").val(id);
            
        });
</script>
@endsection