<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Company Description" />
	<meta name="author" content="Company Name">
	<title>Total Office</title>
	<link rel="shortcut icon" href="{{ URL::asset( 'assets/img/favicon.pn' ) }}g">
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://fonts.cdnfonts.com/css/graphik" rel="stylesheet">

	<!-- bootstrap-css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

	    <!-- data table min.css -->
    <link rel="stylesheet" href="{{ URL::asset( 'assets/datatables/css/jquery.dataTables.min.css' ) }}">
    <link rel="stylesheet" href="{{ URL::asset( 'assets/datatables/css/buttons.dataTables.min.css')}}">

	<!-- main stylesheet -->
	<link href="{{ URL::asset( 'assets/css/app.css' ) }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::asset( 'assets/dist/css/lightbox.min.css' ) }}">

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
     <script src="{{ URL::asset( 'assets/jquery-2.1.3.min.js' ) }}" type="text/javascript"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="{{ URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' ) }}"></script>

	<script src="{{ URL::asset( 'assets/dist/js/lightbox-plus-jquery.min.js' ) }}"></script>
	<script>
        window.baseUrl = `{{ url('/') }}`;
        window.csrf_token = '{{ csrf_token() }}';
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
								<img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="site logo">
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
										<img src="{{ URL::asset( 'assets/img/nav-icons/search.svg') }}" alt="search icon">
									</a>
								</li>
								<li>
									<a href="#">
										<span class="added-items">1</span>
										<img src="{{ URL::asset( 'assets/img/nav-icons/shopping-bag.svg') }}" alt="shopping bag icon">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ URL::asset( 'assets/img/nav-icons/user.svg') }}" alt="user icon">
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
	@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif	    
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
                {{ csrf_field() }}
                
                @php  $array = []; @endphp
                @foreach($comments as $commentsList)
                    @php $array[] = $commentsList->Fullfilment_Status @endphp
                    
                @endforeach
                
                @php 
                
                   $total = array_count_values($array);
              
            
                @endphp
                @foreach($comments as $key=>$commentsInfo)
                    
                    <tr onClick="salesDetails('{{ $orderID }}','{{ $commentsInfo->Fullfilment_Status }}','{{ $commentsInfo->Expected_Delivery }}','{{ $key }}')" style="cursor:pointer">
                        
                    
                        @if($total[$commentsInfo->Fullfilment_Status] > 1)
                            @if($key == 0 )
                                   
                                <td rowspan="{{ $total[$commentsInfo->Fullfilment_Status] }}" style="text-align: center;vertical-align: middle;">
                                    {{ $commentsInfo->Fullfilment_Status }}
                                </td>
                             
                            @else
                                @if($comments[$key]->Fullfilment_Status != $comments[$key-1]->Fullfilment_Status)
                                    <td rowspan="{{ $total[$commentsInfo->Fullfilment_Status] }}"  style="text-align: center;vertical-align: middle;">
                                        {{ $commentsInfo->Fullfilment_Status }}
                                    </td>
                                @endif
                            @endif
                        @else
                            <td rowspan="{{ $total[$commentsInfo->Fullfilment_Status] }}"  style="text-align: center;vertical-align: middle;">
                                {{ $commentsInfo->Fullfilment_Status }}
                            </td>
                        @endif
                        <td>   
                         
                            @php
                                $date = date("d M  Y", strtotime( $commentsInfo->Expected_Delivery));
                            @endphp
                            {{ $date }}
                           
                                
                        </td>
                        <td>{{ $commentsInfo->No_Of_Items }}</td>
                         <td><button class="btn btn-xs btn-prime btn-details"><b>+</b></button></td>
                     </tr>
                   
                @endforeach
               
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
                        @if(!empty($saledOrderHeaders->SALESPERSON))
                            <button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - {{ $saledOrderHeaders->SALESPERSON }}</button>
                        @endif
                        @if(!empty($saledOrderHeaders->PROJECTMANAGER))
                            <button class="btn btn-sm btn-prime"  data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - {{ $saledOrderHeaders->PROJECTMANAGER }}</button>
                        @endif
                    </div>
                </div>

				@if(!empty($saledOrderHeaders))
					<div class="table-responsive mb-5">
						<table class="table" >
							<thead>
								<tr>
									<th scope="col">Customer</th>
									<th scope="col">Status</th>
									<th scope="col">Expected Handover Date</th>
									<th scope="col">Overall Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $saledOrderHeaders->CUSTOMER_NAME }}</td>
										<td>{{ $saledOrderHeaders->SO_STATUS }}</td>
									    <td>
									        
									        @if(!empty($saledOrderHeaders->TGT_HANDOVER_DT))
    									        @php
                                                    $date = date("d M  Y", strtotime( $saledOrderHeaders->TGT_HANDOVER_DT));
                                                @endphp
                                            {{ $date }}
                                            @else
                                                {{ $saledOrderHeaders->TGT_HANDOVER_DT }}
                                            @endif
                                            
                                            
									 </td>

								<!--	<td>{{ $saledOrderHeaders->TGT_HANDOVER_DT }}</td> -->
									<td>{{ $saledOrderHeaders->COMMENTS }}</td>
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
									<th scope="col">Description</th>
									<th scope="col" style=" padding-right: 10px;text-align: right;">Quantity </th>
									<th scope="col" >Fulfilment Status</th>
									<th scope="col" style="text-align:center;">Expected Delivery</th>
									<th scope="col"> Image</th>
								</tr>
							</thead>
							<tbody>
							    @php $sl = 1; @endphp
								@foreach($salesOrderDetails as $salesInfo)
                                {{-- {{ dd($salesInfo) }} --}}
									@php $explodeInfo = explode(' ', $salesInfo->DESCRIPTION  , 12) @endphp

									@php

									    $explodeComment= explode(' ', $salesInfo->comments  , 11);

									@endphp
                            
								    <tr>
								        <td style="display:none"> {{ $sl ++ }} </td>
										<th>
											<a style="width: 120px; display: block;" class="example-image-link" href="{{ URL::asset( 'images/'. $salesInfo->thumbnail_image) }}" data-lightbox="example-1"> {{ $salesInfo->ITEM }} </a>
										</th>
										<td>
											<div  class="light_box_{{ $salesInfo->ID }}">

													{{  implode(' ', array_slice(str_word_count($salesInfo->DESCRIPTION, 1), 0, 11));     }}

													@if(!empty( $explodeInfo[11]))
    													<span class="expend_{{ $salesInfo->ID }}" style="display:none">
    														{{ $explodeInfo[11]  }}
    													</span>
													@endif


												@if(!empty( $explodeInfo[11]))
													<span style="float: right; color: #000; font-weight: bold;  display: block; width: 100%; text-align: right;"  class="act_{{ $salesInfo->ID }}">...</span>
												@endif
											</div>
										</td>
										<td > <span style=" display: block;" class="qty_block"> {{ $salesInfo->QTY }} </span></td>
                                        <td>
                                            {{ $salesInfo->EX_COMMENTS }}
                                        </td>
                                        <td style="text-align:center;">
                                            
                                            @if(!empty($salesInfo->EXP_DELIVERY))
                                                @php
                                                    $date = date("d M  Y", strtotime( $salesInfo->EXP_DELIVERY));
                                                @endphp
                                                {{ $date }}
                                            @else
                                                {{  $salesInfo->EXP_DELIVERY }}
                                            @endif
                                        
                                        </td>
{{--
										<td>


										    <div class="light_box_{{ $salesInfo->ID }}">


												@if(!empty(  $explodeComment[10]))
												    	{{  implode(' ', array_slice(str_word_count($salesInfo->comments, 1), 0, 11));     }}
												    <span class="expend_{{ $salesInfo->ID }}" style="display:none">
													    {{ $salesInfo->comments }}
													</span>
												@else
												    {{ $salesInfo->comments }}

												@endif

												@if(!empty( $explodeComment[10]))
													<span style="float: right; color: #000; font-weight: bold;  display: block; width: 100%; text-align: right;"  class="act_{{ $salesInfo->ID }}">...</span>
												@endif
											</div>


										</td> --}}

										<td>
											<a style=" display: block;" class="example-image-link" href="{{ URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE) }}" data-lightbox="example-1">
									        <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE) }}" > </a>

										</td>
								    </tr>
								    	<script type="text/javascript">

                                        	$(document).ready(function(){

                                        		$(document).on('click', '.light_box_{{ $salesInfo->ID }}', function() {
                                        	        $('.light_box_{{ $salesInfo->ID }}').addClass('expend_active_{{ $salesInfo->ID }}');
                                        	  	    $(".expend_{{ $salesInfo->ID }}").toggleClass('show');
                                        	  		$(".act_{{ $salesInfo->ID }}").html('Less');
                                        	  		$(".act_{{ $salesInfo->ID }}").addClass('less_{{ $salesInfo->ID }}');

                                        		});

                                        		$(document).on('click', '.expend_active_{{ $salesInfo->ID }}', function() {
                                                    $(".less_{{ $salesInfo->ID }}").html('...');
                                                    $('.light_box_{{ $salesInfo->ID }}').removeClass('expend_active_{{ $salesInfo->ID }}');
                                        		});

                                        	});
                                        	</script>
							    @endforeach
							</tbody>
						</table>
						</div>
					</div>
				@else
					<div class="card-body">
		  				<p class="text-center"> Sales Order Not Found </p>
		  			</div>
				@endif
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
									<img src="{{ URL::asset( 'assets/img/logo-light.png')}}" alt="footer logo">
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
        @if(!empty($saledOrderHeaders->SALESPERSON))<button class="btn btn-sm btn-prime d-block mx-1" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - {{ $saledOrderHeaders->SALESPERSON }}</button> <br> @endif
         @if(!empty($saledOrderHeaders->PROJECTMANAGER))<button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - {{ $saledOrderHeaders->PROJECTMANAGER }}</button> @endif
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
                @if(!empty($saledOrderHeaders->WIP)) <x-mail-component :id="$saledOrderHeaders->WIP" mode="sales"/> @endif
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
                @if(!empty($saledOrderHeaders->WIP)) <x-mail-component :id="$saledOrderHeaders->WIP" mode="managermanager"/> @endif
           
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
