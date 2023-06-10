

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
    margin-right: 11px;
}
.date-form {
    width: 22%;
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
    width: 151px;
}
h5.by_date_check {
    font-weight: normal;
    margin-top: 21px;
}
button.btn.btn-secondary.buttons-excel.buttons-html5 {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
</style>
<?php echo e(csrf_field()); ?>

<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Export Sales Order </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Export Sales Order</li>
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
              <div class="card-header">
                <h3 class="card-title">Export Sales Order</h3>
              </div>
              <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-content">
                            <div class="col-md-12 pull-right">
                                <div class="col-sm-4"  style="float:left; margin-top:50px;">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <h5 class="by_date_check by_staus">By status</h5>
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="Live" name="checkobx" onclick="checkboxFilter()">
                                          <label class="form-check-label">Live </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox"  value="Closed" name="checkobx" onclick="checkboxFilter()">
                                          <label class="form-check-label">Closed</label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="Cancelled" name="checkobx" onclick="checkboxFilter()">
                                          <label class="form-check-label">Cancelled</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8" style="float:right">
                                    <h5 class="by_date_check by_date">Expected Handover Date</h5>
                	                <div class="form-group date-form">
                                        <label >From</label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="from" name="from" placeholder="from" required>
                                    </div>
                                    <div class="form-group date-form">
                                        <label >To</label>
                                        <input type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="to" name="to" placeholder="to" required>
                                    </div>
                                
                                    <div class="card-foote date-formr">
                                      <button type="submit" class="btn btn-primary" onclick="filterStatusAndDateWise()">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <!-- /.card-header -->
                    <div class="card-body" style="position:relative">
                        <?php if($errors->any()): ?>
            			    <div class="alert alert-danger">
            			        <ul>
            			            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            			                <li> please select header first </li>
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
                        <div class="large-table-fake-top-scroll-container-3">
                            <div>&nbsp;</div>
                        </div>
                        <div class="table_result table-responsive top_scroll" >
                            <table id="tableResponsive2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="display:none">Sl</th>
                                         <th scope="col">WIP</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Customer Po No</th>
                                        <th scope="col"><span style="width:100px; display:block">Status</span></th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Expected Handover Date</th>
                                        <th scope="col">Salesperson Name </th>
                                        <th scope="col">Project Manager Name</th>
                                        <th scope="col">Salesperson Email</th>
                                        <th scope="col">Project Manager Email</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 1; ?>
                                    <?php $__currentLoopData = $saledOrderHeaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesOrderInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($salesOrderInfo->WIP); ?>">
                                        <td  style="display:none"><?php echo e($sl++); ?></td>
                                         <td style="background-color:#E8ECF1;" class="edit_wip_no" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="wip_<?php echo e($salesOrderInfo->ID); ?>" class="text"><?php echo e($salesOrderInfo->WIP); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->WIP); ?>" class="editbox" id="wip_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                                        <td style="background-color:#E8ECF1;" class="edit_CUSTOMER_NAME" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="CUSTOMER_NAME_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"> <?php echo e($salesOrderInfo->CUSTOMER_NAME); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->CUSTOMER_NAME); ?>" class="editboxStatus" id="CUSTOMER_NAME_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
          
                                       <td style="background-color:#E8ECF1;" class="edit_CUSTOMER_PO_NO" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="CUSTOMER_PO_NO_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"> <?php echo e($salesOrderInfo->CUSTOMER_PO_NO); ?>  </span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->CUSTOMER_PO_NO); ?>" class="editboxStatus" id="CUSTOMER_PO_NO_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                    				 	
                                        <td style="background-color:#E8ECF1;" class="edit_status" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						 <span id="status_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->SO_STATUS); ?></span>
    					
            						        <select name="status"  class="form-control editboxStatus" aria-label="Default select example" required id="status_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                                                <option value="" selected>Select Status</option>
                                                <option value="LIVE" <?php if($salesOrderInfo->SO_STATUS=='LIVE'): ?>  selected <?php endif; ?>>Live</option>
                                                <option value="CLOSED" <?php if($salesOrderInfo->SO_STATUS=='CLOSED'): ?>  selected <?php endif; ?>>Closed</option>
                                                <option value="CANCELLED"  <?php if($salesOrderInfo->SO_STATUS=='CANCELLED'): ?>  selected <?php endif; ?>>Cancelled</option>
                                            </select>
                    				 	</td>
                    				 	<td style="background-color:#E8ECF1;" class="PROJECT_NAME_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="PROJECT_NAME_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->PROJECT_NAME); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->PROJECT_NAME); ?>" class="editboxStatus" id="PROJECT_NAME_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                                            <!--<td><?php echo e($salesOrderInfo->SO_STATUS); ?></td>-->
                                        <?php 
                                            $date = date("d M  Y", strtotime( $salesOrderInfo->TGT_HANDOVER_DT)); 
                                        ?>
                                            
                                        <td style="background-color:#E8ECF1;" class="edit_hand_over_date" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="hand_over_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"> <?php echo e($date); ?></span>
                    						<input type="date" value="<?php echo e($date); ?>" class="editboxStatus" id="hand_over_input_<?php echo e($salesOrderInfo->ID); ?>" name="TGT_HANDOVER_DT" style="display:none">
                    				 	</td>
                    				 	<td style="background-color:#E8ECF1;" class="SALESPERSON_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="SALESPERSON_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->SALESPERSON); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->SALESPERSON); ?>" class="editboxStatus" id="SALESPERSON_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                    				 	<td style="background-color:#E8ECF1;" class="PROJECTMANAGER_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="PROJECTMANAGER_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->PROJECTMANAGER); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->PROJECTMANAGER); ?>" class="editboxStatus" id="PROJECTMANAGER_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                    				 	
                    				 	<td style="background-color:#E8ECF1;" class="SALESPERSON_EMAIL_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="SALESPERSON_EMAIL_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->SALESPERSON_EMAIL); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->SALESPERSON_EMAIL); ?>" class="editboxStatus" id="SALESPERSON_EMAIL_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                    				 	
                                        <td style="background-color:#E8ECF1;" class="PROJECTMANAGER_EMAIL_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="PROJECTMANAGER_EMAIL_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"><?php echo e($salesOrderInfo->PROJECTMANAGER_EMAIL); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->PROJECTMANAGER_EMAIL); ?>" class="editboxStatus" id="PROJECTMANAGER_EMAIL_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                    				 	
                                    <!--    <td><?php echo e($salesOrderInfo->TGT_HANDOVER_DT); ?></td> -->
                                       
                                        <td style="background-color:#E8ECF1;" class="COMMENTS_click" id="<?php echo e($salesOrderInfo->ID); ?>">
                    						<span id="COMMENTS_<?php echo e($salesOrderInfo->ID); ?>" class="textStatus"> <?php echo e($salesOrderInfo->COMMENTS); ?></span>
                    						<input type="text" value="<?php echo e($salesOrderInfo->COMMENTS); ?>" class="editboxStatus" id="COMMENTS_input_<?php echo e($salesOrderInfo->ID); ?>" style="display:none">
                    				 	</td>
                                     
                                        <td>
                                            <a href="<?php echo e(URL::to( 'sales/send/email/' . $salesOrderInfo->ID)); ?>" type="button" class="btn btn-block btn-info btn-sm">Send Url</a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check po and details')): ?>
                                            <a href="<?php echo e(URL::to( 'list/order/detail/list/' . $salesOrderInfo->WIP)); ?>" type="button" class="btn btn-block btn-primary btn-sm">Details</a>
                                            <?php endif; ?>
                                            <!--<a href="javascript:void(0)" type="button" class="btn btn-block btn-success btn-sm" onclick="edit('<?php echo e($salesOrderInfo->ID); ?>')">Edit</a>-->
                                            <button  onClick="deleteData('<?php echo e($salesOrderInfo->WIP); ?>')" id="salesOrderDelete" type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                              </tbody>
                                <tfoot>
                                    <tr>
                                        <th  style="display:none">SL.</th>
                                        <th scope="col">WIP</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Customer Po No</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Expected Handover Date</th>
                                        <th scope="col">Salesperson Name </th>
                                        <th scope="col">Project Manager Name</th>
                                        <th scope="col">Salesperson Email</th>
                                        <th scope="col">Project Manager Email</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot>
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
                    url: baseUrl +'/sales/order/delete/'+ ID , 
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


     
    function filterStatusAndDateWise(){
 
        var from = $("#from").val();
        var to   = $("#to").val();
        
        var checkbox = $.map($('input[name="checkobx"]:checked'), function(c){return c.value; })
        
        $('.table_result').html(' <div class="loader"></div>');
         
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/status/filter', 
            data: {
                '_token': $('input[name=_token]').val(),
                'from': from,
                'to': to,
                'checkbox': checkbox,
                'type': 1,
            },
            success: function(result) { 
                $('.table_result').html(result);
            
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
    
     // Edit input box click action
    $(".editboxStatus").mouseup(function() {
        return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editboxStatus").hide();
        $(".textStatus").show();
    });

    // function checkboxFilter() {
        
    // //   var checkbox = $('input[name="checkobx"]:checked').serialize();
    //   var checkbox = $.map($('input[name="checkobx"]:checked'), function(c){return c.value; })
       
    //   $.ajax({
    //         type: "POST",
    //         url: baseUrl +'/list/order/status/filter', 
    //         data: {
    //             '_token': $('input[name=_token]').val(),
    //             'checkbox': checkbox,
    //             'type': 2,
    //         },
    //         success: function(result) { 
    //             $('.table_result').html(result);
            
    //         }
    //     });  
        
    // }

    $('#tableResponsive2').DataTable( {
        buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Sales Order',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,9,10 ]
                }
                // exportOptions: {
                //     columns: ':visible',
                // }
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
            $("#wip_hidden").val(id);
            
        });

function edit(ID) {
    $("#wip_input_"+ID).show(); 
    $("#wip_"+ID).hide();
    $("#status_"+ID).hide();
    $("#status_input_"+ID).show();
    $("#hand_over_"+ID).hide();
    $("#hand_over_input_"+ID).show();
    $("#PROJECTMANAGER_EMAIL_"+ID).hide();
    $("#PROJECTMANAGER_EMAIL_input_"+ID).show();
    $("#SALESPERSON_EMAIL_"+ID).hide();
    $("#SALESPERSON_EMAIL_input_"+ID).show();
    $("#COMMENTS_"+ID).hide();
    $("#COMMENTS_input_"+ID).show();
    $("#CUSTOMER_NAME_"+ID).hide();
    $("#CUSTOMER_NAME_input_"+ID).show();
}
 $(document).on('keyup click', '.edit_wip_no', function() {
     
    var ID=$(this).attr('id');
    $("#wip_"+ID).hide();
    $("#wip_input_"+ID).show();
    var ID=$(this).attr('id');
    var first=$("#wip_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'wip_id': $("#wip_input_"+ID).val(),
            'type':1
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#wip_"+ID).html(first);
            }
        });

}).change(function() {

});

 $(document).on('keyup click', '.edit_status', function() {

    var ID=$(this).attr('id');
    $("#status_"+ID).hide();
    $("#status_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#status_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'SO_STATUS': $("#status_input_"+ID).val(),
            'type':2
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#status_"+ID).html(first);
            }
        });

}).change(function() {

});

 $(document).on('keyup click change', '.edit_hand_over_date', function() {

    var ID = $(this).attr('id');
    
    $("#hand_over_"+ID).hide();
    $("#hand_over_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#hand_over_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'hand_over_date': $("#hand_over_input_"+ID).val(),
            'type':3
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#hand_over_"+ID).html(html);
            }
        });

}).change(function() {

});


 $(document).on('keyup click change', '.PROJECTMANAGER_EMAIL_click', function() {

    var ID = $(this).attr('id');
    
    $("#PROJECTMANAGER_EMAIL_"+ID).hide();
    $("#PROJECTMANAGER_EMAIL_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#PROJECTMANAGER_EMAIL_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'PROJECTMANAGER_EMAIL': $("#PROJECTMANAGER_EMAIL_input_"+ID).val(),
            'type':4
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#PROJECTMANAGER_EMAIL_"+ID).html(first);
            }
        });

}).change(function() {

});


 $(document).on('keyup click change', '.SALESPERSON_EMAIL_click', function() {

    var ID = $(this).attr('id');
    
    $("#SALESPERSON_EMAIL_"+ID).hide();
    $("#SALESPERSON_EMAIL_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#SALESPERSON_EMAIL_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'SALESPERSON_EMAIL': $("#SALESPERSON_EMAIL_input_"+ID).val(),
            'type':5
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#SALESPERSON_EMAIL_"+ID).html(first);
            }
        });

}).change(function() {});



 $(document).on('keyup click change', '.COMMENTS_click', function() {

    var ID = $(this).attr('id');
    
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
            'type':6
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#COMMENTS_"+ID).html(first);
            }
        });

}).change(function() {

});


 $(document).on('keyup click change', '.edit_CUSTOMER_NAME', function() {

    var ID = $(this).attr('id');
    
    $("#CUSTOMER_NAME_"+ID).hide();
    $("#CUSTOMER_NAME_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#CUSTOMER_NAME_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'CUSTOMER_NAME': $("#CUSTOMER_NAME_input_"+ID).val(),
            'type':7
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#CUSTOMER_NAME_"+ID).html(first);
            }
        });

}).change(function() {

});

