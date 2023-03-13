<?php

namespace App\Http\Controllers\Admin\Shipment;

use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Shipment;
use App\Models\ShipmentHeader;
use Session;
use Carbon\Carbon;
use DB;
use Validator;
use App\Models\PoHeader;
use App\Models\PoDetails;

class ShipmentDetailsController extends Controller
{
     public function ShipmentDetailsView() {

        $ShipmentDetails = Shipment::latest()->paginate();
        return view('admin.shipment.shipment-details',compact('ShipmentDetails'));
    }
    
    

    public function addShipmenDetails(Request $request) {
        
        $ShipmentDetail = ShipmentDetail::orderBy('SHIPMENT_ID','desc')->first();
        $shipmentID = 1000;
        
        if(!empty($ShipmentDetail)) {
            $shipmentID = $ShipmentDetail->SHIPMENT_ID + 1;
        }
        return view('admin.shipment-details.create', compact('shipmentID'));
    }
    
    public function store(Request $request) {
    
  
         $this->validate($request, [
            'SHIPMENT_ID'   => 'required',
          
        ]);
          
        
        // ETD date
        $ETDDATE = $request->get('ETD');
        $ETD = Carbon::createFromFormat('d/F/Y', $ETDDATE)->format('Y-m-d');
        
        // ETA date
        $ETADATE = $request->get('ETA');
        $ETA = Carbon::createFromFormat('d/F/Y', $ETADATE)->format('Y-m-d');
        
        // ACT EXF date
        $EXP_EXF_DT_DATE = $request->get('ACT_EXF_DATE');
        $ACT_EXF_DATE = Carbon::createFromFormat('d/F/Y', $EXP_EXF_DT_DATE)->format('Y-m-d');
        
        
        // CONFIRMED EXF date
        $CONFIRMEDEXF  = $request->get('CONFIRMED_ETA');
        $CONFIRMED_ETA = Carbon::createFromFormat('d/F/Y', $CONFIRMEDEXF)->format('Y-m-d');
        
         // VESSEL SAILING  date
        $VESSEL_SAILING = $request->get('VESSEL_SAILING_DATE');
        $VESSEL_SAILING_DATE = Carbon::createFromFormat('d/F/Y', $VESSEL_SAILING)->format('Y-m-d');
       
        
        
        $shipmentDetails = new ShipmentDetail();
        $shipmentDetails->SHIPMENT_ID           = $request->SHIPMENT_ID;
        $shipmentDetails->PO_NO                 = $request->PO_NO;
        $shipmentDetails->WIP                   = $request->WIP;
        $shipmentDetails->CONTAINER_NO          = $request->CONTAINER_NO;
        $shipmentDetails->VESSEL                = $request->VESSEL;
        $shipmentDetails->Qty                   = $request->Qty;
        $shipmentDetails->ETD                   = $ETD;
        $shipmentDetails->ETA                   = $ETA;
        $shipmentDetails->SUPPLIER              = $request->SUPPLIER;
        $shipmentDetails->ITEM                  = $request->ITEM;
        $shipmentDetails->ACT_EXF_DATE          = $ACT_EXF_DATE;
        $shipmentDetails->CONFIRMED_ETA         = $CONFIRMED_ETA;
        $shipmentDetails->VESSEL_SAILING_DATE   = $VESSEL_SAILING_DATE;
        $shipmentDetails->DESCRIPTION           = $request->DESCRIPTION;
        $shipmentDetails->COMMENTS              = $request->COMMENTS;
        $shipmentDetails->MBL_MAWB              = $request->MBL_MAWB;
        $shipmentDetails->SHIPMENT_STATUS       = 'Cleared';
       
        if($shipmentDetails->save()){
            Session::flash('success','Created Successfully.');
            return redirect('/export/shipment/order');
        }
       
     }

    public function ShipmentDetailsEdit($id) {
       /* $newShipmentView = Shipment::find($id);
        return view('admin.Shipment.edit',compact('newShipmentView'));*/
    }
    

    
    public function ShipmentDetailsUpdate(Request $request, $id) {

         /*$this->validate($request, [
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
        return redirect('/edit/shipment/details');*/
       
     }
    
    // Export Shipment
    public function exportShipmentOrder() {
        
        $newShipmentView = ShipmentDetail::latest()->get();
        
        return view('admin.shipment-details.index',compact('newShipmentView'));
    }
    
    
    // Export Shipment
    public function exportShipmentOrderView($shipmentID) {
        
        $newShipmentView = ShipmentDetail::latest()->where('SHIPMENT_ID', $shipmentID)->get();
        
        return view('admin.shipment-details.index',compact('newShipmentView'));
    }
    
