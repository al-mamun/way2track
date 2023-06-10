

<?php $__env->startSection('content'); ?>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Add S.O. Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"> Add S.O. Details</li>
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
                  <?php if($errors->any()): ?>
        			    <div class="alert alert-danger">
        			        <ul>
        			            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			                <li><?php echo e($error); ?></li>
        			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			        </ul>
        			    </div>
        			<?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e(session('success')); ?></h3>
                        </div>
                   </div>
                <?php endif; ?>
                 <div id="success"> </div>
                 <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">  Add S.O. Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                       
                       <form id="addSalesOrder" method="post" action="javascript:void(0)" enctype="multipart/form-data">
	                        <?php echo csrf_field(); ?>
	                        
                      <!--<?php echo Form::open(array('url'=>'/new/order/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data')); ?>-->
                        <div class="card-body">
                           
                            <div class="form-group">
                                <label for="status">WIP<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="WIP" name="WIP" placeholder="Enter WIP" required>
                            </div>
                         
                            
                            <div class="form-group">
                                <label for="status">Item<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter Item" required>
                            </div>
                            <div class="form-group">
                                <label for="overall_status">Description </label>
                                <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="Enter Description " ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty<span style="color:red">*</span></label>
                                <input class="form-control" type="number" id="quantity" name="QTY" min="1" placeholder="Enter Qty" required>
                            </div>
                            <div class="form-group">
                                <label for="SUPPLIER">Supplier<span style="color:red">*</span></label>
                                <input class="form-control" type="text" id="SUPPLIER" name="SUPPLIER" placeholder="Enter SUPPLIER" required>
                            </div>
                            <div class="form-group">
                                <label > Image <span style="color:red">*</span></label>
                                <input type="file" name="THUMBNAIL_IMAGE" placeholder="select image" required>
                            </div>
                            <div class="form-group">
                                <label >Exp Delivery <span style="color:red">*</span> </label>
                                <input type="text" required class="form-control date_formate" id="EXP_DELIVERY" name="EXP_DELIVERY" placeholder="Expaire Delivery Date" required>
                            </div>
                            <div class="form-group">
                                <label >Exp Handover  <span style="color:red">*</span> </label>
                                <input type="text" required class="form-control date_formate" id="exp_handover_dt" name="EXP_HANDOVER_DT" placeholder="Expaire Handover Date" required>
                            </div>
                      
                            <div class="form-group">
                                <label > EX Comments  <span style="color:red">*</span> </label>
                                <select name="EX_COMMENTS" id="EX_COMMENTS" class="form-control"  required>
    							     <option value="" selected>Select</option>
    							     <?php $__currentLoopData = $sodCommentValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			                       <option value="<?php echo e($data->VALID_EX_COMMENT); ?>"> <?php echo e($data->VALID_EX_COMMENT); ?> </option>
    							     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    							 </select>
                                <!--<textarea class="form-control" id="COMMENTS" name="COMMENTS" placeholder="COMMENTS"> </textarea>-->
                            </div>
                      
                             <div class="form-group">
                                <label >Comments  </label>
                                <input type="text"  class="form-control" id="COMMENTS" name="COMMENTS" placeholder="Eter Comments" >
                            </div
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
<script>
    $('#addSalesOrder').on('submit', function(event) {
	       	
		event.preventDefault();                          // for demo

	    $.ajax({
	        data:new FormData(this),
	        dataType:'JSON',
	        contentType: false,
	        cache: false,
	        processData: false,
	        type: "POST",
	        url: window.baseUrl + '/new/order/details/submit',
	        success:function(data) {
	            
	              if($.isEmptyObject(data.error)){
	            
	                  $('#success').html('<div class="alert alert-success"> '+ data.success +' </div>');
	                  
	                  $('.print-error-msg ul').html('');
	                  
	                    setTimeout(function() { 
                             window.location = window.baseUrl + '/list/order/details';
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order/details/new.blade.php ENDPATH**/ ?>