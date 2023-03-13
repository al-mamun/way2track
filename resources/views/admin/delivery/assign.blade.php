<style>
    .modal-dialog.modal-lg {
        width: 481px;
    }
    span.po_date {
        width: 95px;
        display: block;
        text-align: center;
    }
    .check_box_wip_no {
        width: 221px;
    }
    h4.modal-title {
        font-size: 17px;
    }
    .dataTables_filter label {
        float: right;
    }
    span.po_no {
        width: 221px;
        display: block;
    }
    /*div#tableResponsive2_filter {*/
    /*    margin-top: -72px;*/
    /*}*/
</style>
<div class="assignResult"></div>
<button class="btn btn-success  assign_button_result"  onclick='assign_item()'>Assign</button>
<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <!--<th scope="col"  style="display:none !important">SL</th>-->
            <th scope="col">Shipment ID</th>
            <th scope="col">PO No</th>
         
        </tr>
    </thead>
    <tbody>
    @php $sl = 1; @endphp
        @foreach($deliveryInfo as $key => $deliveryHeadersInfo)
            
            <tr id="{{ $deliveryInfo[$key]['SHIPMENT_ID'] }}">
                    <!--<td  style="display:none !important"> {{ $sl++ }}</td>-->
                @php
                    $shipmentInfo = DB::table('w2t_shipment_details')
                        ->where('SHIPMENT_ID', $deliveryInfo[$key]['SHIPMENT_ID'])
                        ->first();
                @endphp
                 <td >
                     <div class="check_box_wip_no">
                     	<input type="checkbox" id="SHIPMENT_ID" name="SHIPMENT_ID" value="{{ $deliveryInfo[$key]['SHIPMENT_ID'].','. $deliveryInfo[$key]['PO_NO']}}">
					    {{  $deliveryInfo[$key]['SHIPMENT_ID'] }}
					 </div>
				  </td>
                 <td >
                  
                     @if(!empty( $deliveryInfo[$key]['PO_NO']))
                     <span class="po_no">
						<span id="PO_NO" class="text">{{ $deliveryInfo[$key]['PO_NO'] }}</span>
						<input type="text" value="{{ $deliveryInfo[$key]['PO_NO'] }}" class="editbox" id="PO_NO_input" style="display:none">
					</span>
					@endif
				  </td>
			    
			    </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(".close").click(function(){
        $('#modal-lg').modal('hide');
    });
     
    function assign_item() {
        
        var SHIPMENT_ID = [];
            $.each($("input[name='SHIPMENT_ID']:checked"), function(){            
                SHIPMENT_ID.push($(this).val());
        });

        var itemID = $("#itemID").val();
     
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/delivery/order/assign/shipment', 
            data: {
                '_token': $('input[name=_token]').val(),
                'SHIPMENT_ID': SHIPMENT_ID,
                'itemID': itemID,
            },
            success: function(result1) { 
                
                    $('.assignResult').html('<div class="alert alert-primary" role="alert">Susccesfully assigned </div>');
                    
                    $.ajax({
                    type: "POST",
                    url: baseUrl +'/list/delivery/single/order/details', 
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'DELIVERY_ID': itemID,
                    
                        'type': 1,
                    },
                    success: function(result) { 
                        window.location.replace(baseUrl +'/edit/delivery/detail/token/' + result1);
                        $('#resultOfShipmentResult').html(result1);
                         $('#modal-lg').modal('hide');
                    
                    }
                   
                });
            }
        });
    }
    
    $('#tableResponsive2').DataTable( {
        buttons: [
        
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