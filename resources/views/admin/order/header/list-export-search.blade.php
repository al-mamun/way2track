<table id="tableResponsive2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col" style="display:none">Sl</th>
            <th scope="col">WIP</th>
            <th scope="col">Customer</th>
            <th scope="col">Customer Po No</th>
            <th scope="col"><span style="width:100px; display:block">Status</span></th>
            <th scope="col">Project Name</th>
            <th scope="col">Expected Handover Date</th>
            <th scope="col">Salesperson Name </th>
            <th scope="col">Project Manager Name</th>
            <th scope="col">Salesperson Email</th>
            <th scope="col">Project Manager Email</th>
            <th scope="col">Comments</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $sl = 1; @endphp
        @foreach($saledOrderHeaders as $salesOrderInfo)
        <tr id="{{ $salesOrderInfo->WIP }}">
            <td  style="display:none">{{ $sl++ }}</td>
             <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $salesOrderInfo->ID }}">
				<span id="wip_{{ $salesOrderInfo->ID }}" class="text">{{ $salesOrderInfo->WIP }}</span>
				<input type="text" value="{{ $salesOrderInfo->WIP }}" class="editbox" id="wip_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
            <td style="background-color:#E8ECF1;" class="edit_CUSTOMER_NAME" id="{{ $salesOrderInfo->ID }}">
				<span id="CUSTOMER_NAME_{{ $salesOrderInfo->ID }}" class="textStatus"> {{ $salesOrderInfo->CUSTOMER_NAME }}</span>
				<input type="text" value="{{ $salesOrderInfo->CUSTOMER_NAME }}" class="editboxStatus" id="CUSTOMER_NAME_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>

            <td style="background-color:#E8ECF1;" class="edit_CUSTOMER_PO_NO" id="{{ $salesOrderInfo->ID }}">
				<span id="CUSTOMER_PO_NO_{{ $salesOrderInfo->ID }}" class="textStatus"> {{ $salesOrderInfo->CUSTOMER_PO_NO }}  </span>
				<input type="text" value="{{ $salesOrderInfo->CUSTOMER_PO_NO }}" class="editboxStatus" id="CUSTOMER_PO_NO_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
		 	
            <td style="background-color:#E8ECF1;" class="edit_status" id="{{ $salesOrderInfo->ID }}">
				 <span id="status_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->SO_STATUS }}</span>

		        <select name="status"  class="form-control editboxStatus" aria-label="Default select example" required id="status_input_{{ $salesOrderInfo->ID }}" style="display:none">
                    <option value="" selected>Select Status</option>
                    <option value="LIVE" @if($salesOrderInfo->SO_STATUS=='LIVE')  selected @endif>Live</option>
                    <option value="CLOSED" @if($salesOrderInfo->SO_STATUS=='CLOSED')  selected @endif>Closed</option>
                    <option value="CANCELLED"  @if($salesOrderInfo->SO_STATUS=='CANCELLED')  selected @endif>Cancelled</option>
                </select>
		 	</td>
		 	<td style="background-color:#E8ECF1;" class="PROJECT_NAME_click" id="{{ $salesOrderInfo->ID }}">
				<span id="PROJECT_NAME_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->PROJECT_NAME }}</span>
				<input type="text" value="{{ $salesOrderInfo->PROJECT_NAME }}" class="editboxStatus" id="PROJECT_NAME_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
                <!--<td>{{ $salesOrderInfo->SO_STATUS }}</td>-->
            @php 
                $date = date("d M  Y", strtotime( $salesOrderInfo->TGT_HANDOVER_DT)); 
            @endphp
                
            <td style="background-color:#E8ECF1;" class="edit_hand_over_date" id="{{ $salesOrderInfo->ID }}">
				<span id="hand_over_{{ $salesOrderInfo->ID }}" class="textStatus"> {{ $date }}</span>
				<input type="date" value="{{ $date }}" class="editboxStatus" id="hand_over_input_{{ $salesOrderInfo->ID }}" name="TGT_HANDOVER_DT" style="display:none">
		 	</td>
		 	<td style="background-color:#E8ECF1;" class="SALESPERSON_click" id="{{ $salesOrderInfo->ID }}">
				<span id="SALESPERSON_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->SALESPERSON }}</span>
				<input type="text" value="{{ $salesOrderInfo->SALESPERSON }}" class="editboxStatus" id="SALESPERSON_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
		 	<td style="background-color:#E8ECF1;" class="PROJECTMANAGER_click" id="{{ $salesOrderInfo->ID }}">
				<span id="PROJECTMANAGER_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->PROJECTMANAGER }}</span>
				<input type="text" value="{{ $salesOrderInfo->PROJECTMANAGER }}" class="editboxStatus" id="PROJECTMANAGER_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
		 	
		 	<td style="background-color:#E8ECF1;" class="SALESPERSON_EMAIL_click" id="{{ $salesOrderInfo->ID }}">
				<span id="SALESPERSON_EMAIL_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->SALESPERSON_EMAIL }}</span>
				<input type="text" value="{{ $salesOrderInfo->SALESPERSON_EMAIL }}" class="editboxStatus" id="SALESPERSON_EMAIL_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
		 	
            <td style="background-color:#E8ECF1;" class="PROJECTMANAGER_EMAIL_click" id="{{ $salesOrderInfo->ID }}">
				<span id="PROJECTMANAGER_EMAIL_{{ $salesOrderInfo->ID }}" class="textStatus">{{ $salesOrderInfo->PROJECTMANAGER_EMAIL }}</span>
				<input type="text" value="{{ $salesOrderInfo->PROJECTMANAGER_EMAIL }}" class="editboxStatus" id="PROJECTMANAGER_EMAIL_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
		 	
        <!--    <td>{{ $salesOrderInfo->TGT_HANDOVER_DT }}</td> -->
           
            <td style="background-color:#E8ECF1;" class="COMMENTS_click" id="{{ $salesOrderInfo->ID }}">
				<span id="COMMENTS_{{ $salesOrderInfo->ID }}" class="textStatus"> {{$salesOrderInfo->COMMENTS }}</span>
				<input type="text" value="{{ $salesOrderInfo->COMMENTS }}" class="editboxStatus" id="COMMENTS_input_{{ $salesOrderInfo->ID }}" style="display:none">
		 	</td>
         
            <td>
                <a href="{{ URL::to( 'sales/send/email/' . $salesOrderInfo->ID) }}" type="button" class="btn btn-block btn-info btn-sm">Send Url</a>
                @can('check po and details')
                <a href="{{ URL::to( 'list/order/detail/list/' . $salesOrderInfo->WIP) }}" type="button" class="btn btn-block btn-primary btn-sm">Details</a>
                @endcan
                <!--<a href="javascript:void(0)" type="button" class="btn btn-block btn-success btn-sm" onclick="edit('{{ $salesOrderInfo->ID }}')">Edit</a>-->
                <button  onClick="deleteData('{{$salesOrderInfo->WIP}}')" id="salesOrderDelete" type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach
 
    </tbody>
    <tfoot>
        <tr>
            <th  style="display:none">SL.</th>
             <th scope="col">WIP</th>
            <th scope="col">Customer</th>
            <th scope="col">Customer Po No</th>
            <th scope="col">Status</th>
            <th scope="col">Project Name</th>
            <th scope="col">Expected Handover Date</th>
            <th scope="col">Salesperson Name </th>
            <th scope="col">Project Manager Name</th>
            <th scope="col">Salesperson Email</th>
            <th scope="col">Project Manager Email</th>
            <th scope="col">Comments</th>
            <th scope="col">Action</th>
        </tr>
    </tfoot>
