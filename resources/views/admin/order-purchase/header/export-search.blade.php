<<<<<<< HEAD
<table id="tableResponsive7" class="table table-bordered table-hover table-responsive"  style="width:100%;">
=======
<table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    <thead>
        <tr>
            <!--<th scope="col"  style="display:none !important">SL</th>-->
             @foreach($columnSync as $key => $value)
                @if(!empty($value))
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  3)
                            ->first();

                    @endphp
                    @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <th scope="col">{{ $exp[1] }} </th>
                     @endif
                @endif
             
             @endforeach
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $sl = 1; @endphp
        @foreach($poOrderHeaders as $poOrderHeadersInfo)
        <tr id="{{ $poOrderHeadersInfo->PO_NO }}" @if(isset($id)) class="selected table_row_{{$poOrderHeadersInfo->ID }}" @else class="table_row_{{$poOrderHeadersInfo->ID }}" @endif >
                <!--<td  style="display:none !important"> {{ $sl++ }}</td>-->
                @foreach($columnSync as $key => $value)
                    @if(!empty($value))
                        @php
                            $exp = explode('_', $value);
                            
                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                ->where('page_name', $exp[1])
                                ->where('type',  3)
                                ->first();
    
                        @endphp
                        @if($exp[1] == 'WIP' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editWIPno" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="WIP_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->WIP }}</span>
        						<input type="text" value="{{ $poOrderHeadersInfo->WIP }}" class="editbox" id="WIP_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
                        @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editPONo" id="{{ $poOrderHeadersInfo->ID }}">
                        		<span id="PO_NO_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->PO_NO }}</span>
                        		<input type="text" value="{{ $poOrderHeadersInfo->PO_NO }}" class="editbox" id="PO_NO_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
                          </td>
                           
                            
                           
                        @endif
                        @if($exp[1] == 'PO Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editPO_DATE" id="{{ $poOrderHeadersInfo->ID }}">
<<<<<<< HEAD
        						<span id="PO_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
=======
        						<span id="PO_DATE_{{ $poOrderHeadersInfo->ID }}" class="text">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        						     @if(!empty($poOrderHeadersInfo->PO_DATE))
            				            @php $PO_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->PO_DATE))  @endphp
            				        @else
            				            @php $PO_DATE =$poOrderHeadersInfo->PO_DATE; @endphp
            				        @endif
            		                    {{ $PO_DATE }}
    
        						   </span>
        						<input type="date" value="{{ $poOrderHeadersInfo->PO_DATE }}" class="editbox" id="PO_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'PO Status' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                        @if($exp[1] == 'PO status' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            <td style="background-color:#E8ECF1;" class="editPO_STATUS" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="PO_STATUS_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->PO_STATUS }}</span>
        						<input type="text" value="{{ $poOrderHeadersInfo->PO_STATUS }}" class="editbox" id="PO_STATUS_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
        				    
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'Supplier' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                        @if($exp[1] == 'Supplier Name' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            <td style="background-color:#E8ECF1;" class="editSUPPLIER_NAME" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="SUPPLIER_NAME_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->SUPPLIER_NAME }}</span>
        						<input type="text" value="{{ $poOrderHeadersInfo->SUPPLIER_NAME }}" class="editbox" id="SUPPLIER_NAME_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
                        @if($exp[1] == 'Supplier Site' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editSUPPLIER_SITE" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="SUPPLIER_SITE_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->SUPPLIER_SITE }}</span>
        						<input type="text" value="{{ $poOrderHeadersInfo->SUPPLIER_SITE }}" class="editbox" id="SUPPLIER_SITE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
