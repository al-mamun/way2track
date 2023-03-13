

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
    .filter_shipment {
        margin-top:10px;
    }
    .card-foote.date-formr {
        margin-top: 32px;
    }
    


</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export Shipment Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Export Shipment Details</li>
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
        	        <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">  Search Purchase Orders </h4>
                                    <button type="button" class="close" data- dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="resultOFAssign" class="table_result"></div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                   
                                </div>
                            </div>
                    
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="col-md-12 pull-right" style="float:right">
                                <div class="row">
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
                                                <label > Container ID   </label>
                                                <input type="text" class="form-control" id="container_id" name="container_id" placeholder=" Container ID" required>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >PO No  </label>
                                                <input type="text"  class="form-control" id="PO_NO" name="PO_NO" placeholder="PO NO" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >WIP </label>
                                                <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="WIP" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" >
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="form-group input-from">
                                                <label >Shipment Status </label>
                                                <input type="text"  class="form-control" id="shapment_status" name="shapment_status" placeholder="Shipment Satus" required>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1" style="float:left">
                                        <div class="card-foote date-formr">
                                          <button type="submit" class="btn btn-primary" onclick="filterDetailsShipment()" class="filter_shipment">Filter</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card"  style="padding:10px;">
                        
                        
                        <!--<div class="large-table-container-3">-->
                        <div class="card-content table-reponsive list_of_card_result " style="width: 100%;display: block;overflow-x: scroll;">
                            <!-- /.card-header -->
                            <div class="large-table-fake-top-scroll-container-3">
                                <div>&nbsp;</div>
                            </div>
                            <div class="top_scroll">
        		                <table class="table table-bordered " id="listShipment" border="1">
        		                <thead>
            		              <tr style="color:#000">
                                        <th style="display:none">SL.</th>
                                        <th>Shipment ID</th>
                                        <th>Container NO</th>
                                        <th>Vessel </th>
                                        <th>Qty</th>
                                        <th>ETD</th>
                                        <th>ETA</th>
                                        <th>Supplier</th>
                                        <th>PO No</th>
                                        <!--<th>WIP</th>-->
                                        <!--<th>Warehouse Date</th>-->
                                        <th>Receive Date</th>
                                        <th>Item</th>
                                        <th>Description  </th>
                                        <th>Comments </th>
                                        <th>Act Exf Date </th>
                                        <th>MBL MAWB </th>
                                        <th>Vessel Sailing Date </th> 
                                        <th>Confirmed ETA </th> 
                                        <th>Shipment Status</th>
            		                    <th>Action</th>
            		              </tr>
            		            </thead>
        		              <tbody>
            		             <?php $__currentLoopData = $newShipmentView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		               <tr id="<?php echo e($data->SHIPMENT_ID); ?>">
            		                  <td style="display:none"><?php echo e($key+1); ?></td>
            		                  <td><?php echo e($data->SHIPMENT_ID); ?></td>
            		                  <td style="background-color:#E8ECF1;" id="<?php echo e($data->ID); ?>" class="editCONTAINER_NO">
                    						<span id="CONTAINER_NO_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->CONTAINER_NO); ?></span>
                    						<input type="text" value="<?php echo e($data->CONTAINER_NO); ?>" class="editbox" id="CONTAINER_NO_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editVESSEL" id="<?php echo e($data->ID); ?>">
                    						<span id="VESSEL_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->VESSEL); ?></span>
                    						<input type="text" value="<?php echo e($data->VESSEL); ?>" class="editbox" id="VESSEL_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    			
                    				  <td style="background-color:#E8ECF1;" class="editQty" id="<?php echo e($data->ID); ?>">
                    						<span id="Qty_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->Qty); ?></span>
                    						<input type="text" value="<?php echo e($data->Qty); ?>" class="editbox" id="Qty_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editETD" id="<?php echo e($data->ID); ?>">
                    				        <?php if(!empty($data->ETD)): ?>
                            				    <?php 
                                                    $ETD = date("d M  Y", strtotime($data->ETD)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $ETD =  $data->ETD; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="ETD_<?php echo e($data->ID); ?>" class="text"><?php echo e($ETD); ?></span>
                    						<input type="date" value="<?php echo e($data->ETD); ?>" class="editbox" id="ETD_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editETA" id="<?php echo e($data->ID); ?>">
                    				        <?php if(!empty($data->ETA)): ?>
                            				    <?php 
                                                    $ETA = date("d M  Y", strtotime( $data->ETA)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $ETA =  $data->ETA; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="ETA_<?php echo e($data->ID); ?>" class="text"><?php echo e($ETA); ?></span>
                    						<input type="date" value="<?php echo e($data->ETA); ?>" class="editbox" id="ETA_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editSUPPLIER" id="<?php echo e($data->ID); ?>">
                    						<span id="SUPPLIER_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->SUPPLIER); ?></span>
                    						<input type="text" value="<?php echo e($data->SUPPLIER); ?>" class="editbox" id="SUPPLIER_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editPO_NO" id="<?php echo e($data->ID); ?>">
                    						<span id="PO_NO_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->PO_NO); ?></span>
                    						<input type="text" value="<?php echo e($data->PO_NO); ?>" class="editbox" id="PO_NO_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    			
                    				    <td style="background-color:#E8ECF1;" class="editSHIPMENTRECDDATE" id="<?php echo e($data->ID); ?>">
                    				       <?php if(!empty($data->SHIPMENT_RECD_DATE)): ?>
                            				    <?php 
                                                    $SHIPMENT_RECD_DATE = date("d M  Y", strtotime( $data->SHIPMENT_RECD_DATE)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $SHIPMENT_RECD_DATE =  $data->SHIPMENT_RECD_DATE; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="SHIPMENT_RECD_DATE_<?php echo e($data->ID); ?>" class="text"><?php echo e($SHIPMENT_RECD_DATE); ?></span>
                    						<input type="date" value="<?php echo e($SHIPMENT_RECD_DATE); ?>" class="editbox" id="SHIPMENT_RECD_DATE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <!--<td style="background-color:#E8ECF1;" class="editWIP" id="<?php echo e($data->ID); ?>">-->
                    						<!--<span id="WIP_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->WIP); ?></span>-->
                    						<!--<input type="text" value="<?php echo e($data->WIP); ?>" class="editbox" id="WIP_input_<?php echo e($data->ID); ?>" style="display:none">-->
                    				  <!--</td>-->
            		                 
            		                  <td style="background-color:#E8ECF1;" class="editITEM" id="<?php echo e($data->ID); ?>">
                    						<span id="ITEM_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->ITEM); ?></span>
                    						<input type="text" value="<?php echo e($data->ITEM); ?>" class="editbox" id="ITEM_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		                   <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="<?php echo e($data->ID); ?>">
                    						<span style="width:300px; display:block">
                        						<span id="DESCRIPTION_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DESCRIPTION); ?></span>
                        						<input type="text" value="<?php echo e($data->DESCRIPTION); ?>" class="editbox" id="DESCRIPTION_input_<?php echo e($data->ID); ?>" style="display:none">
                    						</span>
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="<?php echo e($data->ID); ?>">
                    						<span id="COMMENTS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->COMMENTS); ?></span>
                    						<input type="text" value="<?php echo e($data->COMMENTS); ?>" class="editbox" id="COMMENTS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editACT_EXF_DATE" id="<?php echo e($data->ID); ?>">
                    				       <?php if(!empty($data->ACT_EXF_DATE)): ?>
                            				    <?php 
                                                    $ACT_EXF_DATE = date("d M  Y", strtotime( $data->ACT_EXF_DATE)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $ACT_EXF_DATE =  $data->ACT_EXF_DATE; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="ACT_EXF_DATE_<?php echo e($data->ID); ?>" class="text"><?php echo e($ACT_EXF_DATE); ?></span>
                    						<input type="date" value="<?php echo e($ACT_EXF_DATE); ?>" class="editbox" id="ACT_EXF_DATE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editMBL_MAWB" id="<?php echo e($data->ID); ?>">
                    						<span id="MBL_MAWB_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->MBL_MAWB); ?></span>
                    						<input type="text" value="<?php echo e($data->MBL_MAWB); ?>" class="editbox" id="MBL_MAWB_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editVESSEL_SAILING_DATE" id="<?php echo e($data->ID); ?>">
                    				       <?php if(!empty($data->VESSEL_SAILING_DATE)): ?>
                            				    <?php 
                                                    $VESSEL_SAILING_DATE = date("d M  Y", strtotime( $data->VESSEL_SAILING_DATE)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $VESSEL_SAILING_DATE =  $data->VESSEL_SAILING_DATE; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="VESSEL_SAILING_DATE_<?php echo e($data->ID); ?>" class="text"><?php echo e($VESSEL_SAILING_DATE); ?></span>
                    						<input type="date" value="<?php echo e($data->VESSEL_SAILING_DATE); ?>" class="editbox" id="VESSEL_SAILING_DATE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editCONFIRMED_ETA" id="<?php echo e($data->ID); ?>">
                    				         <?php if(!empty($data->CONFIRMED_ETA)): ?>
                            				    <?php 
                                                    $CONFIRMED_ETA = date("d M  Y", strtotime( $data->CONFIRMED_ETA)); 
                                                ?>
                                            <?php else: ?>
                                                <?php 
                                                    $CONFIRMED_ETA =  $data->CONFIRMED_ETA; 
                                                ?>
                                            <?php endif; ?>
                    						<span id="CONFIRMED_ETA_<?php echo e($data->ID); ?>" class="text"><?php echo e($CONFIRMED_ETA); ?></span>
                    						<input type="date" value="<?php echo e($data->CONFIRMED_ETA); ?>" class="editbox" id="CONFIRMED_ETA_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		                   <td style="background-color:#E8ECF1;" class="editSHIPMENT_STATUS" id="<?php echo e($data->ID); ?>">
                    						<span id="SHIPMENT_STATUS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->SHIPMENT_STATUS); ?></span>
                    						<input type="text" value="<?php echo e($data->SHIPMENT_STATUS); ?>" class="editbox" id="SHIPMENT_STATUS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		             
            		                  <td>
                                            <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                                            <!-- <a href="<?php echo e(URL::to( 'edit/shipment/details/' .$data->ID)); ?>"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
            		                        <button  onClick="deleteDataList('<?php echo e($data->ID); ?>')" id="deleteList" type="button" class="btn btn-danger btn-sm">Delete</button>
            		                  </td>
            		                </tr>
            		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		              </tbody>
        		          </table>
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
<!-- /.content-wrapper -->
<script type="text/javascript">


     function deleteDataList(ID) {
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
                    url: baseUrl +'/export/shipment/order/delete/'+ ID , 
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
        $("#CONTAINER_NO_"+ID).hide();
        $("#CONTAINER_NO_input_"+ID).show();
        
        $("#VESSEL_"+ID).hide();
        $("#VESSEL_input_"+ID).show();
        
        $("#Qty_" + ID ).hide();
        $("#Qty_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();

        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();

        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();

        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();

        $("#SHIPMENT_STATUS_"+ID).hide();
        $("#SHIPMENT_STATUS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        $("#ACT_EXF_DATE_"+ID).hide();
        $("#ACT_EXF_DATE_input_"+ID).show();
        
        $("#MBL_MAWB_"+ID).hide();
        $("#MBL_MAWB_input_"+ID).show();
        
        $("#VESSEL_SAILING_DATE_"+ID).hide();
        $("#VESSEL_SAILING_DATE_input_"+ID).show();
        
        $("#CONFIRMED_ETA_"+ID).hide();
        $("#CONFIRMED_ETA_input_"+ID).show();
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
         $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
    }

    $(document).on('keyup click', '.editCONTAINER_NO', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONTAINER_NO_"+ID).hide();
        $("#CONTAINER_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONTAINER_NO_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONTAINER_NO': $("#CONTAINER_NO_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#CONTAINER_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editVESSEL', function() {
    
        var ID    = $(this).attr('id');
        
        $("#VESSEL_"+ID).hide();
        $("#VESSEL_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#VESSEL_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'VESSEL': $("#VESSEL_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#VESSEL_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editQty', function() {
    
        var ID    = $(this).attr('id');
        
        $("#Qty_" + ID ).hide();
        $("#Qty_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#Qty_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'Qty': $("#Qty_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#Qty_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click change', '.editETD', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETD_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETD': $("#ETD_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ETD_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editETA', function() {
        
        var ID    = $(this).attr('id');
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETA': $("#ETA_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ETA_"+ID).html(date);
            }
        });
    }).change(function() { });

    $(document).on('keyup click', '.editSUPPLIER', function() {
        
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER': $("#SUPPLIER_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#SUPPLIER_"+ID).html(first);
            }
        });
    }).change(function() { });
    
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
                'type':7
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editWAREHOUSEDATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#WAREHOUSE_DATE_"+ID).hide();
        $("#WAREHOUSE_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WAREHOUSE_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WAREHOUSE_DATE': $("#WAREHOUSE_DATE_input_"+ID).val(),
                'type':17
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#WAREHOUSE_DATE_"+ID).html(html);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editSHIPMENTRECDDATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#SHIPMENT_RECD_DATE_"+ID).hide();
        $("#SHIPMENT_RECD_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SHIPMENT_RECD_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SHIPMENT_RECD_DATE': $("#SHIPMENT_RECD_DATE_input_"+ID).val(),
                'type':18
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#SHIPMENT_RECD_DATE_"+ID).html(html);
            }
        });
    }).change(function() { });
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
                'type':8
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editSHIPMENT_STATUS', function() {
        
        var ID    = $(this).attr('id');
        
        $("#SHIPMENT_STATUS_"+ID).hide();
        $("#SHIPMENT_STATUS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SHIPMENT_STATUS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SHIPMENT_STATUS': $("#SHIPMENT_STATUS_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#SHIPMENT_STATUS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
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
                'type':10
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#PO_NO_input_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click', '.editWIP', function() {
        
        var ID    = $(this).attr('id');
        
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WIP_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WIP': $("#WIP_input_"+ID).val(),
                'type':11
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#WIP_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editCOMMENTS', function() {
        
        var ID    = $(this).attr('id');
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'COMMENTS': $("#COMMENTS_input_"+ID).val(),
                'type':12
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editACT_EXF_DATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#ACT_EXF_DATE_"+ID).hide();
        $("#ACT_EXF_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACT_EXF_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACT_EXF_DATE': $("#ACT_EXF_DATE_input_"+ID).val(),
                'type':13
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ACT_EXF_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    
     $(document).on('keyup click', '.editMBL_MAWB', function() {
        
        var ID    = $(this).attr('id');
        
        $("#MBL_MAWB_"+ID).hide();
        $("#MBL_MAWB_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#MBL_MAWB_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'MBL_MAWB': $("#MBL_MAWB_input_"+ID).val(),
                'type':14
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#MBL_MAWB_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editVESSEL_SAILING_DATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#VESSEL_SAILING_DATE_"+ID).hide();
        $("#VESSEL_SAILING_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#VESSEL_SAILING_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'VESSEL_SAILING_DATE': $("#VESSEL_SAILING_DATE_input_"+ID).val(),
                'type':15
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#VESSEL_SAILING_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click change', '.editCONFIRMED_ETA', function() {
        
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_ETA_"+ID).hide();
        $("#CONFIRMED_ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_ETA': $("#CONFIRMED_ETA_input_"+ID).val(),
                'type':16
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(eta) {
                $("#CONFIRMED_ETA_"+ID).html(eta);
            }
        });
    }).change(function() { });
    
    function assign() {
        var itemID = $("#itemID").val();
        var to   = $("#to").val();
    
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/header/modal', 
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
                title:'Export Shipment Details',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,9 ,10,11,12,13,14,15,16,17]
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
    
    
    function filterDetailsShipment(){
        
        var shipment_id     = $("#shipment_id").val();
        var container_id    = $("#container_id").val();
        var PO_NO           = $("#PO_NO").val();
        var WIP             = $("#WIP").val();
        var shapment_status = $("#shapment_status").val();
      
        $('.list_of_card_result').html(' <div class="loader"></div>');
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/export/shipment/order/search', 
            data: {
                '_token': $('input[name=_token]').val(),
                'shipment_id': shipment_id,
                'container_id': container_id,
                'PO_NO': PO_NO,
                'WIP': WIP,
                'shapment_status': shapment_status,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }
  

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/shipment-details/index.blade.php ENDPATH**/ ?>