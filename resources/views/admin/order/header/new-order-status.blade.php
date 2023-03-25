@extends('admin.master.app')

@section('content')
<style>
    .col-md-12.wip_number {
        width: 100%;
        float: left;
        margin-bottom: 10px;
    }
    .col-md-6.left_wip {
        width: 40%;
        float: left;
    }
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Sales Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Sales Order</li>
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
                   @if ($errors->any())
    			    <div class="alert alert-danger">
    			        <ul>
    			            @foreach ($errors->all() as $error)
    			                <li>{{ $error }}</li>
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
                <div id="success"> </div>
                 <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                   
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <!--<div class="card-header">-->
                      <!--  <h3 class="card-title"> Add Sales Order</h3>-->
                      <!--</div>-->
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="salesOrder" method="post" action="javascript:void(0)" enctype="multipart/form-data">
	                        @csrf
                  
                        <div class="card-body">
                           <div class="form-group">
                                <label for="WIP" style="width:100%; clear:both">WIP<span style="color:red">*</span></label>
                                <div class="row wip_number" style="padding-left:0px;">
                                    <div class="col-md-2 left_wip" style="padding-left:0px;">
                                        <input type="text" class="form-control" id="WIP1" name="WIP1" placeholder="Enter WIP Prefix" maxlength="3">
                                    </div>
                                     <div class=" left_wip" style="padding-left:0px; padding-top: 8px; ">
                                      
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md-9 left_wip">
                                        <input type="text" class="form-control" id="WIP" name="WIP" placeholder="Enter WIP">
                                    </div>
                                </div>
                            </div>
                            <!--  <div class="form-group">-->
                            <!--    <label for="po-no">PO_NO<span style="color:red">*</span></label>-->
                            <!--    <input type="text" required class="form-control" id="PO_NO" name="PO_NO" placeholder="Enter WIP"  required>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label for="customer"> Customer <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="customer" name="customer" placeholder="Enter Customer Name">
                            </div>
                            <div class="form-group">
                                <label for="customer"> Customer Po No<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="CUSTOMER_PO_NO" name="CUSTOMER_PO_NO" placeholder="Enter Customer PO Number">
                            </div>
                            <div class="form-group">
                                <label for="status">Status <span style="color:red">*</span></label>
                                <select name="status" id="status" class="form-control" aria-label="Select Status" required>
                                    <option value="" selected>Select Status</option>
                                    <option value="LIVE">Live</option>
                                    <option value="CLOSED">Closed</option>
                                    <option value="CANCELLED">Cancelled</option>
                                </select>
                                <!--<input type="text" class="form-control" id="status" name="status" placeholder="Enter status">-->
                            </div>
                            <div class="form-group">
                                <label for="PROJECT_NAME"> Project Name <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="PROJECT_NAME" name="PROJECT_NAME" placeholder="Enter Project Name">
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label for="overall_status"> Overall Status <span style="color:red">*</span></label>-->
                            <!--    <input type="text" class="form-control" id="overall_status" name="overall_status" placeholder="Overall Status" required>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label for="date"> Expected Handover Date <span style="color:red">*</span></label>
                                <input type="text" class="form-control date_formate" id="date" name="date" placeholder="Enter Enter Date">
                            </div>
                            <div class="form-group">
                                <label for="SALESPERSON"> Salesperson Name <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="SALESPERSON" name="SALESPERSON" placeholder="Enter Salesperson Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="email"> Salesperson Email <span style="color:red">*</span></label>
                                <input type="email" class="form-control" id="SALESPERSON_EMAIL" name="SALESPERSON_EMAIL" placeholder="Enter Salesperson Email">
                            </div>
                            
                            <div class="form-group">
                                <label for="PROJECTMANAGER"> Project Manager Name <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="PROJECTMANAGER" name="PROJECTMANAGER" placeholder="Enter Project Manager Name">
                            </div>
                            <div class="form-group">
                                <label for="email"> Project Manager Email <span style="color:red">*</span></label>
                                <input type="email" class="form-control" id="PROJECTMANAGER_EMAIL" name="PROJECTMANAGER_EMAIL" placeholder="Enter Project Manager Email">
                            </div>
                       
                            <div class="form-group">
                                <label > Comments </label>
                                <textarea class="form-control" id="comments" name="comments" placeholder="Enter Comments"> </textarea>
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
    <!--{!! Form::open(array('url'=>'new/order/status/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}-->
<script>
    $('#salesOrder').on('submit', function(event) {
	       	
		event.preventDefault();                          // for demo

	    $.ajax({
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
	        type: "POST",
	        url: window.baseUrl + '/new/order/status/submit',
	        success:function(data) {
	            
	              if($.isEmptyObject(data.error)){
	                  $('#success').html('<div class="alert alert-success"> '+ data.success +' </div>');
	                  
	                  $('.print-error-msg ul').html('');
	                  
	                    setTimeout(function() { 
                             window.location = window.baseUrl + '/list/order/status/id/'+data.id;
                        }, 2000);
                        
                    } else if(data.status==401) {
                              $('#success').html('<div class="alert alert-danger"> '+ data.error +' </div>');
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
</script>
@endsection