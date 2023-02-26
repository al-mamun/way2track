<!-- /.card-header -->
<h4 class="card-title" style="margin-bottom:10px;">Shipment Details List</h4>
<div class="card-content table-reponsive" style="width: 100%;display: block;overflow-x: scroll;">
<table class="table table-bordered " id="listShipment" border="1">
    <thead>
      <tr style="color:#000">
            <th style="display:none">SL.</th>
            <th>Shipment ID</th>
            <th>Container No</th>
            <th>Vessel</th>
            <th>Qty</th>
            <th>ETD</th>
            <th>ETA</th>
            <th>Supplier</th>
            <th>PO No</th>
            <th>WIP</th>
            <th>Item</th>
            <th>Description</th>
            <th>Shipment Status</th>
            <!--<th>Action</th>-->
      </tr>
    </thead>
  <tbody>
     @foreach($ShipmentDetail as $key=>$data)
       <tr id="{{ $data->SHIPMENT_ID }}">
          <td style="display:none">{{ $key+1 }}</td>
          <td>{{ $data->SHIPMENT_ID }}</td>
          <td>{{ $data->CONTAINER_NO }}</td>
          <td>{{ $data->VESSEL }}</td>
          <td>{{ $data->Qty }}</td>
          <td>{{ $data->ETD }}</td>
          <td>{{ $data->ETA }}</td>
          <td>{{ $data->SUPPLIER }}</td>
          <td>{{ $data->PO_NO }}</td>
          <td>{{ $data->WIP }}</td>
          <td>{{ $data->ITEM }}</td>
          <td>{{ $data->DESCRIPTION }}</td>
          <td>{{ $data->SHIPMENT_STATUS }}</td>
          <!--<td>-->
          <!--    <a href="{{ URL::to( 'edit/shipment/details/' .$data->id) }}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>-->
          <!--    <a href="{{ URL::to( 'shipment/details/delete/' .$data->id) }}" id="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>-->
          <!--</td>-->
        </tr>
      @endforeach
  </tbody>
</table>
</div>