<<<<<<< HEAD
                         @if($exp[1] == 'Reqd GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editREQD_EXF_DATE" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="REQD_EXF_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
=======
                         @if($exp[1] == 'REQD EXF Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editREQD_EXF_DATE" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="REQD_EXF_DATE_{{ $poOrderHeadersInfo->ID }}" class="text">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        						     @if(!empty($poOrderHeadersInfo->REQD_EXF_DATE))
            				            @php $REQD_EXF_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->REQD_EXF_DATE))  @endphp
            				        @else
            				            @php $REQD_EXF_DATE =$poOrderHeadersInfo->REQD_EXF_DATE; @endphp
            				        @endif
            		                    {{ $REQD_EXF_DATE }}
        						   </span>
        						<input type="date" value="{{ $poOrderHeadersInfo->REQD_EXF_DATE }}" class="editbox" id="REQD_EXF_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'Ack No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                        @if($exp[1] == 'ACK No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            <td style="background-color:#E8ECF1;" class="editACK_NO" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="ACK_NO_{{ $poOrderHeadersInfo->ID }}" class="text">{{ $poOrderHeadersInfo->ACK_NO }}</span>
        						<input type="text" value="{{ $poOrderHeadersInfo->ACK_NO }}" class="editbox" id="ACK_NO_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'Ack Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editACK_DATE" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="ACK_DATE_{{ $poOrderHeadersInfo->ID }}" class="text"  style="width:86px; display:block; text-align:center">
