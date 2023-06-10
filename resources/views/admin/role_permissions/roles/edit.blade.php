@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Role</li>
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
                            <h3 class="card-title"> Role Edit</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->

                        <form action="{{route('admin.role.update', $role->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Role Name<span style="color:red">*</span></label>
                                    <input type="text"  value="{{$role->name}}" required class="form-control" id="name" name="name" placeholder="Enter Role name" required >
                                </div>
                                <div class="form-group">
                            </div>
                            <!-- /.card-body -->
                            <div class="form-group">
                                <h5 class="by_date_check by_staus">Attach Permissions</h5>
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input @if(in_array($permission->name, $role_permissions)) checked @else hello  @endif class="form-check-input" type="checkbox" value="{{$permission->id}}" name="permissions[]">
                                    <label class="form-check-label">{{$permission->name}} </label>
                                </div>
                                @endforeach
                            </div>

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
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