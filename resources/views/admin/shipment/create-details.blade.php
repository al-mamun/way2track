@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Shipment Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Shipment Details</li>
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
                        <h3 class="card-title">Add Shipment Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'add/shipment/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="SHIPMENT_ID"> Shipment ID <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="SHIPMENT_ID" placeholder="" value="{{ $shipmentID }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="CONTAINER_NO"> Container No <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="CONTAINER_NO" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="VESSEL">VesseL<span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="VESSEL" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Qty">Qty <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="Qty" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETD">ETD <span style="color:red">*</span></label>
                                        <input type="date" class="form-control"  name="ETD" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ETA">ETA <span style="color:red">*</span></label>
                                        <input type="date" class="form-control"  name="ETA" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SUPPLIER">Supplier <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="SUPPLIER" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PO_NO">PO No <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="PO_NO" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="WIP">WIP <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="WIP" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ITEM">Item <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="ITEM" placeholder="" required>
                                    </div>
                                </div>
                             
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > ACT Exf Date <span style="color:red">*</span> </label>
                                         <input type="date" class="form-control"  name="ACT_EXF_DATE" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > MBLMAWB <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="MBL_MAWB" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Vessel Saling Date  <span style="color:red">*</span></label>
                                         <input type="date" class="form-control"  name="VESSEL_SAILING_DATE" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label > Confirmed ETA <span style="color:red">*</span> </label>
                                         <input type="date" class="form-control"  name="CONFIRMED_ETA" placeholder="" required>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Shipment Status <span style="color:red">*</span> </label>
                                         <input type="text" class="form-control"  name="SHIPMENT_STATUS" placeholder="" required>
                                      </div>
                                </div>
                                   <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="DESCRIPTION">Description</label>
                                        <textarea  type="text" class="form-control" name="DESCRIPTION"> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label > Comments </label>
                                        <textarea  type="text" class="form-control" name="COMMENTS"> </textarea>
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

@endsection