</table>
<!-- jQuery -->

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
            url: baseUrl +'/sales/order/delete/'+ ID , 
            success: function(HTML) {
                $('#'+ID).hide();
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

// });
// Edit input box click action
$(".editbox").mouseup(function() {
    return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

// Edit input box click action
$(".editboxStatus").mouseup(function() {
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editboxStatus").hide();
$(".textStatus").show();
});



$('#tableResponsive2').DataTable( {
    buttons: [
        {
            extend: 'excelHtml5',
            text:'Export',
            title:'Export Sales Order',
            exportOptions: {
                columns: [ 1,2,3,4,5,6,7,8,9,10 ]
            }
        }
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

$("tbody tr").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
    
    var id = $(this).attr("id");
$("#wip_hidden").val(id);

});
</script>

<!--<script src="{{ URL::asset( 'admin/plugins/jquery/jquery.min.js') }}"></script>-->

<script>

    function edit(ID) {
        
        $("#wip_input_"+ID).show(); 
        $("#wip_"+ID).hide();
        $("#status_"+ID).hide();
        $("#status_input_"+ID).show();
        $("#hand_over_"+ID).hide();
        $("#hand_over_input_"+ID).show();
        $("#PROJECTMANAGER_EMAIL_"+ID).hide();
        $("#PROJECTMANAGER_EMAIL_input_"+ID).show();
        $("#SALESPERSON_EMAIL_"+ID).hide();
        $("#SALESPERSON_EMAIL_input_"+ID).show();
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        $("#CUSTOMER_NAME_"+ID).hide();
        $("#CUSTOMER_NAME_input_"+ID).show();
        
    }

    $(document).on('keyup click', '.edit_wip_no', function() {
        var ID=$(this).attr('id');
        $("#wip_"+ID).hide();
        $("#wip_input_"+ID).show();
        var ID=$(this).attr('id');
        var first=$("#wip_input_"+ID).val();
    
        $.ajax({
            type: "POST",
            data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'wip_id': $("#wip_input_"+ID).val(),
            'type':1
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#wip_"+ID).html(first);
            }
        });
    
    }).change(function() {
    
    });
    
    $(document).on('keyup click', '.edit_status', function() {
    
        var ID=$(this).attr('id');
        $("#status_"+ID).hide();
        $("#status_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#status_input_"+ID).val();
        
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SO_STATUS': $("#status_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#status_"+ID).html(first);
            }
        });
    
    }).change(function() {
    
    });
    
    $(document).on('keyup click change', '.edit_hand_over_date', function() {
        
        var ID = $(this).attr('id');
        
        $("#hand_over_"+ ID ).hide();
        $("#hand_over_input_"+ ID ).show();
    
        var ID    = $(this).attr('id');
        var first = $("#hand_over_input_"+ID).val();
    
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'hand_over_date': $("#hand_over_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#hand_over_"+ID).html(html);
            }
        });
    
    }).change(function() {});

    
    $(document).on('keyup click change', '.PROJECTMANAGER_EMAIL_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#PROJECTMANAGER_EMAIL_"+ID).hide();
        $("#PROJECTMANAGER_EMAIL_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PROJECTMANAGER_EMAIL_input_"+ID).val();
    
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PROJECTMANAGER_EMAIL': $("#PROJECTMANAGER_EMAIL_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/sales_update' , 
                success: function(html) {
                $("#PROJECTMANAGER_EMAIL_"+ID).html(first);
            }
        });
    
    }).change(function() {});

    
    $(document).on('keyup click change', '.SALESPERSON_EMAIL_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#SALESPERSON_EMAIL_"+ID).hide();
        $("#SALESPERSON_EMAIL_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SALESPERSON_EMAIL_input_"+ID).val();
        
        $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'SALESPERSON_EMAIL': $("#SALESPERSON_EMAIL_input_"+ID).val(),
            'type':5
            },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#SALESPERSON_EMAIL_"+ID).html(first);
        }
    });
    
    }).change(function() {});
    
    $(document).on('keyup click change', '.COMMENTS_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#COMMENTS_input_"+ID).val();
    
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'COMMENTS': $("#COMMENTS_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    
    }).change(function() {});
    
    
    $(document).on('keyup click change', '.edit_CUSTOMER_NAME', function() {
    
    var ID = $(this).attr('id');
    
    $("#CUSTOMER_NAME_"+ID).hide();
    $("#CUSTOMER_NAME_input_"+ID).show();
    
    var ID    = $(this).attr('id');
    var first = $("#CUSTOMER_NAME_input_"+ID).val();
    
    $.ajax({
        type: "POST",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).attr('id'),
            'CUSTOMER_NAME': $("#CUSTOMER_NAME_input_"+ID).val(),
            'type':7
        },
        url: baseUrl +'/sales_update' , 
        success: function(html) {
            $("#CUSTOMER_NAME_"+ID).html(first);
        }
    });
    
    }).change(function() {
    
    });
     $(document).on('keyup click change', '.PROJECT_NAME_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#PROJECT_NAME_"+ID).hide();
        $("#PROJECT_NAME_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PROJECT_NAME_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PROJECT_NAME': $("#PROJECT_NAME_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#PROJECT_NAME_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
     $(document).on('keyup click change', '.SALESPERSON_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#SALESPERSON_"+ID).hide();
        $("#SALESPERSON_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SALESPERSON_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SALESPERSON': $("#SALESPERSON_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#SALESPERSON_"+ID).html(first);
                }
            });
    
    }).change(function() {});

     $(document).on('keyup click change', '.PROJECTMANAGER_click', function() {
    
        var ID = $(this).attr('id');
        
        $("#PROJECTMANAGER_"+ID).hide();
        $("#PROJECTMANAGER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PROJECTMANAGER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PROJECTMANAGER': $("#PROJECTMANAGER_input_"+ID).val(),
                'type':10
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#PROJECTMANAGER_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click change', '.edit_CUSTOMER_PO_NO', function() {

        var ID = $(this).attr('id');
        
        $("#CUSTOMER_PO_NO_"+ID).hide();
        $("#CUSTOMER_PO_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CUSTOMER_PO_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CUSTOMER_PO_NO': $("#CUSTOMER_PO_NO_input_"+ID).val(),
                'type':11
            },
            url: baseUrl +'/sales_update' , 
            success: function(html) {
                $("#CUSTOMER_PO_NO_"+ID).html(first);
                }
            });
    
    }).change(function() { });
</script>
</script>