=======
                        @if($exp[1] == 'ACK Date' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <td style="background-color:#E8ECF1;" class="editACK_DATE" id="{{ $poOrderHeadersInfo->ID }}">
        						<span id="ACK_DATE_{{ $poOrderHeadersInfo->ID }}" class="text">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        						    @if(!empty($poOrderHeadersInfo->ACK_DATE))
            				            @php $ACK_DATE = date("d M  Y", strtotime($poOrderHeadersInfo->ACK_DATE))  @endphp
            				        @else
            				            @php $ACK_DATE =$poOrderHeadersInfo->ACK_DATE; @endphp
            				        @endif
            				        {{ $ACK_DATE }}
        						</span>
        						<input type="date" value="{{ $poOrderHeadersInfo->ACK_DATE }}" class="editbox" id="ACK_DATE_input_{{ $poOrderHeadersInfo->ID }}" style="display:none">
        				    </td>
                        @endif
                    @endif
                        
                @endforeach
                    
    
                
                <td>
                     @can('check po and details')
                    <a href="{{ URL::to( 'purchase/order/detail/view/' . $poOrderHeadersInfo->PO_NO) }}" type="button" class="btn btn-block btn-info btn-sm">Details</a>
                    @endcan
                    <!--<a href="{{ URL::to( '/purchase/order/list/edit/' . $poOrderHeadersInfo->ID) }}" type="button" class="btn btn-block btn-success btn-sm">Edit</a>-->
                    <!--<a href="javascript:void(0)" type="button" class="btn btn-block btn-success btn-sm" onclick="edit('{{ $poOrderHeadersInfo->ID }}')">Edit</a>-->
                    <button  onClick="deleteData('{{$poOrderHeadersInfo->ID}}')" id="po_header_delete" type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
                    <!--<a href="{{ route('purchase.delete',$poOrderHeadersInfo->ID) }}" type="button" class="btn btn-block btn-danger btn-sm">Delete</a>-->
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
        function deleteData(ID) {
             Swal.fire({
              title: 'Are you sure?',
              text: "Be careful please !  All related details will be deleted with this.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                
              if (result.isConfirmed) {
                // window.location.href = link;
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'ID': ID,
                      
                    },
                    url: baseUrl +'/purchase/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('.table_row_'+ID).hide();
                        Swal.fire(
                          'Deleted!',
                          'Your record has been deleted',
                          'success'
                        );
                    }
                
                });
              }
            
        
        });
  
    }
    function edit(ID) {
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        $("#PO_DATE_"+ID).hide();
        $("#PO_DATE_input_"+ID).show();
        
        $("#PO_STATUS_" + ID ).hide();
        $("#PO_STATUS_input_"+ID).show();
        
        $("#SUPPLIER_NAME_"+ID).hide();
        $("#SUPPLIER_NAME_input_"+ID).show();
        
        $("#SUPPLIER_SITE_"+ID).hide();
        $("#SUPPLIER_SITE_input_"+ID).show();
        
        $("#REQD_EXF_DATE_"+ID).hide();
        $("#REQD_EXF_DATE_input_"+ID).show();
        
        $("#ACK_NO_" + ID ).hide();
        $("#ACK_NO_input_"+ID).show();
        
        $("#ACK_DATE_"+ID).hide();
        $("#ACK_DATE_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
    }
    
    $(document).on('keyup click', '.editWIPno', function() {
    
        var ID    = $(this).attr('id');
        
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WIP_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WIP': $("#WIP_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#WIP_"+ID).html(first);
                }
            });
        
        }).change(function() {});
    
    $(document).on('keyup click', '.editPONo', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_NO': $("#PO_NO_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#PO_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    $(document).on('keyup click change', '.editPO_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_DATE_"+ID).hide();
        $("#PO_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_DATE': $("#PO_DATE_input_"+ID).val(),
                'type':3
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#PO_DATE_"+ID).html(date);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editPO_STATUS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#PO_STATUS_" + ID ).hide();
        $("#PO_STATUS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_STATUS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_STATUS': $("#PO_STATUS_input_"+ID).val(),
                'type': 4
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#PO_STATUS_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editSUPPLIER_NAME', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_NAME_"+ID).hide();
        $("#SUPPLIER_NAME_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_NAME_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER_NAME': $("#SUPPLIER_NAME_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#SUPPLIER_NAME_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editSUPPLIER_SITE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_SITE_"+ID).hide();
        $("#SUPPLIER_SITE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_SITE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER_SITE': $("#SUPPLIER_SITE_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#SUPPLIER_SITE_"+ID).html(first);
                }
            });
    
    })
    .change(function() { });
    
    $(document).on('keyup click change', '.editREQD_EXF_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#REQD_EXF_DATE_"+ID).hide();
        $("#REQD_EXF_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#REQD_EXF_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'REQD_EXF_DATE': $("#REQD_EXF_DATE_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#REQD_EXF_DATE_"+ID).html(date);
                }
            });
    
    }).change(function() { });
    
    $(document).on('keyup click', '.editACK_NO', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ACK_NO_" + ID ).hide();
        $("#ACK_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACK_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACK_NO': $("#ACK_NO_input_"+ID).val(),
                'type': 8
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ACK_NO_"+ID).html(first);
                }
            });
    
    }).change(function() { });
     
    $(document).on('keyup click change', '.editACK_DATE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ACK_DATE_"+ID).hide();
        $("#ACK_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACK_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACK_DATE': $("#ACK_DATE_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/purchase_update' , 
            success: function(date) {
                $("#ACK_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    $(document).on('keyup click', '.editETD', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETD_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETD': $("#ETD_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ETD_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editETA', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETA': $("#ETA_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/purchase_update' , 
            success: function(html) {
                $("#ETA_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
<<<<<<< HEAD
$('#tableResponsive7').DataTable( {
    buttons: [
        @if(isset($status) && $status != 1)
=======
$('#tableResponsive2').DataTable( {
    buttons: [
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
      {
            extend: 'excelHtml5',
            text:'Export',
            title:'Export Purchase Order',
            exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7,8 ]
            }
        }
<<<<<<< HEAD
        @endif
    ],
    // "columns": [
    //     { "width": "20%" },
    //     { "width": "80%" },
    //     ],
    "autoWidth": false,
    
    retrieve: true,

=======
    ],

    retrieve: true,
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    language: {
      "emptyTable": "No result found"
    },
    pageLength: 10,
    paging: true,
    // sDom: "Rlfrtip",
    dom: 'Bfrtip',
} );
</script>