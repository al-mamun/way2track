<!-- /.card-header -->
<h4 class="card-title" style="margin-bottom:10px;">Shipment Details List</h4>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
<table class="table table-bordered " id="listShipment" border="1">
    <thead>
      <tr style="color:#000">
            <th style="display:none">SL.</th>
            <th>Shipment ID</th>
            <th>Container No</th>
            <th>Vessel</th>
            <th>Qty</th>
            <th>ETD</th>
            <th>ETA</th>
            <th>Supplier</th>
            <th>PO No</th>
            <th>WIP</th>
            <th>Item</th>
            <th>Description</th>
            <th>Shipment Status</th>
            <!--<th>Action</th>-->
      </tr>
    </thead>
  <tbody>
     <?php $__currentLoopData = $ShipmentDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr id="<?php echo e($data->SHIPMENT_ID); ?>">
          <td style="display:none"><?php echo e($key+1); ?></td>
          <td><?php echo e($data->SHIPMENT_ID); ?></td>
          <td><?php echo e($data->CONTAINER_NO); ?></td>
          <td><?php echo e($data->VESSEL); ?></td>
          <td><?php echo e($data->Qty); ?></td>
          <td><?php echo e($data->ETD); ?></td>
          <td><?php echo e($data->ETA); ?></td>
          <td><?php echo e($data->SUPPLIER); ?></td>
          <td><?php echo e($data->PO_NO); ?></td>
          <td><?php echo e($data->WIP); ?></td>
          <td><?php echo e($data->ITEM); ?></td>
          <td><?php echo e($data->DESCRIPTION); ?></td>
          <td><?php echo e($data->SHIPMENT_STATUS); ?></td>
          <!--<td>-->
          <!--    <a href="<?php echo e(URL::to( 'edit/shipment/details/' .$data->id)); ?>"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
          <!--    <a href="<?php echo e(URL::to( 'shipment/details/delete/' .$data->id)); ?>" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
          <!--</td>-->
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
<?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/shipment/list_details.blade.php ENDPATH**/ ?>