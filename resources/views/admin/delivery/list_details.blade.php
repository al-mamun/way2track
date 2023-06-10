<!-- /.card-header -->
<h4 class="card-title" style="margin-bottom:10px;">Shipment Details List</h4>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
<table class="table table-bordered " id="listShipment" border="1">
    <thead>
        <tr style="color:#000">
            <th style="display:none">SL.</th>
            <th>Deliver ID</th>
            <th>Shipment ID</th>
            <th>PO No</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Descraption</th>
        </tr>
    </thead>
  <tbody>
     @foreach($deliveryDetail as $key=>$data)
       <tr id="{{ $data->SHIPMENT_ID }}">
          <td style="display:none">{{ $key+1 }}</td>
          <td>{{ $data->DELIVERY_ID }}</td>
          <td>{{ $data->SHIPMENT_ID }}</td>
          <td>{{ $data->PO_NO }}</td>
          <td>{{ $data->ITEM }}</td>
          <td>{{ $data->QTY }}</td>
          <td>{{ $data->DESCRIPTION }}</td>
         
        </tr>
      @endforeach
  </tbody>
</table>
</div>
