@extends('admin.master.app')

@section('content')
<style>
tr {
    cursor: pointer;
}
tr.selected {
    background: #eee;
}
input#file {
    float: left;
    width: 176px;
    border: 1px solid #218838;
    padding: 3px;
    background: #218838;
}
button.btn.btn-success {
    border-radius: 0px;
}
.row.data-button {
    margin-bottom: 15px;
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List of Order status</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">List of Order status</li>
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
              <div class="card-header">
                <h3 class="card-title">List of Order status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @if ($errors->any())
        			    <div class="alert alert-danger">
        			        <ul>
        			            @foreach ($errors->all() as $error)
        			                <li> please select header first </li>
        			            @endforeach
        			        </ul>
        			    </div>
        			@endif
                    <div class="row data-button">
            	        <div class="col-md-6">
            	           <div class="btn-group btn-group-toggle">
                                <a href="{{ URL::to( 'new/order/details') }}" class="btn btn-info"> New </a>
                               
                                <div class="input-group">
                                     {!! Form::open(array('url'=>'file_upload_order','role'=>'form','method'=>'POST','enctype'=>'multipart/form-data','class'=>'from-submit-status'))!!}
                                        <input id="file" accept="csv,exl" name="fileToUpload" type="file" /> 
                                        <input  name="wip_hidden" id="wip_hidden" type="hidden" /> 
                                        <button class="btn btn-success" name="submit" type="submit"> Import </button>
                                    </form>
                                </div>
                                <a href="{{ URL::to( 'new/order/details') }}" class="btn btn-success"> Export </a>
                            </div>
                          
                        </div>
                    </div>
                 @if (session('success'))
                    <div class="card bg-gradient-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ session('success') }}</h3>
                        </div>
                   </div>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Customer</th>
                            <th scope="col">WIP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Expected Handover Date</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saledOrderHeaders as $salesOrderInfo)
                        <tr id="{{ $salesOrderInfo->WIP }}">
                            <td>{{ $salesOrderInfo->CUSTOMER_NAME }}</td>
                            <td>{{ $salesOrderInfo->WIP }}</td>
                                <td>{{ $salesOrderInfo->SO_STATUS }}</td>
                                <td>
                                  @php 
                                    $date = date("d M  Y", strtotime( $salesOrderInfo->TGT_HANDOVER_DT)); 
                              
                                @endphp
                                        {{ $date }}
                             </td>
                        
                        <!--    <td>{{ $salesOrderInfo->TGT_HANDOVER_DT }}</td> -->
                            <td>{{ $salesOrderInfo->COMMENTS }}</td>
                            <td>
                              
                                <a href="{{ URL::to( 'sales/order/list/edit/' . $salesOrderInfo->ID) }}" type="button" class="btn btn-block btn-success btn-sm">Edit</a>
                                <a href="{{ URL::to( 'sales/order/delete/' . $salesOrderInfo->ID ) }}" type="button" class="btn btn-block btn-danger btn-sm">Dalete</a>
                            </td>
                        </tr>
                        @endforeach
                 
                  </tbody>
                    <tfoot>
                        <tr>
                             <th scope="col">Customer</th>
                            <th scope="col">WIP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Expected Handover Date</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Action</th>
                        </tr>
                    </tfoot>
                </table>
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
    $("tbody tr").click(function () {
        $('.selected').removeClass('selected');
        $(this).addClass("selected");
        
        var id = $(this).attr("id");
        $("#wip_hidden").val(id);
        
    });
</script>
@endsection