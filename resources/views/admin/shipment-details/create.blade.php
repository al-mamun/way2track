@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Shipment Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Shipment Details</li>
                </ol>
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
                
                @if (session('success'))
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ session('success') }}</h3>
                        </div>
                   </div>
                @endif
<<<<<<< HEAD
                <div id="success"></div>
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Shipment Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
<<<<<<< HEAD
                      <form id="addShimpmentDetails" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                          {{ csrf_field()}}
=======
                      {!! Form::open(array('url'=>'shipment/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="SHIPMENT_ID"> Shipment  <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="SHIPMENT_ID" placeholder=""   required >
                                    </div>
                                </div>
                                <div class="col-md-6">
<<<<<<< HEAD
=======
                                     <div class="form-group">
                                        <label for="CONTAINER_NO"> Container No <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="CONTAINER_NO" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="VESSEL">Vessel<span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="VESSEL" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Qty">Qty <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="Qty" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETD">ETD <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="ETD" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETA">ETA <span style="color:red">*</span></label>
                                        <input type="ShipmentDetail" class="form-control"  name="ETA" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    <div class="form-group">
                                        <label for="SUPPLIER">Supplier <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="SUPPLIER" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PO_NO">PO No <span style="color:red">*</span></label>
<<<<<<< HEAD
                                        <input type="text" class="form-control"  name="PO_NO" placeholder="" required id='po_no_exist_check'>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="WIP">WIP <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="WIP" placeholder="" required id='WIP' readonly>
=======
                                        <input type="text" class="form-control"  name="PO_NO" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="WIP">WIP <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="WIP" placeholder="" required>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ITEM">Item <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="ITEM" placeholder="" required>
                                    </div>
                                </div>
<<<<<<< HEAD
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Qty">Qty <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="Qty" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
=======
                             
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > ACT GRD Date <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="ACT_EXF_DATE" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > MBLMAWB <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="MBL_MAWB" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Vessel Sailing Date   <span style="color:red">*</span></label>
                                         <input type="text" class="form-control"  name="VESSEL_SAILING_DATE" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Confirmed ETA <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="CONFIRMED_ETA" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Shipment Status <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="SHIPMENT_STATUS" placeholder="" required value="Shipped ">
                                      </div>
                                </div>
                                   <div class="col-md-12">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                    <div class="form-group">
                                        <label for="DESCRIPTION"> Description</label>
                                        <textarea  type="text" class="form-control" name="DESCRIPTION"> </textarea>
                                    </div>
                                </div>
<<<<<<< HEAD
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="CONTAINER_NO"> Container No</label>
                                        <input type="text" class="form-control" name="CONTAINER_NO" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > MBL/ MAWB </label>
                                         <input type="text" class="form-control"  name="MBL_MAWB" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="VESSEL">Vessel</label>
                                        <input type="text"  class="form-control" name="VESSEL" placeholder="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Vessel Sailing Date </label>
                                         <input type="text" class="form-control"  name="VESSEL_SAILING_DATE" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETD">ETD</label>
                                        <input type="text" class="form-control"  name="ETD" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETA">ETA</label>
                                        <input type="ShipmentDetail" class="form-control"  name="ETA" placeholder="">
                                    </div>
                                </div>
                                
                             
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Actual GRD Date </label>
                                         <input type="text" class="form-control"  name="ACT_EXF_DATE" placeholder="">
                                      </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Confirmed ETA </label>
                                         <input type="text" class="form-control"  name="CONFIRMED_ETA" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Shipment Status </label>
                                         <input type="text" class="form-control"  name="SHIPMENT_STATUS" placeholder=""  value="Shipped">
                                      </div>
                                </div>
                                
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Comments </label>
                                        <textarea  type="text" class="form-control" name="COMMENTS"> </textarea>
                                      </div>
                                </div>
                            </div>  
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      {!!Form::close()!!}
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
<<<<<<< HEAD
<script type="text/javascript"> 

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    $('#po_no_exist_check').on('keyup click', function(event) {

        var PO_NO = $('#po_no_exist_check').val();
        
        $.ajax({
	       
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'PO_NO': PO_NO,
            },
	        url: window.baseUrl + '/purchase/order/po/no/check',
	        success:function(data) {
	            $('#WIP').val(data);
	           
	         } ,
	         error:function (response){
                
            }
        
    });
 });
    
    $('#addShimpmentDetails').on('submit', function(event) {
		event.preventDefault();                          // for demo
	    $.ajax({
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
	        type: "POST",
	        url: window.baseUrl + '/shipment/details/submit',
	        success:function(data) {
	            
	              if($.isEmptyObject(data.error)){
	            
	                  $('#success').html('<div class="alert alert-success"> '+ data.success +' </div>');
	                  
	                  $('.print-error-msg ul').html('');
	                  
	                    setTimeout(function() { 
                             window.location = window.baseUrl + '/export/shipment/order/';
                        }, 2000);
                    } else if(data.status==401) {
                              $('#success').html('<div class="alert alert-danger"> '+ data.error +' </div>');
                              $('.print-error-msg ul').html('');
                              return true;
                    }   else{
                         
                        printErrorMsg(data.error);
                    }
	           
	           
	         } ,
	         error:function (response){
                printErrorMsg(data.error);
            }
	    }); 
	}); 
	

        $(function() {
          
            
           $('input[name="ETD"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
=======
<script type="text/javascript">
        $(function() {
            $('input[name="ETD"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            });
            
            $('input[name="ETA"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
<<<<<<< HEAD
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
            });
            
=======
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            $('input[name="ACT_EXF_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
<<<<<<< HEAD
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
            });
            
            // $('input[name="ACT_EXF_DATE"]').daterangepicker({
            //     timePicker: false,
            //     singleDatePicker: true,
            //     showDropdowns: true,
            //     locale: {
            //       format: 'DD/MMM/YYYY'
            //     }
            // });
            
             $('input[name="VESSEL_SAILING_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
            });
            
             $('input[name="CONFIRMED_ETA"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
            });
            
=======
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="VESSEL_SAILING_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="CONFIRMED_ETA"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        });
</script>
</script>
@endsection