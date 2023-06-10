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
<div id="success"> </div>
@foreach($poDetails as $key=>$data)
<input type="text" value="{{ $data->ID }}" name="details_id" id="detailsID_{{ $data->ID }}" style="display:none">
@endforeach
<table class="table table-bordered"  id="listOfOrderDetails">
    <thead>
            <tr style="color:#000">
                <th style="display:none">SL.</th>
                @foreach($columnSync as $key => $value)
                    @if(!empty($value))
                        @php
                            $exp = explode('_', $value);
                            
                            $settingTableInfo = DB::table('w2t_setting_column_table')
                                ->where('page_name', $exp[1])
                                ->where('type',  4)
                                ->first();
    
                        @endphp
                        @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>PO No <br><span class="po_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                        @endif
                        @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                        @endif
                        @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Description <br><span class="description_copy_to_all copy_to_all"><i class="fas fa-copy"></i></span></th>
                        @endif
                        @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                        @endif
                        @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                        @endif
<<<<<<< HEAD
                        @if($exp[1] == 'Exp GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Exp GRD <br><span class="exp_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                        @endif
                        @if($exp[1] == 'Confirmed GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Confirmed GRD <br><span class="exp_confirm_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
=======
                        @if($exp[1] == 'Confirmed EXF' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>EXP EXF DT <br><span class="exp_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
                        @endif
                        @if($exp[1] == 'EXP EXF DT' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>Confirmed EXF <br><span class="exp_confirm_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                        @endif
                        @if($exp[1] == 'ETA' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                            <th>ETA <br><span class="eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
                        @endif
                        @if($exp[1] == 'ETD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                             <th>ETD <br><span class="etd_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
                        @endif
                    @endif
                @endforeach
              
              <th>Action</th>
          </tr>
      </thead>
<<<<<<< HEAD
    <thead>
=======
  <tbody>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
       <tr class="showCommentsDetails" style="display:none">
            <td style="display:none"></td>
            @foreach($columnSync as $key => $value)
                @if(!empty($value))
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  4)
                            ->first();

                    @endphp
                    @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="PO_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="PO_box" id="PO_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="savePO()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                            
                        </td>
                    @endif
                    @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td>
                            <div class="item_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
            
                    @endif
                    @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="description_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="description_box" id="description_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
                    @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td>
                            <div class="qty_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
            
                    @endif
                    @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td>
                            <div class="comments_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="comments_box" id="comments_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
<<<<<<< HEAD
                    @if($exp[1] == 'Exp GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                    @if($exp[1] == 'Confirmed EXF' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                        <td>
                            <div class="exp_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="exp_box" id="exp_box" name="exp_box" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveexDelivery()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                    @endif
<<<<<<< HEAD
                    @if($exp[1] == 'Confirmed GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                    @if($exp[1] == 'EXP EXF DT' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                         <td>
                            <div class="exp_confirm_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="exp_confirm" id="exp_confirm" name="exp_confirm"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveexpConfirm()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
                     
                    @endif
                    @if($exp[1] == 'ETA' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td>
                            <div class="eta_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="eta_box" id="eta_box" name="ETABOX" style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>
            
                    @endif
                    @if($exp[1] == 'ETD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td>
                            <div class="etd_td box_header" style="display:none; width:150px;">
                                <input type="text"  class="etd_box" id="etd_box" name="ETDBOX"  style="width: 65%;float: left;font-size: 15px;">
                                <button class="btn btn-success" onclick="saveETD()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                            </div>
                        </td>  
            
                    @endif
                @endif
            @endforeach
           
<<<<<<< HEAD
            <td></td>
        </tr>
    </thead>
    <tbody>
=======
            
            
            
            
           
            
           
            
         
            <td></td>
        </tr>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    @foreach($poDetails as $key=>$data)
        <tr id="purchase_id_{{$data->ID}}">
            <td style="display:none">{{ $key + 1 }}</td>
            @foreach($columnSync as $key => $value)
                @if(!empty($value))
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  4)
                            ->first();

                    @endphp
                    @if($exp[1] == 'PO No' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
<<<<<<< HEAD
            				<span id="wip_{{ $data->ID }}" class="text po_box_text"  style=" width: 138px;display: block;">{{ $data->PO_NO }}</span>
=======
            				<span id="wip_{{ $data->ID }}" class="text po_box_text">{{ $data->PO_NO }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            				<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Item' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        
                        <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
        				    <span id="ITEM_{{ $data->ID }}" class="text item_box_text">{{ $data->ITEM }}</span>
            				<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Description' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
<<<<<<< HEAD
            				<span id="DESCRIPTION_{{ $data->ID }}" class="text description_box_text"  style=" width: 250px;display: block;">{{ $data->DESCRIPTION }}</span>
=======
            				<span id="DESCRIPTION_{{ $data->ID }}" class="text description_box_text">{{ $data->DESCRIPTION }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            				<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Qty' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
            				<span id="QTY_{{ $data->ID }}" class="text qty_box_text">{{ $data->QTY }}</span>
            				<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Comments' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
            				<span id="COMMENTS_{{ $data->ID }}" class="text comments_box_text" >{{ $data->COMMENTS }}</span>
            				<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
<<<<<<< HEAD
                    @if($exp[1] == 'Exp GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
                    @if($exp[1] == 'Confirmed EXF' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                         <td style="background-color:#E8ECF1;" class="editEXP_DELIVERY" id="{{ $data->ID }}">
                            @if(!empty($data->EXP_EXF_DT))
            				    @php 
                                    $EXP_EXF_DT = date("d M  Y", strtotime( $data->EXP_EXF_DT)); 
                                @endphp
                            @else
                                @php 
                                    $EXP_EXF_DT =  $data->EXP_EXF_DT; 
                                @endphp
                            @endif
<<<<<<< HEAD
            				<span id="EXP_DELIVERY_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $EXP_EXF_DT }}</span>
            				<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'Confirmed GRD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
=======
            				<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
            				<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'EXP EXF DT' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                        <td style="background-color:#E8ECF1;" class="editEXP_CONFIRMED_EXF" id="{{ $data->ID }}">
            		        @if(!empty($data->CONFIRMED_EXF))
            				    @php 
                                    $CONFIRMED_EXF = date("d M  Y", strtotime( $data->CONFIRMED_EXF)); 
                                @endphp
                            @else
                                @php 
                                    $CONFIRMED_EXF =  $data->ETA; 
                                @endphp
                            @endif
<<<<<<< HEAD
            				<span id="CONFIRMED_EXF_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $CONFIRMED_EXF }}</span>
=======
            				<span id="CONFIRMED_EXF_{{ $data->ID }}" class="text">{{ $CONFIRMED_EXF }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            				<input type="date" value="{{ $data->CONFIRMED_EXF }}" class="editbox" id="CONFIRMED_EXF_input_{{ $data->ID }}" style="display:none">
            		    </td>
                    @endif
                    @if($exp[1] == 'ETA' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editETA" id="{{ $data->ID }}">
            		        @if(!empty($data->ETA))
            				    @php 
                                    $ETA = date("d M  Y", strtotime($data->ETA)); 
                                @endphp
                            @else
                                @php 
                                    $ETA =  $data->ETA; 
                                @endphp
                            @endif
<<<<<<< HEAD
            				<span id="ETA_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $ETA }}</span>
=======
            				<span id="ETA_{{ $data->ID }}" class="text">{{ $ETA }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            				<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
            		    </td>
                        
                    @endif
                    @if($exp[1] == 'ETD' &&!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                        <td style="background-color:#E8ECF1;" class="editETD" id="{{ $data->ID }}">
                            @if(!empty($data->ETD))
            				    @php 
                                    $ETD = date("d M  Y", strtotime( $data->ETD)); 
                                @endphp
                            @else
                                @php 
                                    $ETD =  $data->ETD; 
                                @endphp
                            @endif
<<<<<<< HEAD
            				<span id="ETD_{{ $data->ID }}" class="text" style="width:86px; display:block; text-align:center">{{ $ETD }}</span>
=======
            				<span id="ETD_{{ $data->ID }}" class="text">{{ $ETD }}</span>
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            				<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
            		    </td>
                        
		    
                    @endif
                @endif
            @endforeach
           
		    
<<<<<<< HEAD
=======
	
		    
		    
     
   
            
           
		    
		   
		    
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
          
          <td>
              <!--<a href="javascript:void(0)" onclick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
             <!--<a href="{{ URL::to( '/list/purchase/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
             <!--<a href="{{ route('purchase_order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
              <button  onClick="deleteData('{{$data->ID}}')" id="purchase_delete" type="button" class="btn  btn-danger btn-sm">Delete</button>
          </td>
    </tr>
    @endforeach
  </tbody>
<<<<<<< HEAD
    <tfoot>
      <tr style="color:#000">
          <th style="display:none">SL.</th>
            @foreach($columnSync as $key => $value)
                @if(!empty($value))
                    @php
                        $exp = explode('_', $value);
                        
                        $settingTableInfo = DB::table('w2t_setting_column_table')
                            ->where('page_name', $exp[1])
                            ->where('type',  4)
                            ->first();

                    @endphp
                    @if(!empty( $settingTableInfo) &&  $settingTableInfo->status == 1)
                     <th scope="col">{{ $exp[1] }} </th>
                     @endif
                @endif
             
             @endforeach
          <th>Action</th>
        </tr>
    </tfoot>
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
</table>
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
                    url: baseUrl +'/list/order/delete/'+ ID , 
                    success: function(HTML) {
                        $('#purchase_id_'+ID).hide();
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
    
</script>
<script src="{{ URL::asset( 'js/purchase_details.js') }}"></script>