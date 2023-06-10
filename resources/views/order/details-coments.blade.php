<!--<script src="{{ URL::asset( 'assets/jquery-2.1.3.min.js' ) }}" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' ) }}"></script>
<script type="text/javascript">
 	$('#tableresponsive').DataTable( {
        retrieve: true,
        language: {
            "emptyTable": "No result found"
        },
        pageLength: 15,
        paging: true,
        // sDom: "Rlfrtip",
        dom: 'Bfrtip',
        "ordering": true,
        scrollY: 1000,
        scrollX: false,
    } );
</script>
<style>

table.dataTable thead .sorting{
    background-size: 11px;
    background-image: url("https://devpt.way2track.com/public/arrow.png")
}
table.dataTable thead .sorting_asc{
    background-size: 11px;
    background-image: url("https://devpt.way2track.com/public/arrow.png")
}
table.dataTable thead .sorting_desc{
    background-size: 11px;
    background-image: url("https://devpt.way2track.com/public/arrow.png")
}
</style>
	<table class="table display " id="tableresponsive">
	
			 <thead>
				<tr>
				    <th scope="col" style="display:none;text-align: center;"><span>Sl</span> </th>
					<th scope="col" class="text-center"><span>Item</span></th>
					<th scope="col" style="text-align: center;">@if($isMobileVersion == 1) <span style="width:100%; display:block; text-align: center;">Image</span> @else <span style="width:100%x; display:block;text-align: center;">Image</span> @endif</th>
					@if($isMobileVersion != 1) <th scope="col" style="width: 250px; block;text-align: center;"><span style="width: 250px;display: block;text-align: center;">Description</span></th> @endif
					@if($isMobileVersion == 1) 
					    <th scope="col" style="width:70px; padding-right: 0px;text-align: center;">
					        <span style="width:70px; display:block">Quantity</span> </th>
					    </th>
					@else
					    <th scope="col" style="width:110px; padding-right: 0px;text-align: center;">
					        <span style="width:110px; display:block">Quantity</span> </th>
					    </th>
					@endif
					@if($isMobileVersion == 1) 
						<th scope="col" style="width: 80px;text-align: center;" > 	  
						    <span style="width: 100%;display: block; text-align: center;">Fulfilment Status</span> 
						 </th>
					@else 
					    <th scope="col" style="width: 120px;text-align: center;" >  
					        <span style="display: block; text-align: center;"> Fulfilment Status</span> 
					     </th>
					@endif
					@if($isMobileVersion != 1) 
					    <th scope="col" style="text-align:center; width:160px"><span class="good-ready-date">Goods Ready Date</span></th>
						<th scope="col" style="text-align:center;"><span>Ship Date</span></th>
						<th scope="col" style="text-align:center; width: 86%;display: block;"><span>Arrival Date</span></th>
					@endif
				</tr>
			</thead>
		<tbody>
						    @php $sl = 1; @endphp
							@foreach($salesOrderDetails as $salesInfo)
                            {{-- {{ dd($salesInfo) }} --}}
								@php $explodeInfo = explode(' ', $salesInfo->DESCRIPTION  , 12) @endphp

								@php

								    $explodeComment= explode(' ', $salesInfo->COMMENTS  , 11);

								@endphp
                        
							    <tr>
							        <td style="display:none"> <span>{{ $sl ++ }} </td>
									<td  class="text-center">
										<a style="width: 100%; display: block;" class="example-image-link" href="{{ $global_path.'images/'.$salesInfo->THUMBNAIL_IMAGE }}" data-lightbox="example-1"> {{ $salesInfo->ITEM }} </a>
									</td>
									<td>
									    <span>
    										<a style=" display: block;" class="example-image-link" href="{{ $global_path.'images/'.$salesInfo->THUMBNAIL_IMAGE }}" data-lightbox="example-1">
    								            @if($isMobileVersion == 1)
    								                <img style="max-width: 27px; display: block; margin: 0 auto;" class="example-image-link" src="{{ $global_path.'images/'.$salesInfo->THUMBNAIL_IMAGE }}" > 
    								            @else
    								                <img style="max-width: 50px; display: block; margin: 0 auto;    text-align: center;vertical-align: middle;" class="example-image-link" src="{{ $global_path.'images/'.$salesInfo->THUMBNAIL_IMAGE }}" > 
    								            @endif
    								        </a>

                                        </span>
									</td>
									@if($isMobileVersion != 1) 
									<td>
										<div  class="light_box_{{ $salesInfo->ID }}">

												{{  implode(' ', array_slice(str_word_count($salesInfo->DESCRIPTION, 1), 0, 11));     }}

												@if(!empty( $explodeInfo[11]))
													<span class="expend_{{ $salesInfo->ID }}" style="display:none">
														{{ $explodeInfo[11]  }}
													</span>
												@endif


											@if(!empty( $explodeInfo[11]))
												<span style="float: right; color: #000; font-weight: bold;  display: block; width: 100%; text-align: right;"  class="act_{{ $salesInfo->ID }}"><span  class="see-more-data">See more</span></span></span>
											@endif
										</div>
									</td>
									@endif
									<td ><span style=" display:block; text-align:center" class="qty_block"> {{ $salesInfo->QTY }} </span></td>
                                    <td>
                                        
                                        @if( !empty($salesInfo->COLOR_CODE) )
                                            <span class="shippped-status" style="width: 120px;text-align: center;display: block; color:{{ $salesInfo->COLOR_CODE }}">{{ $salesInfo->EX_COMMENTS }}</span>
                                     
                                        @else
                                            <span class="proccessing-status" style="width: 120px;text-align: center;display: block; color:#222">{{ $salesInfo->EX_COMMENTS }}</span>
                                       
                                        @endif
                                    </td>
                                    @if($isMobileVersion != 1) 
                                    <td style="text-align:center;">
                                        @php 
                                            $supplier = explode(',', $salesInfo->SUPPLIER);
                                           
                                         
                                            $purchaseInfo = DB::table('w2t_po_header')
                                                ->where('WIP', $salesInfo->WIP)
                                                //->whereIn('SUPPLIER_NAME', $supplier)
                                                ->pluck('PO_NO');
                                            
                                       
                                            $purchaseHeaderInfoDate = DB::table('w2t_po_details')
                                                ->whereIn('PO_NO', $purchaseInfo)
                                                ->where('ITEM', $salesInfo->ITEM)
                                                ->pluck('CONFIRMED_EXF');
                                            
                                            
                                            $shipmentDetailsInfo = DB::table('w2t_shipment_details')
                                                ->whereIn('PO_NO', $purchaseInfo)
                                                ->where('WIP', $salesInfo->WIP)
                                                ->where('ITEM', $salesInfo->ITEM)
                                                ->pluck('ETD');
                                                
                                            $shipmentSHIPMENTRECDDATEDetailsInfo = DB::table('w2t_shipment_details')
                                                ->whereIn('PO_NO', $purchaseInfo)
                                                ->where('WIP', $salesInfo->WIP)
                                                ->where('ITEM', $salesInfo->ITEM)
                                                ->pluck('SHIPMENT_RECD_DATE');
                                                
                                        @endphp
                                        
                                        @foreach($purchaseHeaderInfoDate as $date)
                                            @if(!empty( $date))
                                                @php
                                                    $date = date("d M  Y", strtotime(  $date));
                                                @endphp
                                                {{ $date }}
                                            @else
                                                {{   $date }}
                                            @endif
                                        @endforeach
                                    
                                    </td>
                                     <td style="text-align:center;">
                                        
                                        @foreach($shipmentDetailsInfo as $date)
                                            @if(!empty( $date))
                                                @php
                                                    $date = date("d M  Y", strtotime(  $date));
                                                @endphp
                                                {{ $date }}
                                            @else
                                                {{   $date }}
                                            @endif
                                        @endforeach
                                        
                                       
                                    
                                    </td>
                                     <td style="text-align:center;">
                                        
                                        @foreach($shipmentSHIPMENTRECDDATEDetailsInfo as $date)
                                            @if(!empty( $date))
                                                @php
                                                    $date = date("d M  Y", strtotime(  $date));
                                                @endphp
                                                {{ $date }}
                                            @else
                                                {{   $date }}
                                            @endif
                                        @endforeach
                                    
                                    </td> 
                                    @endif
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
                                    	  		$(".act_{{ $salesInfo->ID }}").html('<span class="see-more-data">Less<span>');
                                    	  		$(".act_{{ $salesInfo->ID }}").addClass('less_{{ $salesInfo->ID }}');

                                    		});

                                    		$(document).on('click', '.expend_active_{{ $salesInfo->ID }}', function() {
                                                $(".less_{{ $salesInfo->ID }}").html('<span class="see-more-data">See more</span>');
                                                $('.light_box_{{ $salesInfo->ID }}').removeClass('expend_active_{{ $salesInfo->ID }}');
                                    		});

                                    	});
                                    	</script>
						    @endforeach
						</tbody>
	</table>