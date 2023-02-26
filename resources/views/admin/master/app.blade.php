<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset( 'admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- jQuery -->
    <script src="{{ URL::asset( 'admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ URL::asset( 'admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        tr.selected {
            background: #c6e0b4  !important;
        }
        tr.selected td{
            background: #c6e0b4  !important;
        }
         tr.selected td{
            color: #fff !important;
        }
        button.btn.btn-secondary.buttons-excel.buttons-html5 {
            color: #fff;
            background-color: green !important;
            border-color: green !important;
        }
        .navbar-expand .navbar-nav .dropdown-menu {
            position: absolute;
            left: 0px !important;
        }
        nav.main-header.navbar.navbar-expand.navbar-light {
            margin-left: 0px !important;
        }
        .content-wrapper {
            margin-left: 0px !important;
        }
        nav.main-header.navbar.navbar-expand.navbar-light {
            margin-left: 0px !important;
            padding: 0px 44px;
        }
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
            width: 90%;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto;
        }
        i.fa.fa-chevron-down {
            padding-left: 7px;
            padding-top: 6px;
            float: right;
        }
        input#file {
            width: 362px !important;
            float: left;
            height: 40px;
            color: #fff;
            padding-top: 5px;
        }
        button.btn.btn-success.import_button {
            height: 40px;
            text-transform: uppercase;
        }
        button.btn.btn-success.import_button {
            margin-left: 20px;
            border-radius: 2px;
        }
        .dataTables_filter {
            float: right;
        }
        .dt-buttons.btn-group.flex-wrap {
            float: right;
            margin-top: 20px;
            margin-left: 10px;
        }
        .dataTables_filter {
            float: left;
        }
        button.btn.btn-success.assign_button_result {
            float: right;
        }
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite; /* Safari */
          animation: spin 2s linear infinite;
        }
    </style>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    
    
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset( 'admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ URL::asset( 'admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::asset( 'admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ URL::asset( 'admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ URL::asset( 'admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ URL::asset( 'admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ URL::asset( 'admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ URL::asset( 'admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ URL::asset( 'admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset( 'admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!--<script src="{{ URL::asset( 'admin/dist/js/demo.js') }}"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset( 'admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset( 'admin/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!--<script src="{{ URL::asset( 'admin/plugins/datatables/dataTables.editor.min.js') }}"></script>-->
    <!--<script src="http://desa.antsgsm.com/ants/libs/Editor-2.0.4/js/dataTables.editor.js" ></script>-->
    <!-- AdminLTE App -->
    <!--<script src="{{ URL::asset( 'admin/dist/js/adminlte.min.js') }}"></script>-->
    <!-- AdminLTE for demo purposes -->
    <!--<script src="{{ URL::asset( 'admin/dist/js/demo.js') }}"></script>-->
    <!-- Page specific script -->
    <!-- Header Script -->
    
    <script>
        window.baseUrl = `{{ url('/') }}`;
        window.csrf_token = '{{ csrf_token() }}';
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="https://devpt.way2track.com/public/assets/img/logo.png" alt="Total Office Logo" height="30px" width="auto">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <!--<ul class="navbar-nav">-->
    <!--    <li class="nav-item">-->
    <!--        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>-->
    <!--    </li>-->
    <!--</ul>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav" style="margin-right: auto!important;">
        <li class="nav-item dropdown">
            <a href="{{ URL::to( 'dashboard') }}" class="brand-link">
              <img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="Total Office Logo" class="brand-image" style="opacity: 1;">
              <!--<span class="brand-text font-weight-light">AdminLTE 3</span>-->
            </a>
        </li>
        <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown"  style="padding-top: 6px;">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    Sales Orders
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: 0px;right: inherit;">
                  @can('add sales order')
                    <div class="dropdown-divider"></div>
                    <a href="{{ URL::to( 'new/order/status') }}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Add Sales Order
                    </a>
                  @endcan
                  @can('add sales order details')
                    <div class="dropdown-divider"></div>
                    <a href="{{ URL::to( 'new/order/details') }}" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> Add S.O. Details
                    </a>
                  @endcan
                  @can('import sales order details')
                    <div class="dropdown-divider"></div>
                    <a href="{{ URL::to( 'list/order/status') }}" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> Import S.O. Details
                    </a>
                  @endcan
                  @can('export sales order')
                    <div class="dropdown-divider"></div>
                    <a href="{{ URL::to( 'list/order/status/export') }}" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> Export Sales Order
                    </a>
                  @endcan
                  @can('export sales order details')
                  <div class="dropdown-divider"></div>
                    <a href="{{ URL::to( '/list/order/details') }}" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> Export S.O Details
                    </a>
                  @endcan
                </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown" style="padding-top: 6px;">
            <a class="nav-link" data-toggle="dropdown" href="#">
                Purchase Orders
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              @can('add purchase order')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'new/purchase/order/header') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> Add Purchase Order
              </a>
              @endcan
              @can('add purchase order details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'create/purchase/order/details') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Add P.O.  Details
              </a>
              @endcan
              @can('import purchase order details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'list/purchase/order/header') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Import P.O. Details
              </a>
              @endcan
              @can('export purchase order')
                 <div class="dropdown-divider"></div>
                  <a href="{{ URL::to( 'list/purchase/order/header_export') }}" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> Export Purchase Order
                  </a>
                @endcan
                @can('export purchase order details')
                  <div class="dropdown-divider"></div>
                  <a href="{{ URL::to( 'list/purchase/order/details') }}" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> Export P.O. Details
                  </a>
                @endcan
            </div>

          </li>
         
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown" style="padding-top: 6px;">
            <a class="nav-link" data-toggle="dropdown" href="#">
               Shipments
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @can('create shipment')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'create/shipment') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i>Create Shipment
              </a>
                @endcan
             
             @can('add shipment details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'add/shipment/details') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Add Shipment  Details
              </a>
              @endcan
              
              @can('edit shipment details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to('edit/shipment/details') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Edit Shipment  Details
              </a>
              @endcan
           
            @can('export shipment')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'export/shipments') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Export Shipment
              </a>
            @endcan
      
            @can('export shipment details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'export/shipment/order') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Export Shipment Details
              </a>
            @endcan
            </div>

          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown" style="padding-top: 6px;">
            <a class="nav-link" data-toggle="dropdown" href="#">
               Deliveries
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @can('create delivery')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'create/delivery') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i>Create Delivery
              </a>
             @endcan
             @can('add delivery details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'add/delivery/details') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Add Delivery Details
              </a>
              @endcan
              @can('edit delivery details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'edit/delivery/details') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Edit Delivery Details
              </a>
              @endcan
              @can('export delivery')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'export/deliverys') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Export Delivery
              </a>
            @endcan
            
            @can('export delivery details')
              <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'export/delivery/details') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Export Delivery Details
              </a>
            @endcan
            </div>

          </li>
                 
          <!-- permission and role menu -->
          <!-- Notifications Dropdown Menu -->
          @if(auth()->user()->hasRole('super admin'))
          <li class="nav-item dropdown" style="padding-top: 6px;">
            <a class="nav-link" data-toggle="dropdown" href="#">
                Users
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <div class="dropdown-divider"></div>
              <a href="{{ URL::to( 'new-user-setup') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i>Add User
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.user_list') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i>Edit User / Attach Role
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.role.create') }}" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> Add Role
              </a>
                
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.role.index') }}" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> Edit Roles / Attach menu
                </a>
                
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.permission_create') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> Add Permission
          
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.permission_list') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> Permissions
              
              </a>
              
                 
            </div>
            @endif
          </li>
          
    </ul>
    <ul class="navbar-nav ml-auto" style="margin-right: 0px; !important;">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::TO( 'logout') }}" role="button">
                Logout
            </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="display:none">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ URL::asset( 'admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <!--<div class="sidebar">-->
 

      @include('admin.master.sidebar')
      
    <!--</div>-->
    <!-- /.sidebar -->
  </aside>



    
   <!-- /.content-header -->
     <!-- Content area -->
      @yield('content')
      <!-- /content area -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 </strong>
    All rights reserved.
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
</script>

<script>
    // $(function() {
    //   $('input[type="date"]').daterangepicker({
    //       timePicker: true,
    //     locale: {
    //         format: 'DD/MMM/YYYY'
    //     }
    //   });
    // });
</script>
<script>
        $(function() {
          $('input[name="date"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
          });
        });
        
        $(function() {
          $('input[name="EXP_HANDOVER_DT"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
          });
        });
        
        $(function() {
          $('input[name="EXP_DELIVERY"]').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MMM/YYYY'
            }
          });
        });
        
        
    // $('input[type="date"]').daterangepicker({
    //     timePicker: true,
    //     startDate: moment().startOf('hour'),
    //     endDate: moment().startOf('hour').add(32, 'hour'),
    //     locale: {
    //       format: 'M/DD hh:mm A'
    //     }
    // });
//   $(function(){
    
//     $(document).on('click','#delete',function(e){
    
//      e.preventDefault();
//      var link = $(this).attr("href");
//          Swal.fire({
//           title: 'Are you sure?',
//           text: "Be careful please !  All related details will be deleted with this.",
//           icon: 'warning',
//           showCancelButton: true,
//           confirmButtonColor: '#3085d6',
//           cancelButtonColor: '#d33',
//           confirmButtonText: 'Yes, delete it!'
//         }).then((result) => {
//           if (result.isConfirmed) {
//             window.location.href = link;
//             Swal.fire(
//               'Deleted!',
//               'Your record has been deleted',
//               'success'
//             )
//           }
//         });
    
//     });
// });
</script>
</body>
</html>
