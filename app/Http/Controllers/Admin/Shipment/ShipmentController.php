<?php

namespace App\Http\Controllers\Admin\Shipment;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentHeader;
use App\Models\ShipmentDetail;
use App\Models\ShipmentDetailTemp;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PoHeader;
use App\Models\PoDetails;
use Session;
use DB;

class ShipmentController extends Controller
{
    

    public function ShipmentView() {

        $newShipmentView = Shipment::latest()->paginate();
        
        return view('admin.shipment.index',compact('newShipmentView'));
    }
    
    public function exportShipmentHeader() {

        $newShipmentView = Shipment::latest()->paginate();
        
        return view('admin.shipment.export-list',compact('newShipmentView'));
    }
    
    public function createShipment(Request $request) {
        
        $shipment = Shipment::orderBy('SHIPMENT_ID','desc')->first();
        $shipmentID = 1000;
        
        if(!empty($shipment)) {
            $shipmentID = $shipment->SHIPMENT_ID + 1;
        }
        return view('admin.shipment.create', compact('shipmentID'));
    }

    public function createShipmentStore(Request $request) {

         $this->validate($request, [
            'SHIPMENT_ID'   => 'required',
            'CURRENCY'      =>'required',
            'NET'           =>'required',
            'SIZE'          =>'required',
        ]);
        
        $newShipment = new Shipment();
        $newShipment->SHIPMENT_ID       = $request->SHIPMENT_ID;
        $newShipment->CURRENCY          = $request->CURRENCY;
        $newShipment->NET               = $request->NET;
        $newShipment->SIZE              = $request->SIZE;
        $newShipment->FREIGHT_FORWARDER = $request->FREIGHT_FORWARDER;
        $newShipment->COMMENTS          = empty($request->COMMENTS) ? ' ':$request->COMMENTS ;
   
        if($newShipment->save()){
            Session::flash('success','Created Successfully.');
            return redirect('/edit/shipment/details/'.$newShipment->id );
        }
       
     }

    public function ShipmentEdit($id) {
        $newShipmentView = Shipment::find($id);
        return view('admin.shipment.edit',compact('newShipmentView'));
    }
    
    public function showShipment($id) {
        
        $newShipmentView = Shipment::where('ID', $id)->get();
        
        return view('admin.shipment.index',compact('newShipmentView','id'));
    }
    
     public function ShipmentUpdate(Request $request, $id) {

         $this->validate($request, [
            'SHIPMENT_ID'   => 'required',
            'CURRENCY'      =>'required',
            'NET'           =>'required',
            'SIZE'          =>'required',
        ]);
        $newShipment = Shipment::find($id);
        $newShipment->SHIPMENT_ID    = $request->SHIPMENT_ID;
        $newShipment->CURRENCY       = $request->CURRENCY;
        $newShipment->NET            = $request->NET;
        $newShipment->SIZE           = $request->SIZE;
        $newShipment->COMMENTS       = $request->COMMENTS;
   
        $newShipment->update();
  
        Session::flash('success','Created Successfully.');
        return redirect('/edit/shipment/details');
       
     }
     
     public function ShipmentDelete($id){
         
        $newDeliveryDelete = Shipment::where('ID', $id)->delete();
        
        return 200;
    }
    
    public function listPurchaseorderheaderModal(Request $request) {
        
        $itemID = $request->itemID;
        
        $poHeaderInfo = PoHeader::where('PO_STATUS','Live')
            ->where('ASSIGN_STATUS', 0)
            ->orderBy('ID', 'desc')
            ->get();
        
        return view('admin.shipment.assign',compact('poHeaderInfo'));
     
    }
    
