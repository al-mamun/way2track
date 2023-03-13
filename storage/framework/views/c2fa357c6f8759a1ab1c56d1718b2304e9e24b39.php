<style>
    .modal-dialog.modal-lg {
        width: 481px;
    }
    span.po_date {
        width: 95px;
        display: block;
        text-align: center;
    }
    .check_box_wip_no {
        width: 156px;
    }
    h4.modal-title {
        font-size: 17px;
    }
    .dataTables_filter label {
        float: right;
    }
    span.po_no {
        width: 116px;
        display: block;
    }
    /*div#tableResponsive2_filter {*/
    /*    margin-top: -72px;*/
    /*}*/
    table#tableResponsive2 {
    width: 100% !important;
    /* float: left; */
}
</style>
<div class="assignResult"></div>
<div class="assing_button_result">
<button class="btn btn-success assign_button_result" onclick='assign_item()'>Assign</button>
<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th scope="col"  style="display:none !important">SL</th>
            <th scope="col">WIP</th>
            <th scope="col">PO No</th>
            <th scope="col">PO Date</th>
 
        </tr>
    </thead>
    <tbody>
    <?php $sl = 1; ?>
        <?php $__currentLoopData = $poHeaderInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poOrderHeadersInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($poOrderHeadersInfo->PO_NO); ?>">
                    <td  style="display:none !important"> <?php echo e($sl++); ?></td>
                 <td >
                     <div class="check_box_wip_no">
                     	<input type="checkbox" id="wip_number" name="wip_number" value="<?php echo e($poOrderHeadersInfo->WIP.','.$poOrderHeadersInfo->PO_NO); ?>">
					    <?php echo e($poOrderHeadersInfo->WIP); ?>

					 </div>
				  </td>
                 <td >
                     <span class="po_no">
						<span id="PO_NO_<?php echo e($poOrderHeadersInfo->ID); ?>" class="text"><?php echo e($poOrderHeadersInfo->PO_NO); ?></span>
						<input type="text" value="<?php echo e($poOrderHeadersInfo->PO_NO); ?>" name="po_number" id="po_number" class="editbox" id="PO_NO_input_<?php echo e($poOrderHeadersInfo->ID); ?>" style="display:none">
					</span>
				  </td>
			    <td >
					<span class="po_date"><?php echo e($poOrderHeadersInfo->PO_DATE); ?></span>
				
			    </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<script type="text/javascript">
    $(".close").click(function(){
        $('#modal-lg').modal('hide');
    });
     
    function assign_item() {
        var wip_number = [];
            $.each($("input[name='wip_number']:checked"), function(){            
                wip_number.push($(this).val());
        });
        
        var po_number = [];
            $.each($("input[name='po_number']:checked"), function(){            
                po_number.push($(this).val());
        });

        var itemID = $("#itemID").val();
     
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/assign/shipment', 
            data: {
                '_token': $('input[name=_token]').val(),
                'WIPNumber': wip_number,
                'po_number': po_number,
                'itemID': itemID,
            },
            success: function(result1) { 
                $('.assignResult').html('<div class="alert alert-primary" role="alert">Susccesfully assigned </div>');
                
                $.ajax({
                    type: "POST",
                    url: baseUrl +'/list/shipped/single/order/details', 
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'shiped_id': itemID,
                        'type': 1,
                    },
                    success: function(result) { 
                          window.location.replace(baseUrl +'/list/purchase/order/assign/shipment/token/' + result1);
                          
                        $('#resultOfShipmentResult').html(result);
                        
                        $('#modal-lg').modal('hide');
                    }
                });
            }
        });  
    }
    
    $('#tableResponsive2').DataTable( {
        buttons: [
        
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
</script><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/shipment/assign.blade.php ENDPATH**/ ?>