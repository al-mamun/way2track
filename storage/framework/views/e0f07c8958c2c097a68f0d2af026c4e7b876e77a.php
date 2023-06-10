

<?php $__env->startSection('content'); ?>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Update User</li>
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
                            <h3 class="card-title"> Update order details</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                           
                          <?php echo Form::open(array('url'=>'/userlist/update/'.$editUser->id,'role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data')); ?>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Name<span style="color:red">*</span></label>
                                    <input type="text" required class="form-control" id="name" name="name" placeholder="Enter name" required value="<?php echo e($editUser->name); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Email<span style="color:red">*</span></label>
                                    <input type="text" required class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo e($editUser->email); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" value="<?php echo e($editUser->mobile); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Notes</label>
                                    <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter notes" value="<?php echo e($editUser->notes); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Password</label>
                                    <input type="text" class="form-control" id="email" name="password" placeholder="******" value="">
                                </div>
                                <div class="form-group">
                                <h5 class="by_date_check by_staus">Assign Roles to User</h5>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input <?php if($editUser->hasRole($role->name)): ?> checked <?php endif; ?> class="form-check-input" type="checkbox" value="<?php echo e($role->id); ?>" name="roles[]" onclick="checkboxFilter()">
                                    <label class="form-check-label"><?php echo e($role->name); ?> </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
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
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/user/edit-user.blade.php ENDPATH**/ ?>