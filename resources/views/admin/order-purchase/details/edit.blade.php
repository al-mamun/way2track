@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Purchase Order Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Update Purchase Order Details</li>
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
                            <h3 class="card-title"> Update Purchase Order Details</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                           
                          {!! Form::open(array('url'=>'/list/purchase/order/update/'.$poD->ID,'role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
                            <div class="card-body">
                                 <div class="form-group">
                                <label for="Po-No">Po No<span style="color:red">*</span></label>
    				    		<select name="PO_NO" id="wip" class="form-control" aria-label="Default select example" required>
    							     <option value="" selected>Select Po-No</option>
    							     @foreach($saledOrderHeaders as $key=>$data)
    			                       <option value="{{ $data->PO_NO }}" @if($data->PO_NO == $poD->PO_NO ) selected @endif> {{ $data->PO_NO }} </option>
    							     @endforeach
    							    
    							 </select>
    							</div>
    							
                                <div class="form-group">
                                    <label for="status">Item<span style="color:red">*</span></label>
                                    <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter ITEM" required value="{{  $poD->ITEM }}">
                                </div>
                                <div class="form-group">
                                    <label for="overall_status">Description<span style="color:red">*</span></label>
                                    <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="DESCRIPTION" required>{{  $poD->DESCRIPTION }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Qty<span style="color:red">*</span></label>
                                    <input class="form-control" type="number" id="quantity" name="Qty" min="1" value="{{  $poD->Qty }}" required>
                                </div>
                                <div class="form-group">
                                    <label >EXP Exf DT <span style="color:red">*</span> </label>
                                    <input type="date" required class="form-control" id="exp_exf_dt" name="EXP_EXF_DT"  value="{{  $poD->EXP_EXF_DT }}" placeholder="EXP_EXF_DT" required>
                                </div>
                                <div class="form-group">
                                    <label >Confirmed EXF <span style="color:red">*</span> </label>
                                    <input type="date" required class="form-control" id="exp_exf_dt" name="CONFIRMED_EXF"  value="{{  $poD->CONFIRMED_EXF }}" placeholder="CONFIRMED_EXF" required>
                                </div>
                                <div class="form-group">
                                    <label >ETD <span style="color:red">*</span> </label>
                                    <input type="date" required class="form-control" id="ETD" name="ETD"  value="{{  $poD->ETD }}" placeholder="ETD" required>
                                </div>
                                <div class="form-group">
                                    <label >ETA <span style="color:red">*</span> </label>
                                    <input type="date" required class="form-control" id="ETA" name="ETA"  value="{{  $poD->ETA }}" placeholder="ETA" required>
                                </div>
                                <div class="form-group">
                                    <label > Comments </label>
                                    <textarea class="form-control" id="COMMENTS" name="COMMENTS" placeholder="comments">{{  $poD->COMMENTS }}</textarea>
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