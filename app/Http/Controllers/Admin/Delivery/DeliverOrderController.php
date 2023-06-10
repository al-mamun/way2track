<?php

namespace App\Http\Controllers\Admin\Delivery;

use Illuminate\Http\Request;
use App\Models\DeliveryDetail;
use App\Models\DeliveryDetailTemp;
use App\Models\Delivery;
use App\Models\Shipment;
use App\Models\ShipmentHeader;
use App\Models\ShipmentDetail;
use App\Models\PoHeader;
use App\Models\PoDetails;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
<<<<<<< HEAD
use App\Models\Settings;
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use Carbon\Carbon;
use App\Models\DoReportsDetail;
use App\Models\DOReports;
use Illuminate\Support\Facades\Validator;
 use Barryvdh\DomPDF\Facade\Pdf;
 
class DeliverOrderController extends Controller
{

    public function ShipmentView() {
        $newShipmentView = Shipment::latest()->paginate();
        return view('admin.delivery.report.index',compact('newShipmentView'));
    }
    
    public function createDeliveryList(Request $request) {
        
        $DELIVERY_RECD_DATE = $request->DELIVERY_RECD_DATE;
        $DELIVERY_RECD_DATEs = Carbon::createFromFormat('d/F/Y', $DELIVERY_RECD_DATE)->format('Y-m-d');
        
        $deliveryID = Delivery::where('EXPECTED_DELIVERY', $DELIVERY_RECD_DATEs)->pluck('DELIVERY_ID');
        
<<<<<<< HEAD
=======
        
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        $deliveryInfo = DeliveryDetail::select('DELIVERY_ID')
            ->whereIn('DELIVERY_ID', $deliveryID)
            ->orderBy('DELIVERY_ID','desc')
            // ->whereNotNull('DELIVERY_DATE')
            ->groupBy('DELIVERY_ID')
            ->get();
        
<<<<<<< HEAD
=======
      

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        return view('admin.delivery.report.assign',compact('deliveryInfo','DELIVERY_RECD_DATE','DELIVERY_RECD_DATEs'));
    }
    
    public function createGRN(Request $request) {
        
       
        $grnList = DOReports::where('EXP_DELIVERY', date('Y-m-d'))->get();
        
        return view('admin.delivery.report.create', compact('grnList'));
    }

 
    public function grnGenerateList(Request $request) {
        
        $DELIVERY_RECD_DATE = $request->DELIVERY_RECD_DATE;
        $DELIVERY_RECD_DATEs = Carbon::createFromFormat('d/F/Y', $DELIVERY_RECD_DATE)->format('Y-m-d');
        $grnList = DOReports::where('EXP_DELIVERY', $DELIVERY_RECD_DATEs)->get();
        
        
        return view('admin.delivery.report.generate_list',compact('DELIVERY_RECD_DATE','grnList'));
    }
    
    
    public function grnshipmentWiseList(Request $request) {
        
        $shipmentID = $request->shipment_id;
        
        $SHIPMENT_RECD_DATE = $request->SHIPMENT_RECD_DATE;
        $SHIPMENT_RECD_DATEs = Carbon::createFromFormat('d/F/Y', $SHIPMENT_RECD_DATE)->format('Y-m-d');
        
        $shipmentInfo = ShipmentDetail::where('shipment_id', $shipmentID)
            ->where('SHIPMENT_RECD_DATE', $SHIPMENT_RECD_DATEs)
            ->select('PO_NO')
            ->groupBy('PO_NO')
            ->get();
            
        // echo"<pre>";
        // print_r($shipmentInfo);
        // die();
        return view('admin.delivery.report.shipment_details',compact('shipmentInfo','shipmentID'));
    }
    
