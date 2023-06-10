<!-- /.card-header -->
<h4 class="card-title" style="margin-bottom:10px;">Shipment Details List</h4>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
<table class="table table-bordered " id="listShipment" border="1">
    <thead>
        <tr style="color:#000">
            <th style="display:none">SL.</th>
            <th>Deliver ID</th>
            <th>Shipment ID</th>
            <th>PO No</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Descraption</th>
        </tr>
    </thead>
  <tbody>
     <?php $__currentLoopData = $deliveryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr id="<?php echo e($data->SHIPMENT_ID); ?>">
          <td style="display:none"><?php echo e($key+1); ?></td>
          <td><?php echo e($data->DELIVERY_ID); ?></td>
          <td><?php echo e($data->SHIPMENT_ID); ?></td>
          <td><?php echo e($data->PO_NO); ?></td>
          <td><?php echo e($data->ITEM); ?></td>
          <td><?php echo e($data->QTY); ?></td>
          <td><?php echo e($data->DESCRIPTION); ?></td>
         
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
<?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/delivery/list_details.blade.php ENDPATH**/ ?>