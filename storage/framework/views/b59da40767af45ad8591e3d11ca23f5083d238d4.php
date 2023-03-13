<!--<script src="<?php echo e(URL::asset( 'assets/jquery-2.1.3.min.js' )); ?>" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' )); ?>"></script>
<script type="text/javascript">
 	$('#tableresponsive1').DataTable( {
	        retrieve: true,
	        language: {
	          "emptyTable": "No result found"
	        },
	        pageLength: 25,
	        paging: true,
	        // sDom: "Rlfrtip",
	        dom: 'Bfrtip',
	       "ordering": false,
	    } );
</script>
	<table class="table display " id="tableresponsive1">
		<thead>
			<tr>
			    <th scope="col" style="display:none">Sl </th>
				<th scope="col">Item </th>
				<th scope="col"> Image</th>
				<th scope="col">Description</th>
				<th scope="col" style=" padding-right: 10px;text-align: right;">Quantity </th>
				<th scope="col">Fulfilment Status</th>
				<th scope="col" style="text-align:center;">Goods Ready Date</th>
				<th scope="col" style="text-align:center;">Ship Date</th>
				<th scope="col" style="text-align:center;">Arrival Date</th>
			</tr>
		</thead>
		<tbody>
		    <?php $sl = 1; ?>
			<?php $__currentLoopData = $commentsInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
				<?php $explodeInfo = explode(' ', $salesInfo->DESCRIPTION  , 12) ?>

				<?php

				    $explodeComment= explode(' ', $salesInfo->COMMENTS  , 11);

				?>
        
			    <tr>
			        <td style="display:none"> <?php echo e($sl ++); ?> </td>
					<th>
						<a style="width: 120px; display: block;" class="example-image-link" href="<?php echo e(URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE)); ?>" data-lightbox="example-1"> <?php echo e($salesInfo->ITEM); ?> </a>
					</th>
					<td>
						<a style=" display: block;" class="example-image-link" href="<?php echo e(URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE)); ?>" data-lightbox="example-1">
				        <img style="max-width: 80px; display: block;" class="example-image-link" src="<?php echo e(URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE)); ?>" > </a>

					</td>
					<td>
						<div  class="light_box_<?php echo e($salesInfo->ID); ?>">

								<?php echo e(implode(' ', array_slice(str_word_count($salesInfo->DESCRIPTION, 1), 0, 11))); ?>


								<?php if(!empty( $explodeInfo[11])): ?>
									<span class="expend_<?php echo e($salesInfo->ID); ?>" style="display:none">
										<?php echo e($explodeInfo[11]); ?>

									</span>
								<?php endif; ?>


							<?php if(!empty( $explodeInfo[11])): ?>
								<span style="float: right; color: #000; font-weight: bold;  display: block; width: 100%; text-align: right;"  class="act_<?php echo e($salesInfo->ID); ?>">...</span>
							<?php endif; ?>
						</div>
					</td>
					<td > <span style=" display: block;" class="qty_block"> <?php echo e($salesInfo->QTY); ?> </span></td>
                    <td>
                        <?php echo e($salesInfo->EX_COMMENTS); ?>

                    </td>
                    <td>
                          <?php
                                $date = date("d M  Y", strtotime( $salesInfo->EXP_DELIVERY));
                            ?>
                            <?php echo e($date); ?>

                    </td>
                    <td style="text-align:center;">
                                            
                        <?php if(!empty($salesInfo->EXP_DELIVERY)): ?>
                            <?php
                                $date = date("d M  Y", strtotime( $salesInfo->EXP_DELIVERY));
                            ?>
                            <?php echo e($date); ?>

                        <?php else: ?>
                            <?php echo e($salesInfo->EXP_DELIVERY); ?>

                        <?php endif; ?>
                    
                    </td>
                     <td style="text-align:center;">
                        
                        <?php if(!empty($salesInfo->EXP_DELIVERY)): ?>
                            <?php
                                $date = date("d M  Y", strtotime( $salesInfo->EXP_DELIVERY));
                            ?>
                            <?php echo e($date); ?>

                        <?php else: ?>
                            <?php echo e($salesInfo->EXP_DELIVERY); ?>

                        <?php endif; ?>
                    
                    </td>


					
			    </tr>
			    	<script type="text/javascript">

                    	$(document).ready(function(){

                    		$(document).on('click', '.light_box_<?php echo e($salesInfo->ID); ?>', function() {
                    	        $('.light_box_<?php echo e($salesInfo->ID); ?>').addClass('expend_active_<?php echo e($salesInfo->ID); ?>');
                    	  	    $(".expend_<?php echo e($salesInfo->ID); ?>").toggleClass('show');
                    	  		$(".act_<?php echo e($salesInfo->ID); ?>").html('Less');
                    	  		$(".act_<?php echo e($salesInfo->ID); ?>").addClass('less_<?php echo e($salesInfo->ID); ?>');

                    		});

                    		$(document).on('click', '.expend_active_<?php echo e($salesInfo->ID); ?>', function() {
                                $(".less_<?php echo e($salesInfo->ID); ?>").html('...');
                                $('.light_box_<?php echo e($salesInfo->ID); ?>').removeClass('expend_active_<?php echo e($salesInfo->ID); ?>');
                    		});

                    	});
                    	</script>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/order/details-coments.blade.php ENDPATH**/ ?>