    public function listPurchseOrderDetails(Request $request) {
        
        $shipped_id = $request->shiped_id;
        
        $ShipmentDetail = ShipmentDetail::where('SHIPMENT_ID',$shipped_id)->orderBy('ID','desc')->get();
        
        return view('admin.shipment.list_details', compact('ShipmentDetail'));;
     
        
    }
    public function listPurchaseorderAssignShipment(Request $request) {
        
        $itemID    = $request->itemID;
        $WIPNumber = $request->WIPNumber;
        $PONumber  = $request->po_number;
        
       
        foreach($WIPNumber as $key=> $value) {
                
            $valueExp = explode(',', $value);
            
            
            
            // $poHeader = PoHeader::where('PO_NO', $valueExp[1])->first();
            
            // if(!empty($poHeader)) {
                
            //     DB::table('w2t_po_header')
            //         ->where('PO_NO', $valueExp[1])
            //         ->update(['ASSIGN_STATUS' => 1]);
                    
                
            //     $totalWIPSTATUS = PoHeader::where('WIP', $valueExp[0])->count();
            //     $totalWIPAssignSTATUS = PoHeader::where('WIP', $valueExp[0])
            //         ->where('ASSIGN_STATUS',1 )
            //         ->count();
                    
            //     if($totalWIPSTATUS == $totalWIPAssignSTATUS) {
                    
            //         $shipmentDetailsInfo  = DB::table('w2t_sales_order_detail')->where('WIP', $valueExp[0])
            //             ->where('EX_COMMENTS', 'ORDERED')
            //             ->update(['EX_COMMENTS' => 'SHIPPED']);
            //     }
                  
            // }
            
            $shipmentDetailsInfo = ShipmentDetail::where('PO_NO',  $valueExp[1])
                ->orderBy('ID', 'desc')
                ->pluck('PO_DETAILS_ID');
                    
            $poDetailsInfo = PoDetails::where('PO_NO', $valueExp[1])
                ->whereNotIn('ID', $shipmentDetailsInfo)
                ->orderBy('ID', 'desc')
                ->get();
                
            
            
            
            $token = date('Ymdhim');
            
            foreach($poDetailsInfo as $poDetail) {
                
                $poHeader = PoHeader::where('PO_NO', $valueExp[1])->first();
                
                $shipmentDetails = new ShipmentDetailTemp();
                $shipmentDetails->SHIPMENT_ID      = $itemID;
                $shipmentDetails->PO_DETAILS_ID    = $poDetail->ID;
                $shipmentDetails->PO_NO            = $poDetail->PO_NO;
                $shipmentDetails->WIP              = $valueExp[0];
                $shipmentDetails->CONTAINER_NO     = ' ';
                $shipmentDetails->VESSEL           = ' ';
                $shipmentDetails->Qty              =  $poDetail->QTY;
                $shipmentDetails->SUPPLIER         = !empty($poHeader->SUPPLIER_NAME)? $poHeader->SUPPLIER_NAME:' ';
                $shipmentDetails->ITEM             = $poDetail->ITEM;
                $shipmentDetails->DESCRIPTION      = $poDetail->DESCRIPTION;
                $shipmentDetails->COMMENTS         = $poDetail->COMMENTS;
                $shipmentDetails->ETD              = $poDetail->ETD;
                $shipmentDetails->ETA              = $poDetail->ETA;
                $shipmentDetails->MBL_MAWB         = ' ';
                $shipmentDetails->SHIPMENT_STATUS  = 'SHIPPED';
                 $shipmentDetails->TOKEN           = $token;
                //  $shipmentDetails->WIP         = $poHeaderInfo->WIP;
                $shipmentDetails->save();
            }
            
           
            return $token;
        
        }
     
    }
    
