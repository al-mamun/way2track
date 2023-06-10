<?php

namespace App\Http\Controllers\Admin\GRN;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentHeader;
use App\Models\ShipmentDetail;
use App\Models\GrnHeader;
use App\Models\GrnDetail;
use App\Models\ShipmentDetailTemp;
use App\Models\Settings;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PoHeader;
use App\Models\PoDetails;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
 use Barryvdh\DomPDF\Facade\Pdf;

class GRNController extends Controller
{
    

    public function ShipmentView() {
        $newShipmentView = Shipment::latest()->paginate();
        return view('admin.grn.index',compact('newShipmentView'));
    }
    
    public function createShipmentList(Request $request) {
        
        $SHIPMENT_RECD_DATE = $request->SHIPMENT_RECD_DATE;
        $SHIPMENT_RECD_DATEs = Carbon::createFromFormat('d/F/Y', $SHIPMENT_RECD_DATE)->format('Y-m-d');
        
        $shipment = ShipmentDetail::select('SHIPMENT_ID')
            ->where('SHIPMENT_RECD_DATE', $SHIPMENT_RECD_DATEs)
            ->orderBy('SHIPMENT_ID','desc')
            ->whereNotNull('SHIPMENT_RECD_DATE')
            ->groupBy('SHIPMENT_ID')
            ->get();
            
        
// echo"<pre>";
//         print_r($shipment);
//         die();
  
        
        return view('admin.grn.assign',compact('shipment','SHIPMENT_RECD_DATE','SHIPMENT_RECD_DATEs'));
    }
    
    public function createGRN(Request $request) {
        
        $shipment = Shipment::orderBy('SHIPMENT_ID','desc')->first();
        $shipmentID = 1000;
        
        if(!empty($shipment)) {
            $shipmentID = $shipment->SHIPMENT_ID + 1;
        }
        $grnList = GrnHeader::all();
        
        return view('admin.grn.create', compact('shipmentID','grnList'));
    }

 
    public function grnGenerateList(Request $request) {
        
        $SHIPMENT_RECD_DATE = $request->SHIPMENT_RECD_DATE;
        $SHIPMENT_RECD_DATEs = Carbon::createFromFormat('d/F/Y', $SHIPMENT_RECD_DATE)->format('Y-m-d');
        $grnList = GrnHeader::where('SHIPMENT_RECD_DATE', $SHIPMENT_RECD_DATEs)->get();
        
        
        return view('admin.grn.generate_list',compact('SHIPMENT_RECD_DATE','grnList'));
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
        return view('admin.grn.shipment_details',compact('shipmentInfo','shipmentID'));
    }
    
    public function grnReportsGenerate(Request $request) {
        
        $shipment_id        = $request->shipment_id;
        $SHIPMENT_RECD_DATES = $request->SHIPMENT_RECD_DATE_s;
        $SHIPMENT_RECD_DATE = Carbon::createFromFormat('d/F/Y', $SHIPMENT_RECD_DATES)->format('Y-m-d');
        
        $validator = Validator::make($request->all(), [
            // 'shipment_id'      => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        
        
        $shipment_id           = $request->shipment_id;
        $po_number             = $request->po_number;
        $shipment_id_list  = $request->shipment_id_list;
        
        $headerInfo = GrnHeader::orderBy('SHD_GRN_NUMBER', 'desc')->first();
        
        if(empty($headerInfo)){
            $SHD_GRN_NUMBER  = 1000;
        } else{
           $SHD_GRN_NUMBER = $headerInfo->SHD_GRN_NUMBER + 1;
        }
        
        $grnHeader = new GrnHeader();
        $grnHeader->SHIPMENT_RECD_DATE = $SHIPMENT_RECD_DATE;
        $grnHeader->SHD_GRN_NUMBER = $SHD_GRN_NUMBER;
        $grnHeader->save();
        
        foreach($po_number as $key => $value) {
            
            $shipment_id = $shipment_id_list[$key];
            
            $shipmentInfo = ShipmentDetail::where('shipment_id', $shipment_id)
                ->where('SHIPMENT_RECD_DATE', $SHIPMENT_RECD_DATE)
                ->where('PO_NO', $value)
                ->get();
            
         
            foreach($shipmentInfo as $shipmentList) {
              
                 DB::table('w2t_grn_details')->insert(
                    [
                        'SHIPMENT_ID' => $shipment_id, 
                        'HEADER_ID'   => $SHD_GRN_NUMBER,
                        'PO_NO'       => $shipmentList->PO_NO, 
                        'DATE'        => $SHIPMENT_RECD_DATE,
                        'DESCRIPTION'    => $shipmentList->DESCRIPTION,
                        'QTY'         => $shipmentList->Qty,
                    ]
                    );
                
              
            }
        
           
        }
            
          

        // if (!file_exists( "grn_reports/".$SHD_GRN_NUMBER )) {
        //     mkdir("grn_reports/".$SHD_GRN_NUMBER  , 0755);
        // }
        
        $grDeatailsInfo = GrnDetail::where('HEADER_ID' , $SHD_GRN_NUMBER)->get();
        $grHeaderInfo   = GrnHeader::where('SHD_GRN_NUMBER' , $SHD_GRN_NUMBER)->first();
        
       
        $pdf = PDF::loadView('grn_reports', [
            'SHD_GRN_NUMBER'   => $SHD_GRN_NUMBER,
            'grDeatailsInfo'   => $grDeatailsInfo,
            'grHeaderInfo'     => $grHeaderInfo,
        ]);
        
        // file_put_contents("grn_reports/grn_".$SHD_GRN_NUMBER .".pdf", $pdf->output());
        
        file_put_contents( base_path().Settings::UPLOAD_PATH."grn_reports/grn_".$SHD_GRN_NUMBER .".pdf", $pdf->output());
        $attachmentName = Settings::UPLOAD_PATH."grn_reports/grn_".$SHD_GRN_NUMBER .".pdf";
        
       
         DB::table('w2t_grn_header')
            ->where('ID', $grnHeader->id)
            ->update(
            [
                'FILE_NAME' => Settings::UPLOAD_PATH."grn_reports/grn_".$SHD_GRN_NUMBER .".pdf", 
            ]
        );
        
       
       
        $respones = [
            'status'         => 200,  
            'SHD_GRN_NUMBER' => $SHD_GRN_NUMBER,
        ];
        
        return json_encode($respones);
        
       
    }
    
    
    public function grnReportsGeneratePdf($SHD_GRN_NUMBER) {
        
        $headerInfo = GrnHeader::where('SHD_GRN_NUMBER', $SHD_GRN_NUMBER)->first();
        
        
        return view('admin.grn.pdf_view', compact('headerInfo'));
    }
}


