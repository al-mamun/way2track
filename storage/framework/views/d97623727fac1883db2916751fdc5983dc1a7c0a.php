

<?php $__env->startSection('content'); ?>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add User</li>
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
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                         <h3 class="card-title"> Add User <span class="float-end">
		                    <a href="<?php echo e(URL::to('/userlist')); ?>" class="btn btn-customs"><i class="fas fa-list"></i></a></span>
		                 </h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                       
                      <?php echo Form::open(array('url'=>'/new-user/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data')); ?>

                      <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mobile:</strong>
                                    <?php echo Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Notes:</strong>
                                    <?php echo Form::text('notes', null, array('placeholder' => 'notes','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/user/create-user.blade.php ENDPATH**/ ?>