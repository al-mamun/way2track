@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Purchase Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Purchase Order</li>
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
                <div id="success"> </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Purchase Order</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="addPurchaseOrder" method="post" action="javascript:void(0)" enctype="multipart/form-data">
	                        @csrf
                    
                        <div class="card-body">
                            <div class="form-group">
                                <label for="po-no">WIP<span style="color:red">*</span></label>
                                <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="Enter WIP" >
                            </div>
                            <div class="row">
                                <label for="po-no" style="width:100%;padding-left:10px;">PO No<span style="color:red">*</span></label>
                                <!--<div class="col-md-3">-->
                                <!--    <div class="form-group">-->
                                        
                                <!--        <input type="text"  class="form-control" id="PO_NO_FIRST" name="PO_NO_FIRST" placeholder="Enter PO NO" >-->
                                <!--    </div>  -->
                                <!--</div>-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <!--<label for="po-no">PO No<span style="color:red">*</span></label>-->
                                        <input type="text"  class="form-control" id="PO_NO" name="PO_NO" placeholder="Enter PO_NO"  readonly>
                                    </div>  
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <!--<label for="po-no">PO No<span style="color:red">*</span></label>-->
                                        <input type="text"  class="form-control" id="PO_NO_LAST" name="PO_NO_LAST" placeholder="Enter PO NO " >
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">PO Date<span style="color:red">*</span></label>
                                <input type="text"  class="form-control" id="PO_DATE" name="PO_DATE" placeholder="Enter PO_DATE" >
                            </div>
                            <div class="form-group">
                                <label for="PROJECT_NAME">PO Status<span style="color:red">*</span> </label>
                                <input type="text" class="form-control" id="PO_STATUS" name="PO_STATUS" placeholder="Enter Po Status" >
                            </div>
                            <div class="form-group" id="supplierList">
                                <label for="overall_status">Supplier Name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="SUPPLIER_NAME" name="SUPPLIER_NAME" placeholder="Enter Supplier Name" >
                            </div>
                            <div class="form-group">
                                <label for="overall_status">Supplier Location<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="SUPPLIER_SITE" name="SUPPLIER_SITE" placeholder="Enter Supplier Site" >
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="date">Reqd GRD Date<span style="color:red">*</span></label>
=======
                                <label for="date">REQD GRD Date<span style="color:red">*</span></label>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                <input type="text"  class="form-control" id="date" name="REQD_EXF_DATE" placeholder="Enter Date" >
                            </div>
                            <div class="form-group">
                                <label for="overall_status">Supplier Ref No</label>
                                <input type="text" class="form-control" id="SUPPLIER_REF_NO" name="SUPPLIER_REF_NO" placeholder="Enter Supplier Ref No" >
                            </div>
                            <div class="form-group">
                                <label for="overall_status">Ack No / PI No</label>
                                <input type="text" class="form-control" id="ACK_NO" name="ACK_NO" placeholder="Enter ACK NO" >
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="date">Ack Signed Date</label>
=======
                                <label for="date">ACK Signed Date</label>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                                <input type="text" class="form-control" id="ACK_DATE" name="ACK_DATE" placeholder="Enter ACK Date">
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
<script>
    $('#WIP').on('keyup click', function(event) {

        var wip = $('#WIP').val();
        $('#PO_NO').val(wip);
        
        $.ajax({
	       
	        type: "POST",
	        data: {
                '_token': $('input[name=_token]').val(),
                'wip': wip,
            },
	        url: window.baseUrl + '/new/purchase/order/supplier/list',
	        success:function(data) {
	            $('#supplierList').html(data);
	           
	         } ,
	         error:function (response){
                printErrorMsg(data.error);
            }
        
    });
 });
    $('#addPurchaseOrder').on('submit', function(event) {
		event.preventDefault();                          // for demo
	    $.ajax({
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
	        type: "POST",
	        url: window.baseUrl + '/new/purchase/order/status/submit',
	        success:function(data) {
	            
	              if($.isEmptyObject(data.error)){
	            
	                  $('#success').html('<div class="alert alert-success"> '+ data.success +' </div>');
	                  
	                  $('.print-error-msg ul').html('');
	                  
	                    setTimeout(function() { 
                             window.location = window.baseUrl + '/list/purchase/order/header/'+data.id;
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
	
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    

    $(function() {
<<<<<<< HEAD
        $('input[name="PO_DATE"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
        });
        
        $('input[name="REQD_EXF_DATE"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
        });
        
        $('input[name="ACK_DATE"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            locale: {
              format: 'DD/MMM/YYYY'
            }
        }).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format(picker.locale.format));
        });;
    });
=======
            $('input[name="PO_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="REQD_EXF_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            
            $('input[name="ACK_DATE"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            }).on("apply.daterangepicker", function (e, picker) {
                picker.element.val(picker.startDate.format(picker.locale.format));
            });;
        });
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
</script>
@endsection