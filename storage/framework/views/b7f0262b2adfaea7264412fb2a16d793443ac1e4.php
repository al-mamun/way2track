

<?php $__env->startSection('content'); ?>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Add P.O.  Details
               </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"> Add P.O.  Details
               </li>
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
                        <h3 class="card-title"> Add P.O.  Details  </h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                       
                      <?php echo Form::open(array('url'=>'/create/purchase/order/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data')); ?>

                        
                        
                        <div class="card-body">
                          
                            <div class="form-group">
                            <label for="PO_NO">PO No<span style="color:red">*</span></label>
				    		<select name="PO_NO" id="PO_NO" class="form-control" aria-label="Default select example" required>
							     <option value="" selected>Select</option>
							     <?php $__currentLoopData = $saledOrderHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                       <option value="<?php echo e($data->PO_NO); ?>"> <?php echo e($data->PO_NO); ?> </option>
							     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							    
							 </select>
							</div>
                            <div class="form-group">
                                <label for="Item">Item<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter Item" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description<span style="color:red">*</span></label>
                                <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Qty">Qty<span style="color:red">*</span></label>
                                <input class="form-control" type="number" id="quantity" name="Qty" min="1" placeholder="Enter Qty" required>
                            </div>
                       
                            <div class="form-group">
                                <label>EXP GRD DT  </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  min="1997-01-01" max="2030-12-31"  data-date-format="DD-MMMM-YYYY"  class="form-control" id="EXP_EXF_DT" name="EXP_EXF_DT" placeholder="EXP GRD DT" >
                            </div>
                            <div class="form-group">
                                <label >Confirmed GRD </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="CONFIRMED_EXF" name="CONFIRMED_EXF" placeholder="CONFIRMED GRD">
                            </div>
                            <div class="form-group">
                                <label >ETD  </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="ETD" name="ETD" placeholder="ETD">
                            </div>
                            <div class="form-group">
                                <label >ETA  </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="ETA" name="ETA" placeholder="ETA">
                            </div>
                            <div class="form-group">
                                <label > Comments </label>
                                <textarea class="form-control" id="COMMENTS" name="COMMENTS" placeholder="Comments"> </textarea>
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
    $(function() {
            $('input[name="EXP_EXF_DT"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="EXP_EXF_DT"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('L'));
            });

            $('input[name="EXP_EXF_DT"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            $('input[name="CONFIRMED_EXF"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="CONFIRMED_EXF"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('L'));
            });

            $('input[name="CONFIRMED_EXF"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
            
            $('input[name="ETD"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETD"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('L'));
            });

            $('input[name="ETD"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
            $('input[name="ETA"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETA"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('L'));
            });

            $('input[name="ETA"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
        });
    // $('#EXP_EXF_DT').datepicker({ dateFormat: 'dd-mm-yy' }).val();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order-purchase/details/new.blade.php ENDPATH**/ ?>