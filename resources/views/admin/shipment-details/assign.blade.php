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
        width: 156px;
    }
    h4.modal-title {
        font-size: 17px;
    }
    .dataTables_filter label {
        float: right;
    }
    span.po_no {
        width: 116px;
        display: block;
    }
    div#tableResponsive2_filter {
        margin-top: -72px;
    }
</style>
<div class="assignResult"></div>
<button class="btn btn-success"  onclick='assign_item()'>Assign</button>
<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <!--<th scope="col"  style="display:none !important">SL</th>-->
            <th scope="col">WIP</th>
            <th scope="col">PO No</th>
            <th scope="col">PO Date</th>
 
        </tr>
    </thead>
    <tbody>
    @php $sl = 1; @endphp
        @foreach($poHeaderInfo as $poOrderHeadersInfo)
            <tr id="{{ $poOrderHeadersInfo->PO_NO }}">
                    <!--<td  style="display:none !important"> {{ $sl++ }}</td>-->
                 <td >
                     <div class="check_box_wip_no">
                     	<input type="checkbox" id="wip_number" name="wip_number" value="{{ $poOrderHeadersInfo->WIP }}">
					    {{ $poOrderHeadersInfo->WIP }}
					 </div>
				  </td>
                 <td >
                     <span class="po_no">
						<span id="PO_NO_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
						<input type="text" value="{{ $poOrderHeadersInfo->PO_NO }}" class="editbox" id="PO_NO_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
					</span>
				  </td>
			    <td >
					<span class="po_date">{{ $poOrderHeadersInfo->PO_DATE }}</span>
				
			    </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">

    function assign_item() {
        var wip_number = [];
            $.each($("input[name='wip_number']:checked"), function(){            
                wip_number.push($(this).val());
        });

        var itemID = $("#itemID").val();
     
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/assign/shipment', 
            data: {
                '_token': $('input[name=_token]').val(),
                'WIPNumber': wip_number,
                'itemID': itemID,
            },
            success: function(result) { 
                $('.assignResult').html('<div class="alert alert-primary" role="alert">Susccesfully assigned </div>');
            
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