@extends('master.app')

@section('content')
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
                {{--
                <div>
                    @if(!empty($saledOrderHeaders->SALESPERSON))
                        <button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - {{ $saledOrderHeaders->SALESPERSON }}</button>
                    @endif
                    @if(!empty($saledOrderHeaders->PROJECTMANAGER))
                        <button class="btn btn-sm btn-prime"  data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - {{ $saledOrderHeaders->PROJECTMANAGER }}</button>
                    @endif
                </div>
                --}}
            </div>

			@if(!empty($saledOrderHeaders))
				<div class="table-responsive mb-5">
				    <ul class="list_order_header">
				        <li>
				            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 9.80769C4.78846 9.80769 2.59615 7.61539 2.59615 4.90385C2.59615 2.19231 4.78846 0 7.5 0C10.2115 0 12.4038 2.19231 12.4038 4.90385C12.4038 7.61539 10.2115 9.80769 7.5 9.80769ZM7.5 1.15385C5.42308 1.15385 3.75 2.82692 3.75 4.90385C3.75 6.98077 5.42308 8.65385 7.5 8.65385C9.57692 8.65385 11.25 6.98077 11.25 4.90385C11.25 2.82692 9.57692 1.15385 7.5 1.15385ZM14.4231 16.1538H0.576923C0.259615 16.1538 0 15.8942 0 15.5769V13.8462C0 12.2596 1.29808 10.9615 2.88462 10.9615H12.1154C13.7019 10.9615 15 12.2596 15 13.8462V15.5769C15 15.8942 14.7404 16.1538 14.4231 16.1538ZM1.15385 15H13.8462V13.8462C13.8462 12.8942 13.0673 12.1154 12.1154 12.1154H2.88462C1.93269 12.1154 1.15385 12.8942 1.15385 13.8462V15Z" fill="#4BA4F3"/>
                            </svg>

				            <h4 class="order_title">Customer</h4>
				            <span class="order_content">{{ $saledOrderHeaders->CUSTOMER_NAME }}</span>
				        </li>
				        
				        <li>
				            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6624 1.35873L9.45616 0.997498H9.43496H9.37122C9.32868 0.997498 9.28629 0.997498 9.24374 1.01869H9.22255C9.18001 1.03989 9.11627 1.08243 9.07373 1.10363L0.510035 9.70982C0.191347 10.0285 0 10.4748 0 10.9211C0 11.3886 0.170018 11.8136 0.510035 12.1325L5.84375 17.4662C6.16244 17.7849 6.60874 17.9762 7.05507 17.9762C7.52256 17.9762 7.94756 17.8062 8.26639 17.4662L16.8513 8.88123C16.8513 8.88123 16.8513 8.86003 16.8725 8.86003C16.8937 8.83884 16.8937 8.81749 16.9151 8.7963C16.9363 8.75375 16.9576 8.73256 16.9788 8.69001V8.64747C16.9788 8.60493 17 8.56254 17 8.52V8.4988L16.6388 3.33471C16.5537 2.29342 15.7037 1.44347 14.6625 1.35839L14.6624 1.35873ZM7.62867 16.8286C7.33118 17.1261 6.79992 17.1261 6.50243 16.8286L1.16871 11.4949C1.01989 11.3461 0.934955 11.1549 0.934955 10.9425C0.934955 10.7299 1.01989 10.5387 1.16871 10.39L9.60491 1.9538L14.5986 2.31503C15.1936 2.35757 15.6611 2.82506 15.7037 3.42006L16.0649 8.41377L7.62867 16.8286Z" fill="#4BA4F3"/>
                            </svg>


				            <h4 class="order_title">Status</h4>
				            <span class="order_content">{{ $saledOrderHeaders->SO_STATUS }}</span>
				        </li>
				        <li>
				            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.682861 0.0869141V0.931766H9.71528V6.08997H16.105L17.1612 7.43978V11.0454H15.5347H15.5348C15.4056 10.3155 14.9391 9.68958 14.2767 9.35701C13.6142 9.02443 12.8336 9.02445 12.1711 9.35701C11.5087 9.68956 11.0422 10.3155 10.913 11.0454H6.73287C6.6038 10.3155 6.13731 9.68958 5.47484 9.35701C4.81236 9.02443 4.03175 9.02445 3.36931 9.35701C2.70687 9.68956 2.24035 10.3155 2.11116 11.0454H0.683272V11.8903H2.10486C2.24042 12.6142 2.70763 13.2326 3.36686 13.5607C4.0262 13.8888 4.80108 13.8888 5.46047 13.5607C6.1197 13.2326 6.5869 12.6142 6.72246 11.8903H10.909C11.0446 12.6142 11.5117 13.2326 12.171 13.5607C12.8302 13.8888 13.6052 13.8888 14.2645 13.5607C14.9237 13.2326 15.3909 12.6142 15.5264 11.8903H18V7.15869L16.6862 5.4688L14.6436 1.16608H10.5604V0.0888379L0.682861 0.0869141ZM4.40903 12.9638C4.00942 12.9638 3.62619 12.8049 3.34374 12.5223C3.06128 12.2397 2.90276 11.8565 2.90287 11.457C2.90316 11.0574 3.062 10.6743 3.34476 10.392C3.62751 10.1096 4.01089 9.95117 4.41035 9.95162C4.80995 9.95192 5.19304 10.1111 5.47518 10.394C5.75735 10.6769 5.9156 11.0603 5.915 11.4599C5.91455 11.8589 5.75557 12.2414 5.47311 12.5234C5.1908 12.8054 4.80799 12.9638 4.40899 12.9638L4.40903 12.9638ZM13.2151 12.9638C12.8155 12.9638 12.4323 12.8049 12.1498 12.5223C11.8674 12.2397 11.7089 11.8565 11.709 11.457C11.7091 11.0574 11.8681 10.6743 12.1509 10.392C12.4336 10.1096 12.8168 9.95117 13.2164 9.95162C13.6161 9.95192 13.9991 10.1111 14.2813 10.394C14.5634 10.6769 14.7217 11.0603 14.7211 11.4599C14.7205 11.8586 14.562 12.2408 14.28 12.5227C13.9981 12.8047 13.6159 12.9632 13.2172 12.9638L13.2151 12.9638ZM14.1086 2.01139L15.6506 5.24749H10.5599V2.01139H14.1086Z" fill="#4BA4F3"/>
                            </svg>

				            <h4 class="order_title">Client Expectation</h4>
				            <span class="order_content">
				                @if(!empty($saledOrderHeaders->TGT_HANDOVER_DT))
									        @php
                                                $date = date("d M  Y", strtotime( $saledOrderHeaders->TGT_HANDOVER_DT));
                                            @endphp
                                        {{ $date }}
                                        @else
                                            {{ $saledOrderHeaders->TGT_HANDOVER_DT }}
                                        @endif
				            </span>
				         </li>
				        <li>
				            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 0C5.87833 0 3.84331 0.811465 2.34315 2.25577C0.842901 3.70019 0 5.6591 0 7.70164C0 9.74418 0.842901 11.7033 2.34315 13.1475C3.84353 14.5918 5.87833 15.4033 8 15.4033C10.1217 15.4033 12.1567 14.5918 13.6568 13.1475C15.1571 11.7031 16 9.74418 16 7.70164C16 5.6591 15.1571 3.69998 13.6568 2.25577C12.1565 0.811465 10.1217 0 8 0ZM8 14.0031C6.26405 14.0031 4.59916 13.3392 3.37173 12.1575C2.1442 10.9757 1.45459 9.37297 1.45459 7.70182C1.45459 6.03067 2.1442 4.42782 3.37173 3.24616C4.59925 2.06442 6.26411 1.40052 8 1.40052C9.73589 1.40052 11.4008 2.06442 12.6283 3.24616C13.8558 4.42791 14.5454 6.03067 14.5454 7.70182C14.5454 9.37297 13.8558 10.9758 12.6283 12.1575C11.4007 13.3392 9.73589 14.0031 8 14.0031Z" fill="#4BA4F3"/>
                            </svg>

				            <h4 class="order_title">Overall Status</h4>
				            <span class="order_content">{{ $saledOrderHeaders->COMMENTS }}</span>
				            
				         </li>
				    </ul>
				
                <div class="table-responsive mb-5">
				    <ul class="list_table_header">
				        <li></li>
				    </ul>
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
										<a style=" display: block;" class="example-image-link" href="{{ URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE) }}" data-lightbox="example-1">
								        <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE) }}" > </a>

									</td>
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
@endsection