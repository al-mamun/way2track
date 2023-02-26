@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Delivery</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create Delivery</li>
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
                        <h3 class="card-title">Create Delivery</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'create/delivery/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="DELIVERY_ID"> Delivery ID <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="DELIVERY_ID" placeholder="" required value="{{ $DELIVERYID }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Size">Size<span style="color:red">*</span> </label>
                                        <input type="text" class="form-control"  name="SIZE" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="NO_OF_TRUCKS"> No Of Trucks <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="NO_OF_TRUCKS" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="VEHICLE_PLATES"> Vehicle Plates <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="VEHICLE_PLATES" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="LAST_DESPATCH_TIME">Last Despatch  Time<span style="color:red">*</span></label>
                                        <input type="time" class="form-control" name="LAST_DESPATCH_TIME"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="EXPECTED_DELIVERY">Expected Delivery<span style="color:red">*</span></label>
                                         <input type="text" class="form-control" name="EXPECTED_DELIVERY"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <iv class="form-group">
                                        <label for="DELIVERY_STATUS">Delivery Status<span style="color:red">*</span></label>
                                         <input type="text" class="form-control" name="DELIVERY_STATUS" value="Awaiting" required>
                                    </div>
                                   <!--<div class="form-group">-->
                                   <!--     <label for="DELIVERY_STATUS">DELIVERY_STATUS<span style="color:red">*</span></label>-->
                                   <!--    <select class="form-control" name="c">-->
                                   <!--         <option value="">SELECT DELIVERY STATUS</option>-->
                                   <!--         <option value="Awaiting">Awaiting</option>-->
                                   <!--         <option value="On the way">On the way</option>-->
                                   <!--         <option value="Received">Received</option>-->
                                   <!--         <option value="Dispatched">Dispatched</option>-->
                                   <!--         <option value="Shipped">Shipped</option>-->
                                   <!--     </select>-->
                                   <!-- </div>-->
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="DELIVERY_TIME">Delivery Time</label>
                                        <input type="time" class="form-control" name="DELIVERY_TIME">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Delivery Address <span style="color:red">*</span></label>
                                        <textarea  type="text" class="form-control" name="DELIVERY_ADDRESS"> </textarea>
                                      </div>
                                </div>
                            </div>  
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      {!!Form::close()!!}
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
<script type="text/javascript">
        $(function() {
            // $('input[name="LAST_DESPATCH_TIME"]').daterangepicker({
            //     timePicker: true,
            //     singleDatePicker: false,
            //     showDropdowns: true,
                
            // });
            
            $('input[name="EXPECTED_DELIVERY"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                  format: 'DD/MMM/YYYY'
                }
            });
            //  $('input[name="EXPECTED_DELIVERY"]').daterangepicker({
            //     timePicker: false,
            //     singleDatePicker: true,
            //     showDropdowns: true,
            //     locale: {
            //       format: 'DD/MMM/YYYY'
            //     }
            // });
        });
</script>
@endsection