

<?php $__env->startSection('content'); ?>
<style>
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
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User / Attach Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit User / Attach Role</li>
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
            	    
                    
        	       <?php if(Session::has('success')): ?>
        	          <div class="alert alert-success alert-dismissible fade show" role="alert">
        	            <strong><?php echo e(Session::get('success')); ?></strong>
        	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	            	 <span aria-hidden="true">&times;</span>
        	            </button>
        	          </div>
        	        <?php endif; ?>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title"> Edit User / Attach Role </h3>
                      </div>
                      <!-- /.card-header -->
                        <div class="card-content">
        		            <table class="table table-bordered" border="1">
        		              <tr style="color:#000">
        		                  <th>SL.</th>
        		                  <th>Name</th>
        		                  <th>Email</th>
        		                  <th>Mobile</th>
        		                  <th>Notes</th>
        		                  <th>ACTION</th>
        		              </tr>
        		             <?php $__currentLoopData = $userlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		               <tr>
        		                  <td><?php echo e($key+1); ?></td>
        		                  <td><?php echo e($data->name); ?></td>
        		                  <td><?php echo e($data->email); ?></td>
        		                  <td><?php echo e($data->mobile); ?></td>
        		                  <td><?php echo e($data->notes); ?></td>
        		                  <td>
        		                     <a href="<?php echo e(URL::to('/userlist/edit/' .$data->id)); ?>"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> 
        		                     <a href="<?php echo e(route('user.delete',$data->id)); ?>" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
        		                  </td>
        		                </tr>
        		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		          </table>
		                    
	                    </div>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/user/userlist.blade.php ENDPATH**/ ?>