<?php

namespace App\Http\Controllers\Admin\Delivery;

use Illuminate\Http\Request;
use App\Models\DeliveryDetail;
use App\Models\Delivery;
use App\Models\Shipment;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use Validator;

class DeliveryDetailsController extends Controller
{
     public function DeliveryDetailsView() {

        $ShipmentDetails = Shipment::latest()->paginate();
        return view('admin.Shipment.details',compact('ShipmentDetails'));
    }

    public function addDeliveryDetails(Request $request) {
        
       $deliveryDetail = DeliveryDetail::orderBy('DELIVERY_ID','desc')->first();
       $ShipmentDetail = DeliveryDetail::orderBy('SHIPMENT_ID','desc')->first();
       $deliveryID = 3;
       $shipmentID = 1002;
        
        if(!empty($ShipmentDetail)) {
            $shipmentID = $ShipmentDetail->SHIPMENT_ID + 1;
        }elseif(!empty($deliveryDetail)) {
            $deliveryID = $deliveryDetail->DELIVERY_ID + 1;
        }
        return view('admin.delivery.create-details', compact('shipmentID','deliveryID'));
    }

    public function adddeliveryDetailStore(Request $request) {
        
        $deliveryId = Delivery::where('DELIVERY_ID', $request->get('DELIVERY_ID'))->count();
        
        if($deliveryId == 0) {
            
            return response()->json(
                [
                    'error'=>'Delivery ID Does Not Exist',
                    'status'=> 401,
                    
                ]);  
        }
            
            
        $shipmentId = Shipment::where('SHIPMENT_ID', $request->get('SHIPMENT_ID'))->count();
        
        if($shipmentId == 0) {
            
            return response()->json(
                [
                    'error'=>'Shipment ID Does Not Exist',
                    'status'=> 401,
                    
                ]);  
        }
        
        $validator   = Validator::make($request->all(), [
            'DELIVERY_ID'   => 'required',
            'SHIPMENT_ID'   => 'required',
            'PO_NO'         =>'required',
            'ITEM'          =>'required',
            'Qty'           =>'required',
        ]);
        
        if ($validator->passes()) {
      
    
            $adddeliveryDetail = new DeliveryDetail();
            $adddeliveryDetail->DELIVERY_ID    = $request->DELIVERY_ID;
            $adddeliveryDetail->SHIPMENT_ID    = $request->SHIPMENT_ID;
            $adddeliveryDetail->PO_NO       = $request->PO_NO;
            $adddeliveryDetail->ITEM            = $request->ITEM;
            $adddeliveryDetail->Qty           = $request->Qty;
            $adddeliveryDetail->DESCRIPTION       = empty($request->DESCRIPTION) ? ' ':$request->DESCRIPTION ;
       
            $adddeliveryDetail->save();
            // Session::flash('success','Created Successfully.');
                    return response()->json(
                    [
                        'success'=>'Added new records.',
                        'id'=> $adddeliveryDetail->id,
                    ]);
            
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    
    // delivery Export
    public function deliveryDetailsExport() {

        $deliveryExportDetails = DeliveryDetail::latest()->paginate();
        return view('admin.export-delivery-details.index',compact('deliveryExportDetails'));
    }
    
     // delivery Export
    public function deliveryDetailsExportView($DeliveryID) {

        $deliveryExportDetails = DeliveryDetail::latest()
            ->where('DELIVERY_ID', $DeliveryID)
            ->get();
            
        return view('admin.export-delivery-details.index',compact('deliveryExportDetails'));
    }
    
     public function deliveryExportDelete($id){
        DeliveryDetail::where('ID', $id )->delete();
        return redirect('/export/delivery/details')->with(['success' => "Deleted successfully."]); 
    }
    
     public function deliveryDetailsUpdateInline (Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_delivery_detail')
            ->where('ID', $request->id)
            ->update(['PO_NO' => $request->PO_NO]);
            
        } else if($type == 2) {
           
            DB::table('w2t_delivery_detail')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 3) {
           
            DB::table('w2t_delivery_detail')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
        } else if($type == 4) {
           
            DB::table('w2t_delivery_detail')
            ->where('ID', $request->id)
            ->update(['QTY' => $request->QTY]);
            
        }
    }
       
}