    public function listPurchaseorderAssignShipmentSubmit(Request $request) {
        
        $shipmentDetailsTemp =  ShipmentDetailTemp::where('TOKEN',$request->token)->get();
        
        foreach($shipmentDetailsTemp as $tempInfo ) {
            
            
            $shipmentDetails = new ShipmentDetail();
            $shipmentDetails->SHIPMENT_ID      = $tempInfo->SHIPMENT_ID;
            $shipmentDetails->PO_DETAILS_ID    = $tempInfo->PO_DETAILS_ID;
            $shipmentDetails->PO_NO            = $tempInfo->PO_NO;
            $shipmentDetails->WIP              = $tempInfo->WIP;
            $shipmentDetails->CONTAINER_NO     = $tempInfo->CONTAINER_NO;
            $shipmentDetails->VESSEL           = $tempInfo->VESSEL;
            $shipmentDetails->Qty              = $tempInfo->Qty;
            $shipmentDetails->SUPPLIER         = $tempInfo->SUPPLIER;
            $shipmentDetails->ITEM             = $tempInfo->ITEM;
            $shipmentDetails->DESCRIPTION      = $tempInfo->DESCRIPTION;
            $shipmentDetails->COMMENTS         = $tempInfo->COMMENTS;
            $shipmentDetails->ETD              = $tempInfo->ETD;
            $shipmentDetails->ETA              = $tempInfo->ETA;
            $shipmentDetails->MBL_MAWB         = $tempInfo->MBL_MAWB;
            $shipmentDetails->SHIPMENT_STATUS  = $tempInfo->SHIPMENT_STATUS;
            //  $shipmentDetails->WIP         = $poHeaderInfo->WIP;
            $shipmentDetails->save();
                
            $poHeader = PoHeader::where('PO_NO', $tempInfo->PO_NO)->first();
            
            if(!empty($poHeader)) {
                
                $poDetailsInfo = ShipmentDetail::where('PO_NO', $tempInfo->PO_NO)
                    ->orderBy('ID', 'desc')
                    ->pluck('PO_DETAILS_ID');
                
                $poDetailsInfoCheck = PoDetails::where('PO_NO', $tempInfo->PO_NO)
                    ->whereNotIn('ID', $poDetailsInfo)
                    ->count();
                
                echo "<pre>";
                print_r($poDetailsInfoCheck);
                echo "</pre>";
                
                if(!$poDetailsInfoCheck) {
                    
                    DB::table('w2t_po_header')
                        ->where('PO_NO',$tempInfo->PO_NO)
                        ->update(['ASSIGN_STATUS' => 1]);
                        
                    
                    $wipInfo = DB::table('w2t_sales_order_detail')
                        ->where('WIP', $tempInfo->WIP)
                        ->where('EX_COMMENTS', 'ORDERED')
                        ->get();
                        
                  
                    foreach($wipInfo as $supplierInfo){
                    
                        if(!empty($supplierInfo)) {
                            
                            $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
                        
                            foreach($checkSupplier as $suppliers) {
                                $supp = trim($suppliers);
                                
                                // echo "<pre>";
                                //         print_r($tempInfo->SUPPLIER);
                                //         echo"<brtr<br>";
                                //         print_r($supp);
                                //         echo "</pre>"  ;
                          
                                if($supp == $tempInfo->SUPPLIER) {
                                    
                                      
                
                                    $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $checkSupplier)
                                        ->where('WIP', $tempInfo->WIP)
                                        ->where('ASSIGN_STATUS', 0)
                                        ->count();
                                    
                                    if(!$checkHeaderStatus) {
                                        
                                        $shipmentDetailsInfo  = DB::table('w2t_sales_order_detail')
                                            ->where('ID', $supplierInfo->ID)
                                            ->where('EX_COMMENTS', 'ORDERED')
                                            ->update(['EX_COMMENTS' => 'SHIPPED']);
                                    }
                                }
                            }
                      
                        }
                    }
                    
                    // $totalWIPSTATUS       = PoHeader::where('WIP', $tempInfo->WIP)->count();
                    
                    // $totalWIPAssignSTATUS = PoHeader::where('WIP', $tempInfo->WIP)
                    //     ->where('ASSIGN_STATUS',1 )
                    //     ->count();
                        
                    // if($totalWIPSTATUS == $totalWIPAssignSTATUS) {
                        
                    //     $shipmentDetailsInfo  = DB::table('w2t_sales_order_detail')
                    //         ->where('WIP', $tempInfo->WIP)
                    //         ->where('EX_COMMENTS', 'ORDERED')
                    //         ->update(['EX_COMMENTS' => 'SHIPPED']);
                    // }
                }
                  
            } 
        }
        // die();
         ShipmentDetailTemp::truncate();
        Session::flash('success','Created Successfully.');
        return redirect('/edit/shipment/details');
        
    }
    
    public function listPurchaseorderAssignShipmentTemp(Request $request, $token) {
        
     
        
        $newShipmentView = ShipmentDetailTemp::where('TOKEN',$request->token)->orderBy('ID','desc')->get();
        
        return view('admin.shipment-details.temp_assign_list', compact('newShipmentView','token'));;
        
    }
    
    
    public function shipmentUpdateInline (Request $request) {
        
       $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_shipment_header')
            ->where('ID', $request->id)
            ->update(['CURRENCY' => $request->CURRENCY]);
            
        } else if($type == 2) {
           
            DB::table('w2t_shipment_header')
            ->where('ID', $request->id)
            ->update(['NET' => $request->NET]);
            
        } else if($type == 3) {
           
            DB::table('w2t_shipment_header')
            ->where('ID', $request->id)
            ->update(['SIZE' => $request->SIZE]);
            
        } else if($type == 4) {
           
            DB::table('w2t_shipment_header')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        } else if($type == 6) {
           
            DB::table('w2t_shipment_header')
            ->where('ID', $request->id)
            ->update(['FREIGHT_FORWARDER' => $request->FREIGHT_FORWARDER]);
            
        }
    }
    
    //   public function listPurchaseorderAssignShipment(Request $request) {
        
    //     $itemID = $request->itemID;
    //     $WIPNumber= $request->WIPNumber;
    //     $PONumber= $request->po_number;
        
       
    //     foreach($WIPNumber as $key=> $value) {
                
    //         $valueExp = explode(',', $value);
            
          
            
    //         $poHeader = PoHeader::where('PO_NO', $valueExp[1])->first();
            
    //         if(!empty($poHeader)) {
                
    //             DB::table('w2t_po_header')
    //                 ->where('PO_NO', $valueExp[1])
    //                 ->update(['ASSIGN_STATUS' => 1]);
                    
                
    //             $totalWIPSTATUS = PoHeader::where('WIP', $valueExp[0])->count();
    //             $totalWIPAssignSTATUS = PoHeader::where('WIP', $valueExp[0])
    //                 ->where('ASSIGN_STATUS',1 )
    //                 ->count();
                    
    //             if($totalWIPSTATUS == $totalWIPAssignSTATUS) {
                    
    //                 $shipmentDetailsInfo  = DB::table('w2t_sales_order_detail')->where('WIP', $valueExp[0])
    //                     ->where('EX_COMMENTS', 'ORDERED')
    //                     ->update(['EX_COMMENTS' => 'SHIPPED']);
    //             }
                  
    //         }
            
    //         $poDetailsInfo = PoDetails::where('PO_NO', $valueExp[1])
    //             ->orderBy('ID', 'desc')
    //             ->get();
            
    //         foreach($poDetailsInfo as $poDetail) {

    //             $shipmentDetails = new ShipmentDetail();
    //             $shipmentDetails->SHIPMENT_ID      = $itemID;
    //             $shipmentDetails->PO_NO            = $poDetail->PO_NO;
    //             $shipmentDetails->WIP              = $valueExp[0];
    //             $shipmentDetails->CONTAINER_NO     = ' ';
    //             $shipmentDetails->VESSEL           = ' ';
    //             $shipmentDetails->Qty              =  $poDetail->QTY;
    //             $shipmentDetails->SUPPLIER         = ' ';
    //             $shipmentDetails->ITEM             = $poDetail->ITEM;
    //             $shipmentDetails->DESCRIPTION      = $poDetail->DESCRIPTION;
    //             $shipmentDetails->COMMENTS         = $poDetail->COMMENTS;
    //             $shipmentDetails->ETD              = $poDetail->ETD;
    //             $shipmentDetails->ETA              = $poDetail->ETA;
    //             $shipmentDetails->MBL_MAWB         = ' ';
    //             $shipmentDetails->SHIPMENT_STATUS  = 'Shipped';
    //             //  $shipmentDetails->WIP         = $poHeaderInfo->WIP;
    //             $shipmentDetails->save();
    //         }
        
    //     }
     
    // }
    
    
    public function tempDelete($id) {
        ShipmentDetailTemp::where('ID',$id)->delete();
        return 200;
    }
}


