

<?php $__env->startSection('content'); ?>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Delivery Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Delivery Details</li>
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
                 <div id="success"> </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <?php if(session('success')): ?>
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e(session('success')); ?></h3>
                        </div>
                   </div>
                <?php endif; ?>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Delivery Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <!-- form start -->
                      <form id="addPurchaseOrder" method="post" action="javascript:void(0)" enctype="multipart/form-data">
	                        <?php echo csrf_field(); ?>
                      <?php echo Form::open(array('url'=>'add/delivery/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status')); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="DELIVERY_ID"> Delivery ID <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="DELIVERY_ID" placeholder=""  required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="SHIPMENT_ID"> Shipment ID <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="SHIPMENT_ID" placeholder=""  required>
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
                                        <label for="PO_NO">PO No <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="PO_NO" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ITEM">Item <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="ITEM" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="DESCRIPTION">Description</label>
                                        <textarea  type="text" class="form-control" name="DESCRIPTION"> </textarea>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      <?php echo Form::close(); ?>

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
    $('#addPurchaseOrder').on('submit', function(event) {
		event.preventDefault();                          // for demo
	    $.ajax({
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
	        type: "POST",
	        url: window.baseUrl + '/add/delivery/details/submit',
	        success:function(data) {
	            
	              if($.isEmptyObject(data.error)){
	            
	                  $('#success').html('<div class="alert alert-success"> '+ data.success +' </div>');
	                  
	                  $('.print-error-msg ul').html('');
	                  
	                    setTimeout(function() { 
                             window.location = window.baseUrl + '/export/delivery/details';
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/delivery/create-details.blade.php ENDPATH**/ ?>