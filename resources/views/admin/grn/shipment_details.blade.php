   
    <table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
        <thead>
            
            <tr>
                <th scope="col"  style="display:none !important">SL</th>
                <th scope="col">Shipment ID</th>
                <th scope="col">PO No</th>
             
            </tr>
        </thead>
        <tbody>
        @php $sl = 1; @endphp
            @foreach($shipmentInfo as $poOrderHeadersInfo)
                <tr id="{{ $poOrderHeadersInfo->PO_NO }}">
                        <td  style="display:none !important"> {{ $sl++ }}</td>
                     <td >
                         <div class="check_box_wip_no">
                         	<input type="checkbox" id="po_number" name="po_number[]" value="{{$poOrderHeadersInfo->PO_NO }}" checked>
    					    {{ $shipmentID }}
    					 </div>
    				  </td>
                     <td >
                         <span class="po_no">
    						<span id="PO_NO_{{ $shipmentID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
    						<input type="hidden" value="{{ $shipmentID}}" name="shipment_id_list[]" id="shipment_id" >
    						<!--<input type="text" value="{{ $poOrderHeadersInfo->PO_NO }}" name="po_number[]" id="po_number" class="editbox" id="PO_NO_input_{{ $shipmentID }}" style="display:none">-->
    					</span>
    				  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
