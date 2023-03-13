@foreach($deliveryExportDetails as $key=>$data)
<input type="text" value="{{ $data->ID }}" name="details_id" id="detailsID_{{ $data->ID }}" style="display:none">
@endforeach
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
table#deliveryDetailsSearch {
    width: 100% !important;
}
</style>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
    <table class="table table-bordered " id="deliveryDetailsSearch" border="1">
        <thead>
            <tr style="color:#000">
                <th style="display:none">SL.</th>
                <th>Delivery ID <br><span class="delivery_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                <th>Shipment ID <br><span class="shipment_id_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span>  </th>
                <th>PO No <br><span class="po_no_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Item <br><span class="item_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Qty <br><span class="qty_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Description <br><span class="description_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Delivery Date <br><span class="delivery_date_copy_to_all copy_to_all"> <i class="fas fa-copy"></i></span> </th>
                <th>Action</th>	              
            </tr>
            <tr class="showCommentsDetails" style="display:none">
                <td style="display:none"></td>
                
                <td>
                    <div class="delivery_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="delivery_id_box" id="delivery_id_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDeliveryID()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                    
                </td>
                <td>
                    <div class="shipment_id_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="shipment_id_box" id="shipment_id_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="shipmentIDSAVE()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                    
                </td>
                <td>
                    <div class="po_no_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="po_no_box" id="po_no_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="savePONO()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                 <td>
                    <div class="item_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="item_box" id="item_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveItem()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                <td>
                    <div class="qty_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="qty_box" id="qty_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveQty()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>
                <td>
                    <div class="descraption_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="descraption_box" id="descraption_box" name="descraption_box"  style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDescraption()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td>  
                <td>
                    <div class="delivery_date_td box_header" style="display:none; width:150px;">
                        <input type="text"  class="delivery_date_box" id="delivery_date_box" name="delivery_date_box" style="width: 65%;float: left;font-size: 15px;">
                        <button class="btn btn-success" onclick="saveDeliveryDate()" style="width: 35%;float: left;font-size: 10px;">Save</button>
                    </div>
                </td> 
                <td> </td>
             
            </tr>
        </thead>
      <tbody>
         @foreach($deliveryExportDetails as $key=>$data)
           <tr id="{{ $data->DELIVERY_ID }}" class="delivery_id_{{ $data->ID }}">
              <td style="display:none">{{ $key+1 }}</td>
              <td>{{ $data->DELIVERY_ID }}</td>
              <td>{{ $data->SHIPMENT_ID }}</td>
              <!--<td>{{ $data->PO_NO }}</td>-->
              <!--<td>{{ $data->ITEM }}</td>-->
              <!--<td>{{ $data->Qty }}</td>-->
              <!--<td>{{ $data->DESCRIPTION }}</td>-->
              
               <td style="background-color:#E8ECF1;" id="{{ $data->ID }}" class="editPO_NO">
                    <span style="width: 126px; display: block;">
    					<span id="PO_NO_{{ $data->ID }}" class="text">{{ $data->PO_NO }}</span>
    					<input type="text" value="{{ $data->PO_NO }}" class="editbox" id="PO_NO_input_{{ $data->ID }}" style="display:none">
					</span>
			  </td>
			  <td style="background-color:#E8ECF1;" class="editITEM" id="{{ $data->ID }}">
					<span id="ITEM_{{ $data->ID }}" class="text">{{ $data->ITEM }}</span>
					<input type="text" value="{{ $data->ITEM }}" class="editbox" id="ITEM_input_{{ $data->ID }}" style="display:none">
			  </td>
		
			  <td style="background-color:#E8ECF1;" class="editQTY" id="{{ $data->ID }}">
					<span id="QTY_{{ $data->ID }}" class="text">{{ $data->QTY }}</span>
					<input type="text" value="{{ $data->QTY }}" class="editbox" id="QTY_input_{{ $data->ID }}" style="display:none">
			  </td>
			  <td style="background-color:#E8ECF1;" class="editDESCRIPTION" id="{{ $data->ID }}">
					<span id="DESCRIPTION_{{ $data->ID }}" class="text" STYLE="width:250px; display:block">{{ $data->DESCRIPTION }}</span>
					<input type="text" value="{{ $data->DESCRIPTION }}" class="editbox" id="DESCRIPTION_input_{{ $data->ID }}" style="display:none">
			  </td>
               <td style="background-color:#E8ECF1;" class="editDELIVERYDATE" id="{{ $data->ID }}">
                   @if(!empty($data->DELIVERY_DATE))
		            @php $DELIVERY_DATE = date("d M  Y", strtotime($data->DELIVERY_DATE))  @endphp
		        @else
		            @php $DELIVERY_DATE =$data->DELIVERY_DATE; @endphp
		        @endif
                    <span style="width: 126px; display: block;">
    					<span id="DELIVERYDATE_{{ $data->ID }}" class="text">{{ $DELIVERY_DATE }}</span>
    					<input type="date" value="{{ $DELIVERY_DATE }}" class="editbox" id="DELIVERYDATE_input_{{ $data->ID }}" style="display:none">
					</span>
			  </td>
              <td>
                  <!--<a href="javascript:void(0)" onClick="edit('{{ $data->ID }}')"  class="btn btn-primary btn-circle btn-sm">Edit</a> -->
                   <button  onClick="deleteData('{{  $data->ID }}')" id="deleteID" type="button" class="btn  btn-danger btn-sm">Delete</button>
                  <!--<a href="{{ URL::to( 'export/delivery/details/delete/' .$data->ID)  }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
              </td>
            </tr>
          @endforeach
      </tbody>
  </table>

</div>

 <script src="{{ URL::asset( 'js/delivery_details.js') }}"></script>
 <script type="text/javascript">
    $('#deliveryDetailsSearch').DataTable( {
         buttons: [
          {
                extend: 'excelHtml5',
                text:'Export',
                title:'Export Shipment Details',
                // exportOptions: {
                //     columns: [ 1,2,3,4,5,6,7,8,9 ,10,11,12,13,14,15,16,17]
                // }
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
 </script
 