<?php $__env->startSection('content'); ?>
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
tr.selected {
    background: #E8ECF1;
    /* display: block; */
}
tr {
    cursor:pointer;
}
button.btn.btn-success.assign_button {
    width: 182px;
    margin-left: 10px;
    margin-top: 20px;
}
div#listShipment_filter {
    float: left;
    /* margin-top: -55px; */
}
.col-md-6.left_wip {
    width: 45%;
    float: left;
}
</style>
<!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Export Shipment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Export Shipment</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php echo e(csrf_field()); ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
              	        <?php if($errors->any()): ?>
            			    <div class="alert alert-danger">
            			        <ul>
            			            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            			                <li><?php echo e($error); ?></li>
            			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            			        </ul>
            			    </div>
            			<?php endif; ?>


        	       <?php if(Session::has('success')): ?>
        	          <div class="alert alert-success alert-dismissible fade show" role="alert">
        	            <strong><?php echo e(Session::get('success')); ?></strong>
        	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	            	 <span aria-hidden="true">&times;</span>
        	            </button>
        	          </div>
        	        <?php endif; ?>
        	        <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">  Search Purchase Orders </h4>
                                    <button type="button" class="close" data- dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="resultOFAssign" class="table_result"></div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                   
                                </div>
                            </div>
                    
                        </div>
                    </div>

              <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Export Shipment</h3>
                      </div>
                      
                       <input type="hidden" <?php if(isset($id)): ?> value="<?php echo e($newShipmentView[0]->SHIPMENT_ID); ?>" <?php else: ?> value="0" <?php endif; ?> id="itemID">
                      <!-- /.card-header -->
                        <div class="card-content" style="padding:10px">
        		            <table class="table table-bordered" id="listShipment" border="1">
        		                <thead>
            		              <tr style="color:#000">
            		                  <th style="display:none">SL.</th>
            		                  <th>Shipment ID</th>
            		                  <th>Currency</th>
            		                  <th>Net</th>
            		                  <th>Freight Forwarder</th>
            		                  <th>Size</th>
            		                  <th>Comments</th>
            		                  <th>Action</th>
            		              </tr>
            		            </thead>
        		              <tbody>
            		             <?php $__currentLoopData = $newShipmentView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		              <!-- <tr id="<?php echo e($data->SHIPMENT_ID); ?>" onclick="shipmentDetailsList('<?php echo e($data->SHIPMENT_ID); ?>')"  <?php if(isset($id)): ?> class="selected" <?php endif; ?> >-->
            		                   <tr id="<?php echo e($data->SHIPMENT_ID); ?>" onclick="shipmentDetailsList('<?php echo e($data->SHIPMENT_ID); ?>')"  <?php if(isset($id)): ?> class="selected shpipment_id_<?php echo e($data->ID); ?>" <?php else: ?> class="shpipment_id_<?php echo e($data->ID); ?>" <?php endif; ?>>
            		                  <td style="display:none"><?php echo e($key+1); ?></td>
            		                  <td><?php echo e($data->SHIPMENT_ID); ?></td>
            		                  <td style="background-color:#E8ECF1;" id="<?php echo e($data->ID); ?>" class="editCURRENCY">
                    						<span id="CURRENCY_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->CURRENCY); ?></span>
                    						<select name="CURRENCY" class="form-control  editbox" id="CURRENCY_input_<?php echo e($data->ID); ?>" style="display:none">
                                                <option value="<?php echo e($data->CURRENCY); ?>"> <?php echo e($data->CURRENCY); ?></option>
                                                <option value="AFN">Afghan Afghani</option>
                                                <option value="ALL">Albanian Lek</option>
                                                <option value="DZD">Algerian Dinar</option>
                                                <option value="AOA">Angolan Kwanza</option>
                                                <option value="ARS">Argentine Peso</option>
                                                <option value="AMD">Armenian Dram</option>
                                                <option value="AWG">Aruban Florin</option>
                                                <option value="AUD">Australian Dollar</option>
                                                <option value="AZN">Azerbaijani Manat</option>
                                                <option value="BSD">Bahamian Dollar</option>
                                                <option value="BHD">Bahraini Dinar</option>
                                                <option value="BDT">Bangladeshi Taka</option>
                                                <option value="BBD">Barbadian Dollar</option>
                                                <option value="BYR">Belarusian Ruble</option>
                                                <option value="BEF">Belgian Franc</option>
                                                <option value="BZD">Belize Dollar</option>
                                                <option value="BMD">Bermudan Dollar</option>
                                                <option value="BTN">Bhutanese Ngultrum</option>
                                                <option value="BTC">Bitcoin</option>
                                                <option value="BOB">Bolivian Boliviano</option>
                                                <option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
                                                <option value="BWP">Botswanan Pula</option>
                                                <option value="BRL">Brazilian Real</option>
                                                <option value="GBP">British Pound Sterling</option>
                                                <option value="BND">Brunei Dollar</option>
                                                <option value="BGN">Bulgarian Lev</option>
                                                <option value="BIF">Burundian Franc</option>
                                                <option value="KHR">Cambodian Riel</option>
                                                <option value="CAD">Canadian Dollar</option>
                                                <option value="CVE">Cape Verdean Escudo</option>
                                                <option value="KYD">Cayman Islands Dollar</option>
                                                <option value="XOF">CFA Franc BCEAO</option>
                                                <option value="XAF">CFA Franc BEAC</option>
                                                <option value="XPF">CFP Franc</option>
                                                <option value="CLP">Chilean Peso</option>
                                                <option value="CNY">Chinese Yuan</option>
                                                <option value="COP">Colombian Peso</option>
                                                <option value="KMF">Comorian Franc</option>
                                                <option value="CDF">Congolese Franc</option>
                                                <option value="CRC">Costa Rican ColÃ³n</option>
                                                <option value="HRK">Croatian Kuna</option>
                                                <option value="CUC">Cuban Convertible Peso</option>
                                                <option value="CZK">Czech Republic Koruna</option>
                                                <option value="DKK">Danish Krone</option>
                                                <option value="DJF">Djiboutian Franc</option>
                                                <option value="DOP">Dominican Peso</option>
                                                <option value="XCD">East Caribbean Dollar</option>
                                                <option value="EGP">Egyptian Pound</option>
                                                <option value="ERN">Eritrean Nakfa</option>
                                                <option value="EEK">Estonian Kroon</option>
                                                <option value="ETB">Ethiopian Birr</option>
                                                <option value="EUR">Euro</option>
                                                <option value="FKP">Falkland Islands Pound</option>
                                                <option value="FJD">Fijian Dollar</option>
                                                <option value="GMD">Gambian Dalasi</option>
                                                <option value="GEL">Georgian Lari</option>
                                                <option value="DEM">German Mark</option>
                                                <option value="GHS">Ghanaian Cedi</option>
                                                <option value="GIP">Gibraltar Pound</option>
                                                <option value="GRD">Greek Drachma</option>
                                                <option value="GTQ">Guatemalan Quetzal</option>
                                                <option value="GNF">Guinean Franc</option>
                                                <option value="GYD">Guyanaese Dollar</option>
                                                <option value="HTG">Haitian Gourde</option>
                                                <option value="HNL">Honduran Lempira</option>
                                                <option value="HKD">Hong Kong Dollar</option>
                                                <option value="HUF">Hungarian Forint</option>
                                                <option value="ISK">Icelandic KrÃ³na</option>
                                                <option value="INR">Indian Rupee</option>
                                                <option value="IDR">Indonesian Rupiah</option>
                                                <option value="IRR">Iranian Rial</option>
                                                <option value="IQD">Iraqi Dinar</option>
                                                <option value="ILS">Israeli New Sheqel</option>
                                                <option value="ITL">Italian Lira</option>
                                                <option value="JMD">Jamaican Dollar</option>
                                                <option value="JPY">Japanese Yen</option>
                                                <option value="JOD">Jordanian Dinar</option>
                                                <option value="KZT">Kazakhstani Tenge</option>
                                                <option value="KES">Kenyan Shilling</option>
                                                <option value="KWD">Kuwaiti Dinar</option>
                                                <option value="KGS">Kyrgystani Som</option>
                                                <option value="LAK">Laotian Kip</option>
                                                <option value="LVL">Latvian Lats</option>
                                                <option value="LBP">Lebanese Pound</option>
                                                <option value="LSL">Lesotho Loti</option>
                                                <option value="LRD">Liberian Dollar</option>
                                                <option value="LYD">Libyan Dinar</option>
                                                <option value="LTL">Lithuanian Litas</option>
                                                <option value="MOP">Macanese Pataca</option>
                                                <option value="MKD">Macedonian Denar</option>
                                                <option value="MGA">Malagasy Ariary</option>
                                                <option value="MWK">Malawian Kwacha</option>
                                                <option value="MYR">Malaysian Ringgit</option>
                                                <option value="MVR">Maldivian Rufiyaa</option>
                                                <option value="MRO">Mauritanian Ouguiya</option>
                                                <option value="MUR">Mauritian Rupee</option>
                                                <option value="MXN">Mexican Peso</option>
                                                <option value="MDL">Moldovan Leu</option>
                                                <option value="MNT">Mongolian Tugrik</option>
                                                <option value="MAD">Moroccan Dirham</option>
                                                <option value="MZM">Mozambican Metical</option>
                                                <option value="MMK">Myanmar Kyat</option>
                                                <option value="NAD">Namibian Dollar</option>
                                                <option value="NPR">Nepalese Rupee</option>
                                                <option value="ANG">Netherlands Antillean Guilder</option>
                                                <option value="TWD">New Taiwan Dollar</option>
                                                <option value="NZD">New Zealand Dollar</option>
                                                <option value="NIO">Nicaraguan CÃ³rdoba</option>
                                                <option value="NGN">Nigerian Naira</option>
                                                <option value="KPW">North Korean Won</option>
                                                <option value="NOK">Norwegian Krone</option>
                                                <option value="OMR">Omani Rial</option>
                                                <option value="PKR">Pakistani Rupee</option>
                                                <option value="PAB">Panamanian Balboa</option>
                                                <option value="PGK">Papua New Guinean Kina</option>
                                                <option value="PYG">Paraguayan Guarani</option>
                                                <option value="PEN">Peruvian Nuevo Sol</option>
                                                <option value="PHP">Philippine Peso</option>
                                                <option value="PLN">Polish Zloty</option>
                                                <option value="QAR">Qatari Rial</option>
                                                <option value="RON">Romanian Leu</option>
                                                <option value="RUB">Russian Ruble</option>
                                                <option value="RWF">Rwandan Franc</option>
                                                <option value="SVC">Salvadoran ColÃ³n</option>
                                                <option value="WST">Samoan Tala</option>
                                                <option value="SAR">Saudi Riyal</option>
                                                <option value="RSD">Serbian Dinar</option>
                                                <option value="SCR">Seychellois Rupee</option>
                                                <option value="SLL">Sierra Leonean Leone</option>
                                                <option value="SGD">Singapore Dollar</option>
                                                <option value="SKK">Slovak Koruna</option>
                                                <option value="SBD">Solomon Islands Dollar</option>
                                                <option value="SOS">Somali Shilling</option>
                                                <option value="ZAR">South African Rand</option>
                                                <option value="KRW">South Korean Won</option>
                                                <option value="XDR">Special Drawing Rights</option>
                                                <option value="LKR">Sri Lankan Rupee</option>
                                                <option value="SHP">St. Helena Pound</option>
                                                <option value="SDG">Sudanese Pound</option>
                                                <option value="SRD">Surinamese Dollar</option>
                                                <option value="SZL">Swazi Lilangeni</option>
                                                <option value="SEK">Swedish Krona</option>
                                                <option value="CHF">Swiss Franc</option>
                                                <option value="SYP">Syrian Pound</option>
                                                <option value="STD">São Tomé and Príncipe Dobra</option>
                                                <option value="TJS">Tajikistani Somoni</option>
                                                <option value="TZS">Tanzanian Shilling</option>
                                                <option value="THB">Thai Baht</option>
                                                <option value="TOP">Tongan pa'anga</option>
                                                <option value="TTD">Trinidad & Tobago Dollar</option>
                                                <option value="TND">Tunisian Dinar</option>
                                                <option value="TRY">Turkish Lira</option>
                                                <option value="TMT">Turkmenistani Manat</option>
                                                <option value="UGX">Ugandan Shilling</option>
                                                <option value="UAH">Ukrainian Hryvnia</option>
                                                <option value="AED">United Arab Emirates Dirham</option>
                                                <option value="UYU">Uruguayan Peso</option>
                                                <option value="USD">US Dollar</option>
                                                <option value="UZS">Uzbekistan Som</option>
                                                <option value="VUV">Vanuatu Vatu</option>
                                                <option value="VEF">Venezuelan BolÃ­var</option>
                                                <option value="VND">Vietnamese Dong</option>
                                                <option value="YER">Yemeni Rial</option>
                                                <option value="ZMK">Zambian Kwacha</option>
                                            </select>
                    						<!--<input type="text" value="<?php echo e($data->CURRENCY); ?>" class="editbox" id="CURRENCY_input_<?php echo e($data->ID); ?>" style="display:none">-->
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editNET" id="<?php echo e($data->ID); ?>">
                    						<span id="NET_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->NET); ?></span>
                    						<input type="text" value="<?php echo e($data->NET); ?>" class="editbox" id="NET_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    			        <td style="background-color:#E8ECF1;" class="editFREIGHT_FORWARDER" id="<?php echo e($data->ID); ?>">
                    						<span id="FREIGHT_FORWARDER_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->FREIGHT_FORWARDER); ?></span>
                    						<input type="text" value="<?php echo e($data->FREIGHT_FORWARDER); ?>" class="editbox" id="FREIGHT_FORWARDER_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editSIZE" id="<?php echo e($data->ID); ?>">
                    						<span id="SIZE_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->SIZE); ?></span>
                    						<input type="text" value="<?php echo e($data->SIZE); ?>" class="editbox" id="SIZE_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
                    				  <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="<?php echo e($data->ID); ?>">
                    						<span id="COMMENTS_<?php echo e($data->ID); ?>" class="text"><?php echo e($data->COMMENTS); ?></span>
                    						<input type="text" value="<?php echo e($data->COMMENTS); ?>" class="editbox" id="COMMENTS_input_<?php echo e($data->ID); ?>" style="display:none">
                    				  </td>
            		           
            		                  <td>
                                         <!--<a href="<?php echo e(URL::to( 'edit/shipment/details/' .$data->ID)); ?>"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
                                          <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check po and details')): ?>
                                           <a href="<?php echo e(URL::to( 'export/shipment/order/view/' . $data->SHIPMENT_ID)); ?>" type="button" class="btn  btn-info btn-sm">Details</a>
                                           <?php endif; ?>
                                          <!--<a href="javascript:void(0)" onClick="edit('<?php echo e($data->ID); ?>')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
            		                     <!-- <a href="<?php echo e(URL::to( 'shipment/delete/' .$data->ID)); ?>" id="delete" class="btn btn-danger btn-circle btn-sm"> Delete</a>-->
            		                      <button  onClick="deleteData('<?php echo e($data->ID); ?>')" id="salesOrderDelete" type="button" class="btn btn-danger btn-sm">Delete</button>
            		                  </td>
            		                </tr>
            		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		              </tbody>
        		          </table>

	                    </div>
	                    
	                     <div class="card-content" style="padding:10px">
	                         <div id ="resultOfShipmentResult">
	                             
	                            </div>
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
<!-- /.content-wrapper -->
<script type="text/javascript">
   function deleteData(ID) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Be careful please !  All related details will be deleted with this.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        
            if (result.isConfirmed) {
                // window.location.href = link;
                $.ajax({
                    type: "POST",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'ID': ID,
                      
                    },
                    url: baseUrl +'/shipment/delete/'+ ID , 
                    success: function(HTML) {
                        $('.shpipment_id_'+ID).hide();
                        Swal.fire(
                          'Deleted!',
                          'Your record has been deleted',
                          'success'
                        );
                    }
                
                });
            }
            
        
        });
  
    }

    
        // Edit input box click action
    $(".editbox").mouseup(function() {
        return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });
    
    function edit(ID) {
        
        $("#CURRENCY_"+ID).hide();
        $("#CURRENCY_input_"+ID).show();
        
        $("#NET_"+ID).hide();
        $("#NET_input_"+ID).show();
        
        $("#SIZE_" + ID ).hide();
        $("#SIZE_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
      
    }

    $(document).on('keyup click', '.editCURRENCY', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CURRENCY_"+ID).hide();
        $("#CURRENCY_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CURRENCY_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CURRENCY': $("#CURRENCY_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#CURRENCY_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editNET', function() {
    
        var ID    = $(this).attr('id');
        
        $("#NET_"+ID).hide();
        $("#NET_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#NET_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'NET': $("#NET_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#NET_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
   $(document).on('keyup click', '.editFREIGHT_FORWARDER', function() {
    
        var ID    = $(this).attr('id');
        
        $("#FREIGHT_FORWARDER_" + ID ).hide();
        $("#FREIGHT_FORWARDER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#FREIGHT_FORWARDER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'FREIGHT_FORWARDER': $("#FREIGHT_FORWARDER_input_"+ID).val(),
                'type': 6
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#FREIGHT_FORWARDER_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    $(document).on('keyup click', '.editSIZE', function() {
    
        var ID    = $(this).attr('id');
        
        $("#SIZE_" + ID ).hide();
        $("#SIZE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SIZE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SIZE': $("#SIZE_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#SIZE_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click', '.editCOMMENTS', function() {
    
        var ID    = $(this).attr('id');
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#COMMENTS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'COMMENTS': $("#COMMENTS_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/shipment_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    function shipmentDetailsList(shiped_id) {
        
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/shipped/single/order/details', 
            data: {
                '_token': $('input[name=_token]').val(),
                'shiped_id': shiped_id,
            
                'type': 1,
            },
            success: function(result) { 
                $('#resultOfShipmentResult').html(result);
                
            }
        }); 
    }
    
    function assign() {
        var itemID = $("#itemID").val();
        var to   = $("#to").val();
    
        $.ajax({
            type: "POST",
            url: baseUrl +'/list/purchase/order/header/modal', 
            data: {
                '_token': $('input[name=_token]').val(),
                'itemID': itemID,
            
                'type': 1,
            },
            success: function(result) { 
                
                $('.table_result').html(result);
                 
            
            }
        });  
    }
    
    $('#listShipment').DataTable( {
        buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Shipment',
                exportOptions: {
                    columns: [ 1,2,3,4,5 ]
                }
            }
        ],
    
        retrieve: true,
        language: {
          "emptyTable": "No result found"
        },
        pageLength: 10,
        paging: true,
        // sDom: "Rlfrtip",
        dom: 'Bfrtip',
    } );
    $("tbody tr").click(function () {
        $('.selected').removeClass('selected');
        $(this).addClass("selected");
        
        var id = $(this).attr("id");
        $("#itemID").val(id);
        
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/shipment/export-list.blade.php ENDPATH**/ ?>