    // Export Shipment
    public function exportShipmentOrderSearch(Request $request) {
        
        $shipment_id     =  $request->shipment_id;
        $container_id    =  $request->container_id;
        $PO_NO           =  $request->PO_NO;
        $WIP             =  $request->WIP;
        $shapment_status =  $request->shapment_status;
        
        if(empty($shipment_id) && empty($container_id) && empty($PO_NO) && empty($WIP) && empty($shapment_status) ) {
            
            $newShipmentView = ShipmentDetail::latest()->get();  
            
            return view('admin.shipment-details.filter',compact('newShipmentView'));
            
        }
        if(!empty($shipment_id) && !empty($container_id) && !empty($PO_NO) && !empty($WIP) && !empty($shapment_status) ) {
            
            $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('CONTAINER_NO', $container_id)
                ->where('PO_NO', $PO_NO)
                ->where('WIP', $WIP)
                ->where('SHIPMENT_STATUS', $shapment_status)
                ->latest()->get();  
            
        } else if(!empty($shipment_id) && !empty($container_id) && !empty($PO_NO) && !empty($WIP) ) {
            
              $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('CONTAINER_NO', $container_id)
                ->where('PO_NO', $PO_NO)
                ->where('WIP', $WIP)
                ->latest()
                ->get();    
            
        } else if(!empty($shipment_id) && !empty($container_id) && !empty($PO_NO) && !empty($shapment_status) ) {
            
              $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('CONTAINER_NO', $container_id)
                ->where('PO_NO', $PO_NO)
                ->where('SHIPMENT_STATUS', $shapment_status)
                ->latest()
                ->get();    
            
        }   else if(!empty($shipment_id) && !empty($WIP) && !empty($PO_NO) && !empty($shapment_status) ) {
            
              $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('PO_NO', $PO_NO)
                 ->where('WIP', $WIP)
                ->where('SHIPMENT_STATUS', $shapment_status)
                ->latest()
                ->get();    
            
        }  else if(!empty($shipment_id) && !empty($container_id) && !empty($PO_NO)) {
            
            $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('container_id', $container_id)
                ->where('PO_NO', $PO_NO)
                ->latest()
                ->get();   
            
        } else if(!empty($shipment_id) && !empty($container_id)) {
            
            $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)
                ->where('CONTAINER_NO', $container_id)
                ->latest()
                ->get();   
            
        } else if(!empty($shipment_id)) {
            $newShipmentView = ShipmentDetail::where('SHIPMENT_ID', $shipment_id)->latest()->get();    
        } else if(!empty($container_id)) {
            $newShipmentView = ShipmentDetail::where('CONTAINER_NO', $container_id)->latest()->get();    
        } else if(!empty($PO_NO)) {
            $newShipmentView = ShipmentDetail::where('PO_NO', $PO_NO)->latest()->get();    
        } else if(!empty($WIP)) {
            $newShipmentView = ShipmentDetail::where('WIP', $WIP)->latest()->get();    
        } else if(!empty($shapment_status)) {
            
            $newShipmentView = ShipmentDetail::where('SHIPMENT_STATUS', $shapment_status)->latest()->get();    
        }
        
        
        
