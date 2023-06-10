<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Company Description" />
	<meta name="author" content="Company Name">
	<title>Total Office</title>
	<link rel="shortcut icon" href="{{ URL::asset( 'assets/img/favicon.pn' ) }}g">
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://fonts.cdnfonts.com/css/graphik" rel="stylesheet">

	<!-- bootstrap-css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

	    <!-- data table min.css -->
    <link rel="stylesheet" href="{{ URL::asset( 'assets/datatables/css/jquery.dataTables.min.css' ) }}">
    <link rel="stylesheet" href="{{ URL::asset( 'assets/datatables/css/buttons.dataTables.min.css')}}">

	<!-- main stylesheet -->
	<link href="{{ URL::asset( 'assets/css/app.css' ) }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::asset( 'assets/dist/css/lightbox.min.css' ) }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500&display=swap" rel="stylesheet">

 
    <style>
        .btn.btn-info.btn-xs.popup_close_btn {
          width: 104px;
          margin: 10px auto;
          color: #fff;
          display: block;
        }
        .side_style{
            position: fixed;
            top: 55%;
            right: -6%;
            text-align: right;
           transform: rotate(90deg);
           display:none!important;
        }
        div#order_summary {
            position: absolute;
            left: 46%;
            padding-top: 11px;
            font-size: 14px;
        }
        .vertical_btn{
            display:flex!important;
            margin-left: auto;
            margin-right: -8%;
            
        }
        .btn-prime{
            background-color:#084E8D!important;
            color: #fff;
            text-shadow: 0.5px 1.5px black;
            font-size: 16px;
        }
            

       .btn-prime:hover, .btn-prime:focus{
            background-color: #05335d!important;
            border-color: #052e53!important;
            color:#fff!important;
            
        }
        .all_text, .filtered_text{
            
            display:none;
        }
        .all_text.active,.filtered_text.active {
         
          display:block;
        }
    /*.popup_container{*/
    /*     position: fixed;*/
    /*     top: 50%;*/
    /*     left: 50%;*/
    /*     transform: translate(-50%, -50%);*/
    /*     width: 50%;*/
    /*     z-index:9999;*/
    /*     background:#fff;*/
    /*     padding:15px;*/
    /*     border-radius:5px;*/
         
    /*    }*/
    h2.order_summary_header {
        padding-top: 16px;
        padding-left: 20px;
    }
    ul.list_order_header.order_summary_list {
        width: 100%;
        background: #fff;
    }
   .popup_window {
        background: rgba(0,0,0,0.5);
        z-index: 999;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        display:none;
       
    }    
    .popup_window_contact{
        background: rgba(0,0,0,0.5);
        z-index: 999;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        display:none;
       
    }
        
    .popup_container table th, .popup_container table  td   {
        text-align: center;
    }

    .popup_container table  td.text-right   {
        text-align: right;
    }
    
    .btn-details {
        font-size: 22px;
        padding: 0px 10px;
    }
    
  
    .lb-number {
      display: none !important;
    }
    .lb-next {
      display: none !important;
    }
    .lb-prev {
      display: none !important;
    }
    .floating-summary-btn{
        position: fixed;
        top: 55%;
        left: -1%;
        margin-left: 0;
        transform: rotate(90deg);
        display:none;
    }
    </style>

    <!-- data table Jquery -->
    @if($isMobileVersion== 1)
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script> 
        <script src="{{ URL::asset( 'assets/jquery-2.1.3.min.js' ) }}" type="text/javascript"></script>
         	<link rel="stylesheet" href="{{ URL::asset( 'Slick-nav/dist/slicknav.css') }}">
        <script src="{{ URL::asset( 'Slick-nav/dist/jquery.slicknav.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset( 'assets/css/responsive.css') }}">
        <script type="text/javascript">
            $(document).ready(function(){
            	$('#menu').slicknav();
            });
        </script>
    @else
        <script src="{{ URL::asset( 'assets/jquery-2.1.3.min.js' ) }}" type="text/javascript"></script>
    @endif
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="{{ URL::asset( 'assets/datatables/js/dataTables.responsive.min.js' ) }}"></script>

	<script src="{{ URL::asset( 'assets/dist/js/lightbox-plus-jquery.min.js' ) }}"></script>
	<script>
        window.baseUrl = `{{ url('/') }}`;
        window.csrf_token = '{{ csrf_token() }}';
    </script>

