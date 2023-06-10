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
               
                DATE: {{ $SHIPMENT_RECD_DATE }}
                <input type="hidden" value="{{ $SHIPMENT_RECD_DATE }}" name="SHIPMENT_RECD_DATE_s" id="SHIPMENT_RECD_DATE_s">
            </div>
        </div>
        <div id="shipment_result">
                <table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
                    <thead>
                        
                        <tr>
                            <th scope="col"  style="display:none !important">SL</th>
                            <th scope="col">Shipment ID</th>
                            <th scope="col">PO No</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shipment as $shipmenIDtInfo)
                              
                            @php $sl = 1;
                           
                                $shipmentInfo = DB::table('w2t_shipment_details')
                                    ->where('SHIPMENT_ID', $shipmenIDtInfo->SHIPMENT_ID)
                                    ->where('SHIPMENT_RECD_DATE', $SHIPMENT_RECD_DATEs)
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
                    					    {{ $shipmenIDtInfo->SHIPMENT_ID }}
                    					 </div>
                    				  </td>
                                     <td >
                                         <span class="po_no">
                    						<span id="PO_NO_{{ $shipmenIDtInfo->SHIPMENT_ID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
                    						<input type="hidden" value="{{ $shipmenIDtInfo->SHIPMENT_ID }}" name="shipment_id_list[]" id="shipment_id" >
                    						<!--<input type="hidden" value="{{ $shipmenIDtInfo->SHIPMENT_ID}}" name="shipment_id[]" id="shipment_id" >-->
                    						<!--<input type="text" value="{{ $poOrderHeadersInfo->PO_NO }}" name="po_number[]" id="po_number" class="editbox" id="PO_NO_input_{{ $shipmenIDtInfo->SHIPMENT_ID }}" style="display:none">-->
                    					</span>
                    				  </td>
                                </tr>
                            @endforeach
                        
                        @endforeach
                    </tbody>
                </table>
        </div>
        <button class="btn btn-success assign_button_result" >Assign to GRN</button>
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
            url: window.baseUrl + '/grn/reports/generate',
            success:function(data) {
            	if($.isEmptyObject(data.error)){
                    Swal.fire(
<<<<<<< HEAD
                      'Success!',
                      'Your report has been created',
                      'Success'
=======
                      'success!',
                      'Your record has been add',
                      'success'
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                    );
                    // window.location.href = window.baseUrl + '/grn/reports/pdf/' +data.SHD_GRN_NUMBER ;
                    $('#modal-lg').modal('hide');
                    $.ajax({
                        type: "POST",
                        url: baseUrl +'/grn/generate/list', 
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'SHIPMENT_RECD_DATE': $('input[name=SHIPMENT_RECD_DATE]').val(),
                         
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
    function assign_item() {
        var wip_number = [];
            $.each($("input[name='wip_number']:checked"), function(){            
                wip_number.push($(this).val());
        });
        
        var po_number = [];
            $.each($("input[name='po_number']:checked"), function(){            
                po_number.push($(this).val());
        });

        var itemID = $("#itemID").val();
     
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/assign/shipment', 
            data: {
                '_token': $('input[name=_token]').val(),
                'WIPNumber': wip_number,
                'po_number': po_number,
                'itemID': itemID,
            },
            success: function(result1) { 
                $('.assignResult').html('<div class="alert alert-primary" role="alert">Susccesfully assigned </div>');
                
                $.ajax({
                    type: "POST",
                    url: baseUrl +'/list/shipped/single/order/details', 
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'shiped_id': itemID,
                        'type': 1,
                    },
                    success: function(result) { 
                          window.location.replace(baseUrl +'/list/purchase/order/assign/shipment/token/' + result1);
                          
                        $('#resultOfShipmentResult').html(result);
                        
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