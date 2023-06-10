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
                <h1>Edit User / Attach Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit User / Attach Role</li>
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
                        <h3 class="card-title"> Edit User / Attach Role </h3>
                      </div>
                      <!-- /.card-header -->
                        <div class="card-content">
        		            <table class="table table-bordered" border="1">
        		              <tr style="color:#000">
        		                  <th>SL.</th>
        		                  <th>Name</th>
        		                  <th>Email</th>
        		                  <th>Mobile</th>
        		                  <th>Notes</th>
        		                  <th>ACTION</th>
        		              </tr>
        		             @foreach($userlists as $key=>$data)
        		               <tr>
        		                  <td>{{ $key+1 }}</td>
        		                  <td>{{ $data->name }}</td>
        		                  <td>{{ $data->email }}</td>
        		                  <td>{{ $data->mobile }}</td>
        		                  <td>{{ $data->notes }}</td>
        		                  <td>
        		                     <a href="{{ URL::to('/userlist/edit/' .$data->id) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> 
        		                     <a href="{{ route('user.delete',$data->id) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
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
