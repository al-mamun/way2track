@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Shipment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create Shipment</li>
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
                        <h3 class="card-title">Create Shipment</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'create/shipment/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
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
                                        <label for="currency"> Currency <span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="CURRENCY" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="Net">Net<span style="color:red">*</span></label>
                                        <input type="text" required class="form-control" name="NET" placeholder="" required>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                        <label >Freight Forwarder</label>
                                         <input type="text" class="form-control"  name="FREIGHT_FORWARDER" placeholder="Freight Forwarder" required>
                              
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Size">Size <span style="color:red">*</span></label>
                                        <input type="text" class="form-control"  name="SIZE" placeholder="" required>
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