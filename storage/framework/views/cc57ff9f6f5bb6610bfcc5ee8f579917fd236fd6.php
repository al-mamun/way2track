

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
    background: #E8ECF1;
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
div#listShipment_filter {
    float: right;
    /*margin-top: -55px;*/
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export Delivery</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Export Delivery</li>
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
        	      
                <?php echo e(csrf_field()); ?>

                
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Export Delivery</h3>
                      </div>
                      <input type="hidden" <?php if(isset($id)): ?> value="<?php echo e($id); ?>" <?php else: ?> value="0" <?php endif; ?> id="itemID">
                      <!-- /.card-header -->
                        <div class="card-content" style="padding:10px">
        		            <table class="table table-bordered" id="listDelivery" border="1"  >
        		                <thead>
                		              <tr style="color:#000">
                		                  <th style="display:none">SL.</th>
                		                  <th>Delivery ID</th>
                		                  <th>Size</th>
                		                  <th>No Of Trucks</th>
                		                  <th> Vehicle Plates </th>
                		                  <th>Last Despatch Time</th>
                		                  <th>Expected Delivery</th>
                		                  <th>Delivery Status</th>
                		                  <th>Delivery Time</th>
                		                  <th>Delivery Address</th>
                		                  <th>Action</th>
                		              </tr>
                		        </thead>
                		        <tbody>
            		             <?php $__currentLoopData = $deliveryView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		              <!--<tr id="sales_id_<?php echo e($data->ID); ?>">-->
            		               <tr  onclick="shipmentDetailsList('<?php echo e($data->DELIVERY_ID); ?>')" id="<?php echo e($data->DELIVERY_ID); ?>" <?php if(isset($id)): ?> class="selected" <?php endif; ?>>
            		                  <td style="display:none"><?php echo e($key+1); ?></td>
            		                  <td><?php echo e($data->DELIVERY_ID); ?></td>
            		                   <td style="background-color:#E8ECF1;" id="<?php echo e($data->ID); ?>" class="editSIZE">
                    						<span id="SIZE_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->SIZE); ?></span>
                    						<input type="text" value="<?php echo e($data->SIZE); ?>" class="editbox" id="SIZE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editNO_OF_TRUCKS" id="<?php echo e($data->ID); ?>">
                    						<span id="NO_OF_TRUCKS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->NO_OF_TRUCKS); ?></span>
                    						<input type="text" value="<?php echo e($data->NO_OF_TRUCKS); ?>" class="editbox" id="NO_OF_TRUCKS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    			
                    				  <td style="background-color:#E8ECF1;" class="editVEHICLE_PLATES" id="<?php echo e($data->ID); ?>">
                    						<span id="VEHICLE_PLATES_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->VEHICLE_PLATES); ?></span>
                    						<input type="text" value="<?php echo e($data->VEHICLE_PLATES); ?>" class="editbox" id="VEHICLE_PLATES_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editLAST_DESPATCH_TIME" id="<?php echo e($data->ID); ?>">
                    						<span id="LAST_DESPATCH_TIME_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->LAST_DESPATCH_TIME); ?></span>
                    						<input type="time" value="<?php echo e($data->LAST_DESPATCH_TIME); ?>" class="editbox" id="LAST_DESPATCH_TIME_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  
                    				    <td style="background-color:#E8ECF1;" class="editEXPECTED_DELIVERY" id="<?php echo e($data->ID); ?>">
                    				        <?php if(!empty($data->EXPECTED_DELIVERY)): ?>
                            				    <?php 
                                                    $EXPECTED_DELIVERY = date("d M  Y", strtotime($data->EXPECTED_DELIVERY)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $EXPECTED_DELIVERY =  $data->EXPECTED_DELIVERY; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="EXPECTED_DELIVERY_<?php echo e($data->ID); ?>" class="text"><?php echo e($EXPECTED_DELIVERY); ?></span>
                    						<input type="date" value="<?php echo e($EXPECTED_DELIVERY); ?>" class="editbox" id="EXPECTED_DELIVERY_input_<?php echo e($data->ID); ?>" style="display:none">
                    				    </td>
                    				  <td style="background-color:#E8ECF1;" class="editDELIVERY_STATUS" id="<?php echo e($data->ID); ?>">
                    						<span id="DELIVERY_STATUS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DELIVERY_STATUS); ?></span>
                    						<input type="text" value="<?php echo e($data->DELIVERY_STATUS); ?>" class="editbox" id="DELIVERY_STATUS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editDELIVERY_TIME" id="<?php echo e($data->ID); ?>">
                    						<span id="DELIVERY_TIME_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DELIVERY_TIME); ?></span>
                    						<input type="time" value="<?php echo e($data->DELIVERY_TIME); ?>" class="editbox" id="DELIVERY_TIME_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editDELIVERY_ADDRESS" id="<?php echo e($data->ID); ?>">
                    						<span id="DELIVERY_ADDRESS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DELIVERY_ADDRESS); ?></span>
                    						<input type="text" value="<?php echo e($data->DELIVERY_ADDRESS); ?>" class="editbox" id="DELIVERY_ADDRESS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		                
            		                  <td>
            		                      <a href="<?php echo e(URL::to( 'export/delivery/details/view/' . $data->DELIVERY_ID)); ?>" type="button" class="btn  btn-info btn-sm">Details</a>
                                          <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
            		                      <!--<a href="#" id="delete" class="btn btn-danger btn-circle btn-sm">Delete</a>-->
            		                       <button  onClick="deleteData('<?php echo e($data->DELIVERY_ID); ?>')" id="salesOrderDelete" type="button" class="btn  btn-danger btn-sm">Delete</button>
            		                  </td>
            		                </tr>
            		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		              </tbody>
        		          </table>

	                    </div>
	                    
	                    <div class="card-content" style="padding:10px">
	                         <div id ="resultOfShipmentResult">
	                             
	                            </div>
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
                    url: baseUrl +'/edit/delivery/details/delete/'+ ID , 
                    success: function(HTML) {
                        $('#'+ID).hide();
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
        
        $("#SIZE_"+ID).hide();
        $("#SIZE_input_"+ID).show();
        
        $("#NO_OF_TRUCKS_"+ID).hide();
        $("#NO_OF_TRUCKS_input_"+ID).show();
        
        $("#VEHICLE_PLATES_" + ID ).hide();
        $("#VEHICLE_PLATES_input_"+ID).show();
        
        $("#LAST_DESPATCH_TIME_"+ID).hide();
        $("#LAST_DESPATCH_TIME_input_"+ID).show();
        
        $("#EXPECTED_DELIVERY_"+ID).hide();
        $("#EXPECTED_DELIVERY_input_"+ID).show();
        
        $("#DELIVERY_TIME_"+ID).hide();
        $("#DELIVERY_TIME_input_"+ID).show();
        
        $("#DELIVERY_ADDRESS_"+ID).hide();
        $("#DELIVERY_ADDRESS_input_"+ID).show();
        
        $("#DELIVERY_STATUS_"+ID).hide();
        $("#DELIVERY_STATUS_input_"+ID).show();
    }

    $(document).on('keyup click', '.editSIZE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SIZE_"+ID).hide();
        $("#SIZE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SIZE_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SIZE': $("#SIZE_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#SIZE_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editNO_OF_TRUCKS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#NO_OF_TRUCKS_"+ID).hide();
        $("#NO_OF_TRUCKS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#NO_OF_TRUCKS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'NO_OF_TRUCKS': $("#NO_OF_TRUCKS_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#NO_OF_TRUCKS_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editVEHICLE_PLATES', function() {
    
        var ID    = $(this).attr('id');
        
        $("#VEHICLE_PLATES_" + ID ).hide();
        $("#VEHICLE_PLATES_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#VEHICLE_PLATES_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'VEHICLE_PLATES': $("#VEHICLE_PLATES_input_"+ID).val(),
                'type': 4
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#VEHICLE_PLATES_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click change', '.editLAST_DESPATCH_TIME', function() {
    
        var ID    = $(this).attr('id');
        
        $("#LAST_DESPATCH_TIME_"+ID).hide();
        $("#LAST_DESPATCH_TIME_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#LAST_DESPATCH_TIME_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'LAST_DESPATCH_TIME': $("#LAST_DESPATCH_TIME_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#LAST_DESPATCH_TIME_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click change', '.editEXPECTED_DELIVERY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#EXPECTED_DELIVERY_"+ID).hide();
        $("#EXPECTED_DELIVERY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXPECTED_DELIVERY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXPECTED_DELIVERY': $("#EXPECTED_DELIVERY_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/delivery_update' , 
            success: function(date) {
                $("#EXPECTED_DELIVERY_"+ID).html(date);
            }
        });
    }).change(function() { });

    $(document).on('keyup click change', '.editDELIVERY_TIME', function() {
        
        var ID    = $(this).attr('id');
        
        $("#DELIVERY_TIME_"+ID).hide();
        $("#DELIVERY_TIME_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DELIVERY_TIME_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DELIVERY_TIME': $("#DELIVERY_TIME_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#DELIVERY_TIME_"+ID).html(first);
            }
        });
    }).change(function() { });
    

    $(document).on('keyup click', '.editDELIVERY_ADDRESS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DELIVERY_ADDRESS_"+ID).hide();
        $("#DELIVERY_ADDRESS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DELIVERY_ADDRESS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DELIVERY_ADDRESS': $("#DELIVERY_ADDRESS_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#DELIVERY_ADDRESS_"+ID).html(first);
            }
        });
    }).change(function() { });

    $(document).on('keyup click', '.editDELIVERY_STATUS', function() {
        
        var ID    = $(this).attr('id');
        
        $("#DELIVERY_STATUS_"+ID).hide();
        $("#DELIVERY_STATUS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DELIVERY_STATUS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DELIVERY_STATUS': $("#DELIVERY_STATUS_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/delivery_update' , 
            success: function(html) {
                $("#DELIVERY_STATUS_"+ID).html(first);
            }
        });
    }).change(function() { });

     $(".close").click(function(){
        $('#modal-lg').modal('hide');
    });
   
    function shipmentDetailsList(DELIVERY_ID) {
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/delivery/single/order/details', 
            data: {
                '_token': $('input[name=_token]').val(),
                'DELIVERY_ID': DELIVERY_ID,
            
                'type': 1,
            },
            success: function(result) { 
                $('#resultOfShipmentResult').html(result);
                  
           
            
            }
        }); 
    }
    
    function assign() {
        var itemID = $("#itemID").val();
        var to   = $("#to").val();
    
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
  $('#listDelivery').DataTable( {
        buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Delivery',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,9 ]
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

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/delivery/export_list.blade.php ENDPATH**/ ?>