    public function doReportsGenerate(Request $request) {
        

        $DELIVERY_RECD_DATES = $request->DELIVERY_RECD_DATE_s;
        $DELIVERY_RECD_DATE = Carbon::createFromFormat('d/F/Y', $DELIVERY_RECD_DATES)->format('Y-m-d');
        
        $validator = Validator::make($request->all(), [
            // 'shipment_id'      => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
      
        $po_number         = $request->po_number;
        $delivery_id_list  = $request->delivery_id_list;
        
        $headerInfo = DOReports::orderBy('DO_NO', 'desc')->first();
        
        if(empty($headerInfo)){
            $DO_GRN_NUMBER  = 1000;
        } else{
           $DO_GRN_NUMBER = $headerInfo->DO_NO + 1;
        }
        
        $grnHeader = new DOReports();
        $grnHeader->EXP_DELIVERY = $DELIVERY_RECD_DATE;
        $grnHeader->DO_NO        = $DO_GRN_NUMBER;
        
        $grnHeader->save();
        
        foreach($po_number as $key => $value) {
            
            $delivery_id = $delivery_id_list[$key];
           
            $deliveryList = DeliveryDetail::where('DELIVERY_ID', $delivery_id)
                // ->where('DELIVERY_DATE', $DELIVERY_RECD_DATE)
                ->where('PO_NO', $value)
                ->get();
            
         
            foreach($deliveryList as $information) {
              
                 DB::table('w2t_do_report_details')->insert(
                    [
                        'DELIVERY_ID' => $delivery_id, 
                        'HEADER_ID'   => $DO_GRN_NUMBER,
                        'PO_NO'       => $information->PO_NO, 
                        'DATE'        => $DELIVERY_RECD_DATE,
                        'DESCRIPTION' => $information->DESCRIPTION,
                        'QTY'         => $information->QTY,
                    ]
                    );
                
              
            }
        
        }
            

        
        $doDeatailsInfo = DoReportsDetail::where('HEADER_ID' , $DO_GRN_NUMBER)->get();
        $doHeaderInfo   = DOReports::where('DO_NO' , $DO_GRN_NUMBER)->first();
        
        $deliveryIDInfo  = DoReportsDetail::where('HEADER_ID' , $DO_GRN_NUMBER)->groupBy('DELIVERY_ID')
                            ->pluck('DELIVERY_ID'); 
                            
        $deliveryAddress = Delivery::whereIn('delivery_id', $deliveryIDInfo)->pluck('DELIVERY_ADDRESS');
        
      
        // $shipmentId = DeliveryDetail::whereIn('delivery_id', $deliveryIDInfo)
        //     ->groupBy('SHIPMENT_ID')
        //     ->pluck('SHIPMENT_ID');
        
        
        $allWIP = PoHeader::whereIn('PO_NO', $po_number)
            ->groupBy('WIP')
            ->pluck('WIP');
            
        $salesOrderHeaderPoNO = SalesOrderHeader::whereIn('WIP', $allWIP)
            ->groupBy('CUSTOMER_PO_NO')
            ->pluck('CUSTOMER_PO_NO');
            
      
        $pdf = PDF::loadView('do_reports', [
            'DO_GRN_NUMBER'          => $DO_GRN_NUMBER,
            'doDeatailsInfo'         => $doDeatailsInfo,
            'doHeaderInfo'           => $doHeaderInfo,
            'deliveryAddress'        => $deliveryAddress,
            'salesOrderHeaderPoNO'   => $salesOrderHeaderPoNO,
        ]);
        
<<<<<<< HEAD
        file_put_contents( base_path().Settings::UPLOAD_PATH."do_reports/do_".$DO_GRN_NUMBER .".pdf", $pdf->output());

        $attachmentName = Settings::UPLOAD_PATH."do_reports/do_".$DO_GRN_NUMBER .".pdf";
=======
        file_put_contents("do_reports/do_".$DO_GRN_NUMBER .".pdf", $pdf->output());

        $attachmentName = "/do_reports/do_".$DO_GRN_NUMBER ."..pdf";
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        
       
         DB::table('w2t_do_report_header')
            ->where('ID', $grnHeader->id)
            ->update(
            [
<<<<<<< HEAD
                'FILE_NAME' => Settings::UPLOAD_PATH."do_reports/do_".$DO_GRN_NUMBER .".pdf", 
=======
                'FILE_NAME' => "do_reports/do_".$DO_GRN_NUMBER .".pdf", 
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            ]
        );
        
       
       
        $respones = [
            'status'        => 200,  
            'DO_GRN_NUMBER' => $DO_GRN_NUMBER,
        ];
        
        return json_encode($respones);
        
       
    }
    
    
}


