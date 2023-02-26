<?php

namespace App\Http\Controllers\Admin\Delivery;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\PoHeader;
use App\Models\DeliveryDetail;
use App\Models\Shipment;
use App\Models\ShipmentDetail;

use App\Models\PoDetails;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Carbon\Carbon;
use DB;

class DeliveryController extends Controller
{
    

    public function deliveryView() {

        $deliveryView = Delivery::latest()->get();
        
        return view('admin.delivery.index',compact('deliveryView'));
        
    }
    
    public function exportDelivery() {
        
        $deliveryView = Delivery::latest()->get();
        
        return view('admin.delivery.export_list',compact('deliveryView'));
    }
    
    
    public function deliverySingleView($id) {

        $deliveryView = Delivery::where("DELIVERY_ID", $id )->latest()->get();
        
        return view('admin.delivery.index',compact('deliveryView','id'));
        
    }

    public function createDelivery(Request $request) {
         
        $shipment = Delivery::orderBy('DELIVERY_ID','desc')->first();
        $DELIVERYID = 1000;
        
        if(!empty($shipment)) {
            $DELIVERYID = $shipment->DELIVERY_ID + 1;
        }
        return view('admin.delivery.create', compact('DELIVERYID'));
    }

    public function createDeliveryStore(Request $request) {

         $this->validate($request, [
            'DELIVERY_ID'=>'required',
    	    'SIZE'=>'required',
    	    'NO_OF_TRUCKS'=>'required',
    	    'VEHICLE_PLATES'=>'required',
    	    'LAST_DESPATCH_TIME'=>'required',
    	    'EXPECTED_DELIVERY'=>'required',
    	    'DELIVERY_STATUS'=>'required',
    	    'DELIVERY_ADDRESS'=>'required',
        ]);
         // ETD date
        // $ETDDATE = $request->get('ETD');
        // $ETD = Carbon::createFromFormat('d/F/Y', $ETDDATE)->format('Y-m-d');
        
        // ETA date
        $ETADATE = $request->get('EXPECTED_DELIVERY');
        $EXPECTED_DELIVERY = Carbon::createFromFormat('d/F/Y', $ETADATE)->format('Y-m-d');
        
        
        $newDelivery = new Delivery();
        $newDelivery->DELIVERY_ID         = $request->DELIVERY_ID;
        $newDelivery->SIZE                = $request->SIZE;
        $newDelivery->LAST_DESPATCH_TIME  = $request->LAST_DESPATCH_TIME;
        $newDelivery->VEHICLE_PLATES      = $request->VEHICLE_PLATES;
        $newDelivery->EXPECTED_DELIVERY   = $EXPECTED_DELIVERY;
        $newDelivery->DELIVERY_STATUS     = $request->DELIVERY_STATUS;
        $newDelivery->DELIVERY_TIME       = $request->DELIVERY_TIME;
        $newDelivery->DELIVERY_ADDRESS    = $request->DELIVERY_ADDRESS;
        $newDelivery->NO_OF_TRUCKS      = $request->NO_OF_TRUCKS;
   
       
        if($newDelivery->save()) {
            
            Session::flash('success','Created Successfully.');
            return redirect('/edit/delivery/details/'.  $newDelivery->DELIVERY_ID); 
        }
       
       
     }

     public function DeliveryEdit($id) {
        $deliveryView = Delivery::find($id);
        return view('admin.Delivery.edit',compact('deliveryView'));
    }
    
    
    public function DeliveryUpdate(Request $request, $id) {

         $this->validate($request, [
            'DELIVERY_ID'=>'required',
    	    'SIZE'=>'required',
    	    'NO_OF_TRUCKS'=>'required',
    	    'VEHICLE_PLATES'=>'required',
    	    'LAST_DESPATCH_TIME'=>'required',
    	    'EXPECTED_DELIVERY'=>'required',
    	    'DELIVERY_STATUS'=>'required',
    	    'DELIVERY_TIME'=>'required',
    	    'DELIVERY_ADDRESS'=>'required',
        ]);
        
        $newDelivery = Delivery::find($id);
        $newDelivery->DELIVERY_ID         = $request->DELIVERY_ID;
        $newDelivery->SIZE                = $request->SIZE;
        $newDelivery->NO_OF_TRUCKS        = $request->NO_OF_TRUCKS;
        $newDelivery->VEHICLE_PLATES      = $request->VEHICLE_PLATES;
        $newDelivery->EXPECTED_DELIVERY   = $request->EXPECTED_DELIVERY;
        $newDelivery->DELIVERY_STATUS     = $request->DELIVERY_STATUS;
        $newDelivery->DELIVERY_TIME       = $request->DELIVERY_TIME;
        $newDelivery->DELIVERY_ADDRESS    = $request->DELIVERY_ADDRESS;
   
        $newDelivery->update();
  
        Session::flash('success','Updated Successfully.');
        return redirect('/edit/delivery/details');
       
     }
     
