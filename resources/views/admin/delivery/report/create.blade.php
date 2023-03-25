@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Delivery Order Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">  Create Delivery Order Report</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    {{ csrf_field() }}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">  Create Delivery Order Report </h4>
                    <button type="button" class="close" data- dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="resultOFAssign" class="table_result">
                        
                        
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                   
                </div>
            </div>
    
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                
                @if (session('success'))
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ session('success') }}</h3>
                        </div>
                   </div>
                @endif
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Create Delivery Order Report</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <label >Select Expected Delivery Date<span style="color:red">*</span> </label>
                                         <input type="text" class="form-control DELIVERY_RECD_DATE"  name="DELIVERY_RECD_DATE" id="DELIVERY_RECD_DATE"  required>
                                      </div>
                                </div>
                     
                            </div> 
                            
                            <div class="row" id="grn_generate_list">
                                <table id="tableResponsive2" class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                           
                                            <th scope="col">Existing Delivery IDs</th>
                                            <th scope="col">Action</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grnList as $info)
                                        <tr>
                                           
                                            <td>{{ $info->DO_NO }}</td>  
                                            <td><a type="submit" class="btn btn-primary" >Print</a></td>
                                        </tr>
                                        @endforeach
                                    </tobdy>
                                </table>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary" onclick="assign()"  data-toggle="modal" data-target="#modal-lg">Create New</button>
                                
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          
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
    function assign() {
        
        var itemID = $("#itemID").val();
        var to    = $("#to").val();
         
        if(itemID == 0) {
            $('.table_result').html('<div class="alert alert-danger" role="alert"> please select header first! </div>');
            return true;
        }
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/delivery/order/report', 
            data: {
                '_token': $('input[name=_token]').val(),
                'DELIVERY_RECD_DATE': $('input[name=DELIVERY_RECD_DATE]').val(),
                'shipment_number': $('input[name=shipment_number]').val(),
            },
            success: function(result) { 
                
                $('.table_result').html(result);
                 
            
            }
        });  
    }
    $(document).on('click change', '.DELIVERY_RECD_DATE', function() {
        
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
        
    });
    $(function() {
    
        $('input[name="DELIVERY_RECD_DATE"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
        });
    });
</script>
@endsection