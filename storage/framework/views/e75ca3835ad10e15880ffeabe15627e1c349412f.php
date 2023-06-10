

<?php $__env->startSection('content'); ?>
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
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
    float: left;
    margin-right: 13px;
}
.date-form {
    width: 31%;
    float: left;
    margin-top: 10px;
    margin-right: 4%;
}
.card-foote.date-formr {
    margin-top: 40px;
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
}
h5.by_date_check.by_date {
    font-weight: bold;
    font-size: 16px;
    float: left;
    margin-top: 43px;
    margin-right: 20px;
}
h5.by_date_check {
    font-weight: normal;
    margin-top: 21px;
}
.dt-buttons.btn-group.flex-wrap {
    position: absolute;
    left: 243px;
    top: 20px;
    width: 76px;
    /* background: red; */
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Import P.O. Details</h1>
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
                <div class="card-header">
                    <h3 class="card-title"> Import P.O. Details</h3>
                </div>
                
         
              <!-- /.card-header -->
              <div class="card-body" style="position:relative">
                    <?php if($errors->any()): ?>
               
        			    <div class="alert alert-danger">
        			        <ul>
        			            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			            
        			                <li> <?php echo e($error); ?> </li>
        			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			        </ul>
        			    </div>
        			<?php endif; ?>
        			    <?php if(session('error')): ?>
                            <div class="card bg-gradient-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo e(session('error')); ?></h3>
                                </div>
                           </div>
                        <?php endif; ?>
                    <div class="row data-button">
            	        <div class="col-md-6">
            	           <div class="btn-group btn-group-toggle">
                                <!--<a href="<?php echo e(URL::to( 'new/order/details')); ?>" class="btn btn-info"> New </a>-->
                               
                                <div class="input-group">
                                     <?php echo Form::open(array('url'=>'purchase_order_import','role'=>'form','method'=>'POST','enctype'=>'multipart/form-data','class'=>'from-submit-status')); ?>

                                        <input id="file" accept="csv,exl" name="fileToUpload" type="file" /> 
                                        <input  name="wip_hidden" id="wip_hidden" type="hidden"  <?php if(isset($id)): ?> value="<?php echo e($saledOrderHeaders[0]->PO_NO); ?>" <?php endif; ?>/> 
                                        <button class="btn btn-success import_button" name="submit" type="submit"> PDF Import </button>
                                    </form>
                                </div>
                                <!--<a href="<?php echo e(URL::to( 'new/order/details')); ?>" class="btn btn-success"> Export </a>-->
                            </div>
                          
                        </div>
                        <div class="col-md-6">
            	           <div class="btn-group btn-group-toggle">
                                <!--<a href="<?php echo e(URL::to( 'new/order/details')); ?>" class="btn btn-info"> New </a>-->
                               
                                <div class="input-group">
                                     <?php echo Form::open(array('url'=>'purchase_order_import_csv','role'=>'form','method'=>'POST','enctype'=>'multipart/form-data','class'=>'from-submit-status')); ?>

                                        <input id="file" accept="csv,exl" name="fileToUpload" type="file" style="width:371px !important"/> 
                                        <input  name="wip_hidden_csv" id="wip_hidden_csv" type="hidden"  <?php if(isset($id)): ?> value="<?php echo e($saledOrderHeaders[0]->PO_NO); ?>" <?php endif; ?>/> 
                                        <button class="btn btn-success import_button" name="submit" type="submit">CSV Import </button>
                                    </form>
                                </div>
                                <!--<a href="<?php echo e(URL::to( 'new/order/details')); ?>" class="btn btn-success"> Export </a>-->
                            </div>
                          
                        </div>
                    </div>
                 <?php if(session('success')): ?>
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e(session('success')); ?></h3>
                        </div>
                   </div>
                <?php endif; ?>
                <div class="">
                    <table id="tableResponsive5" class="table table-bordered table-hover table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col"  style="display:none !important">SL</th>
                                <th scope="col">WIP</th>
                                <th scope="col">PO No</th>
                                <th scope="col"><span style="width:auto; display:block">PO Status</span></th>
                                <th scope="col"><span style="width:auto; display:block">Supplier Name</span></th>
                                <th scope="col"><span style="width:auto; display:block">Supplier Site</span></th>
                                <th scope="col"><span style="width:auto; display:block">REQD Exf Date</span></th>
                                <th scope="col"><span style="width:auto; display:block">ACK No</span></th>
                                <th scope="col"><span style="width:auto; display:block">ACK Date</span></th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $sl = 1; ?>
                        <?php $__currentLoopData = $saledOrderHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesOrderInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="<?php echo e($salesOrderInfo->PO_NO); ?>" <?php if(isset($id)): ?> class="selected table_row_<?php echo e($salesOrderInfo->ID); ?>" <?php else: ?> class="table_row_<?php echo e($salesOrderInfo->ID); ?>" <?php endif; ?> >
                            <td  style="display:none !important"> <?php echo e($sl++); ?></td>
                            <td><?php echo e($salesOrderInfo->WIP); ?></td>
                            <td><?php echo e($salesOrderInfo->PO_NO); ?></td>
                            <td><?php echo e($salesOrderInfo->PO_STATUS); ?></td>
                            <td><?php echo e($salesOrderInfo->SUPPLIER_NAME); ?></td>
                            <td><?php echo e($salesOrderInfo->SUPPLIER_SITE); ?></td>
                            <td>
                                <?php if(!empty($salesOrderInfo->REQD_EXF_DATE)): ?>
        				            <?php $REQD_EXF_DATE = date("d M  Y", strtotime($salesOrderInfo->REQD_EXF_DATE))  ?>
        				        <?php else: ?>
        				            <?php $REQD_EXF_DATE =$salesOrderInfo->REQD_EXF_DATE; ?>
        				        <?php endif; ?>
        				        <?php echo e($REQD_EXF_DATE); ?>

                            </td>
                            <td><?php echo e($salesOrderInfo->ACK_NO); ?></td>
                            <td>
                                 <?php if(!empty($salesOrderInfo->ACK_DATE)): ?>
        				            <?php $ACK_DATE = date("d M  Y", strtotime($salesOrderInfo->ACK_DATE))  ?>
        				        <?php else: ?>
        				            <?php $ACK_DATE =$salesOrderInfo->ACK_DATE; ?>
        				        <?php endif; ?>
        				        <?php echo e($ACK_DATE); ?>

                            
                            </td>
                            <td>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check po and details')): ?>
                                <a href="<?php echo e(URL::to( 'purchase/order/detail/view/' . $salesOrderInfo->PO_NO)); ?>" type="button" class="btn btn-block btn-info btn-sm">Details</a>
                                <?php endif; ?>
                                <!--<a href="<?php echo e(URL::to( '/purchase/order/list/edit/' . $salesOrderInfo->ID)); ?>" type="button" class="btn btn-block btn-success btn-sm">Edit</a>-->
                                <!--<a href="<?php echo e(route('purchase.delete',$salesOrderInfo->ID)); ?>" type="button" class="btn btn-block btn-danger btn-sm">Delete</a>-->
                                 <button  onClick="deleteData('<?php echo e($salesOrderInfo->ID); ?>')" id="salesOrderDelete" type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
                               
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>'
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


    $('#tableResponsive5').DataTable( {
   
        buttons: [
              
            ],
    
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
        $("#wip_hidden_csv").val(id);
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order-purchase/header/list.blade.php ENDPATH**/ ?>