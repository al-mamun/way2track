@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Sales Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">New Sales Order</li>
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
                        <h3 class="card-title"> New Sales Order</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'new/order/status/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customer"> Customer </label>
                                <input type="text" required class="form-control" id="customer" name="customer" placeholder="Enter Customer Name" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" required class="form-control" id="status" name="status" placeholder="Enter status" required>
                            </div>
                          <div class="form-group">
                            <label for="overall_status"> Overall Status </label>
                            <input type="text" class="form-control" id="overall_status" name="overall_status" placeholder="Enter email" required>
                          </div>
                          <div class="form-group">
                            <label for="date"> Expected Handover Date </label>
                            <input type="date" required class="form-control" id="date" name="date" placeholder="Enter Date" required>
                          </div>
                          <div class="form-group">
                            <label > Comments </label>
                            <textarea class="form-control" id="comments" name="comments" placeholder="comments" required> </textarea>
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