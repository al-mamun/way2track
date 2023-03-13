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
    background: #E8ECF1;
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
div#listShipment_filter {
    float: right;
    /*margin-top: -55px;*/
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Shipment Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Shipment Details</li>
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
        	        <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">  Search Purchase Orders </h4>
                                    <button type="button" class="close" data- dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="resultOFAssign" class="table_result"></div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                   
                                </div>
                            </div>
                    
                        </div>
                    </div>

              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Shipment Details</h3>
                      </div>
                      <button class="btn btn-success assign_button" onclick="assign()"  data-toggle="modal" data-target="#modal-lg"> Add Purchase Orders </button>
                        
                        <!--<button type="button" class="btn btn-default">-->
                            
                        <!--</button>-->
                      <input type="hidden" @if(isset($id)) value="{{ $newShipmentView[0]->SHIPMENT_ID  }}" @else value="0" @endif id="itemID">
                      <!-- /.card-header -->
                        <div class="card-content" style="padding:10px">
        		            <table class="table table-bordered" id="listShipment" border="1">
        		                <thead>
            		              <tr style="color:#000">
            		                  <th style="display:none">SL.</th>
            		                  <th>Shipment ID</th>
            		                  <th>Currency</th>
            		                  <th>Net</th>
            		                  <th>Net</th>
            		                  <th>Size</th>
            		                  <th>Comments</th>
            		                  <th>Action</th>
            		              </tr>
            		            </thead>
        		              <tbody>
            		             @foreach($newShipmentView as $key => $data)
            		              <!-- <tr id="{{ $data->SHIPMENT_ID }}" onclick="shipmentDetailsList('{{ $data->SHIPMENT_ID }}')"  @if(isset($id)) class="selected" @endif >-->
            		                   <tr id="{{ $data->SHIPMENT_ID }}" onclick="shipmentDetailsList('{{ $data->SHIPMENT_ID }}')"  @if(isset($id)) class="selected shpipment_id_{{$data->ID}}" @else class="shpipment_id_{{$data->ID}}" @endif>
            		                  <td style="display:none">{{ $key+1 }}</td>
            		                  <td>{{ $data->SHIPMENT_ID }}</td>
            		                  <td style="background-color:#E8ECF1;" id="{{ $data->ID }}" class="editCURRENCY">
                    						<span id="CURRENCY_{{ $data->ID }}" class="text">{{ $data->CURRENCY }}</span>
                    						<input type="text" value="{{ $data->CURRENCY }}" class="editbox" id="CURRENCY_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editNET" id="{{ $data->ID }}">
                    						<span id="NET_{{ $data->ID }}" class="text">{{ $data->NET }}</span>
                    						<input type="text" value="{{ $data->NET }}" class="editbox" id="NET_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    			      <td style="background-color:#E8ECF1;" class="editFREIGHT_FORWARDER" id="{{ $data->ID }}">
                    						<span id="FREIGHT_FORWARDER_{{ $data->ID }}" class="text">{{ $data->FREIGHT_FORWARDER }}</span>
                    						<input type="text" value="{{ $data->FREIGHT_FORWARDER }}" class="editbox" id="FREIGHT_FORWARDER_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editSIZE" id="{{ $data->ID }}">
                    						<span id="SIZE_{{ $data->ID }}" class="text">{{ $data->SIZE }}</span>
                    						<input type="text" value="{{ $data->SIZE }}" class="editbox" id="SIZE_input_{{ $data->ID }}" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
                    						<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
                    						<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
                    				  </td>
            		           
            		                  <td>
                                         <!--<a href="{{ URL::to( 'edit/shipment/details/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
                                          <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                                          @can('check po and details')
                                           <a href="{{ URL::to( 'export/shipment/order/view/' . $data->SHIPMENT_ID) }}" type="button" class="btn  btn-info btn-sm">Details</a>
                                           @endcan
                                          <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
            		                     <!-- <a href="{{ URL::to( 'shipment/delete/' .$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"> Delete</a>-->
            		                      <button  onClick="deleteData('{{$data->ID}}')" id="salesOrderDelete" type="button" class="btn btn-danger btn-sm">Delete</button>
            		                  </td>
            		                </tr>
            		              @endforeach
        		              </tbody>
        		          </table>

	                    </div>
	                    
	                     <div class="card-content" style="padding:10px">
	                         <div id ="resultOfShipmentResult">
	                             
	                            </div>
	                      </div>
                    </div>
                </div>
              <!-- /.card-body -->
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
                    url: baseUrl +'/shipment/delete/'+ ID , 
                    success: function(HTML) {
                        $('.shpipment_id_'+ID).hide();
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
        
        $("#CURRENCY_"+ID).hide();
        $("#CURRENCY_input_"+ID).show();
        
        $("#NET_"+ID).hide();
        $("#NET_input_"+ID).show();
        
        $("#SIZE_" + ID ).hide();
        $("#SIZE_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
      
    }

    $(document).on('keyup click', '.editCURRENCY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CURRENCY_"+ID).hide();
        $("#CURRENCY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CURRENCY_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CURRENCY': $("#CURRENCY_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#CURRENCY_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editNET', function() {
    
        var ID    = $(this).attr('id');
        
        $("#NET_"+ID).hide();
        $("#NET_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#NET_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'NET': $("#NET_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#NET_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editSIZE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SIZE_" + ID ).hide();
        $("#SIZE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SIZE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SIZE': $("#SIZE_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#SIZE_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editCOMMENTS', function() {
    
        var ID    = $(this).attr('id');
        
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
                'type':4
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    function shipmentDetailsList(shiped_id) {
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/shipped/single/order/details', 
            data: {
                '_token': $('input[name=_token]').val(),
                'shiped_id': shiped_id,
            
                'type': 1,
            },
            success: function(result) { 
                $('#resultOfShipmentResult').html(result);
                
            }
        }); 
    }
    
    function assign() {
        
        var itemID = $("#itemID").val();
        var to    = $("#to").val();
         
        if(itemID == 0) {
            $('.table_result').html('<div class="alert alert-danger" role="alert"> please select header first! </div>');
            return true;
        }
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/header/modal', 
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