    public function DeliveryDelete($DELIVERY_ID){
        
        DeliveryDetail::where('DELIVERY_ID', $DELIVERY_ID)->delete();
        Delivery::where('DELIVERY_ID', $DELIVERY_ID)->delete();
       
        return 201;
    }
    
    public function listDeliveryOrderDetails(Request $request) {
        
        $DELIVERY_ID = $request->DELIVERY_ID;
        
        $deliveryDetail = DeliveryDetail::where('DELIVERY_ID', $DELIVERY_ID)->orderBy('ID','desc')->get();
     
        return view('admin.delivery.list_details', compact('deliveryDetail'));;
    }
    
     public function listPurchaseorderheaderModal(Request $request) {
        
        $itemID = $request->itemID;
        // $deliveryInfo = Shipment::get();
        
        $shipmentHeader = Shipment::get();
        
        $deliveryInfo = [];
        foreach($shipmentHeader as $hedingInfo) {
                
                $shipmentDetails = ShipmentDetail::select('PO_NO')->groupBy('PO_NO')
                    ->where('SHIPMENT_ID', $hedingInfo->SHIPMENT_ID)
                    ->orderBy('PO_NO','asc')
                    ->get();
        
                foreach($shipmentDetails as $shipmentDetails) {
                    $deliveryInfo []= [
                        'SHIPMENT_ID' => $hedingInfo->SHIPMENT_ID,
                        'PO_NO'       => $shipmentDetails->PO_NO,
                    ]; 
                }
                
        }
        
        // echo "<pre>";
        // print_r($deliveryInfo);
        // die();
        return view('admin.delivery.assign',compact('deliveryInfo'));
     
    }
    
     public function listPurchaseorderAssignShipment(Request $request) {
        
        $itemID = $request->itemID;
        $SHIPMENTID = $request->SHIPMENT_ID;
        
        foreach($SHIPMENTID as $number) {
                
            $shipmientInfo = explode(',', $number);
            // $poHeaderInfo = PoHeader::where('WIP', $wp_number)->first();
            
            $shipmentDetailsInfo = ShipmentDetail::where('SHIPMENT_ID', $shipmientInfo[0])
                ->where('PO_NO', $shipmientInfo[1])
                ->orderBY('Id', 'desc')
                ->get();
            
            foreach($shipmentDetailsInfo as $key => $shipmentDetailsList) {
                
                $poDetailsInfo = PoDetails::where('PO_NO',  $shipmientInfo[1])->first();
             
                if(!empty($shipmentDetailsList)) {
                        $shipmentDetails = new DeliveryDetail();
                        $shipmentDetails->SHIPMENT_ID      = $shipmientInfo[0]; // shpipment id
                        $shipmentDetails->DELIVERY_ID      = $itemID;
                        $shipmentDetails->PO_NO            = $shipmientInfo[1]; // po no
                        $shipmentDetails->ITEM             = !empty($shipmentDetailsList->ITEM) ? $shipmentDetailsList->ITEM : ' ';
                        $shipmentDetails->DESCRIPTION      = !empty($shipmentDetailsList->DESCRIPTION) ? $shipmentDetailsList->DESCRIPTION : ' ';
                        $shipmentDetails->QTY              = !empty($shipmentDetailsList->Qty) ? $shipmentDetailsList->Qty: 0;
                        $shipmentDetails->save(); 
                }
            }
        
        }
     
    }
    
    
    public function deliveryUpdateInline (Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['SIZE' => $request->SIZE]);
            
        } else if($type == 2) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['NO_OF_TRUCKS' => $request->NO_OF_TRUCKS]);
            
        } else if($type == 3) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['VEHICLE_PLATES' => $request->VEHICLE_PLATES]);
            
        } else if($type == 4) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['LAST_DESPATCH_TIME' => $request->LAST_DESPATCH_TIME]);
            
        } else if($type == 5) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['EXPECTED_DELIVERY' => $request->EXPECTED_DELIVERY]);
            
            $EXPECTED_DELIVERY = $request->EXPECTED_DELIVERY;
            
            $date = Carbon::createFromFormat('Y-m-d', $EXPECTED_DELIVERY)->format('d M Y');
            return $date;
            
        }
         else if($type == 6) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['DELIVERY_STATUS' => $request->DELIVERY_STATUS]);
            
        }
         else if($type == 7) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['DELIVERY_TIME' => $request->DELIVERY_TIME]);
            
        }
         else if($type == 8) {
           
            DB::table('w2t_delivery_header')
            ->where('ID', $request->id)
            ->update(['DELIVERY_ADDRESS' => $request->DELIVERY_ADDRESS]);
            
        }
    }
}


