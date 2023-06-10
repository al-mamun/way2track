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
    /*div#tableResponsive2_filter {*/
    /*    margin-top: -72px;*/
    /*}*/
    table#tableResponsive2 {
    width: 100% !important;
    /* float: left; */
}
</style>
<div class="assignResult"></div>
 <form id="pageSubmit" method="post" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <div class="assing_button_result">
    
        <div class="row">
            <div class="col-md-6">
               
                DATE: {{ $DELIVERY_RECD_DATE }}
                <input type="hidden" value="{{ $DELIVERY_RECD_DATE }}" name="DELIVERY_RECD_DATE_s" id="DELIVERY_RECD_DATE_s">
            </div>
        </div>
        <div id="shipment_result">
                <table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
                    <thead>
                        
                        <tr>
                            <th scope="col"  style="display:none !important">SL</th>
                            <th scope="col">Delivery ID</th>
                            <th scope="col">PO No</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deliveryInfo as $deliveryIDInfo)
                              
                            @php $sl = 1;
                           
                                $shipmentInfo = DB::table('w2t_delivery_detail')
                                    ->where('DELIVERY_ID', $deliveryIDInfo->DELIVERY_ID)
                                   
                                    ->select('PO_NO')
                                    ->groupBy('PO_NO')
                                    ->get();
                            @endphp
                            
                            @foreach($shipmentInfo as $poOrderHeadersInfo)
                                <tr id="{{ $poOrderHeadersInfo->PO_NO }}">
                                        <td  style="display:none !important"> {{ $sl++ }}</td>
                                     <td >
                                         <div class="check_box_wip_no">
                                         	<input type="checkbox" id="po_number" name="po_number[]" value="{{$poOrderHeadersInfo->PO_NO }}" checked>
                    					    {{ $deliveryIDInfo->DELIVERY_ID }}
                    					 </div>
                    				  </td>
                                     <td >
                                         <span class="po_no">
                    						<span id="PO_NO_{{ $deliveryIDInfo->DELIVERY_ID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
                    						<input type="hidden" value="{{ $deliveryIDInfo->DELIVERY_ID }}" name="delivery_id_list[]" id="delivery_id" >
                    					
                    					</span>
                    				  </td>
                                </tr>
                            @endforeach
                        
                        @endforeach
                    </tbody>
                </table>
        </div>
        <button class="btn btn-success assign_button_result" >Assign to DO</button>
    </div>
<script type="text/javascript">

    $('#pageSubmit').on('submit', function(event) {
    	event.preventDefault();                          // for demo
     
        $.ajax({
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            url: window.baseUrl + '/do/reports/generate',
            success:function(data) {
            	if($.isEmptyObject(data.error)){
                    Swal.fire(
                      'Success!',
                      'Your report has been created',
                      'success'
                    );
                    // window.location.href = window.baseUrl + '/grn/reports/pdf/' +data.SHD_GRN_NUMBER ;
                    $('#modal-lg').modal('hide');
                    $.ajax({
                        type: "POST",
                        url: baseUrl +'/delivery/order/report/generate/list', 
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'DELIVERY_RECD_DATE': $('input[name=DELIVERY_RECD_DATE]').val(),
                         
                        },
                        success: function(result) { 
                            
                            $('#grn_generate_list').html(result);
                             
                        
                        }
                    });  
                }else{
                    printErrorMsg(data.error);
                }
               
               
            }
        }); 
    });
    
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    $(".close").click(function(){
        $('#modal-lg').modal('hide');
    });
    
    function shipmentIdwisePoNo() {
        
         $.ajax({
            type: "POST",
            url: baseUrl +'/grn/generate/shipmentid/wise/list', 
            data: {
                '_token': $('input[name=_token]').val(),
                'shipment_id': $('#shipment_id').val(),
                'SHIPMENT_RECD_DATE': $('#SHIPMENT_RECD_DATE_s').val(),
            },
            success: function(result1) { 
                $('#shipment_result').html(result1);
                
               
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