$(document).on('keyup click change', '.edit_CUSTOMER_PO_NO', function() {

    var ID = $(this).attr('id');
    
    $("#CUSTOMER_PO_NO_"+ID).hide();
    $("#CUSTOMER_PO_NO_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#CUSTOMER_PO_NO_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'CUSTOMER_PO_NO': $("#CUSTOMER_PO_NO_input_"+ID).val(),
            'type':11
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#CUSTOMER_PO_NO_"+ID).html(first);
            }
        });

}).change(function() {

});
 $(document).on('keyup click change', '.PROJECT_NAME_click', function() {

    var ID = $(this).attr('id');
    
    $("#PROJECT_NAME_"+ID).hide();
    $("#PROJECT_NAME_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#PROJECT_NAME_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'PROJECT_NAME': $("#PROJECT_NAME_input_"+ID).val(),
            'type':8
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#PROJECT_NAME_"+ID).html(first);
            }
        });

}).change(function() {});

 $(document).on('keyup click change', '.SALESPERSON_click', function() {

    var ID = $(this).attr('id');
    
    $("#SALESPERSON_"+ID).hide();
    $("#SALESPERSON_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#SALESPERSON_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'SALESPERSON': $("#SALESPERSON_input_"+ID).val(),
            'type':9
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#SALESPERSON_"+ID).html(first);
            }
        });

}).change(function() {});

 $(document).on('keyup click change', '.PROJECTMANAGER_click', function() {

    var ID = $(this).attr('id');
    
    $("#PROJECTMANAGER_"+ID).hide();
    $("#PROJECTMANAGER_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#PROJECTMANAGER_input_"+ID).val();
        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'PROJECTMANAGER': $("#PROJECTMANAGER_input_"+ID).val(),
            'type':10
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#PROJECTMANAGER_"+ID).html(first);
            }
        });

}).change(function() {});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order/header/list-export.blade.php ENDPATH**/ ?>