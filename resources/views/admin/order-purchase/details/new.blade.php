@extends('admin.master.app')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Add P.O.  Details
               </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"> Add P.O.  Details
               </li>
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
                        <h3 class="card-title"> Add P.O.  Details  </h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                       
                      {!! Form::open(array('url'=>'/create/purchase/order/details/submit','role'=>'form','method'=>'POST','class'=>'from-submit-status', 'enctype'=>'multipart/form-data'))!!}
                        
                        
                        <div class="card-body">
                          
                            <div class="form-group">
                            <label for="PO_NO">PO No<span style="color:red">*</span></label>
				    		<select name="PO_NO" id="PO_NO" class="form-control" aria-label="Default select example" required>
							     <option value="" selected>Select</option>
							     @foreach($saledOrderHeaders as $key=>$data)
			                       <option value="{{ $data->PO_NO }}"> {{ $data->PO_NO }} </option>
							     @endforeach
							    
							 </select>
							</div>
                            <div class="form-group">
                                <label for="Item">Item<span style="color:red">*</span></label>
                                <input type="text" required class="form-control" id="item" name="ITEM" placeholder="Enter Item" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description<span style="color:red">*</span></label>
                                <textarea class="form-control" id="description" name="DESCRIPTION" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Qty">Qty<span style="color:red">*</span></label>
                                <input class="form-control" type="number" id="quantity" name="Qty" min="1" placeholder="Enter Qty" required>
                            </div>
                       
                            <div class="form-group">
<<<<<<< HEAD
                                <label>Exp GRD Date  </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  min="1997-01-01" max="2030-12-31"  class="form-control" id="EXP_EXF_DT" name="EXP_EXF_DT" placeholder="EXP GRD DT" >
                            </div>
                            <div class="form-group">
                                <label >Confirmed GRD </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  class="form-control" id="CONFIRMED_EXF" name="CONFIRMED_EXF" placeholder="CONFIRMED GRD">
                            </div>
                            <div class="form-group">
                                <label >ETD  </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  class="form-control" id="ETD" name="ETD" placeholder="ETD">
                            </div>
                            <div class="form-group">
                                <label >ETA  </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  class="form-control" id="ETA" name="ETA" placeholder="ETA">
=======
                                <label>EXP GRD DT  </label>
                                <input type="text"  placeholder="dd-mm-yyyy"  min="1997-01-01" max="2030-12-31"  data-date-format="DD-MMMM-YYYY"  class="form-control" id="EXP_EXF_DT" name="EXP_EXF_DT" placeholder="EXP GRD DT" >
                            </div>
                            <div class="form-group">
                                <label >Confirmed GRD </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="CONFIRMED_EXF" name="CONFIRMED_EXF" placeholder="CONFIRMED GRD">
                            </div>
                            <div class="form-group">
                                <label >ETD  </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="ETD" name="ETD" placeholder="ETD">
                            </div>
                            <div class="form-group">
                                <label >ETA  </label>
                                <input type="text"  placeholder="dd-mm-yyyy" data-date-format="DD-MMMM-YYYY"  class="form-control" id="ETA" name="ETA" placeholder="ETA">
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                            </div>
                            <div class="form-group">
                                <label > Comments </label>
                                <textarea class="form-control" id="COMMENTS" name="COMMENTS" placeholder="Comments"> </textarea>
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

<script type="text/javascript">
    $(function() {
            $('input[name="EXP_EXF_DT"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="EXP_EXF_DT"]').on('apply.daterangepicker', function (ev, picker) {
<<<<<<< HEAD
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
=======
                $(this).val(picker.startDate.format('L'));
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            });

            $('input[name="EXP_EXF_DT"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            $('input[name="CONFIRMED_EXF"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="CONFIRMED_EXF"]').on('apply.daterangepicker', function (ev, picker) {
<<<<<<< HEAD
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
=======
                $(this).val(picker.startDate.format('L'));
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            });

            $('input[name="CONFIRMED_EXF"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
            
            $('input[name="ETD"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
                  autoUpdateInput: false,     
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETD"]').on('apply.daterangepicker', function (ev, picker) {
<<<<<<< HEAD
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
=======
                $(this).val(picker.startDate.format('L'));
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            });

            $('input[name="ETD"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
            $('input[name="ETA"]').daterangepicker({
                timePicker: false,
                singleDatePicker: true,
                showDropdowns: true,
<<<<<<< HEAD
                autoUpdateInput: false,     
=======
                  autoUpdateInput: false,     
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                locale: {
                //   format: 'DD/MMM/YYYY'
                }
            });
            $('input[name="ETA"]').on('apply.daterangepicker', function (ev, picker) {
<<<<<<< HEAD
                $(this).val(picker.startDate.format('DD/MMM/YYYY'));
=======
                $(this).val(picker.startDate.format('L'));
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            });

            $('input[name="ETA"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
            
            
        });
    // $('#EXP_EXF_DT').datepicker({ dateFormat: 'dd-mm-yy' }).val();
</script>
@endsection