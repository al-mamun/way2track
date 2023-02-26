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
    width: 100px;
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
                <h1>Shipment detials</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Shipment detials</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                                    <h4 class="modal-title">Large Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>One fine body&hellip;</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                    
                        </div>
                    </div>

              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Shipment Details</h3>
                      </div>
                      <button class="btn btn-success assign_button" onclick="assign()"> Assign </button>
                        
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                        Launch Large Modal
                        </button>
                      <input type="hidden" value="0" id="itemID">
                      <!-- /.card-header -->
                        <div class="card-content">
        		            <table class="table table-bordered" id="listShipment" border="1">
        		                <thead>
            		              <tr style="color:#000">
            		                  <th>SL.</th>
    	'',                           <th>Shipment ID</th>
            		                  <th>Container No</th>
            		                  <th>Vessel</th>
            		                  <th>Qty</th>
            		                  <th>ETD</th>
            		                  <th>ETA</th>
            		                  <th>Supplier</th>
            		                  <th>PO No</th>
            		                  <th>WIP</th>
            		                  <th>Qty</th>
            		                  <th>Item</th>
            		                  <th>Description</th>
            		                  <th>Comments</th>
            		                  <th>ACT Exf Date</th>
            		                  <th>MBLMAWB</th>
            		                  <th>Vessel Saling Date</th>
            		                  <th>Confirmed ETA</th>
            		                  <th>Shipment Status</th>
            		                  <!--<th>Action</th>-->
            		              </tr>
            		            </thead>
        		              <tbody>
            		             @foreach($ShipmentDetails as $key=>$data)
            		               <tr id="{{ $data->SHIPMENT_ID }}">
            		                  <td>{{ $key+1 }}</td>
            		                  <td>{{ $data->SHIPMENT_ID }}</td>
            		                  <td>{{ $data->CURRENCY }}</td>
            		                  <td>{{ $data->NET }}</td>
            		                  <td>{{ $data->SIZEs }}</td>
            		                  <td>{{ $data->COMMENTS }}</td>
            		                  <td>
                                         <a href="{{ URL::to( 'edit/shipment/details/' .$data->id) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>
            		                     <a href=" URL::to( 'export/shipment/order/delete/' .$data->id) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
            		                  </td>
            		                </tr>
            		              @endforeach
        		              </tbody>
        		          </table>

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