        return view('admin.shipment-details.filter',compact('newShipmentView'));
    }
    
    public function exportShipmentdelete($id){
        
        ShipmentDetail::where('ID', $id )->delete();
        return 201;
        
        // return redirect('/export/shipment/order')->with(['success' => "Deleted successfully."]); 
    }
    
     public function shipmentUpdateInline (Request $request) {
        
       $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['CONTAINER_NO' => $request->CONTAINER_NO]);
            
        } else if($type == 2) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['VESSEL' => $request->VESSEL]);
            
        } else if($type == 3) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['Qty' => $request->Qty]);
            
        } else if($type == 4) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['ETD' => $request->ETD]);
            
            $ETD = $request->ETD;
            $date = Carbon::createFromFormat('Y-m-d', $ETD)->format('d M Y');
            
            return $date;
            
        } else if($type == 5) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['ETA' => $request->ETA]);
            
            $ETA = $request->ETA;
            
            $date = Carbon::createFromFormat('Y-m-d', $ETA)->format('d M Y');
            
            return $date;
            
        } else if($type == 6) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['SUPPLIER' => $request->SUPPLIER]);
            
        } else if($type == 7) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 8) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
        } else if($type == 9) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['SHIPMENT_STATUS' => $request->SHIPMENT_STATUS]);
            
        } else if($type == 10) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['PO_NO' => $request->PO_NO]);
            
        } else if($type == 11) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['WIP' => $request->WIP]);
            
        } else if($type == 12) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        } else if($type == 13) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['ACT_EXF_DATE' => $request->ACT_EXF_DATE]);
            
            $ACT_EXF_DATE = $request->ACT_EXF_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $ACT_EXF_DATE)->format('d M Y');
            
            return $date;
            
        } else if($type == 14) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['MBL_MAWB' => $request->MBL_MAWB]);
            
        } else if($type == 15) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['VESSEL_SAILING_DATE' => $request->VESSEL_SAILING_DATE]);
            
            $VESSEL_SAILING_DATE = $request->VESSEL_SAILING_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $VESSEL_SAILING_DATE)->format('d M Y');
            
            return $date;
            
        } else if($type == 16) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['CONFIRMED_ETA' => $request->CONFIRMED_ETA]);
            
            $CONFIRMED_ETA = $request->CONFIRMED_ETA;
            
            $date = Carbon::createFromFormat('Y-m-d', $CONFIRMED_ETA)->format('d M Y');
            
            return $date;
            
        } else if($type == 17) {
           
            DB::table('w2t_shipment_details')
            ->where('ID', $request->id)
            ->update(['WAREHOUSE_DATE' => $request->WAREHOUSE_DATE]);
            
            $WAREHOUSEDATE = $request->WAREHOUSE_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $WAREHOUSEDATE)->format('d M Y');
            
            return $date;
            
        }  else if($type == 18) {
           
           if(empty($request->SHIPMENT_RECD_DATE)) {
               return 0;
           }
            DB::table('w2t_shipment_details')
                ->where('ID', $request->id)
                ->update([
                    'SHIPMENT_RECD_DATE' => $request->SHIPMENT_RECD_DATE,
                    'SHIPMENT_STATUS' => 'WAREHOUSE'
                ]);
            
            
            $shipmentDetailsInfo = DB::table('w2t_shipment_details')
                ->where('ID', $request->id)
                ->first();
                
            $SHIPMENTRECDDATEE = $request->SHIPMENT_RECD_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $SHIPMENTRECDDATEE)->format('d M Y');
            
            $poHeader = PoHeader::where('PO_NO', $shipmentDetailsInfo->PO_NO)->first();
            
            if(!empty($poHeader)) {
                
                $poDetailsInfo = ShipmentDetail::where('PO_NO', $shipmentDetailsInfo->PO_NO)
                    ->whereNotNull('SHIPMENT_RECD_DATE')
                    ->orderBy('ID', 'desc')
                    ->pluck('PO_DETAILS_ID');
                
                
                // $allPONo = PoHeader::where('WIP', $shipmentDetailsInfo->WIP)->pluck('PO_NO');
                
                $poDetailsInfoCheck = PoDetails::where('PO_NO', $shipmentDetailsInfo->PO_NO)
                    ->whereNotIn('ID', $poDetailsInfo)
                    ->count();
                
            
                if(!$poDetailsInfoCheck) {
                    
                    DB::table('w2t_po_header')
                        ->where('PO_NO', $shipmentDetailsInfo->PO_NO)
                        ->update(['ASSIGN_STATUS' => 1]);
                        
                    
                    $wipInfo = DB::table('w2t_sales_order_detail')
                        ->where('WIP', $shipmentDetailsInfo->WIP)
                        ->where('EX_COMMENTS', 'SHIPPED')
                        ->get();
                        
              
                    foreach($wipInfo as $supplierInfo){
                    
                        if(!empty($supplierInfo)) {
                            
                            $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
                            
                            $supplierList = [];
                            
                            foreach($checkSupplier as $supplierInfoArray) {
                                $supplierList [] = trim($supplierInfoArray);
                            }
                            
                            $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                ->where('WIP', $shipmentDetailsInfo->WIP)
                                ->where('ASSIGN_STATUS', 0)
                                ->count();
                                
                            if(!$checkHeaderStatus) {
                                
                                $allPoNO =  PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                    ->where('WIP', $shipmentDetailsInfo->WIP)
                                    ->where('ASSIGN_STATUS', 1)
                                    ->pluck('PO_NO');
                                
                                $shipmentDetailsCHeck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                    ->whereNotNull('SHIPMENT_RECD_DATE')
                                    ->orderBy('ID', 'desc')
                                    ->pluck('PO_DETAILS_ID');
                            
                                
                                $allPODetailsInfo = PoDetails::whereIn('PO_NO', $allPoNO)
                                    ->whereNotIn('ID', $shipmentDetailsCHeck)
                                    ->count();
                                    
                                if(!$allPODetailsInfo) {
                                    
                                    $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                                        ->where('ID', $supplierInfo->ID)
                                        ->where('EX_COMMENTS', 'SHIPPED')
                                        ->update(['EX_COMMENTS' => 'WAREHOUSE']);
                                }
                                // echo "<pre>";
                                // print_r($supplierInfo->ID);
                                
                            }      
                                        
                                        
                            
                      
                                   
                            // foreach($checkSupplier as $suppliers) {
                            //     $supp = trim($suppliers);
                            
                          
                            //     if($supp == $shipmentDetailsInfo->SUPPLIER) {
                                    
                                  
                            //         $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $checkSupplier)
                            //             ->where('WIP', $shipmentDetailsInfo->WIP)
                            //             ->where('ASSIGN_STATUS', 0)
                            //             ->count();
                                    
                            //         if(!$checkHeaderStatus) {
                                        
                                        
                            //             $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                            //                 ->where('ID', $supplierInfo->ID)
                            //                 ->where('EX_COMMENTS', 'SHIPPED')
                            //                 ->update(['EX_COMMENTS' => 'WAREHOUSE']);
                            //         }
                            //     }
                            // }
                      
                        }
                    }
                    
                 
                }
                  
            } 
       
            return $date;
            
        } 
    }
    
    public function shipmentDetailsUpdateList(Request $request) {
        
  
        $newShipmentView = ShipmentDetail::whereIn('ID', $request->detailsID)
            ->latest()
            ->get();   
        
        return view('admin.shipment-details.filter',compact('newShipmentView'));
    }
    
     public function shipmentDetailsCopyUPdate(Request $request) {
        
       $type = $request->type;
   
        if($type == 1) {
            
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['SHIPMENT_ID' => $request->shipment_id]);
            
        } else if($type == 2) {
           
            DB::table('w2t_shipment_details')
             ->whereIn('ID', $request->detailsID)
            ->update(['CONTAINER_NO' => $request->CONTAINER_NO]);
            
        } else if($type == 3) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['VESSEL' => $request->VESSEL]);
            
        } else if($type == 4) {
           
            DB::table('w2t_shipment_details')
             ->whereIn('ID', $request->detailsID)
            ->update(['Qty' => $request->QTY]);
            
           
            
        } else if($type == 5) {
           
            $ETD = $request->ETD;
            
            
            $date = Carbon::createFromFormat('d/F/Y', $ETD)->format('Y-m-d');
            
            DB::table('w2t_shipment_details')
             ->whereIn('ID', $request->detailsID)
            ->update(['ETD' => $date]);
            
            
            return $date;
            
        } else if($type == 6) {
           
            $ETA = $request->ETA;
            
            $date = Carbon::createFromFormat('d/F/Y', $ETA)->format('Y-m-d'); 
            
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['ETA' => $date]);
            
        } else if($type == 7) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['SUPPLIER' => $request->SUPPLIER]);
            
        } else if($type == 8) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['PO_NO' => $request->PO_NO]);
            
        } else if($type == 9) {
           $ETA = $request->waireHuseDate;
            
            $date = Carbon::createFromFormat('d/F/Y', $ETA)->format('Y-m-d'); 
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['WAREHOUSE_DATE' => $date]);
            
            // DB::table('w2t_shipment_details')
            // ->whereIn('ID', $request->detailsID)
            // ->update(['WIP' => $request->WIP]);
            
        } else if($type == 10) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 11) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);

            
        } else if($type == 12) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        } else if($type == 13) {
           
           $ETA = $request->ACT_EXF_DATE;
            
            $date = Carbon::createFromFormat('d/F/Y', $ETA)->format('Y-m-d'); 
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['ACT_EXF_DATE' => $date]);
            
       
            
        } else if($type == 14) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['MBL_MAWB' => $request->MBL_MAWB]);
            
        } else if($type == 15) {
            
            $ETA = $request->VESSEL_SAILING_DATE;
            
            $date = Carbon::createFromFormat('d/F/Y', $ETA)->format('Y-m-d'); 
            
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['VESSEL_SAILING_DATE' => $date]);
            
           
            
        } else if($type == 16) {
           
            $ETA = $request->CONFIRMED_ETA;
            
            $date = Carbon::createFromFormat('d/F/Y', $ETA)->format('Y-m-d'); 
            
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['CONFIRMED_ETA' =>$date]);
            
            
            
        } else if($type == 17) {
           
            DB::table('w2t_shipment_details')
            ->whereIn('ID', $request->detailsID)
            ->update(['SHIPMENT_STATUS' => $request->SHIPMENT_STATUS]);
            
            
            
        }  else if($type == 18) {
           
            $rcvDate = $request->SHIPMENT_RECD_DATE;
            
            $date = Carbon::createFromFormat('d/F/Y', $rcvDate)->format('Y-m-d'); 
            
            DB::table('w2t_shipment_details')
                ->whereIn('ID', $request->detailsID)
                ->update([
                    'SHIPMENT_RECD_DATE' => $date,
                    'SHIPMENT_STATUS' => 'WAREHOUSE'
                
                ]);
            
            
            $listOfCopyToAll = DB::table('w2t_shipment_details')
                ->whereIn('ID', $request->detailsID)
                ->get();
                
            
            foreach($listOfCopyToAll as $key=> $shipmentDetailsInfo) {
         
                
                // $SHIPMENTRECDDATEE = $request->SHIPMENT_RECD_DATE;
                
                // $date = Carbon::createFromFormat('Y-m-d', $SHIPMENTRECDDATEE)->format('d M Y');
                
                $poHeader = PoHeader::where('PO_NO', $shipmentDetailsInfo->PO_NO)->first();
                
                if(!empty($poHeader)) {
                    
                    $poDetailsInfo = ShipmentDetail::where('PO_NO', $shipmentDetailsInfo->PO_NO)
                        ->whereNotNull('SHIPMENT_RECD_DATE')
                        ->orderBy('ID', 'desc')
                        ->pluck('PO_DETAILS_ID');
                    
                 
                    $poDetailsInfoCheck = PoDetails::where('PO_NO', $shipmentDetailsInfo->PO_NO)
                        ->whereNotIn('ID', $poDetailsInfo)
                        ->count();
                    
                
                    if(!$poDetailsInfoCheck) {
                        
                        DB::table('w2t_po_header')
                            ->where('PO_NO', $shipmentDetailsInfo->PO_NO)
                            ->update(['ASSIGN_STATUS' => 1]);
                            
                        
                        $wipInfo = DB::table('w2t_sales_order_detail')
                            ->where('WIP', $shipmentDetailsInfo->WIP)
                            ->where('EX_COMMENTS', 'SHIPPED')
                            ->get();
                        
              
                        foreach($wipInfo as $supplierInfo){
                        
                            if(!empty($supplierInfo)) {
                                
                                $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
                                
                                $supplierList = [];
                                
                                foreach($checkSupplier as $supplierInfoArray) {
                                    $supplierList [] = trim($supplierInfoArray);
                                }
                                
                                $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                    ->where('WIP', $shipmentDetailsInfo->WIP)
                                    ->where('ASSIGN_STATUS', 0)
                                    ->count();
                                    
                                if(!$checkHeaderStatus) {
                                    
                                    $allPoNO =  PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                        ->where('WIP', $shipmentDetailsInfo->WIP)
                                        ->where('ASSIGN_STATUS', 1)
                                        ->pluck('PO_NO');
                                    
                                    $shipmentDetailsCHeck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                        ->whereNotNull('SHIPMENT_RECD_DATE')
                                        ->orderBy('ID', 'desc')
                                        ->pluck('PO_DETAILS_ID');
                                
                                    
                                    $allPODetailsInfo = PoDetails::whereIn('PO_NO', $allPoNO)
                                        ->whereNotIn('ID', $shipmentDetailsCHeck)
                                        ->count();
                                        
                                    if(!$allPODetailsInfo) {
                                        
                                        $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                                            ->where('ID', $supplierInfo->ID)
                                            ->where('EX_COMMENTS', 'SHIPPED')
                                            ->update(['EX_COMMENTS' => 'WAREHOUSE']);
                                    }
                                    // echo "<pre>";
                                    // print_r($supplierInfo->ID);
                                    
                                }      
                                            
                                  
                          
                            }
                        }
                            
                     
                    }
                      
                } 
            
            }
            
        } 
    }
}