</head>
<body>
	<!-- =================== -->
	<!-- page wrapper start -->
	<div class="page-wrapper">
	    @include('master.header')
	
@yield('content')
    @include('master.footer')

	</div>
    <div class="side_style d-flex">
        @if(!empty($saledOrderHeaders->SALESPERSON))<button class="btn btn-sm btn-prime d-block mx-1" data-bs-toggle="modal" data-bs-target="#salesModal">Contact Sales Person - {{ $saledOrderHeaders->SALESPERSON }}</button> <br> @endif
         @if(!empty($saledOrderHeaders->PROJECTMANAGER))<button class="btn btn-sm btn-prime" data-bs-toggle="modal" data-bs-target="#managerModal">Contact Project Manager - {{ $saledOrderHeaders->PROJECTMANAGER }}</button> @endif
    </div>

    <!-- Sales Modal -->
    <div class="modal fade" id="salesModal" tabindex="-1" aria-labelledby="salesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="salesModalLabel">Email Sales Person</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(!empty($saledOrderHeaders->WIP)) <x-mail-component :id="$saledOrderHeaders->WIP" mode="sales"/> @endif
            </div>
          </div>
        </div>
      </div>
      </div>
      <!-- Manager -->
      <div class="modal fade" id="managerModal" tabindex="-1" aria-labelledby="managerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="managerModalLabel">Email Project Manager</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(!empty($saledOrderHeaders->WIP)) <x-mail-component :id="$saledOrderHeaders->WIP" mode="managermanager"/> @endif
           
            </div>
          </div>
        </div>
      </div>
      </div>
	<!-- page wrapper end -->
	<!-- =============== -->
	
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
         $.noConflict();
		$(document).on('click', '.paginate_button', function() {
          //alert('fff');
          window.scrollTo(0, 0);
		});
		
		
		$(document).on('click', '.see-summary', function() {
          //alert('fff');
          
            $('.popup_window').fadeIn();
            $('.popup_container').fadeIn();
           
		});
		$(document).on('click', '.see-contact', function() {
          //alert('fff');
          
            $('.popup_window_contact').fadeIn();
            $('.popup_container_contact').fadeIn();
           
		});
		
		$(document).on('click', '.close', function() {
          //alert('fff');
          
            $('.popup_window_contact').fadeOut();
            $('.popup_container_contact').fadeOut();
           
		});
		
		
		$(document).on('click', '.popup_close_btn', function() {
          //alert('fff');
          
           $('.popup_container').fadeOut();
            $('.popup_window').fadeOut();
             location.reload();
		});
		
		
		
		function salesDetails(orderID,comments, delivery, key) {
		    $.ajax({
                data: {
        			orderID : orderID,
        			comments : comments,
        			delivery : delivery,
        			_token: $("input[name='_token']").val() ,
        		},
                type: "POST",
                url: window.baseUrl + '/order/comments/delivery',
                success:function(data) {
                    $('#resultOfItem').html(data);
                    $('.popup_container').fadeOut();
                    $('.popup_window').fadeOut();
                   
                    $('.all_text').removeClass('active');
                   
                    $('.filtered_text').addClass('active');
                    
                }
            }); 
            
            $.ajax({
                data: {
        			orderID : orderID,
        			comments : comments,
        			delivery : delivery,
        			_token: $("input[name='_token']").val() ,
        		},
                type: "POST",
                url: window.baseUrl + '/order/comments/delivery/count',
                success:function(result) {
                    $('#order_summary').html(result);
                   
                    
                }
            }); 
		}
		

	 	$('#tableresponsive').DataTable( {
	        retrieve: true,
	        language: {
	          "emptyTable": "No result found"
	        },
	        pageLength: 15,
	        paging: true,
	        // sDom: "Rlfrtip",
	        dom: 'Bfrtip',
	       "ordering": true,
	         scrollY: 1000,
             scrollX: false,
	    } );

        $(window).scroll(function(){
            var count = $(this).scrollTop();

            if(count < 350){


            $('.floating-summary-btn').fadeOut();


                $('.side_style').removeClass('vertical_btn');
            }
            else{
                  $('.floating-summary-btn').fadeIn();
                $('.side_style').addClass('vertical_btn');
                
            }
        });
        $('#search').keyup(function() {
            var table = $('#tableresponsive').DataTable();
            table.search($(this).val()).draw();
        });
	</script>
	
	

</body>
</html>
