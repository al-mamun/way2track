@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Permission</li>
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
                            <h3 class="card-title">Add Permission</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->

                        <form action="{{route('admin.permission_store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Permission Name<span style="color:red">*</span></label>
                                    <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Permission name" required >
                                </div>
                                <div class="form-group">
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
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