

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
tr.selected {
    background: #eee;
    /* display: block; */
}
tr {
    cursor:pointer;
}
button.btn.btn-success.assign_button {
    width: 182px;
    margin-left: 10px;
    margin-top: 20px;
}
.card-foote.date-formr {
    margin-top: 31px;
}
table#listShipment {
    width: 100% !important;
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export Delivery Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Export Delivery Details</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php echo e(csrf_field()); ?>

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

                  <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="col-md-12 pull-right" style="float:right">
                                <div class="row">
                                     <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label > Delivery ID  </label>
                                                <input type="text" class="form-control" id="delivery_id" name="delivery_id" placeholder="Delivery ID" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >Shipment ID  </label>
                                                <input type="text" class="form-control" id="shipment_id" name="shipment_id" placeholder="Shipment ID" required>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >PO No  </label>
                                                <input type="text"  class="form-control" id="PO_NO" name="PO_NO" placeholder="PO No" required>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    
                                    <div class="col-sm-1" style="float:left">
                                        <div class="card-foote date-formr">
                                          <button type="submit" class="btn btn-primary" onclick="filterExportDelivery()" class="filterExportDelivery">Filter</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card list_of_card_result"  style="padding:10px;" >
                        <!-- /.card-header -->
                        <div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
        		            <table class="table table-bordered " id="listShipment" border="1">
        		                <thead>
            		                <tr style="color:#000">
                                        <th style="display:none">SL.</th>
                                        <th>Delivery ID</th>
                                        <th>Shipment ID</th>
                                        <th>PO No</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Delivery Date</th>
            		                    <th>Action</th>	              
            		                </tr>
            		            </thead>
        		              <tbody>
            		             <?php $__currentLoopData = $deliveryExportDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		               <tr id="<?php echo e($data->DELIVERY_ID); ?>" class="delivery_id_<?php echo e($data->ID); ?>">
            		                  <td style="display:none"><?php echo e($key+1); ?></td>
            		                  <td><?php echo e($data->DELIVERY_ID); ?></td>
            		                  <td><?php echo e($data->SHIPMENT_ID); ?></td>
            		                  <!--<td><?php echo e($data->PO_NO); ?></td>-->
            		                  <!--<td><?php echo e($data->ITEM); ?></td>-->
            		                  <!--<td><?php echo e($data->Qty); ?></td>-->
            		                  <!--<td><?php echo e($data->DESCRIPTION); ?></td>-->
            		                  
            		                   <td style="background-color:#E8ECF1;" id="<?php echo e($data->ID); ?>" class="editPO_NO">
                    						<span id="PO_NO_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->PO_NO); ?></span>
                    						<input type="text" value="<?php echo e($data->PO_NO); ?>" class="editbox" id="PO_NO_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editITEM" id="<?php echo e($data->ID); ?>">
                    						<span id="ITEM_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->ITEM); ?></span>
                    						<input type="text" value="<?php echo e($data->ITEM); ?>" class="editbox" id="ITEM_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    			
                    				  <td style="background-color:#E8ECF1;" class="editQTY" id="<?php echo e($data->ID); ?>">
                    						<span id="QTY_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->QTY); ?></span>
                    						<input type="text" value="<?php echo e($data->QTY); ?>" class="editbox" id="QTY_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="<?php echo e($data->ID); ?>">
                    						<span id="DESCRIPTION_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DESCRIPTION); ?></span>
                    						<input type="text" value="<?php echo e($data->DESCRIPTION); ?>" class="editbox" id="DESCRIPTION_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		                   <td style="background-color:#E8ECF1;" class="editDELIVERYDATE" id="<?php echo e($data->ID); ?>">
            		                       <?php if(!empty($data->DELIVERY_DATE)): ?>
                				            <?php $DELIVERY_DATE = date("d M  Y", strtotime($data->DELIVERY_DATE))  ?>
                				        <?php else: ?>
                				            <?php $DELIVERY_DATE =$data->DELIVERY_DATE; ?>
                				        <?php endif; ?>
                		                    
                    						<span id="DELIVERYDATE_<?php echo e($data->ID); ?>" class="text"><?php echo e($DELIVERY_DATE); ?></span>
                    						<input type="date" value="<?php echo e($DELIVERY_DATE); ?>" class="editbox" id="DELIVERYDATE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		                  <td>
                                          <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                                           <button  onClick="deleteData('<?php echo e($data->ID); ?>')" id="deleteID" type="button" class="btn  btn-danger btn-sm">Delete</button>
            		                      <!--<a href="<?php echo e(URL::to( 'export/delivery/details/delete/' .$data->ID)); ?>" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
            		                  </td>
            		                </tr>
            		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		              </tbody>
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
                    url: baseUrl +'/export/delivery/details/delete/'+ ID , 
                    success: function(HTML) {
                        $('.delivery_id_'+ID).hide();
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

        // Edit input box click action
    $(".editbox").mouseup(function() {
        return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });
    
    function edit(ID) {
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        $("#QTY_" + ID ).hide();
        $("#QTY_input_"+ID).show();
        
        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();

    }

    $(document).on('keyup click', '.editPO_NO', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_NO_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_NO': $("#PO_NO_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#PO_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editITEM', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ITEM_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ITEM': $("#ITEM_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editQTY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#QTY_" + ID ).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type': 4
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editDESCRIPTION', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type':3
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click change', '.editDELIVERYDATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DELIVERYDATE_"+ID).hide();
        $("#DELIVERYDATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DELIVERYDATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DELIVERY_DATE': $("#DELIVERYDATE_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#DELIVERYDATE_"+ID).html(html);
            }
        });
    }).change(function() { });
    
    
    function assignBy() {
        
        var itemID = $("#itemID").val();
   
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/delivery/order/header/modal', 
            data: {
                '_token': $('input[name=_token]').val(),
                'itemID': itemID,
            
                'type': 1,
            },
            success: function(result) { 
                $('.table_result').html(result);
                
            
                
            }
        });  
    }
    
    $('#listShipment').DataTable( {
         buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Delivery Details',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6]
                }
            }
        ],
    
    
        retrieve: true,
        language: {
          "emptyTable": "No result found"
        },
        pageLength: 10,
        paging: true,
        // sDom: "Rlfrtip",
        dom: 'Bfrtip',
    } );
    
    $("tbody tr").click(function () {
        $('.selected').removeClass('selected');
        $(this).addClass("selected");
        
        var id = $(this).attr("id");
        $("#itemID").val(id);
        
    });
    
    function filterExportDelivery(){
        
        var shipment_id     = $("#shipment_id").val();
        var delivery_id            = $("#delivery_id").val();
        var PO_NO           = $("#PO_NO").val();
        var shapment_status = $("#shapment_status").val();
      
        $('.list_of_card_result').html(' <div class="loader"></div>');
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/export/delivery/details/search', 
            data: {
                '_token': $('input[name=_token]').val(),
                'shipment_id': shipment_id,
                'delivery_id': delivery_id,
                'PO_NO': PO_NO,
 
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/export-delivery-details/index.blade.php ENDPATH**/ ?>