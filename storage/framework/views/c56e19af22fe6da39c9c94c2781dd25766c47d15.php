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
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
    float: left;
    margin-right: 13px;
}
.date-form {
    width: 46%;
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
    margin-top: 10px;
    margin-right: 20px;
}
h5.by_date_check {
    font-weight: normal;
    margin-top: 21px;
}
h5.by_date_check.by_date {
    width: 100%;
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
button.btn.btn-secondary.buttons-excel.buttons-html5 {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Export P.O. Details
                   </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"> Export P.O. Details
                  </li>
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
        	        <?php if(!empty($poDetailsToken)): ?>
        	            
        	            <?php echo Form::open(array('url'=>'/create/purchase/order/details/submit/temp','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data')); ?>

               	         <input type="hidden" value="<?php echo e($token); ?>" name="token">
        	                <!-- /.card-header -->
                            <div class="card-body">
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title">P.O. Details Import Preview </h3>
                              </div>
                              <!-- /.card-header -->
                                <div class="card-content">
                		            <table class="table table-bordered" border="1">
                		              <tr style="color:#000">
                                        <th>PO No</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Comments</th>
                                        <th>EXP EXF DT</th>
                                        <th>Confirmed EXF</th>
                                        <th>ETD</th>
                                        <th>ETA</th>
                		              </tr>
                		             <?php $__currentLoopData = $poDetailsToken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		               <tr>
                		                  
                		                  <td style="background-color:#E8ECF1;" id="<?php echo e($data->ID); ?>">
                            						<span id="wip_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->PO_NO); ?></span>
                            						<input type="text" value="<?php echo e($data->PO_NO); ?>" class="editbox" id="wip_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            				  <td style="background-color:#E8ECF1;" class="editITEMTEMP" id="<?php echo e($data->ID); ?>">
                            						<span id="ITEM_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->ITEM); ?></span>
                            						<input type="text" value="<?php echo e($data->ITEM); ?>" class="editbox" id="ITEM_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            			
                            				  <td style="background-color:#E8ECF1;" class="editDESCRIPTIONTEMP" id="<?php echo e($data->ID); ?>">
                            						<span id="DESCRIPTION_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DESCRIPTION); ?></span>
                            						<input type="text" value="<?php echo e($data->DESCRIPTION); ?>" class="editbox" id="DESCRIPTION_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            				  <td style="background-color:#E8ECF1;" class="editQtyTEMP" id="<?php echo e($data->ID); ?>">
                            						<span id="QTY_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->QTY); ?></span>
                            						<input type="text" value="<?php echo e($data->QTY); ?>" class="editbox" id="QTY_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                    		           
                    		                  <td style="background-color:#E8ECF1;" class="editCOMMENTSTEMP" id="<?php echo e($data->ID); ?>">
                            						<span id="COMMENTS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->COMMENTS); ?></span>
                            						<input type="text" value="<?php echo e($data->COMMENTS); ?>" class="editbox" id="COMMENTS_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            		            <td style="background-color:#E8ECF1;" class="editEXP_DELIVERYTEMP" id="<?php echo e($data->ID); ?>">
                            		                  <?php if(!empty($data->EXP_EXF_DT)): ?>
                                    				    <?php 
                                                            $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="EXP_DELIVERY_<?php echo e($data->ID); ?>" class="text"><?php echo e($EXP_EXF_DT); ?></span>
                            						<input type="date" value="<?php echo e($data->EXP_EXF_DT); ?>" class="editbox" id="EXP_DELIVERY_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXFTEMP" id="<?php echo e($data->ID); ?>">
                            				          <?php if(!empty($data->CONFIRMED_EXF)): ?>
                                        				    <?php 
                                                                $CONFIRMED_EXF = date("d M  Y", strtotime( $data->CONFIRMED_EXF)); 
                                                            ?>
                                                        <?php else: ?>
                                                            <?php 
                                                                $CONFIRMED_EXF =  $data->ETA; 
                                                            ?>
                                                        <?php endif; ?>
                            						<span id="CONFIRMED_EXF_<?php echo e($data->ID); ?>" class="text"><?php echo e($CONFIRMED_EXF); ?></span>
                            						<input type="date" value="<?php echo e($data->CONFIRMED_EXF); ?>" class="editbox" id="CONFIRMED_EXF_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editETDTEMP" id="<?php echo e($data->ID); ?>">
                            				         <?php if(!empty($data->ETD)): ?>
                                    				    <?php 
                                                            $ETD = date("d M  Y", strtotime( $data->ETD)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $ETD =  $data->ETD; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="ETD_<?php echo e($data->ID); ?>" class="text"><?php echo e($ETD); ?></span>
                            						<input type="date" value="<?php echo e($data->ETD); ?>" class="editbox" id="ETD_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editETATEMP" id="<?php echo e($data->ID); ?>">
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
                		                
                		                </tr>
                		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		          </table>
        		                    
        	                    </div>
        	                  
                            </div>
                        </div>
                            <button type="submit" clsss="btn btn-success" style="background: green;color: #fff;border: 0px;padding: 7px 30px;margin: 20px auto;display: block;border-radius: 5px;"> Save </div>
                            <!-- /.card-body -->
                          <?php echo Form::close(); ?>

        	        <?php else: ?>
            	        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                <div class="col-md-12 pull-right" style="float:right">
                                    <div class="row">
                                 
                                       <div class="col-sm-3" >
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-group input-from">
                                                    <label >PO No  </label>
                                                    <input type="text"  class="form-control" id="WIP" name="WIP" placeholder="PO NO" required onKeyup="searchInputFilterWIP()">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-3" >
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="form-group input-from">
                                                    <label >Comments </label>
                                                    <select name="COMMENTS" id="COMMENTS" class="form-control"  required >
                                                     <!--<select name="COMMENTS" id="COMMENTS" class="form-control"  required  onChange="searchInputFilterCOMMENTS()">-->
                        							     <option value="" selected>Select Status</option>
                        							     <?php $__currentLoopData = $sodCommentValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        			                       <option value="<?php echo e($data->VALID_EX_COMMENT); ?>"> <?php echo e($data->VALID_EX_COMMENT); ?> </option>
                        							     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        							 </select>
                                                    <!--<input type="text"  class="form-control" id="COMMENTS" name="COMMENTS" placeholder="COMMENTS" required >-->
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-6" style="float:left;margin-top: 0px;">
                                            <h5 class="by_date_check by_date"  style="float:left;margin-top: 0px;margin-bottom: 0px;">Expected ExF Date</h5>
                        	                <div class="form-group date-form">
                                                <label style="width: 50px;float: left;">From</label>
                                                <input style="width: 160px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="from" name="from" placeholder="from" required>
                                            </div>
                                            <div class="form-group date-form">
                                                <label style="width: 50px;float: left;">To</label>
                                                <input style="width: 160px;" type="date"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="to" name="to" placeholder="to" required>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6" >-->
                                            <!-- checkbox -->
                                        <!--    <div class="form-group input-from">-->
                                        <!--        <h5 class="by_date_check by_staus">Is Image Null?</h5>-->
                                        <!--        <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio" value="Yes" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">Yes </label>-->
                                        <!--        </div>-->
                                        <!--        <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio"  value="No" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">No</label>-->
                                        <!--        </div>-->
                                        <!--          <div class="form-check">-->
                                        <!--          <input class="form-check-input" type="radio"  value="Both" name="checkobx" onclick="checkboxFilter()">-->
                                        <!--          <label class="form-check-label">Both</label>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                    </div>
                                    <div class="col-sm-6" style="float:left">
                                      
    
                                        <!--<div class="card-foote date-formr">-->
                                        <!--  <button type="submit" class="btn btn-primary" onclick="exprected_date()">Filter</button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="col-sm-6" style="float:left">-->
                                        <h5 class="by_date_check by_date"> Confirmed ExF Date</h5>
                    	                <div class="form-group date-form">
                                              <label style="width: 50px;float: left;">From</label>
                                            <input type="date" style="width: 160px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_from" name="hand_over_from" placeholder="from" required>
                                        </div>
                                        <div class="form-group date-form">
                                              <label style="width: 50px;float: left;">To</label>
                                            <input type="date" style="width: 160px;"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY" required class="form-control" id="hand_over_to" name="hand_over_to" placeholder="to" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="float:left">
                                        <div class="card-foote date-formr">
                                          <button type="submit" class="btn btn-primary" onclick="handoverDate()">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        	            <div class="card-body">
        	                <div class="card card-primary">
        	                  <?php echo e(csrf_field()); ?>

                              <!-- /.card-header -->
                                <div class="card-content list_of_card_result" style="padding: 2px 13px;">
                		            <table class="table table-bordered"  id="listOfOrderDetails">
                		                <thead>
                        		              <tr style="color:#000">
                        		                  <th style="display:none">SL.</th>
                        		                  <th>PO No</th>
                        		                  <th>Item</th>
                        		                  <th>Description</th>
                        		                  <th>Qty</th>
                        		                  <th>Comments</th>
                        		                  <th>EXP EXF DT</th>
                        		                  <th>Confirmed EXF</th>
                        		                  <th>ETD</th>
                        		                  <th>ETA</th>
                        		                  <th>Action</th>
                        		              </tr>
                        		          </thead>
                        		      <tbody>
                		                <?php $__currentLoopData = $poDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		                    <tr id="purchase_id_<?php echo e($data->ID); ?>">
                    		                   <td style="display:none"><?php echo e($key + 1); ?></td>
                    		                   <td style="background-color:#E8ECF1;" class="edit_wip_no" id="<?php echo e($data->ID); ?>">
                            						<span id="wip_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->PO_NO); ?></span>
                            						<input type="text" value="<?php echo e($data->PO_NO); ?>" class="editbox" id="wip_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            				  <td style="background-color:#E8ECF1;" class="editITEM" id="<?php echo e($data->ID); ?>">
                            						<span id="ITEM_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->ITEM); ?></span>
                            						<input type="text" value="<?php echo e($data->ITEM); ?>" class="editbox" id="ITEM_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            			
                            				  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="<?php echo e($data->ID); ?>">
                            						<span id="DESCRIPTION_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->DESCRIPTION); ?></span>
                            						<input type="text" value="<?php echo e($data->DESCRIPTION); ?>" class="editbox" id="DESCRIPTION_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            				  <td style="background-color:#E8ECF1;" class="editQty" id="<?php echo e($data->ID); ?>">
                            						<span id="QTY_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->QTY); ?></span>
                            						<input type="text" value="<?php echo e($data->QTY); ?>" class="editbox" id="QTY_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                    		             
                    		           
                    		                  <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="<?php echo e($data->ID); ?>">
                            						<span id="COMMENTS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->COMMENTS); ?></span>
                            						<input type="text" value="<?php echo e($data->COMMENTS); ?>" class="editbox" id="COMMENTS_input_<?php echo e($data->ID); ?>" style="display:none">
                            				  </td>
                            		            <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="<?php echo e($data->ID); ?>">
                            		                <?php if(!empty($data->EXP_EXF_DT)): ?>
                                    				    <?php 
                                                            $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="EXP_DELIVERY_<?php echo e($data->ID); ?>" class="text"><?php echo e($EXP_EXF_DT); ?></span>
                            						<input type="date" value="<?php echo e($data->EXP_EXF_DT); ?>" class="editbox" id="EXP_DELIVERY_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXF" id="<?php echo e($data->ID); ?>">
                            				        <?php if(!empty($data->CONFIRMED_EXF)): ?>
                                    				    <?php 
                                                            $CONFIRMED_EXF = date("d M  Y", strtotime( $data->CONFIRMED_EXF)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $CONFIRMED_EXF =  $data->ETA; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="CONFIRMED_EXF_<?php echo e($data->ID); ?>" class="text"><?php echo e($CONFIRMED_EXF); ?></span>
                            						<input type="date" value="<?php echo e($data->CONFIRMED_EXF); ?>" class="editbox" id="CONFIRMED_EXF_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editETD" id="<?php echo e($data->ID); ?>">
                            				       
                                                    <?php if(!empty($data->ETA)): ?>
                                    				    <?php 
                                                            $ETA = date("d M  Y", strtotime( $data->ETA)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $ETA =  $data->ETA; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="ETD_<?php echo e($data->ID); ?>" class="text"><?php echo e($ETA); ?></span>
                            						<input type="date" value="<?php echo e($data->ETD); ?>" class="editbox" id="ETD_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                            				    <td style="background-color:#E8ECF1;" class="editETA" id="<?php echo e($data->ID); ?>">
                            				         <?php if(!empty($data->ETD)): ?>
                                    				    <?php 
                                                            $ETD = date("d M  Y", strtotime($data->ETD)); 
                                                        ?>
                                                    <?php else: ?>
                                                        <?php 
                                                            $ETD =  $data->ETD; 
                                                        ?>
                                                    <?php endif; ?>
                            						<span id="ETA_<?php echo e($data->ID); ?>" class="text"><?php echo e($ETD); ?></span>
                            						<input type="date" value="<?php echo e($data->ETA); ?>" class="editbox" id="ETA_input_<?php echo e($data->ID); ?>" style="display:none">
                            				    </td>
                    		                  
                    		                  <td>
                    		                     <!--<a href="<?php echo e(URL::to( '/list/purchase/order/edit/' .$data->ID)); ?>"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                    		                     <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                    		                     <!--<a href="<?php echo e(route('purchase_order.delete',$data->ID)); ?>" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
                    		                     <button  onClick="deleteData('<?php echo e($data->ID); ?>')" id="purchase_delete" type="button" class="btn  btn-danger btn-sm">Delete</button>
                    		                  </td>
                		                </tr>
                		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		              </tbody>
                		          </table>
        		                    
        	                    </div>
                            </div>
                        </div>
                      <!-- /.card-body -->
                    <?php endif; ?>
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
  <!-- data table Jquery -->
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
                    url: baseUrl +'/list/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('#purchase_id_'+ID).hide();
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
        $("#wip_"+ID).hide();
        $("#wip_input_"+ID).show();
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
    }

    $(document).on('keyup click', '.edit_wip_no', function() {
    
    var ID    = $(this).attr('id');
    
    $("#wip_"+ID).hide();
    $("#wip_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#wip_input_"+ID).val();

        
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'wip_id': $("#wip_input_"+ID).val(),
            'type':1
        },
        url: baseUrl +'/purchase_details_update' , 
        success: function(html) {
            $("#wip_"+ID).html(first);
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
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editDESCRIPTION', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editQty', function() {
    
        var ID    = $(this).attr('id');
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editEXP_DELIVERY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_DELIVERY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_DELIVERY': $("#EXP_DELIVERY_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#EXP_DELIVERY_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_CONFIRMED_EXF', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_EXF_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_EXF': $("#CONFIRMED_EXF_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#CONFIRMED_EXF_"+ID).html(first);
                }
            });
    
    }).change(function() { });
    
    $(document).on('keyup click', '.editEX_COMMENTS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EX_COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EX_COMMENTS': $("#EX_COMMENTS_input_"+ID).val(),
                'type': 7
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#EX_COMMENTS_"+ID).html(first);
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
                'type':6
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
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
                'type':8
            },
            url: baseUrl +'/purchase_details_update' , 
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
                'type':9
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#ETA_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    
     $(document).on('keyup click', '.editITEMTEMP', function() {
    
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
                'type':20
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editDESCRIPTIONTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_" + ID ).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type': 21
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editQtyTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#QTY_"+ID).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type':22
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editEXP_DELIVERYTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#EXP_DELIVERY_"+ID).hide();
        $("#EXP_DELIVERY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EXP_DELIVERY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EXP_DELIVERY': $("#EXP_DELIVERY_input_"+ID).val(),
                'type':23
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#EXP_DELIVERY_"+ID).html(date);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editEXP_CONFIRMED_EXFTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_EXF_"+ID).hide();
        $("#CONFIRMED_EXF_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_EXF_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_EXF': $("#CONFIRMED_EXF_input_"+ID).val(),
                'type':24
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(date) {
                $("#CONFIRMED_EXF_"+ID).html(date);
                }
            });
    
    }).change(function() { });
    
    $(document).on('keyup click', '.editEX_COMMENTSTEMP', function() {
    
        var ID    = $(this).attr('id');
        
        $("#EX_COMMENTS_" + ID ).hide();
        $("#EX_COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#EX_COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'EX_COMMENTS': $("#EX_COMMENTS_input_"+ID).val(),
                'type': 25
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#EX_COMMENTS_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
    $(document).on('keyup click', '.editCOMMENTSTEMP', function() {
    
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
                'type':26
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    $(document).on('keyup click change', '.editETDTEMP', function() {
    
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
                'type':27
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ETD_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editETATEMP', function() {
    
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
                'type':28
            },
            url: baseUrl +'/purchase_details_update' , 
            success: function(html) {
                $("#ETA_"+ID).html(first);
            }
        });
    }).change(function() { });
    


    function exprected_date(){
        
        var from = $("#from").val();
        var to   = $("#to").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'from': from,
                'to': to,
                'type': $('select[name=type]').val(),
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }
    
    function handoverDate(){
        
        var from           = $("#from").val();
        var to             = $("#to").val();
        var WIP            = $("#WIP").val();
        var hand_over_from = $("#hand_over_from").val();
        var hand_over_to   = $("#hand_over_to").val();
        var checkbox       = $('input[name="checkobx"]:checked').val();
        var COMMENTS       = $("#COMMENTS").val();
        
        $('.list_of_card_result').html(' <div class="loader"></div>');
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'checkbox': checkbox,
                'COMMENTS': COMMENTS,
                'from': from,
                'to': to,
                'hand_over_from': hand_over_from,
                'hand_over_to': hand_over_to,
                'WIP': WIP,
                'type': 3
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
    }
    
    
    
    function checkboxFilter() {
        
    //   var checkbox = $('input[name="checkobx"]:checked').serialize();
       var checkbox = $('input[name="checkobx"]:checked').val();
       $('.list_of_card_result').html(' <div class="loader"></div>');
       
       $.ajax({
            type: "POST",
            url: baseUrl +'/list/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'checkbox': checkbox,
                'type': 2,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });  
        
    }
    
    function searchInputFilterWIP() {
        
        var WIP   = $("#WIP").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'WIP': WIP,
                'type': 4,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });
    }
    
    function searchInputFilterCOMMENTS() {
        
        var COMMENTS   = $("#COMMENTS").val();
        $('.list_of_card_result').html(' <div class="loader"></div>');
       
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/details/expected/delivery', 
            data: {
                '_token': $('input[name=_token]').val(),
                'COMMENTS': COMMENTS,
                'type': 5,
            },
            success: function(result) { 
                $('.list_of_card_result').html(result);
            
            }
        });
    }
    
    $('#listOfOrderDetails').DataTable( {
        buttons: [
          {
                extend: 'excelHtml5',
                text: 'Export',
                title:'Export P.O. Details',
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order-purchase/details/list.blade.php ENDPATH**/ ?>