<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Company Description" />
	<meta name="author" content="Company Name">
	<title>Total Office</title>
	<link rel="shortcut icon" href="<?php echo e(URL::asset( 'assets/img/favicon.pn' )); ?>g">
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://fonts.cdnfonts.com/css/graphik" rel="stylesheet">

	<!-- bootstrap-css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

	    <!-- data table min.css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset( 'assets/datatables/css/jquery.dataTables.min.css' )); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset( 'assets/datatables/css/buttons.dataTables.min.css')); ?>">

	<!-- main stylesheet -->
	<link href="<?php echo e(URL::asset( 'assets/css/app.css' )); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(URL::asset( 'assets/dist/css/lightbox.min.css' )); ?>">

    <style>
        .btn.btn-info.btn-xs.popup_close_btn {
          width: 104px;
          margin: 10px auto;
          color: #fff;
          display: block;
        }
        .side_style{
            position: fixed;
            top: 55%;
            right: -6%;
            text-align: right;
           transform: rotate(90deg);
           display:none!important;
        }
        .vertical_btn{
            display:flex!important;
            margin-left: auto;
            margin-right: -8%;
            
        }
        .btn-prime{
            background-color:#084E8D!important;
            color: #fff;
            text-shadow: 0.5px 1.5px black;
            font-size: 16px;
        }
            

       .btn-prime:hover, .btn-prime:focus{
            background-color: #05335d!important;
            border-color: #052e53!important;
            color:#fff!important;
            
        }
        .all_text, .filtered_text{
            
            display:none;
        }
        .all_text.active,.filtered_text.active {
         
          display:block;
        }
    .popup_container{
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         z-index:9999;
         background:#fff;
         padding:15px;
         border-radius:5px;
         
        }
   .popup_window {
        background: rgba(0,0,0,0.5);
        z-index: 999;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        display:none;
       
    }    
        
    .popup_container table th, .popup_container table  td   {
        text-align: center;
    }

    .popup_container table  td.text-right   {
        text-align: right;
    }
    
    .btn-details {
        font-size: 22px;
        padding: 0px 10px;
    }
    
    .see-summary{
        padding: 1px 5px;
        font-size:14;
        text-shadow:0;
        border-radius:2px;
        margin-left:40%;
    }
    .lb-number {
      display: none !important;
    }
    .lb-next {
      display: none !important;
    }
    .lb-prev {
      display: none !important;
    }
    .floating-summary-btn{
        position: fixed;
        top: 55%;
        left: -1%;
        margin-left: 0;
        transform: rotate(90deg);
        display:none;
    }
    </style>

    <!-- data table Jquery -->
     <script src="<?php echo e(URL::asset( 'assets/jquery-2.1.3.min.js' )); ?>" type="text/javascript"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo e(URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' )); ?>"></script>

	<script src="<?php echo e(URL::asset( 'assets/dist/js/lightbox-plus-jquery.min.js' )); ?>"></script>
	<script>
        window.baseUrl = `<?php echo e(url('/')); ?>`;
        window.csrf_token = '<?php echo e(csrf_token()); ?>';
    </script>

</head>
<body>
	<!-- =================== -->
	<!-- page wrapper start -->
	<div class="page-wrapper">
		<!-- header start -->
		<div class="header_wrap">
		<header>
			<nav>
				<div class="container-xl">
					<div class="d-flex justify-content-between align-items-center">
						<div class="header-left d-flex align-items-stretch">
							<a href="#" class="logo">
								<img src="<?php echo e(URL::asset( 'assets/img/logo.png')); ?>" alt="site logo">
							</a>
							<ul>
								<li>
									<a href="#">Services</a>
								</li>
								<li>
									<a href="#">Products</a>
								</li>
								<li>
									<a href="#">Initiatives</a>
								</li>
								<li>
									<a href="#">About</a>
								</li>
							</ul>
						</div>
						<div class="header-right d-flex align-items-stretch">

						    <div class="social-media">
									<a href="#">
										<i class="bi bi-twitter"></i>
									</a>
									<a href="#">
										<i class="bi bi-instagram"></i>
									</a>
									<a href="#">
										<i class="bi bi-linkedin"></i>
									</a>
									<a href="#">
										<i class="bi bi-youtube"></i>
									</a>
								</div>



								<!--

							<ul>
								<li>
									<a href="#">
										<img src="<?php echo e(URL::asset( 'assets/img/nav-icons/search.svg')); ?>" alt="search icon">
									</a>
								</li>
								<li>
									<a href="#">
										<span class="added-items">1</span>
										<img src="<?php echo e(URL::asset( 'assets/img/nav-icons/shopping-bag.svg')); ?>" alt="shopping bag icon">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo e(URL::asset( 'assets/img/nav-icons/user.svg')); ?>" alt="user icon">
									</a>
								</li>
							</ul>

							--->
							<!--
							<div class="cta-button">
								<a href="#">Book a Visit / Call</a>
							</div>

							-->
						</div>
					</div>
				</div>
			</nav>
		</header>
		<!-- header end -->

		</div>

		<!-- main start -->
		<main>
		    
 <!-- popup window ---------------------------->
 
 <button class="btn-xs btn-prime see-summary floating-summary-btn"> Click for Summary</button>
	<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>	    
<section class="popup_window">  
    <div class="container popup_container">
        <div class="row ">
            <table class="table table-striped custab">
                <thead>
               
                    <tr>
                        <th>Fulfilment Status</th>
                        <th>Expected Delivery</th>
                        <th>No Of Items</th>
                        <th>Details</th>
                        
                    </tr>
                </thead>
                <?php echo e(csrf_field()); ?>

                
                <?php  $array = []; ?>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentsList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $array[] = $commentsList->Fullfilment_Status ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php 
                
                   $total = array_count_values($array);
              
            
                ?>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$commentsInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr onClick="salesDetails('<?php echo e($orderID); ?>','<?php echo e($commentsInfo->Fullfilment_Status); ?>','<?php echo e($commentsInfo->Expected_Delivery); ?>','<?php echo e($key); ?>')" style="cursor:pointer">
                        
                    
                        <?php if($total[$commentsInfo->Fullfilment_Status] > 1): ?>
                            <?php if($key == 0 ): ?>
                                   
                                <td rowspan="<?php echo e($total[$commentsInfo->Fullfilment_Status]); ?>" style="text-align: center;vertical-align: middle;">
                                    <?php echo e($commentsInfo->Fullfilment_Status); ?>

                                </td>
                             
                            <?php else: ?>
                                <?php if($comments[$key]->Fullfilment_Status != $comments[$key-1]->Fullfilment_Status): ?>
                                    <td rowspan="<?php echo e($total[$commentsInfo->Fullfilment_Status]); ?>"  style="text-align: center;vertical-align: middle;">
                                        <?php echo e($commentsInfo->Fullfilment_Status); ?>

                                    </td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <td rowspan="<?php echo e($total[$commentsInfo->Fullfilment_Status]); ?>"  style="text-align: center;vertical-align: middle;">
                                <?php echo e($commentsInfo->Fullfilment_Status); ?>

                            </td>
                        <?php endif; ?>
                        <td>   
                         
                            <?php
                                $date = date("d M  Y", strtotime( $commentsInfo->Expected_Delivery));
                            ?>
                            <?php echo e($date); ?>

                           
                                
                        </td>
                        <td><?php echo e($commentsInfo->No_Of_Items); ?></td>
                         <td><button class="btn btn-xs btn-prime btn-details"><b>+</b></button></td>
                     </tr>
                   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </table>
            
        </div>
        <a class='btn btn-info btn-prime btn-xs popup_close_btn' href="#"> See All</a> 
    </div>
</section>		  		    
 <!-- end popup window ---------------------------->	
 
 
			<div class="container-xl">

                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="status_title"> Order Status </h3>
                    </div>
                    <div>
                        <?php if(!empty($saledOrderHeaders->SALESPERSON)): ?>
                            <button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - <?php echo e($saledOrderHeaders->SALESPERSON); ?></button>
                        <?php endif; ?>
                        <?php if(!empty($saledOrderHeaders->PROJECTMANAGER)): ?>
                            <button class="btn btn-sm btn-prime"  data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - <?php echo e($saledOrderHeaders->PROJECTMANAGER); ?></button>
                        <?php endif; ?>
                    </div>
                </div>

				<?php if(!empty($saledOrderHeaders)): ?>
					<div class="table-responsive mb-5">
						<table class="table" >
							<thead>
								<tr>
									<th scope="col">Customer</th>
									<th scope="col">Status</th>
									<th scope="col"> Client Expectation </th>
									<th scope="col">Overall Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo e($saledOrderHeaders->CUSTOMER_NAME); ?></td>
										<td><?php echo e($saledOrderHeaders->SO_STATUS); ?></td>
									    <td>
									        
									        <?php if(!empty($saledOrderHeaders->TGT_HANDOVER_DT)): ?>
    									        <?php
                                                    $date = date("d M  Y", strtotime( $saledOrderHeaders->TGT_HANDOVER_DT));
                                                ?>
                                            <?php echo e($date); ?>

                                            <?php else: ?>
                                                <?php echo e($saledOrderHeaders->TGT_HANDOVER_DT); ?>

                                            <?php endif; ?>
                                            
                                            
									 </td>

								<!--	<td><?php echo e($saledOrderHeaders->TGT_HANDOVER_DT); ?></td> -->
									<td><?php echo e($saledOrderHeaders->COMMENTS); ?></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="table-responsive">
					    <h3 class="order_details_title">  
    					    <span class="all_text active">Order Details All</span> 
    					    <span class="filtered_text"> Order Details Filtered </span>
					    </h3>  
					    <button class="btn-xs btn-prime see-summary"> Click for Summary</button>
					    <div id="resultOfItem">
						    <table class="table display " id="tableresponsive">
							<thead>
								<tr>
								    <th scope="col" style="display:none">Sl </th>
									<th scope="col">Item </th>
									<th scope="col"> Image</th>
									<th scope="col">Description</th>
									<th scope="col" style=" padding-right: 10px;text-align: right;">Quantity </th>
									<th scope="col" >Fulfilment Status</th>
									<th scope="col" style="text-align:center;">Goods Ready Date</th>
									<th scope="col" style="text-align:center;">Ship Date</th>
									<th scope="col" style="text-align:center;">Arrival Date</th>
								</tr>
							</thead>
							<tbody>
							    <?php $sl = 1; ?>
								<?php $__currentLoopData = $salesOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
									<?php $explodeInfo = explode(' ', $salesInfo->DESCRIPTION  , 12) ?>

									<?php

									    $explodeComment= explode(' ', $salesInfo->comments  , 11);

									?>
                            
								    <tr>
								        <td style="display:none"> <?php echo e($sl ++); ?> </td>
										<th>
											<a style="width: 120px; display: block;" class="example-image-link" href="<?php echo e(URL::asset( 'images/'. $salesInfo->thumbnail_image)); ?>" data-lightbox="example-1"> <?php echo e($salesInfo->ITEM); ?> </a>
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
						</table>
						</div>
					</div>
				<?php else: ?>
					<div class="card-body">
		  				<p class="text-center"> Sales Order Not Found </p>
		  			</div>
				<?php endif; ?>
			</div>
		</main>
		<!-- main end -->

		<!-- footer start -->
		<footer>
			<div class="footer-top">
				<div class="container-xl">
					<div class="row align-items-end">
						<div class="col-xl-3">
							<div class="footer-logo">
								<a href="#">
									<img src="<?php echo e(URL::asset( 'assets/img/logo-light.png')); ?>" alt="footer logo">
								</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="subscribe">
								<h4>Subscribe to Our Newsletter</h4>
								<form>
									<input type="email" placeholder="Enter your email here">
									<button>Submit</button>
								</form>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="social-pages">
								<h4>Our Social Media</h4>
								<div class="social-media">
									<a href="#">
										<i class="bi bi-twitter"></i>
									</a>
									<a href="#">
										<i class="bi bi-instagram"></i>
									</a>
									<a href="#">
										<i class="bi bi-linkedin"></i>
									</a>
									<a href="#">
										<i class="bi bi-youtube"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.footer-top -->
			<div class="footer-middle">
				<div class="container-xl">
					<div class="row">
						<div class="col-lg-6 col-xl-5">
							<div class="footer-col col-devider">
								<div class="footer-box">
									<h4>Explore</h4>
									<ul>
										<li><a href="#">Services</a></li>
										<li><a href="#">Initiatives</a></li>
										<li><a href="#">Our Story</a></li>
										<li><a href="#">Case Study</a></li>
										<li><a href="#">Resources</a></li>
										<li><a href="#">Careers</a></li>
									</ul>
								</div>
								<div class="footer-box">
									<h4>Products</h4>
									<ul>
										<li><a href="#">All Products</a></li>
										<li><a href="#">Furniture</a></li>
										<li><a href="#">Acoustic Products</a></li>
										<li><a href="#">Writable surfaces</a></li>
										<li><a href="#">Fabrics</a></li>
										<li><a href="#">Greenwalls</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-6 ps-xl-5">
							<div class="footer-col">
								<div class="footer-box">
									<h4>Help</h4>
									<ul>
										<li><a href="#">Contact Us</a></li>
										<li><a href="#">Book a Visit</a></li>
										<li><a href="#">Book a Call</a></li>
										<li><a href="#">Track Order</a></li>
									</ul>
								</div>
								<div class="footer-box">
									<h4>Profile</h4>
									<ul>
										<li><a href="#">Sign In</a></li>
										<li><a href="#">Sign Up</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.footer-middle -->
			<div class="footer-bottom">
				<div class="container-xl">
					<div class="d-flex justify-content-around align-items-center">
						<p>© 2022 Total Office. All rights reserved.</p>
						<nav class="d-flex justify-content-center">
							<li>
								<a href="#">Terms & Conditions</a>
							</li>
							<li>
								<a href="#">Privacy Policy</a>
							</li>
						</nav>
						<!---
						<div class="dev">
							<p>Made with <i class="bi bi-heart-fill"></i> by tentwenty</p>
						</div>

						-->
					</div>
				</div>
			</div><!--/.footer-bottom -->
		</footer>
		<!-- footer end -->
	</div>
    <div class="side_style d-flex">
        <?php if(!empty($saledOrderHeaders->SALESPERSON)): ?><button class="btn btn-sm btn-prime d-block mx-1" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - <?php echo e($saledOrderHeaders->SALESPERSON); ?></button> <br> <?php endif; ?>
         <?php if(!empty($saledOrderHeaders->PROJECTMANAGER)): ?><button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - <?php echo e($saledOrderHeaders->PROJECTMANAGER); ?></button> <?php endif; ?>
    </div>

    <!-- Sales Modal -->
    <div class="modal fade" id="salesModal" tabindex="-1" aria-labelledby="salesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="salesModalLabel">Email Sales Person</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if(!empty($saledOrderHeaders->WIP)): ?> <?php if (isset($component)) { $__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730 = $component; } ?>
<?php $component = App\View\Components\MailComponent::resolve(['id' => $saledOrderHeaders->WIP,'mode' => 'sales'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MailComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730)): ?>
<?php $component = $__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730; ?>
<?php unset($__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730); ?>
<?php endif; ?> <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      </div>
      <!-- Manager -->
      <div class="modal fade" id="managerModal" tabindex="-1" aria-labelledby="managerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="managerModalLabel">Email Project Manager</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if(!empty($saledOrderHeaders->WIP)): ?> <?php if (isset($component)) { $__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730 = $component; } ?>
<?php $component = App\View\Components\MailComponent::resolve(['id' => $saledOrderHeaders->WIP,'mode' => 'managermanager'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MailComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730)): ?>
<?php $component = $__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730; ?>
<?php unset($__componentOriginal26c09b3d3d050abd5eb7c4cc0ab8f2ca817ef730); ?>
<?php endif; ?> <?php endif; ?>
           
            </div>
          </div>
        </div>
      </div>
      </div>
	<!-- page wrapper end -->
	<!-- =============== -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
         $.noConflict();
		$(document).on('click', '.paginate_button', function() {
          //alert('fff');
          window.scrollTo(0, 0);
		});
		
		
		$(document).on('click', '.see-summary', function() {
          //alert('fff');
          
            $('.popup_window').fadeIn();
            $('.popup_container').fadeIn();
           
		});
		
			$(document).on('click', '.popup_close_btn', function() {
          //alert('fff');
          
           $('.popup_container').fadeOut();
            $('.popup_window').fadeOut();
             location.reload();
		});
		
		function salesDetails(orderID,comments, delivery, key) {
		    $.ajax({
                data: {
        			orderID : orderID,
        			comments : comments,
        			delivery : delivery,
        			_token: $("input[name='_token']").val() ,
        		},
                type: "POST",
                url: window.baseUrl + '/order/comments/delivery',
                success:function(data) {
                    $('#resultOfItem').html(data);
                    $('.popup_container').fadeOut();
                    $('.popup_window').fadeOut();
                   
                    $('.all_text').removeClass('active');
                   
                    $('.filtered_text').addClass('active');
                    
                }
            }); 
		}
		

	 	$('#tableresponsive').DataTable( {
	        retrieve: true,
	        language: {
	          "emptyTable": "No result found"
	        },
	        pageLength: 25,
	        paging: true,
	        // sDom: "Rlfrtip",
	        dom: 'Bfrtip',
	       "ordering": true,
	    } );

        $(window).scroll(function(){
            var count = $(this).scrollTop();

            if(count < 350){


            $('.floating-summary-btn').fadeOut();


                $('.side_style').removeClass('vertical_btn');
            }
            else{
                  $('.floating-summary-btn').fadeIn();
                $('.side_style').addClass('vertical_btn');
                
            }
        });
	</script>


</body>
</html>
<?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/order/details.blade.php ENDPATH**/ ?>