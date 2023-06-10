<?php $__currentLoopData = $deliveryExportDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<input type="text" value="<?php echo e($data->ID); ?>" name="details_id" id="detailsID_<?php echo e($data->ID); ?>" style="display:none">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<style>
span.copy_to_all {
    font-size: 10px;
    position: relative;
    top: 0px;
    right: 0px;
    background: green;
    color: #fff;
    padding: 3px;
    text-align: center;
    border-radius: 5px;
    clear: both;
    float: none;
    display: inline-block;
    width: auto;
    min-width: 70px;
}
table#deliveryDetailsSearch {
    width: 100% !important;
}
</style>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
    <table class="table table-bordered " id="deliveryDetailsSearch" border="1">
        <thead>
            <tr style="color:#000">
                <th style="display:none">SL.</th>
                <th>Delivery ID <br><span class="delivery_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                <th>Shipment ID <br><span class="shipment_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                <th>PO No <br><span class="po_no_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Description <br><span class="description_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Delivery Date <br><span class="delivery_date_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Action</th>	              
            </tr>
            <tr class="showCommentsDetails" style="display:none">
                <td style="display:none"></td>
                
                <td>
                    <div class="delivery_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="delivery_id_box" id="delivery_id_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDeliveryID()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                    
                </td>
                <td>
                    <div class="shipment_id_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="shipment_id_box" id="shipment_id_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="shipmentIDSAVE()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                    
                </td>
                <td>
                    <div class="po_no_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="po_no_box" id="po_no_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="savePONO()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                 <td>
                    <div class="item_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                <td>
                    <div class="qty_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                <td>
                    <div class="descraption_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="descraption_box" id="descraption_box" name="descraption_box"  style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDescraption()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>  
                <td>
                    <div class="delivery_date_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="delivery_date_box" id="delivery_date_box" name="delivery_date_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDeliveryDate()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td> 
                <td> </td>
             
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
                    <span style="width: 126px; display: block;">
    					<span id="PO_NO_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->PO_NO); ?></span>
    					<input type="text" value="<?php echo e($data->PO_NO); ?>" class="editbox" id="PO_NO_input_<?php echo e($data->ID); ?>" style="display:none">
					</span>
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
					<span id="DESCRIPTION_<?php echo e($data->ID); ?>" class="text" STYLE="width:250px; display:block"><?php echo e($data->DESCRIPTION); ?></span>
					<input type="text" value="<?php echo e($data->DESCRIPTION); ?>" class="editbox" id="DESCRIPTION_input_<?php echo e($data->ID); ?>" style="display:none">
			  </td>
               <td style="background-color:#E8ECF1;" class="editDELIVERYDATE" id="<?php echo e($data->ID); ?>">
                   <?php if(!empty($data->DELIVERY_DATE)): ?>
		            <?php $DELIVERY_DATE = date("d M  Y", strtotime($data->DELIVERY_DATE))  ?>
		        <?php else: ?>
		            <?php $DELIVERY_DATE =$data->DELIVERY_DATE; ?>
		        <?php endif; ?>
                    <span style="width: 126px; display: block;">
    					<span id="DELIVERYDATE_<?php echo e($data->ID); ?>" class="text"><?php echo e($DELIVERY_DATE); ?></span>
    					<input type="date" value="<?php echo e($DELIVERY_DATE); ?>" class="editbox" id="DELIVERYDATE_input_<?php echo e($data->ID); ?>" style="display:none">
					</span>
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

 <script src="<?php echo e(URL::asset( 'js/delivery_details.js')); ?>"></script>
 <script type="text/javascript">
    $('#deliveryDetailsSearch').DataTable( {
         buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Shipment Details',
                // exportOptions: {
                //     columns: [ 1,2,3,4,5,6,7,8,9 ,10,11,12,13,14,15,16,17]
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
 </script
 <?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/export-delivery-details/search.blade.php ENDPATH**/ ?>