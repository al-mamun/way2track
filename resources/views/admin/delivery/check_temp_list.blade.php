@extends('admin.master.app')

@section('content')
<style>
.row.data-button {
    padding: 14px 19px;
}
input#file {
    width: 100px;
    float: left;
}
svg.w-5.h-5 {
    font-size: .875rem!important;
    width: 21px;
}
tr.selected {
    background: #eee;
    /* display: block; */
}
tr {
    cursor:pointer;
}
button.btn.btn-success.assign_button {
    width: 182px;
    margin-left: 10px;
    margin-top: 20px;
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Review Delivery Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Review Delivery Details</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    {{ csrf_field() }}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
              	        @if ($errors->any())
            			    <div class="alert alert-danger">
            			        <ul>
            			            @foreach ($errors->all() as $error)
            			                <li>{{ $error }}</li>
            			            @endforeach
            			        </ul>
            			    </div>
            			@endif

    
        	       @if(Session::has('success'))
        	          <div class="alert alert-success alert-dismissible fade show" role="alert">
        	            <strong>{{ Session::get('success')}}</strong>
        	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	            	 <span aria-hidden="true">&times;</span>
        	            </button>
        	          </div>
        	        @endif
        	        
            {!! Form::open(array('url'=>'temp/delivery/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
        	   
        	        <input type="hidden" value="{{$token}}" name="token">

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card"  style="padding:10px;">
                         <div class="card"  style="padding:10px;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        	            <strong>Please REVIEW AND CLICK SAVE BELOW.</strong>
        	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	            	 <span aria-hidden="true">&times;</span>
        	            </button>
        	          </div>
                        <!-- /.card-header -->
                        <div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
        		            <table class="table table-bordered " id="listShipment" border="1">
        		                <thead>
            		                <tr style="color:#000">
                                        <th style="display:none">SL.</th>
                                        <th>Delivery ID</th>
                                        <th>Shipment ID</th>
                                        <th>PO No</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Description </th>
            		                    <th>Action</th>	              
            		                </tr>
            		            </thead>
        		              <tbody>
            		             @foreach($deliveryExportDetails as $key=>$data)
            		               <tr id="{{ $data->DELIVERY_ID }}" class="delivery_id_{{ $data->ID }}">
            		                  <td style="display:none">{{ $key+1 }}</td>
            		                  <td>{{ $data->DELIVERY_ID }}</td>
            		                  <td>{{ $data->SHIPMENT_ID }}</td>
            		                  <!--<td>{{ $data->PO_NO }}</td>-->
            		                  <!--<td>{{ $data->ITEM }}</td>-->
            		                  <!--<td>{{ $data->Qty }}</td>-->
            		                  <!--<td>{{ $data->DESCRIPTION }}</td>-->
            		                  
            		                   <td style="background-color:#E8ECF1;" id="{{ $data->ID }}" class="editPO_NO">
                    						<span id="PO_NO_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
                    						<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="PO_NO_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
                    						<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
                    						<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    			
                    				  <td style="background-color:#E8ECF1;" class="editQTY" id="{{ $data->ID }}">
                    						<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
                    						<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
                    						<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
                    						<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
                    				  </td>
            		           
            		                  <td>
                                          <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                                           <button  onClick="deleteData('{{  $data->ID }}')" id="deleteID" type="button" class="btn  btn-danger btn-sm">Delete</button>
            		                      <!--<a href="{{ URL::to( 'export/delivery/details/delete/' .$data->ID)  }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
            		                  </td>
            		                </tr>
            		              @endforeach
        		              </tbody>
        		          </table>

	                    </div>
	                      <button type="submit" clsss="btn btn-success" style="background: green;color: #fff;border: 0px;padding: 7px 30px;margin: 0 auto;display: block;border-radius: 5px;"> Save </div>
                    </div>
                </div>
              <!-- /.card-body -->
              {!!Form::close()!!}
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
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
                url: baseUrl +'/export/temp/delivery/details/delete/'+ ID , 
                success: function(HTML) {
                    $('.delivery_id_'+ID).hide();
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
    
    function edit(ID) {
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        $("#QTY_" + ID ).hide();
        $("#QTY_input_"+ID).show();
        
        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();

    }

    $(document).on('keyup click', '.editPO_NO', function() {
    
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
                'type':1
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#PO_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editITEM', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ITEM_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ITEM': $("#ITEM_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editQTY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#QTY_" + ID ).hide();
        $("#QTY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#QTY_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'QTY': $("#QTY_input_"+ID).val(),
                'type': 4
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#QTY_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editDESCRIPTION', function() {
    
        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type':3
            },
            url: baseUrl +'/delivery_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    
    function assignBy() {
        
        var itemID = $("#itemID").val();
   
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/delivery/order/header/modal', 
            data: {
                '_token': $('input[name=_token]').val(),
                'itemID': itemID,
            
                'type': 1,
            },
            success: function(result) { 
                $('.table_result').html(result);
                
            }
        });  
    }
    
    $('#listShipment').DataTable( {
         buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Delivery Details',
                exportOptions: {
                    columns: [ 1,2,3,4,5,6]
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
        $("#itemID").val(id);
        
    });

</script>
@endsection
