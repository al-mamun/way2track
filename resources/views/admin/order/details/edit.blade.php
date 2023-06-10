@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Order Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Update Order Detalis</li>
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
                            <h3 class="card-title"> Update order details</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                           
                          {!! Form::open(array('url'=>'/list/order/update/'.$salesOrderDetails->ID,'role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
                            <div class="card-body">
                                <div class="form-group">
                                <label for="status">WIP<span style="color:red">*</span></label>
    				    		<select name="WIP" id="wip" class="form-control" aria-label="Default select example" required>
    							     <option value="" selected>Select WIP</option>
    							     @foreach($salesOrderWp as $key=>$data)
    			                       <option value="{{ $data->WIP }}" @if($data->WIP == $salesOrderDetails->WIP ) selected @endif> {{ $data->WIP }} </option>
    							     @endforeach
    							    
    							 </select>
    							</div>
                                
                                <div class="form-group">
                                    <label for="status">Item<span style="color:red">*</span></label>
                                    <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter ITEM" required value="{{  $salesOrderDetails->ITEM }}">
                                </div>
                                <div class="form-group">
                                    <label for="overall_status">Description<span style="color:red">*</span></label>
                                    <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="Description" required>{{  $salesOrderDetails->DESCRIPTION }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Qty<span style="color:red">*</span></label>
                                    <input class="form-control" type="number" id="quantity" name="QTY" min="1" value="{{  $salesOrderDetails->QTY }}" required>
                                </div>
                                <div class="thumbnail_image">
                                      <img style="max-width: 80px; display: block;" class="example-image-link" src="{{ URL::asset( 'images/'. $salesOrderDetails->thumbnail_image) }}" > 
                                </div>
                                <div class="form-group">
                                    <label >Thumbnail image</label>
                                    <input type="file" name="THUMBNAIL_IMAGE" placeholder="select image">
                                </div>
                                <div class="form-group">
                                    <label >EXP Handover DT <span style="color:red">*</span> </label>
                                    <input type="date" required class="form-control" id="exp_handover_dt" name="EXP_HANDOVER_DT"  value="{{  $salesOrderDetails->EXP_HANDOVER_DT }}" placeholder="EXP_HANDOVER_DT" required>
                                </div>
                                <div class="form-group">
                                    <label > Comments </label>
                                    <select name="EX_COMMENTS" id="EX_COMMENTS" class="form-control"  >
        							     <option value="" selected>Select VALID_EX_COMMENT</option>
        							     @foreach($sodCommentValue as $key=>$data)
        			                       <option value="{{ $data->VALID_EX_COMMENT }}" @if($data->VALID_EX_COMMENT == $salesOrderDetails->EX_COMMENTS) selected @endif> {{ $data->VALID_EX_COMMENT }} </option>
        							     @endforeach
        							 </select>
                                    <!--<textarea class="form-control" id="COMMENTS" name="COMMENTS" placeholder="COMMENTS">{{  $salesOrderDetails->COMMENTS }}</textarea>-->
                                </div>
                                <div class="form-group">
                                <label >EXP Delivery <span style="color:red">*</span> </label>
                                <input type="date" required class="form-control" id="exp_handover_dt" name="EXP_DELIVERY" placeholder="EXP Delivery"  value="{{  $salesOrderDetails->EXP_DELIVERY }}" required>
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