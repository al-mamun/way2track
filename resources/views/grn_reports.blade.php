<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Goods Receipt Note</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        .table-right td, th {
          border: 2px solid #000;
          text-align: left;
          padding: 5px;
          font-size:10px;
        }
        .goods_recipe td, th {
          border: 2px solid #000;
          text-align: left;
          padding: 5px;
          font-size:10px;
        }
        /*.goods_recipe th {*/
        /*    border-top: 2px solid #000;*/
        /*    border-bottom: 2px solid #000;*/
        /*}*/


        /*.goods_recipe tr:last-child {*/
        /*    border-bottom: 2px solid #000;*/
        /*}*/
        /*.goods_recipe tr td:last-child {*/
        /*    border-right: 2px solid #000;*/
        /*}*/
       
    </style>
</head>
<body>
    <div style="width:600px; margin:0 auto;">
        <header>
            <div class="logo"  style="opacity: 1; width:150px; margin: 30 auto">
                <img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="Total Office Logo" class="brand-image" style="opacity: 1; width:100%; margin: 0 auto">
            </div>
            <h4 style="text-align: center;"><u>Goods Receipt Note</u></h4>
        </header>
        <div class="main">
            <div style="width:100%;overflow: hidden; height:100px;">
                <div style="width:200px; float:right; display:block">
                    <table class="table table-right">
                        <thead>
                            <tr>
                                <th scope="col">GRN #</th>
                                <th scope="col">{{ $SHD_GRN_NUMBER }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">GRN Date</th>
                                <td>
                                    @php
                                        $date = date("d M  Y", strtotime( $grHeaderInfo->SHIPMENT_RECD_DATE));
                                    @endphp
                                    {{ $date }}
                                 </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">GRN report ID</th>
                                <td>grn_{{ $SHD_GRN_NUMBER }}.pdf</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="width:100%; margin-top:20px; display:block">
                <table class="table goods_recipe">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Shipment ID</th>
                            <th scope="col">PO Number</th>
                            <th scope="col">Item Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php $sl = 1 @endphp
                        @foreach($grDeatailsInfo as $grnData)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td> {{ $grnData->SHIPMENT_ID }} </td>
                            <td>  {{ $grnData->PO_NO }}  </td>
                            <td> {{ $grnData->DESCRIPTION }}  </td>
                            <td>  {{ $grnData->QTY }}  </td>
                            <td>  </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <div style="width:100%; margin-top:20px; display:block">
                <div style="width:200px; float:right; display:block">
                    <h4 style="margin-top: 35px; font-weight: normal;">Received Above Items</h4>
                    <h4 style="margin-top: 35px; font-weight: normal;">Receiver Sign</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>