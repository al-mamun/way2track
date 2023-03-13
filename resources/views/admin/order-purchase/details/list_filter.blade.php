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
              <th>PO No <br><span class="po_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
              <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
              <th>Description <br><span class="description_copy_to_all copy_to_all"><i class="fas fa-copy"></i></span></th>
              <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
              <th>Comments <br><span class="comments_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
              <th>EXP EXF DT <br><span class="exp_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span></th>
              <th>Confirmed EXF <br><span class="exp_confirm_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
              <th>ETD <br><span class="etd_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
              <th>ETA <br><span class="eta_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>    </th>
              <th>Action</th>
          </tr>
      </thead>
  <tbody>
       <tr class="showCommentsDetails" style="display:none">
            <td style="display:none"></td>
            <td>
                <div class="PO_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="PO_box" id="PO_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="savePO()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
                
            </td>
            <td>
                <div class="item_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
            <td>
                <div class="description_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="description_box" id="description_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveDescription()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
            <td>
                <div class="qty_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
               <td>
                <div class="comments_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="comments_box" id="comments_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveComments()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
           
            <td>
                
                <div class="exp_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="exp_box" id="exp_box" name="exp_box" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveexDelivery()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
            <td>
                <div class="exp_confirm_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="exp_confirm" id="exp_confirm" name="exp_confirm"  style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveexpConfirm()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>
         
            <td>
                <div class="etd_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="etd_box" id="etd_box" name="ETDBOX"  style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveETD()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td>  
            <td>
                <div class="eta_td box_header" style="display:none; width:150px;">
                    <input type="text"  class="eta_box" id="eta_box" name="ETABOX" style="width: 65%;float: left;font-size: 15px;">
                    <button class="btn btn-success" onclick="saveETA()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                </div>
            </td> 
         
            <td></td>
        </tr>
    @foreach($poDetails as $key=>$data)
        <tr id="purchase_id_{{$data->ID}}">
          <td style="display:none">{{ $key + 1 }}</td>
           <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
				<span id="wip_{{ $data->ID }}" class="text po_box_text">{{ $data->PO_NO }}</span>
				<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
		  </td>
		  <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
				<span id="ITEM_{{ $data->ID }}" class="text item_box_text">{{ $data->ITEM }}</span>
				<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
		  </td>
	
		  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
				<span id="DESCRIPTION_{{ $data->ID }}" class="text description_box_text">{{ $data->DESCRIPTION }}</span>
				<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
		  </td>
		  <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
				<span id="QTY_{{ $data->ID }}" class="text qty_box_text">{{ $data->QTY }}</span>
				<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
		  </td>
     
   
          <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
				<span id="COMMENTS_{{ $data->ID }}" class="text comments_box_text" >{{ $data->COMMENTS }}</span>
				<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
		  </td>
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
				<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
				<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
		    </td>
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
				<span id="CONFIRMED_EXF_{{ $data->ID }}" class="text">{{ $CONFIRMED_EXF }}</span>
				<input type="date" value="{{ $data->CONFIRMED_EXF }}" class="editbox" id="CONFIRMED_EXF_input_{{ $data->ID }}" style="display:none">
		    </td>
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
				<span id="ETD_{{ $data->ID }}" class="text">{{ $ETD }}</span>
				<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
		    </td>
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
				<span id="ETA_{{ $data->ID }}" class="text">{{ $ETA }}</span>
				<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
		    </td>
          
          <td>
              <!--<a href="javascript:void(0)" onclick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
             <!--<a href="{{ URL::to( '/list/purchase/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
             <!--<a href="{{ route('purchase_order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
              <button  onClick="deleteData('{{$data->ID}}')" id="purchase_delete" type="button" class="btn  btn-danger btn-sm">Delete</button>
          </td>
    </tr>
    @endforeach
  </tbody>
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