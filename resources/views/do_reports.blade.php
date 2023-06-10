<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delivery Order Receipt Note</title>
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
        .goods_recipe th {
            border: 2px solid #000;
            border-bottom: 2px solid #000;
        }


        .goods_recipe tr:last-child {
            /*border-bottom: 2px solid #000;*/
        }
        .goods_recipe tr td:last-child {
            /*border-right: 2px solid #000;*/
        }
        br {
        display: none;
        }
        h6 {
            margin:0px;
            padding:0px;
        }
        
    </style>
</head>
<body style=" size: letter;">
    <div style="width:600px; margin:0 auto;">
        <header>
            <div class="logo"  style="opacity: 1; width:150px; margin: 30 auto">
                <img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="Total Office Logo" class="brand-image" style="opacity: 1; width:100%; margin: 0 auto">
            </div>
            <h4 style="text-align: center;"><u>Delivery  Note</u></h4>
        </header>
        <div class="main">
            <div style="width:100%;overflow: hidden; min-height:180px; display:block">
                <div style="width:250px; float:left; display:block;overflow: hidden;">
                    <div style="padding:5px;overflow: hidden;">
                        <table class="table table-right" style="width:100%">
                     
                            <tbody>
                                <tr>
                                    <td>
                                        @php $totalAdress = count($deliveryAddress) -1; @endphp
                                                        
                                        @foreach($deliveryAddress as $key => $addressInfo)
                                            <span style="line-height:12px; font-size:10px;">
                                            @if($totalAdress == $key)
                                                {!! $addressInfo !!}
                                            @else
                                                {!! $addressInfo.'<br>' !!}
                                            @endif
                                            </span>
                                          
                                    @endforeach
                                    </td>
                                 </tr>
                            </tbody>
                            
                        </table>
                    </div>
                            
                </div>
                <div style="width:200px; float:right; display:block">
                    <table class="table table-right">
                        <thead>
                            <tr>
                                <th scope="col">DO #</th>
                                <th scope="col">{{ $DO_GRN_NUMBER }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">DO Date</th>
                                <td>
                                    @php
                                        $date = date("d M  Y", strtotime( $doHeaderInfo->EXP_DELIVERY));
                                    @endphp
                                    {{ $date }}
                                 </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">DO report ID</th>
                                <td>do_{{ $DO_GRN_NUMBER }}.pdf</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                   
                                    Customer PO No
                                </th>
                                <td>
                                    @php $total = count($salesOrderHeaderPoNO) -1; @endphp
                                    @foreach($salesOrderHeaderPoNO as $key => $customerPoNo)
                                        @if($total == $key)
                                            {{ $customerPoNo }}
                                        @else
                                            {!! $customerPoNo.'<br>' !!}
                                        @endif
                                        
                                    @endforeach
                                </td>
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
                            <th scope="col">Delivery ID</th>
                            <!--<th scope="col">PO Number</th>-->
                            <th scope="col">Item Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php $sl = 1 @endphp
                        @foreach($doDeatailsInfo as $doData)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td> {{ $doData->DELIVERY_ID }} </td>
                            <!--<td>  <span class="width:250px; display:block;">{{ $doData->PO_NO }}  </td>-->
                            <td> {{ $doData->DESCRIPTION }}  </td>
                            <td>  {{ $doData->QTY }}  </td>
                            <td>  </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <div style="width:100%; margin-top:20px; display:block">
                <div style="width:300px; float:left; display:block">
                    <p style="font-size:14px;margin-top: 48px; ">For <b> The Total Office Furniture LLC</b></p>
                </div>
                <div style="width:200px; float:right; display:block">
                    <h4 style="margin-top: 5px; font-weight: normal;">Received in Good condition</h4>
                    <h4 style="margin-top: 20px; font-weight: normal;">Receiver's signature</h4>
                </div>
            </div>
            
            <div style="width:100%; margin-top:130px; left:10px; clear:both; position:absolute; bottom:20px;">
                <p style="text-align:center; font-size:12px;">Office # 1702 (17th Floor) Grosvenor Business Tower,Tecom,Dubai,U.A.E,P.O.BOX26326 Tel+97144508700</p>
            </div>
        </div>
    </div>
</body>
</html>