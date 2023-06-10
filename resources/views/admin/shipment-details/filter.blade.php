<style>
   span.copy_to_all {
        font-size: 10px;
        position: relative;
        top: 0px;
        right: 0px;
        background: green;
        color: #fff;
        padding: 3px;
        text-align: center;
        border-radius: 5px;
        clear: both;
        float: none;
        display: inline-block;
        width: auto;
        min-width: 70px;
    }
    th {
        position: relative;
    }
</style>
@foreach($newShipmentView as $key=>$data)
<input type="text" value="{{ $data->ID }}" name="details_id" id="detailsID_{{ $data->ID }}" style="display:none">
@endforeach
<div id="success"> </div>
 <!-- /.card-header -->
<div class="large-table-fake-top-scroll-container-3">
    <div>&nbsp;</div>
</div>
<div class="top_scroll">
    <table class="table table-bordered " id="listShipment" border="1">
<<<<<<< HEAD
        <thead>
          <tr style="color:#000">
              
                <th style="display:none">SL.</th>
                @foreach($columnSync as $key => $value)
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  6)
                            ->first();
    
                    @endphp
                    
                    @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Shipment ID <br><span class="shipment_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    
                    @if($exp[1] == 'Container No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Container No <br><span class="container_no_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Vessel  <br><span class="vessel_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>ETD <br><span class="etd_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>ETA <br><span class="eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    
                    @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Supplier <br><span class="supplier_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
    
                    @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <th>PO No <br><span class="po_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    
                    @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Receive Date<br><span class="receivecopy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
               
                    @endif
                    
                    @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                
                    @endif
    
                    @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Description  <br><span class="description_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                
                    @endif
                    
                    @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                
                    @endif
                    
                    @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Act Exf Date <br><span class="act_exf_date_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                    @endif
                    
                    @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>MBL MAWB <br><span class="mbl_mawb_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                    @endif
                    
                    @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Vessel Sailing Date  <br><span class="vessel_selling_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> 
                    @endif
                    
                    @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Confirmed ETA  <br><span class="pconfirmed_eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> 
                    @endif
                    
                    @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Shipment Status <br><span class="shipment_status_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                    @endif
                    
                @endforeach
                
                <!--<th>Warehouse Date <br><span class="wip_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>-->
                
                <th>Action</th>
          </tr>
          
        </thead>
        <thead>
            <tr class="showCommentsDetails" style="display:none">
                <td style="display:none"></td>
                
                
                @foreach($columnSync as $key => $value)
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  6)
                            ->first();
    
                    @endphp
                    
                    @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="shipment_id_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="shipment_id_box" id="shipment_id_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="shipmentIDSAVE()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                            
                        </td>
                    @endif
                    
                    @if($exp[1] == 'Container No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="container_no_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="container_no_box" id="container_no_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveContainer()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                            
                        </td>
                    @endif
                    @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <td>
                            <div class="vessel_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="vessel_box" id="vessel_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveVessel()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="qty_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="etd_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="etd_box" id="etd_box" name="ETDBOX"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveETD()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td> 
                    @endif
                    @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="eta_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="eta_box" id="eta_box" name="ETABOX" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td> 
                    @endif
                    
                    @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <td>
                            <div class="supplier_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="supplier_box" id="supplier_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveSupplier()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
    
                    @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="po_no_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="po_no_box" id="po_no_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="savePoNo()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
               
                    @endif
                    
                    @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                           <div class="receive_date_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="receiveDate" id="receiveDate" name="receiveDate" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="savereceiveDate()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                            
                        </td>
               
                    @endif
                    
                    @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <td>
                    
                            <div class="item_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="item_box" id="item_box" name="item_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveITEM()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                
                    @endif
    
                    @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="description_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="description_box" id="description_box" name="description_box"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                
                    @endif
                    
                    @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                       
                        <td>
                            <div class="comments_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="comments_box" id="comments_box" name="comments_box"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                        
                
                    @endif
                    
                    @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="exp_confirm_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="exp_confirm" id="exp_confirm" name="exp_confirm"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveexpConfirm()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    
                    @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="MBL_MAWB_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="MBL_MAWB_BOX" id="MBL_MAWB_BOX" name="MBL_MAWB_BOX"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveMBLMAWB()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    
                    @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="vessel_selling_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="vessel_selling_box" id="vessel_selling_box" name="vessel_selling_box"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="SaveSellingVessel()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    
                    @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="exp_confirm_etd_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="exp_confirm_eta" id="exp_confirm_eta" name="exp_confirm_eta"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveexpConfirmETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    
                    @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td>
                            <div class="shipment_status_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="shipment_status_box" id="shipment_status_box" name="shipment_status_box"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveShipmentStatus()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    
                @endforeach
              
                
               
                <!-- <td>-->
                <!--      <div class="waireHouse_td box_header" style="display:none; width:150px;">-->
                <!--        <input type="text"  class="waireHuseDate" id="waireHuseDate" name="waireHuseDate" style="width: 65%;float: left;font-size: 15px;">-->
                <!--        <button class="btn btn-success" onclick="saveWare()" style="width: 35%;float: left;font-size: 10px;">Save</button>-->
                <!--    </div>-->
                   
                <!--</td>-->
               
               
                
                <td></td>
            </tr>
        </thead>
        <tbody>
         @foreach($newShipmentView as $key=>$data)
           <tr id="{{ $data->SHIPMENT_ID }}">
              <td style="display:none">{{ $key+1 }}</td>
              @foreach($columnSync as $key => $value)
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  6)
                            ->first();
        
                    @endphp
                    @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>{{ $data->SHIPMENT_ID }}</td>
                    @endif
                    
                    @if($exp[1] == 'Container No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" id="{{ $data->ID }}" class="editCONTAINER_NO">
            				<span id="CONTAINER_NO_{{ $data->ID }}" class="text">{{ $data->CONTAINER_NO }}</span>
            				<input type="text" value="{{ $data->CONTAINER_NO }}" class="editbox" id="CONTAINER_NO_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editVESSEL" id="{{ $data->ID }}">
            				<span id="VESSEL_{{ $data->ID }}" class="text vessel_box_id">{{ $data->VESSEL }}</span>
            				<input type="text" value="{{ $data->VESSEL }}" class="editbox" id="VESSEL_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
            				<span id="Qty_{{ $data->ID }}" class="text">{{ $data->Qty }}</span>
            				<input type="text" value="{{ $data->Qty }}" class="editbox" id="Qty_input_{{ $data->ID }}" style="display:none">
            		    </td>
            		    
                    @endif
                    @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editETD" id="{{ $data->ID }}">
            		        @if(!empty($data->ETD))
            				    @php 
                                    $ETD = date("d M  Y", strtotime($data->ETD)); 
                                @endphp
                            @else
                                @php 
                                    $ETD =  $data->ETD; 
                                @endphp
                            @endif
            				<span id="ETD_{{ $data->ID }}"  style="width: 83px;display: block;" class="text">{{ $ETD }}</span>
            				<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
            		    </td>
            		    
                    @endif
                    @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editETA" id="{{ $data->ID }}">
            		        @if(!empty($data->ETA))
            				    @php 
                                    $ETA = date("d M  Y", strtotime( $data->ETA)); 
                                @endphp
                            @else
                                @php 
                                    $ETA =  $data->ETA; 
                                @endphp
                            @endif
            				<span id="ETA_{{ $data->ID }}" style="width: 83px;display: block;" class="text">{{ $ETA}}</span>
            				<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    
                    @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editSUPPLIER" id="{{ $data->ID }}">
            				<span id="SUPPLIER_{{ $data->ID }}" class="text">{{ $data->SUPPLIER }}</span>
            				<input type="text" value="{{ $data->SUPPLIER }}" class="editbox" id="SUPPLIER_input_{{ $data->ID }}" style="display:none">
            		    </td>
            		    
        			    
                    @endif
                    
                    
                    @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editPO_NO" id="{{ $data->ID }}">
            				<span id="PO_NO_{{ $data->ID }}" style="width: 110px;display: block;"  class="text">{{ $data->PO_NO }}</span>
            				<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="PO_NO_input_{{ $data->ID }}" style="display:none">
            		    </td>
            	
            		    
                    @endif
                    
                    
                    @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editSHIPMENTRECDDATE" id="{{ $data->ID }}">
            		         @if(!empty($data->SHIPMENT_RECD_DATE))
            				    @php 
                                    $SHIPMENT_RECD_DATE = date("d M  Y", strtotime( $data->SHIPMENT_RECD_DATE)); 
                                @endphp
                            @else
                                @php 
                                    $SHIPMENT_RECD_DATE =  $data->SHIPMENT_RECD_DATE; 
                                @endphp
                            @endif
            				<span id="SHIPMENT_RECD_DATE_{{ $data->ID }}"  style="width: 83px;display: block;" class="text">{{ $SHIPMENT_RECD_DATE }}</span>
            				<input type="date" value="{{ $SHIPMENT_RECD_DATE}}" class="editbox" id="SHIPMENT_RECD_DATE_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
            				<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
            				<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    
                    @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
                            <span style="width:300px; display:block">
                				<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
                				<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
                			</span>
            		    </td>
            		    
            		    
        	  
                    @endif
                    
                    @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
            				<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
            				<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editACT_EXF_DATE" id="{{ $data->ID }}">
            		       @if(!empty($data->ACT_EXF_DATE))
            				    @php 
                                    $ACT_EXF_DATE = date("d M  Y", strtotime( $data->ACT_EXF_DATE)); 
                                @endphp
                            @else
                                @php 
                                    $ACT_EXF_DATE =  $data->ACT_EXF_DATE; 
                                @endphp
                            @endif
            				<span id="ACT_EXF_DATE_{{ $data->ID }}"  style="width: 83px;display: block;" class="text">{{ $ACT_EXF_DATE }}</span>
            				<input type="date" value="{{ $ACT_EXF_DATE}}" class="editbox" id="ACT_EXF_DATE_input_{{ $data->ID }}" style="display:none">
            		    </td>
            		    
                    @endif
                    
                    @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <td style="background-color:#E8ECF1;" class="editMBL_MAWB" id="{{ $data->ID }}">
            				<span id="MBL_MAWB_{{ $data->ID }}" class="text">{{ $data->MBL_MAWB }}</span>
            				<input type="text" value="{{ $data->MBL_MAWB }}" class="editbox" id="MBL_MAWB_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <td style="background-color:#E8ECF1;" class="editVESSEL_SAILING_DATE" id="{{ $data->ID }}">
            		       @if(!empty($data->VESSEL_SAILING_DATE))
            				    @php 
                                    $VESSEL_SAILING_DATE = date("d M  Y", strtotime( $data->VESSEL_SAILING_DATE)); 
                                @endphp
                            @else
                                @php 
                                    $VESSEL_SAILING_DATE =  $data->VESSEL_SAILING_DATE; 
                                @endphp
                            @endif
            				<span id="VESSEL_SAILING_DATE_{{ $data->ID }}"  style="width: 83px;display: block;" class="text">{{ $VESSEL_SAILING_DATE}}</span>
            				<input type="date" value="{{ $data->VESSEL_SAILING_DATE }}" class="editbox" id="VESSEL_SAILING_DATE_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editCONFIRMED_ETA" id="{{ $data->ID }}">
            		         @if(!empty($data->CONFIRMED_ETA))
            				    @php 
                                    $CONFIRMED_ETA = date("d M  Y", strtotime( $data->CONFIRMED_ETA)); 
                                @endphp
                            @else
                                @php 
                                    $CONFIRMED_ETA =  $data->CONFIRMED_ETA; 
                                @endphp
                            @endif
            				<span id="CONFIRMED_ETA_{{ $data->ID }}" class="text"  style="width: 83px;display: block;" >{{ $CONFIRMED_ETA }}</span>
            				<input type="date" value="{{ $data->CONFIRMED_ETA }}" class="editbox" id="CONFIRMED_ETA_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                    @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editSHIPMENT_STATUS" id="{{ $data->ID }}">
            				<span id="SHIPMENT_STATUS_{{ $data->ID }}" class="text">{{ $data->SHIPMENT_STATUS }}</span>
            				<input type="text" value="{{ $data->SHIPMENT_STATUS }}" class="editbox" id="SHIPMENT_STATUS_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    
                @endforeach
              
                
                
    		   
         
              <td>
                    <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                    <!-- <a href="{{ URL::to( 'edit/shipment/details/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                    <button  onClick="deleteData('{{$data->ID}}')" id="deleteList" type="button" class="btn btn-danger btn-sm">Delete</button>
                   <!--<a href="{{ URL::to( 'export/shipment/order/delete/' .$data->ID)  }}" id="delete" class="btn btn-danger btn-circle btn-sm">Delete</a>-->
              </td>
            </tr>
          @endforeach
      </tbody>
        <tfoot>
            <tr style="color:#000">
          
                <th style="display:none">SL.</th>
                @foreach($columnSync as $key => $value)
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  6)
                            ->first();
    
                    @endphp
                    
                    @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Shipment ID <br> </th>
                    @endif
                    
                    @if($exp[1] == 'Container No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Container No </th>
                    @endif
                    @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Vessel  </th>
                    @endif
                    @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Qty  </th>
                    @endif
                    @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>ETD </th>
                    @endif
                    @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>ETA </th>
                    @endif
                    
                    @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Supplier  </th>
                    @endif
    
                    @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                         <th>PO No </th>
                    @endif
                    
                    @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Receive Date</th>
               
                    @endif
                    
                    @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Item </th>
                
                    @endif
    
                    @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Description</span> </th>
                
                    @endif
                    
                    @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                       <th>Comments</th>
                
                    @endif
                    
                    @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Act Exf Date </th>
                    @endif
                    
                    @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>MBL MAWB </th>
                    @endif
                    
                    @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Vessel Sailing Date</th> 
                    @endif
                    
                    @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Confirmed ETA  </th> 
                    @endif
                    
                    @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <th>Shipment Status </th>
                    @endif
                    
                @endforeach
                
                <!--<th>Warehouse Date <br><span class="wip_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>-->
                
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
=======
    <thead>
      <tr style="color:#000">
          
            <th style="display:none">SL.</th>
            @foreach($columnSync as $key => $value)
                @php
                    $exp = explode('_', $value);
                    
                    $settingTableInfo = DB::table('w2t_setting_column_table')
                        ->where('page_name', $exp[1])
                        ->where('type',  6)
                        ->first();

                @endphp
                
                @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Shipment ID <br><span class="shipment_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                
                @if($exp[1] == 'Container NO' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Container NO <br><span class="container_no_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Vessel  <br><span class="vessel_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>ETD <br><span class="etd_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>ETA <br><span class="eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                
                @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Supplier <br><span class="supplier_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif

                @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <th>PO No <br><span class="po_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                
                @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Receive Date<br><span class="receivecopy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
           
                @endif
                
                @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
            
                @endif

                @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Description  <br><span class="description_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
            
                @endif
                
                @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                   <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
            
                @endif
                
                @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Act Exf Date <br><span class="act_exf_date_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                @endif
                
                @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>MBL MAWB <br><span class="mbl_mawb_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                @endif
                
                @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Vessel Sailing Date  <br><span class="vessel_selling_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> 
                @endif
                
                @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Confirmed ETA  <br><span class="pconfirmed_eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th> 
                @endif
                
                @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <th>Shipment Status <br><span class="shipment_status_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                @endif
                
            @endforeach
            
            <!--<th>Warehouse Date <br><span class="wip_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>-->
            
            <th>Action</th>
      </tr>
      <tr class="showCommentsDetails" style="display:none">
            <td style="display:none"></td>
            
            
            @foreach($columnSync as $key => $value)
                @php
                    $exp = explode('_', $value);
                    
                    $settingTableInfo = DB::table('w2t_setting_column_table')
                        ->where('page_name', $exp[1])
                        ->where('type',  6)
                        ->first();

                @endphp
                
                @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="shipment_id_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="shipment_id_box" id="shipment_id_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="shipmentIDSAVE()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                        
                    </td>
                @endif
                
                @if($exp[1] == 'Container NO' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="container_no_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="container_no_box" id="container_no_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveContainer()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                        
                    </td>
                @endif
                @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <td>
                        <div class="vessel_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="vessel_box" id="vessel_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveVessel()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="qty_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="etd_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="etd_box" id="etd_box" name="ETDBOX"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveETD()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td> 
                @endif
                @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="eta_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="eta_box" id="eta_box" name="ETABOX" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td> 
                @endif
                
                @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <td>
                        <div class="supplier_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="supplier_box" id="supplier_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveSupplier()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif

                @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="po_no_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="po_no_box" id="po_no_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="savePoNo()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
           
                @endif
                
                @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                       <div class="receive_date_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="receiveDate" id="receiveDate" name="receiveDate" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="savereceiveDate()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                        
                    </td>
           
                @endif
                
                @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                   <td>
                
                        <div class="item_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="item_box" id="item_box" name="item_box" style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveITEM()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
            
                @endif

                @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="description_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="description_box" id="description_box" name="description_box"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
            
                @endif
                
                @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    
                   
                    <td>
                        <div class="comments_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="comments_box" id="comments_box" name="comments_box"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                    
            
                @endif
                
                @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="exp_confirm_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="exp_confirm" id="exp_confirm" name="exp_confirm"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveexpConfirm()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                
                @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="MBL_MAWB_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="MBL_MAWB_BOX" id="MBL_MAWB_BOX" name="MBL_MAWB_BOX"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveMBLMAWB()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                
                @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="vessel_selling_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="vessel_selling_box" id="vessel_selling_box" name="vessel_selling_box"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="SaveSellingVessel()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                
                @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>
                        <div class="exp_confirm_etd_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="exp_confirm_eta" id="exp_confirm_eta" name="exp_confirm_eta"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveexpConfirmETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                
                @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    
                    <td>
                        <div class="shipment_status_td box_header" style="display:none; width:150px;">
                            <input type="text"  class="shipment_status_box" id="shipment_status_box" name="shipment_status_box"  style="width: 65%;float: left;font-size: 15px;">
                            <button class="btn btn-success" onclick="saveShipmentStatus()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                        </div>
                    </td>
                @endif
                
            @endforeach
          
            
           
            <!-- <td>-->
            <!--      <div class="waireHouse_td box_header" style="display:none; width:150px;">-->
            <!--        <input type="text"  class="waireHuseDate" id="waireHuseDate" name="waireHuseDate" style="width: 65%;float: left;font-size: 15px;">-->
            <!--        <button class="btn btn-success" onclick="saveWare()" style="width: 35%;float: left;font-size: 10px;">Save</button>-->
            <!--    </div>-->
               
            <!--</td>-->
           
           
            
            <td></td>
        </tr>
    </thead>
    <tbody>
     @foreach($newShipmentView as $key=>$data)
       <tr id="{{ $data->SHIPMENT_ID }}">
          <td style="display:none">{{ $key+1 }}</td>
          @foreach($columnSync as $key => $value)
                @php
                    $exp = explode('_', $value);
                    
                    $settingTableInfo = DB::table('w2t_setting_column_table')
                        ->where('page_name', $exp[1])
                        ->where('type',  6)
                        ->first();
    
                @endphp
                @if($exp[1] == 'Shipment ID' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td>{{ $data->SHIPMENT_ID }}</td>
                @endif
                
                @if($exp[1] == 'Container NO' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" id="{{ $data->ID }}" class="editCONTAINER_NO">
        				<span id="CONTAINER_NO_{{ $data->ID }}" class="text">{{ $data->CONTAINER_NO }}</span>
        				<input type="text" value="{{ $data->CONTAINER_NO }}" class="editbox" id="CONTAINER_NO_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                @if($exp[1] == 'Vessel' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editVESSEL" id="{{ $data->ID }}">
        				<span id="VESSEL_{{ $data->ID }}" class="text vessel_box_id">{{ $data->VESSEL }}</span>
        				<input type="text" value="{{ $data->VESSEL }}" class="editbox" id="VESSEL_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                @if($exp[1] == 'Qty' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    
                    <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
        				<span id="Qty_{{ $data->ID }}" class="text">{{ $data->Qty }}</span>
        				<input type="text" value="{{ $data->Qty }}" class="editbox" id="Qty_input_{{ $data->ID }}" style="display:none">
        		    </td>
        		    
                @endif
                @if($exp[1] == 'ETD' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editETD" id="{{ $data->ID }}">
        		        @if(!empty($data->ETD))
        				    @php 
                                $ETD = date("d M  Y", strtotime($data->ETD)); 
                            @endphp
                        @else
                            @php 
                                $ETD =  $data->ETD; 
                            @endphp
                        @endif
        				<span id="ETD_{{ $data->ID }}" class="text">{{ $ETD }}</span>
        				<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
        		    </td>
        		    
                @endif
                @if($exp[1] == 'ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editETA" id="{{ $data->ID }}">
        		        @if(!empty($data->ETA))
        				    @php 
                                $ETA = date("d M  Y", strtotime( $data->ETA)); 
                            @endphp
                        @else
                            @php 
                                $ETA =  $data->ETA; 
                            @endphp
                        @endif
        				<span id="ETA_{{ $data->ID }}" class="text">{{ $ETA}}</span>
        				<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                
                @if($exp[1] == 'Supplier' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editSUPPLIER" id="{{ $data->ID }}">
        				<span id="SUPPLIER_{{ $data->ID }}" class="text">{{ $data->SUPPLIER }}</span>
        				<input type="text" value="{{ $data->SUPPLIER }}" class="editbox" id="SUPPLIER_input_{{ $data->ID }}" style="display:none">
        		    </td>
        		    
    			    
                @endif
                
                
                @if($exp[1] == 'PO No' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editPO_NO" id="{{ $data->ID }}">
        				<span id="PO_NO_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
        				<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="PO_NO_input_{{ $data->ID }}" style="display:none">
        		    </td>
        	
        		    
                @endif
                
                
                @if($exp[1] == 'Receive Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editSHIPMENTRECDDATE" id="{{ $data->ID }}">
        		         @if(!empty($data->SHIPMENT_RECD_DATE))
        				    @php 
                                $SHIPMENT_RECD_DATE = date("d M  Y", strtotime( $data->SHIPMENT_RECD_DATE)); 
                            @endphp
                        @else
                            @php 
                                $SHIPMENT_RECD_DATE =  $data->SHIPMENT_RECD_DATE; 
                            @endphp
                        @endif
        				<span id="SHIPMENT_RECD_DATE_{{ $data->ID }}" class="text">{{ $SHIPMENT_RECD_DATE }}</span>
        				<input type="date" value="{{ $SHIPMENT_RECD_DATE}}" class="editbox" id="SHIPMENT_RECD_DATE_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                @if($exp[1] == 'Item' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
        				<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
        				<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                
                @if($exp[1] == 'Description' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
        				<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
        				<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
        		    </td>
        		    
        		    
    	  
                @endif
                
                @if($exp[1] == 'Comments' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                   <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
        				<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
        				<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                @if($exp[1] == 'Act Exf Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editACT_EXF_DATE" id="{{ $data->ID }}">
        		       @if(!empty($data->ACT_EXF_DATE))
        				    @php 
                                $ACT_EXF_DATE = date("d M  Y", strtotime( $data->ACT_EXF_DATE)); 
                            @endphp
                        @else
                            @php 
                                $ACT_EXF_DATE =  $data->ACT_EXF_DATE; 
                            @endphp
                        @endif
        				<span id="ACT_EXF_DATE_{{ $data->ID }}" class="text">{{ $ACT_EXF_DATE }}</span>
        				<input type="date" value="{{ $ACT_EXF_DATE}}" class="editbox" id="ACT_EXF_DATE_input_{{ $data->ID }}" style="display:none">
        		    </td>
        		    
                @endif
                
                @if($exp[1] == 'MBL MAWB' &&  !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                   <td style="background-color:#E8ECF1;" class="editMBL_MAWB" id="{{ $data->ID }}">
        				<span id="MBL_MAWB_{{ $data->ID }}" class="text">{{ $data->MBL_MAWB }}</span>
        				<input type="text" value="{{ $data->MBL_MAWB }}" class="editbox" id="MBL_MAWB_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                @if($exp[1] == 'Vessel Sailing Date' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                   <td style="background-color:#E8ECF1;" class="editVESSEL_SAILING_DATE" id="{{ $data->ID }}">
        		       @if(!empty($data->VESSEL_SAILING_DATE))
        				    @php 
                                $VESSEL_SAILING_DATE = date("d M  Y", strtotime( $data->VESSEL_SAILING_DATE)); 
                            @endphp
                        @else
                            @php 
                                $VESSEL_SAILING_DATE =  $data->VESSEL_SAILING_DATE; 
                            @endphp
                        @endif
        				<span id="VESSEL_SAILING_DATE_{{ $data->ID }}" class="text">{{ $VESSEL_SAILING_DATE}}</span>
        				<input type="date" value="{{ $data->VESSEL_SAILING_DATE }}" class="editbox" id="VESSEL_SAILING_DATE_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                @if($exp[1] == 'Confirmed ETA' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editCONFIRMED_ETA" id="{{ $data->ID }}">
        		         @if(!empty($data->CONFIRMED_ETA))
        				    @php 
                                $CONFIRMED_ETA = date("d M  Y", strtotime( $data->CONFIRMED_ETA)); 
                            @endphp
                        @else
                            @php 
                                $CONFIRMED_ETA =  $data->CONFIRMED_ETA; 
                            @endphp
                        @endif
        				<span id="CONFIRMED_ETA_{{ $data->ID }}" class="text">{{ $CONFIRMED_ETA }}</span>
        				<input type="date" value="{{ $data->CONFIRMED_ETA }}" class="editbox" id="CONFIRMED_ETA_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
                @if($exp[1] == 'Shipment Status' && !empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                    <td style="background-color:#E8ECF1;" class="editSHIPMENT_STATUS" id="{{ $data->ID }}">
        				<span id="SHIPMENT_STATUS_{{ $data->ID }}" class="text">{{ $data->SHIPMENT_STATUS }}</span>
        				<input type="text" value="{{ $data->SHIPMENT_STATUS }}" class="editbox" id="SHIPMENT_STATUS_input_{{ $data->ID }}" style="display:none">
        		    </td>
                @endif
                
            @endforeach
          
            
            
		   
     
          <td>
                <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                <!-- <a href="{{ URL::to( 'edit/shipment/details/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
                <button  onClick="deleteData('{{$data->ID}}')" id="deleteList" type="button" class="btn btn-danger btn-sm">Delete</button>
               <!--<a href="{{ URL::to( 'export/shipment/order/delete/' .$data->ID)  }}" id="delete" class="btn btn-danger btn-circle btn-sm">Delete</a>-->
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
</div>
   <script src="{{ URL::asset( 'js/shipment_details.js') }}"></script>
   <!-- /.content-wrapper -->
    <script type="text/javascript">
        $(function () {
          var tableContainer = $(".top_scroll");
          var table = $(".top_scroll table");
          var fakeContainer = $(".large-table-fake-top-scroll-container-3");
          var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");
        
          var tableWidth = table.width();
          fakeDiv.width(tableWidth);
        
          fakeContainer.scroll(function () {
            tableContainer.scrollLeft(fakeContainer.scrollLeft());
          });
          tableContainer.scroll(function () {
            fakeContainer.scrollLeft(tableContainer.scrollLeft());
          });
        });
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
                    url: baseUrl +'/export/shipment/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('#'+ID).hide();
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
        $("#CONTAINER_NO_"+ID).hide();
        $("#CONTAINER_NO_input_"+ID).show();
        
        $("#VESSEL_"+ID).hide();
        $("#VESSEL_input_"+ID).show();
        
        $("#Qty_" + ID ).hide();
        $("#Qty_input_"+ID).show();
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();

        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();

        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();

        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();

        $("#SHIPMENT_STATUS_"+ID).hide();
        $("#SHIPMENT_STATUS_input_"+ID).show();
        
        $("#COMMENTS_"+ID).hide();
        $("#COMMENTS_input_"+ID).show();
        
        $("#ACT_EXF_DATE_"+ID).hide();
        $("#ACT_EXF_DATE_input_"+ID).show();
        
        $("#MBL_MAWB_"+ID).hide();
        $("#MBL_MAWB_input_"+ID).show();
        
        $("#VESSEL_SAILING_DATE_"+ID).hide();
        $("#VESSEL_SAILING_DATE_input_"+ID).show();
        
        $("#CONFIRMED_ETA_"+ID).hide();
        $("#CONFIRMED_ETA_input_"+ID).show();
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
         $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
    }

    
    $(document).on('keyup click', '.editCONTAINER_NO', function() {
    
        var ID    = $(this).attr('id');
        
        $("#CONTAINER_NO_"+ID).hide();
        $("#CONTAINER_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONTAINER_NO_input_"+ID).val();
    
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONTAINER_NO': $("#CONTAINER_NO_input_"+ID).val(),
                'type':1
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#CONTAINER_NO_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editVESSEL', function() {
    
        var ID    = $(this).attr('id');
        
        $("#VESSEL_"+ID).hide();
        $("#VESSEL_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#VESSEL_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'VESSEL': $("#VESSEL_input_"+ID).val(),
                'type':2
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#VESSEL_"+ID).html(first);
                }
            });
    
    }).change(function() {});
    
    $(document).on('keyup click', '.editQty', function() {
    
        var ID    = $(this).attr('id');
        
        $("#Qty_" + ID ).hide();
        $("#Qty_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#Qty_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'Qty': $("#Qty_input_"+ID).val(),
                'type': 3
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#Qty_"+ID).html(first);
                }
            });
    
    }).change(function() {});

    $(document).on('keyup click change', '.editETD', function() {
    
        var ID    = $(this).attr('id');
        
        $("#ETD_"+ID).hide();
        $("#ETD_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETD_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETD': $("#ETD_input_"+ID).val(),
                'type':4
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ETD_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editETA', function() {
        
        var ID    = $(this).attr('id');
        
        $("#ETA_"+ID).hide();
        $("#ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ETA': $("#ETA_input_"+ID).val(),
                'type':5
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ETA_"+ID).html(date);
            }
        });
    }).change(function() { });

    $(document).on('keyup click', '.editSUPPLIER', function() {
        
        var ID    = $(this).attr('id');
        
        $("#SUPPLIER_"+ID).hide();
        $("#SUPPLIER_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SUPPLIER_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SUPPLIER': $("#SUPPLIER_input_"+ID).val(),
                'type':6
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#SUPPLIER_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editITEM', function() {
        
        var ID    = $(this).attr('id');
        
        $("#ITEM_"+ID).hide();
        $("#ITEM_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ITEM_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ITEM': $("#ITEM_input_"+ID).val(),
                'type':7
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#ITEM_"+ID).html(first);
            }
        });
    }).change(function() { });
    $(document).on('keyup click', '.editDESCRIPTION', function() {
        
        var ID    = $(this).attr('id');
        
        $("#DESCRIPTION_"+ID).hide();
        $("#DESCRIPTION_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#DESCRIPTION_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'DESCRIPTION': $("#DESCRIPTION_input_"+ID).val(),
                'type':8
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#DESCRIPTION_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editSHIPMENT_STATUS', function() {
        
        var ID    = $(this).attr('id');
        
        $("#SHIPMENT_STATUS_"+ID).hide();
        $("#SHIPMENT_STATUS_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#SHIPMENT_STATUS_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'SHIPMENT_STATUS': $("#SHIPMENT_STATUS_input_"+ID).val(),
                'type':9
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#SHIPMENT_STATUS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click', '.editPO_NO', function() {
        
        var ID    = $(this).attr('id');
        
        $("#PO_NO_"+ID).hide();
        $("#PO_NO_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#PO_NO_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'PO_NO': $("#PO_NO_input_"+ID).val(),
                'type':10
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#PO_NO_input_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click', '.editWIP', function() {
        
        var ID    = $(this).attr('id');
        
        $("#WIP_"+ID).hide();
        $("#WIP_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WIP_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WIP': $("#WIP_input_"+ID).val(),
                'type':11
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#WIP_"+ID).html(first);
            }
        });
    }).change(function() { });
    
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
                'type':12
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#COMMENTS_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editACT_EXF_DATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#ACT_EXF_DATE_"+ID).hide();
        $("#ACT_EXF_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#ACT_EXF_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'ACT_EXF_DATE': $("#ACT_EXF_DATE_input_"+ID).val(),
                'type':13
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#ACT_EXF_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    
    $(document).on('keyup click', '.editMBL_MAWB', function() {
        
        var ID    = $(this).attr('id');
        
        $("#MBL_MAWB_"+ID).hide();
        $("#MBL_MAWB_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#MBL_MAWB_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'MBL_MAWB': $("#MBL_MAWB_input_"+ID).val(),
                'type':14
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#MBL_MAWB_"+ID).html(first);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editVESSEL_SAILING_DATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#VESSEL_SAILING_DATE_"+ID).hide();
        $("#VESSEL_SAILING_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#VESSEL_SAILING_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'VESSEL_SAILING_DATE': $("#VESSEL_SAILING_DATE_input_"+ID).val(),
                'type':15
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(date) {
                $("#VESSEL_SAILING_DATE_"+ID).html(date);
            }
        });
    }).change(function() { });
    
    $(document).on('keyup click change', '.editWAREHOUSEDATE', function() {
        
        var ID    = $(this).attr('id');
        
        $("#WAREHOUSE_DATE_"+ID).hide();
        $("#WAREHOUSE_DATE_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#WAREHOUSE_DATE_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'WAREHOUSE_DATE': $("#WAREHOUSE_DATE_input_"+ID).val(),
                'type':17
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(html) {
                $("#WAREHOUSE_DATE_"+ID).html(html);
            }
        });
    }).change(function() { });
    $(document).on('keyup click change', '.editCONFIRMED_ETA', function() {
        
        var ID    = $(this).attr('id');
        
        $("#CONFIRMED_ETA_"+ID).hide();
        $("#CONFIRMED_ETA_input_"+ID).show();
        
        var ID    = $(this).attr('id');
        var first = $("#CONFIRMED_ETA_input_"+ID).val();
            
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).attr('id'),
                'CONFIRMED_ETA': $("#CONFIRMED_ETA_input_"+ID).val(),
                'type':16
            },
            url: baseUrl +'/shipment_details_update' , 
            success: function(eta) {
                $("#CONFIRMED_ETA_"+ID).html(eta);
            }
        });
    }).change(function() { });
    
        $('#listShipment').DataTable( {
         buttons: [
<<<<<<< HEAD
             @if( $status == 1)
            {
=======
          {
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Shipment Details',
                exportOptions: {
<<<<<<< HEAD
                    columns: [ 1,2,3,4,5,6,7,8,9 ,10,11,12,13,14,15,16,17],
                     rows: [@foreach($newShipmentView as $key=>$data) @php  $key = $key @endphp {{ $key .',' }} @endforeach]
                }
            }
            @endif
=======
                    columns: [ 1,2,3,4,5,6,7,8,9 ,10,11,12,13,14,15,16,17]
                }
            }
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
    </script>