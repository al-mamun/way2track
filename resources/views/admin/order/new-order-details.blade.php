@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Order Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">New Order Detalis</li>
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
                        <h3 class="card-title"> New Order status</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->

                      {!! Form::open(array('url'=>'/new/order/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status'))!!}
                        <div class="card-body">
                            <div class="form-group">
                            <label for="status">WIP</label>
				    		<select name="WIP" id="wip" class="form-control" aria-label="Default select example">
							     <option selected>Select WIP</option>
							     @foreach($salesOrderWp as $key=>$data)
			                       <option value="{{ $data->WIP }}"> {{ $data->WIP }} </option>
							     @endforeach

							 </select>
							</div>


                            <div class="form-group">
                                <label for="status">Item</label>
                                <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter Item" required>
                            </div>
                          <div class="form-group">
                            <label for="overall_status">Description</label>
                            <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="Description" required> </textarea>
                          </div>
                          <div class="form-group">
                            <label for="date">Qty</label>
                            <input class="form-control" type="number" id="quantity" name="Qty" min="1" max="5">
                          </div>
                          <div class="form-group">
                            <label > Comments </label>
                            <select name="comments" id="" class="form-control">
                                <option value="">Select a Comment</option>
                                @foreach ($comments as $comment)
                                <option value="{{ $comment->VALID_EX_COMMENT }}">{{ $comment->VALID_EX_COMMENT }}</option>
                                @endforeach
                            </select>

                          </div>
                          <div class="form-group">
                            <label >Thumbnail image </label>
                            <input type="file" name="thumbnail_image" placeholder="select image">
                          </div>
                          <div class="form-group">
                            <label >EXP Handover DT </label>
                            <input type="date" required class="form-control" id="exp_handover_dt" name="EXP_HANDOVER_DT" placeholder="EXP_HANDOVER_DT" required>
                          </div>

                          <div class="form-group">
                            <label >Expected Delivery </label>
                            <input type="date" required class="form-control" id="EXP_DELIVERY" name="EXP_DELIVERY" placeholder="EXP_DELIVERY" required>
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
