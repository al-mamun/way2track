@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Order status</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">New Order status</li>
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
                        <h3 class="card-title"> Update Order status</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(array('url'=>'new/order/status/update/'. $saledOrderHeaders->ID,'role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                              <div class="form-group">
                                <label for="po-no">WIP<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="WIP" name="WIP" placeholder="Enter WIP" value="{{ $saledOrderHeaders->WIP }}"  required>
                            </div>
                            <!--  <div class="form-group">-->
                            <!--    <label for="po-no">PO_NO<span style="color:red">*</span></label>-->
                            <!--    <input type="text" required class="form-control" id="PO_NO" name="PO_NO" placeholder="Enter WIP" value="{{ $saledOrderHeaders->PO_NO }}"  required>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label for="customer"> Customer </label>
                                <input type="text" required class="form-control" id="CUSTOMER_NAME" name="CUSTOMER_NAME" placeholder="Enter Customer Name" required value="{{ $saledOrderHeaders->CUSTOMER_NAME }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" required class="form-control" id="CUSTOMER_PO_NO" name="CUSTOMER_PO_NO" placeholder="Enter status" required value="{{ $saledOrderHeaders->SO_STATUS }}">
                            </div>
                          	<div class="form-group">
	                            <label for="PROJECT_NAME"> Project Name Status </label>
	                            <input type="text" class="form-control" id="PROJECT_NAME" name="PROJECT_NAME" placeholder="PROJECT NAME" required value="{{ $saledOrderHeaders->PROJECT_NAME }}">
                          	</div>
                          	<div class="form-group">
                                <label for="email"> Project Manager Email <span style="color:red">*</span></label>
                                <input type="email" class="form-control" id="PROJECTMANAGER_EMAIL" name="PROJECTMANAGER_EMAIL" placeholder="Project Manager Email"  value="{{ $saledOrderHeaders->PROJECTMANAGER_EMAIL }}">
                            </div>
                            <div class="form-group">
                                <label for="email"> Sales Person Email <span style="color:red">*</span></label>
                                <input type="email" class="form-control" id="SALESPERSON_EMAIL" name="SALESPERSON_EMAIL" placeholder="Sales Person Email"  value="{{ $saledOrderHeaders->SALESPERSON_EMAIL }}">
                            </div>
                          	<div class="form-group">
	                            <label for="date"> Expected Handover Date </label>
	                            <input type="date" required class="form-control" id="TGT_HANDOVER_DT" name="TGT_HANDOVER_DT" placeholder="Enter Date" required value="{{ $saledOrderHeaders->TGT_HANDOVER_DT }}">
                          	</div>
                          	<div class="form-group">
	                            <label > Comments </label>
	                            <textarea class="form-control" id="comments" name="COMMENTS" placeholder="COMMENTS" required>{{ $saledOrderHeaders->COMMENTS }}</textarea>
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