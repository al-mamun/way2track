
<tr id="purchase_id_{{$data->ID}}">
<td style="display:none"> 0</td>
    @foreach($columnSync as $key => $value)
    @php
        $exp = explode('_', $value);
    @endphp
    @if($exp[1] == 'PO No')
        <td style="background-color:#E8ECF1;" class="edit_wip_no" id="{{ $data->ID }}">
			<span id="wip_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
			<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="wip_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
    
    @if($exp[1] == 'Item')
        <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
			<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
			<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
	  </td>
    @endif
    
    @if($exp[1] == 'Description')
        <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
			<span id="DESCRIPTION_{{ $data->ID }}" class="text">{{ $data->DESCRIPTION }}</span>
			<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
    
    @if($exp[1] == 'Qty')
        <td style="background-color:#E8ECF1;" class="editQty" id="{{ $data->ID }}">
			<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
			<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
	  </td>
    @endif
    
    @if($exp[1] == 'Comments')
        <td style="background-color:#E8ECF1;" class="editCOMMENTS" id="{{ $data->ID }}">
			<span id="COMMENTS_{{ $data->ID }}" class="text">{{ $data->COMMENTS }}</span>
			<input type="text" value="{{ $data->COMMENTS }}" class="editbox" id="COMMENTS_input_{{ $data->ID }}" style="display:none">
	  </td>
    @endif
    
<<<<<<< HEAD
    @if($exp[1] == 'Confirmed GRD')
=======
    @if($exp[1] == 'Confirmed EXF')
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
			<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
			<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
    
<<<<<<< HEAD
    @if($exp[1] == 'Exp GRD')
=======
    @if($exp[1] == 'EXP EXF DT')
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
			<span id="EXP_DELIVERY_{{ $data->ID }}" class="text">{{ $EXP_EXF_DT }}</span>
			<input type="date" value="{{ $data->EXP_EXF_DT }}" class="editbox" id="EXP_DELIVERY_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
    
  
    @if($exp[1] == 'ETA')
        <td style="background-color:#E8ECF1;" class="editETD" id="{{ $data->ID }}">
	       
            @if(!empty($data->ETA))
			    @php 
                    $ETA = date("d M  Y", strtotime( $data->ETA)); 
                @endphp
            @else
                @php 
                    $ETA =  $data->ETA; 
                @endphp
            @endif
			<span id="ETD_{{ $data->ID }}" class="text">{{ $ETA }}</span>
			<input type="date" value="{{ $data->ETD }}" class="editbox" id="ETD_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
    
     @if($exp[1] == 'ETD')
        <td style="background-color:#E8ECF1;" class="editETA" id="{{ $data->ID }}">
	         @if(!empty($data->ETD))
			    @php 
                    $ETD = date("d M  Y", strtotime($data->ETD)); 
                @endphp
            @else
                @php 
                    $ETD =  $data->ETD; 
                @endphp
            @endif
			<span id="ETA_{{ $data->ID }}" class="text">{{ $ETD }}</span>
			<input type="date" value="{{ $data->ETA }}" class="editbox" id="ETA_input_{{ $data->ID }}" style="display:none">
	    </td>
    @endif
@endforeach


<td>
 <!--<a href="{{ URL::to( '/list/purchase/order/edit/' .$data->ID) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a> -->
 <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
 <!--<a href="{{ route('purchase_order.delete',$data->ID) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
 <button onclick="purchase_duplicate('{{ $data->ID }}')"  id="purchase_duplicate" type="button" class="btn  btn-info btn-sm">Duplicate </button>
 <button  onClick="deleteData('{{$data->ID}}')" id="purchase_delete" type="button" class="btn  btn-danger btn-sm">Delete</button>
</td>
</tr>

