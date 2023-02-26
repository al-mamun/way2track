@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Purchase Order Header Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">New Purchase Order status</li>
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
                        <h3 class="card-title"> Update Purchase Order Header</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'/purchase/order/status/update/'. $saledOrderHeaders->ID,'role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="po-no">WIP<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="WIP" name="WIP" placeholder="Enter WIP" required value="{{ $saledOrderHeaders->WIP }}">
                            </div>
                            <div class="form-group">
                                <label for="customer"> PO No <span style="color:red">*</span> </label>
                                <input type="text" required class="form-control" id="PO_NO" name="PO_NO" placeholder="Enter PO_NO" required value="{{ $saledOrderHeaders->PO_NO }}">
                            </div>
                            <div class="form-group">
                                <label for="status">PO Date<span style="color:red">*</span></label>
                                <input type="date" required class="form-control" id="PO_DATE" name="PO_DATE" placeholder="Enter PO_DATE" value="{{ $saledOrderHeaders->PO_DATE }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status">PO Status<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="PO_STATUS" name="PO_STATUS" placeholder="Enter PO_STATUS" required value="{{ $saledOrderHeaders->PO_STATUS }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Supplier Name<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="SUPPLIER_NAME" name="SUPPLIER_NAME" placeholder="Enter SUPPLIER_NAME" required value="{{ $saledOrderHeaders->SUPPLIER_NAME }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Supplier Site<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="SUPPLIER_SITE" name="SUPPLIER_SITE" placeholder="Enter SUPPLIER_SITE" required value="{{ $saledOrderHeaders->SUPPLIER_SITE }}">
                            </div>
                            <div class="form-group">
                                <label for="status">REQD EXF Date<span style="color:red">*</span></label>
                                <input type="date" required class="form-control" id="REQD_EXF_DATE" name="REQD_EXF_DATE" placeholder="Enter REQD_EXF_DATE" required value="{{ $saledOrderHeaders->REQD_EXF_DATE }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Supplier REF No</label>
                                <input type="text"  class="form-control" id="SUPPLIER_REF_NO" name="SUPPLIER_REF_NO" placeholder="Enter SUPPLIER_REF_NO"  value="{{ $saledOrderHeaders->SUPPLIER_REF_NO }}">
                            </div>
                            <div class="form-group">
                                <label for="status">ACK No</label>
                                <input type="text"  class="form-control" id="ACK_NO" name="ACK_NO" placeholder="Enter ACK_NO"  value="{{ $saledOrderHeaders->ACK_NO }}">
                            </div>
                            <div class="form-group">
                                <label for="status">AC Date</label>
                                <input type="date"  class="form-control" id="ACK_DATE" name="ACK_DATE" placeholder="Enter ACK_DATE" required value="{{ $saledOrderHeaders->ACK_DATE }}">
                            </div>
                          
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
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