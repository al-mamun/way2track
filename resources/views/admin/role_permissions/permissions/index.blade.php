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
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Permissions</li>
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
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Permissions </h3>
                      </div>
                      <!-- /.card-header -->
                        <div class="card-content">
        		            <table class="table table-bordered" border="1">
        		              <tr style="color:#000">
        		                  <th>SL.</th>
        		                  <th>Name</th>
        		                  <th>ACTION</th>
        		              </tr>
        		             @foreach($permissions as $key=>$permission)
        		               <tr>
        		                  <td>{{ $key+1 }}</td>
        		                  <td>{{ $permission->name }}</td>
        		                  <td>
        		                     <a href="{{ route('admin.permission.edit', $permission->id) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> 
                                     <form class="btn btn-danger btn-circle btn-sm" action="{{ route('admin.permission.delete', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button  class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
        		                  </td>
        		                </tr>
        		              @endforeach
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

@endsection
