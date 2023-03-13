<!--<script src="{{ URL::asset( 'assets/jquery-2.1.3.min.js' ) }}" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' ) }}"></script>
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
		    @php $sl = 1; @endphp
			@foreach($commentsInfo as $salesInfo)
            {{-- {{ dd($salesInfo) }} --}}
				@php $explodeInfo = explode(' ', $salesInfo->DESCRIPTION  , 12) @endphp

				@php

				    $explodeComment= explode(' ', $salesInfo->COMMENTS  , 11);

				@endphp
        
			    <tr>
			        <td style="display:none"> {{ $sl ++ }} </td>
					<th>
						<a style="width: 120px; display: block;" class="example-image-link" href="{{ URL::asset( 'images/'. $salesInfo->THUMBNAIL_IMAGE) }}" data-lightbox="example-1"> {{ $salesInfo->ITEM }} </a>
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
                    <td>
                          @php
                                $date = date("d M  Y", strtotime( $salesInfo->EXP_DELIVERY));
                            @endphp
                            {{ $date }}
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