<div class="form-group">
    <label for="SUPPLIER_NAME">Supplier Name <span style="color:red">*</span></label>
     <?php $array = [];  ?>
         <?php $__currentLoopData = $salesOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailsInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total =  explode(',', $detailsInfo->SUPPLIER); ?>
            <?php if(count($total) > 1): ?>
                <?php $__currentLoopData = $total; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expoldeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php
                        $checkExist = DB::table('w2t_sales_order_detail')
                            ->where('WIP', $WIP)
                            ->where('SUPPLIER',  $expoldeData)
                            ->first();
                    
                    ?>
                    
                    <?php if(empty($checkExist)): ?>
                        <?php $array[]= trim($expoldeData) ?>
                    <?php endif; ?>
                   
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php  $array []= $detailsInfo->SUPPLIER; ?>
            <?php endif; ?>
            
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        <?php $arradyData = array_unique($array); ?>
    <select name="SUPPLIER_NAME" id="SUPPLIER_NAME" class="form-control" aria-label="SUPPLIER_NAME" required>
        <option value="" selected>Select </option>
        <?php $__currentLoopData = $arradyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($data); ?>" ><?php echo e($data); ?> </option>     
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
       
    </select>
    <!--<input type="text" class="form-control" id="status" name="status" placeholder="Enter status">-->
</div><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order-purchase/header/supplier_list_dropdown.blade.php ENDPATH**/ ?>