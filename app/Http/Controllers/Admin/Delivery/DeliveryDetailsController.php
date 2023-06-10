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
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use Validator;
use Carbon\Carbon;

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
    
     public function tempdeliveryDetailSubmit(Request $request) {
        
            $deliveryTemp = DeliveryDetailTemp::where('token' , $request->token)->get();
        
            foreach($deliveryTemp as $deliveryTempInfo ) {
                
                $adddeliveryDetail = new DeliveryDetail();
                $adddeliveryDetail->DELIVERY_ID         = $deliveryTempInfo->DELIVERY_ID;
                $adddeliveryDetail->SHIPMENT_DETAIL_ID  = $deliveryTempInfo->SHIPMENT_DETAIL_ID;
                $adddeliveryDetail->SHIPMENT_ID         = $deliveryTempInfo->SHIPMENT_ID;
                $adddeliveryDetail->PO_NO               = $deliveryTempInfo->PO_NO;
                $adddeliveryDetail->ITEM                = $deliveryTempInfo->ITEM;
                $adddeliveryDetail->QTY                 = $deliveryTempInfo->QTY;
                $adddeliveryDetail->DESCRIPTION         = empty($deliveryTempInfo->DESCRIPTION) ? ' ':$deliveryTempInfo->DESCRIPTION ;
             
                if( $adddeliveryDetail->save()) {
                    
                    
                    $shipmentHeader = ShipmentDetail::where('ID', $deliveryTempInfo->SHIPMENT_DETAIL_ID)->first();
            
                    if(!empty($shipmentHeader)) {
                            
                        
                        $totalDeliverAssing = DB::table('w2t_delivery_detail')
                            ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                            ->pluck('SHIPMENT_DETAIL_ID'); // status update assign status shipment
                            
                        $totalIncomploateAssing = DB::table('w2t_shipment_details')
                            ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                            ->whereNotIn('ID', $totalDeliverAssing)
                            ->count(); // status update assign status shipment
                        
                        if(!$totalIncomploateAssing) {
                            DB::table('w2t_shipment_header')
                            ->where('SHIPMENT_ID',$deliveryTempInfo->SHIPMENT_ID)
                            ->update(['ASSIGN_STATUS' => 1]); // status update assign status shipment
                        }
                        
                            
                            
                        $poHeader = PoHeader::where('PO_NO', $shipmentHeader->PO_NO)->first();
        
                        if(!empty($poHeader)) {
                            
  
                            $wipInfo = DB::table('w2t_sales_order_detail')
                                ->where('WIP', $shipmentHeader->WIP)
                                ->where('EX_COMMENTS', 'WAREHOUSE')
                                ->get();
                                
                          
                            foreach($wipInfo as $supplierInfo){

                                if(!empty($supplierInfo)) {
                                    
                                     $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
                    
                                    $supplierList = [];
                                    
                                    foreach($checkSupplier as $supplierInfoArray) {
                                        $supplierList [] = trim($supplierInfoArray);
                                    }
                                    
                                    $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                        ->where('WIP', $shipmentHeader->WIP)
                                        ->where('ASSIGN_STATUS', 0)
                                        ->count();
                                        
                                    if(!$checkHeaderStatus) {
                                        
                                        $allPoNO =  PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                            ->where('WIP', $shipmentHeader->WIP)
                                            ->where('ASSIGN_STATUS', 1)
                                            ->pluck('PO_NO');
                                        
                                        $shipmentDetailsCHeck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                            ->orderBy('ID', 'desc')
                                            ->pluck('PO_DETAILS_ID');
                                    
                                        
                                        $allPODetailsInfo = PoDetails::whereIn('PO_NO', $allPoNO)
                                            ->whereNotIn('ID', $shipmentDetailsCHeck)
                                            ->count();
                                            
                                        if(!$allPODetailsInfo) {
                                            
                                                $deliverDetailsInfo = DeliveryDetail::whereIn('PO_NO',  $allPoNO)
                                                    ->orderBy('ID', 'desc')
                                                    ->pluck('SHIPMENT_DETAIL_ID');
                                                
                                                $shipmenDetailsInfoCheck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                                    ->whereNotIn('ID', $deliverDetailsInfo)
                                                    ->count();
                                                
                                           
                                                if(!$shipmenDetailsInfoCheck) {
                                                    
                                                    $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                                                        ->where('ID', $supplierInfo->ID)
                                                        ->where('EX_COMMENTS', 'WAREHOUSE')
                                                        ->update(['EX_COMMENTS' => 'LOCAL TRANSIT']);
                                                }
                                                    
                                                    
                                                    
                                        
                                            
                                        }
                                    }
                        
                                    // foreach($checkSupplier as $suppliers) {
                                    //     $supp = trim($suppliers);
                                        
                              
                                    //     if($supp == $shipmentHeader->SUPPLIER) {
                                            
                                              
                        
                                    //         $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $checkSupplier)
                                    //             ->where('WIP', $shipmentHeader->WIP)
                                    //             ->where('ASSIGN_STATUS', 0)
                                    //             ->count();
                                            
                                    //         if(!$checkHeaderStatus) {
                                                
                                    //             $shipmentDetailsInfo  = DB::table('w2t_sales_order_detail')
                                    //                 ->where('ID', $supplierInfo->ID)
                                    //                 ->where('EX_COMMENTS', 'WAREHOUSE')
                                    //                 ->update(['EX_COMMENTS' => 'LOCAL TRANSIT']);
                                    //         }
                                    //     }
                                    // }
                              
                                }
                            }
                            
                             
                        } 
                            
                    }
                }
            }

            DeliveryDetailTemp::truncate();
            
<<<<<<< HEAD
            return redirect('/export/delivery/details')->with(['success' => "Delivery details have been successfully added."]); 
=======
            return redirect('/export/delivery/details')->with(['success' => "Delivery details has been successfully added."]); 
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            
    }
    // delivery Export
    public function deliveryDetailsExport(Request $request) {
        
        $deliveryExportDetails = DeliveryDetail::latest()->get();
        return view('admin.export-delivery-details.index',compact('deliveryExportDetails'));
        
    }
    
     // delivery Export
    public function deliveryDetailsExportSearch(Request $request) {

<<<<<<< HEAD
=======
        
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        $shipmentID = $request->shipment_id;
        $deliveryID = $request->delivery_id;
        $PO_NO      = $request->PO_NO;
        
<<<<<<< HEAD
        if(empty($shipmentID) && empty($deliveryID) && empty($PO_NO) ){
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->get();
                
            $status = 1;
            
            return view('admin.export-delivery-details.search',compact('deliveryExportDetails','status'));
        }
         
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        if(!empty($shipmentID) && !empty($deliveryID) && !empty($PO_NO) ){
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('SHIPMENT_ID', $shipmentID)
                ->where('DELIVERY_ID', $deliveryID)
                ->where('PO_NO', $PO_NO)
                ->get();
            
        } else if(!empty($shipmentID) && !empty($deliveryID)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('SHIPMENT_ID', $shipmentID)
                ->where('DELIVERY_ID', $deliveryID)
                ->get();
        } else if(!empty($shipmentID) && !empty($PO_NO)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('SHIPMENT_ID', $shipmentID)
                ->where('PO_NO', $PO_NO)
                ->get();
        } else if(!empty($deliveryID) && !empty($PO_NO)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('DELIVERY_ID', $deliveryID)
                ->where('PO_NO', $PO_NO)
                ->get();
        } else if(!empty($shipmentID)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('SHIPMENT_ID', $shipmentID)
                ->get();
                
        } else if(!empty($PO_NO)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('PO_NO', $PO_NO)
                ->get();
        } else if(!empty($deliveryID)) {
            
            $deliveryExportDetails = DeliveryDetail::latest()
                ->where('DELIVERY_ID', $deliveryID)
                ->get();
        }
        
<<<<<<< HEAD
          $status = 0;
        return view('admin.export-delivery-details.search',compact('deliveryExportDetails','status'));
=======
        
        return view('admin.export-delivery-details.search',compact('deliveryExportDetails'));
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
            
        } else if($type == 5) {
           
            DB::table('w2t_delivery_detail')
                ->where('ID', $request->id)
                ->update(['DELIVERY_DATE' => $request->DELIVERY_DATE]);
        
             $deliveryTempInfo = DB::table('w2t_delivery_detail')
                ->where('ID', $request->id)
                ->first();
    
            $shipmentHeader = ShipmentDetail::where('ID', $deliveryTempInfo->SHIPMENT_DETAIL_ID)->first();
    
            if(!empty($shipmentHeader)) {
                    
                
                $totalDeliverAssing = DB::table('w2t_delivery_detail')
                    ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                    ->pluck('SHIPMENT_DETAIL_ID'); // status update assign status shipment
                    
                $totalIncomploateAssing = DB::table('w2t_shipment_details')
                    ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                    ->whereNotIn('ID', $totalDeliverAssing)
                    ->count(); // status update assign status shipment
                
                if(!$totalIncomploateAssing) {
                    DB::table('w2t_shipment_header')
                    ->where('SHIPMENT_ID',$deliveryTempInfo->SHIPMENT_ID)
                    ->update(['ASSIGN_STATUS' => 1]); // status update assign status shipment
                }
                
                    
                    
                $poHeader = PoHeader::where('PO_NO', $shipmentHeader->PO_NO)->first();

                if(!empty($poHeader)) {
                    

                    $wipInfo = DB::table('w2t_sales_order_detail')
                        ->where('WIP', $shipmentHeader->WIP)
                        ->where('EX_COMMENTS', 'LOCAL TRANSIT')
                        ->get();
                        
                  
                    foreach($wipInfo as $supplierInfo){

                        if(!empty($supplierInfo)) {
                            
                             $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
            
                            $supplierList = [];
                            
                            foreach($checkSupplier as $supplierInfoArray) {
                                $supplierList [] = trim($supplierInfoArray);
                            }
                            
                            $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                ->where('WIP', $shipmentHeader->WIP)
                                ->where('ASSIGN_STATUS', 0)
                                ->count();
                                
                            if(!$checkHeaderStatus) {
                                
                                $allPoNO =  PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                    ->where('WIP', $shipmentHeader->WIP)
                                    ->where('ASSIGN_STATUS', 1)
                                    ->pluck('PO_NO');
                                
                                $shipmentDetailsCHeck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                    ->orderBy('ID', 'desc')
                                    ->pluck('PO_DETAILS_ID');
                            
                                
                                $allPODetailsInfo = PoDetails::whereIn('PO_NO', $allPoNO)
                                    ->whereNotIn('ID', $shipmentDetailsCHeck)
                                    ->count();
                                    
                                if(!$allPODetailsInfo) {
                                    
                                        $deliverDetailsInfo = DeliveryDetail::whereIn('PO_NO',  $allPoNO)
                                            ->whereNotNull('DELIVERY_DATE')
                                            ->orderBy('ID', 'desc')
                                            ->pluck('SHIPMENT_DETAIL_ID');
                                        
                                        $shipmenDetailsInfoCheck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                            ->whereNotIn('ID', $deliverDetailsInfo)
                                            ->count();
                                        
                                   
                                        if(!$shipmenDetailsInfoCheck) {
                                            
                                            $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                                                ->where('ID', $supplierInfo->ID)
                                                ->where('EX_COMMENTS', 'LOCAL TRANSIT')
                                                ->update(['EX_COMMENTS' => 'DELIVERED']);
                                        }
                                            
                                            
                                            
                                
                                    
                                }
                            }
                
                           
                      
                        }
                    }
                    
                     
                } 
                    
            }
                    
            $DELIVERYDATE= $request->DELIVERY_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $DELIVERYDATE)->format('d M Y'); 
            
            return $date;
            
        }
    }
      
      
     public function deliveryDetailsUpdateList(Request $request) {
        
  
        $deliveryExportDetails = DeliveryDetail::whereIn('ID', $request->detailsID)
            ->latest()
            ->get();   
        
        return view('admin.export-delivery-details.search',compact('deliveryExportDetails'));
    }
    
     public function deliveryDetailsCopyUPdate(Request $request) {
        
       $type = $request->type;
   
        if($type == 1) {
            
            DB::table('w2t_delivery_detail')
            ->whereIn('ID', $request->detailsID)
            ->update(['DELIVERY_ID' => $request->DELIVERY_ID]);
            
        } else if($type == 2) {
           
            DB::table('w2t_delivery_detail')
             ->whereIn('ID', $request->detailsID)
            ->update(['SHIPMENT_ID' => $request->shipment_id]);
            
        } else if($type == 3) {
           
            DB::table('w2t_delivery_detail')
            ->whereIn('ID', $request->detailsID)
            ->update(['PO_NO' => $request->PO_NO]);
            
        } else if($type == 4) {
           
            DB::table('w2t_delivery_detail')
             ->whereIn('ID', $request->detailsID)
            ->update(['ITEM' => $request->ITEM]);
            
           
            
        } else if($type == 5) {
           
     
            DB::table('w2t_delivery_detail')
             ->whereIn('ID', $request->detailsID)
            ->update(['DESCRIPTION' =>  $request->DESCRIPTION]);
        
            
        } else if($type == 6) {
           
           DB::table('w2t_delivery_detail')
            ->whereIn('ID', $request->detailsID)
            ->update(['QTY' => $request->QTY]);
            
            
            
        } else if($type == 7) {
           
            $DELIVERY_DATE = $request->DELIVERY_DATE;
            
            $date = Carbon::createFromFormat('d/F/Y', $DELIVERY_DATE)->format('Y-m-d'); 
            
            DB::table('w2t_delivery_detail')
            ->whereIn('ID', $request->detailsID)
            ->update(['DELIVERY_DATE' => $date]);
            
            $listOfCopyToAll =DB::table('w2t_delivery_detail')
                ->whereIn('ID', $request->detailsID)
                ->get();
                
            
            foreach($listOfCopyToAll as $key=> $deliveryDetailsInfo) {
                
                DB::table('w2t_delivery_detail')
                    ->where('ID', $request->id)
                    ->update(['DELIVERY_DATE' => $deliveryDetailsInfo->DELIVERY_DATE]);
            
                 $deliveryTempInfo = DB::table('w2t_delivery_detail')
                    ->where('ID', $deliveryDetailsInfo->ID)
                    ->first();
        
                $shipmentHeader = ShipmentDetail::where('ID', $deliveryTempInfo->SHIPMENT_DETAIL_ID)->first();
        
                if(!empty($shipmentHeader)) {
                        
                    
                    $totalDeliverAssing = DB::table('w2t_delivery_detail')
                        ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                        ->pluck('SHIPMENT_DETAIL_ID'); // status update assign status shipment
                        
                    $totalIncomploateAssing = DB::table('w2t_shipment_details')
                        ->where('SHIPMENT_ID', $deliveryTempInfo->SHIPMENT_ID)
                        ->whereNotIn('ID', $totalDeliverAssing)
                        ->count(); // status update assign status shipment
                    
                    if(!$totalIncomploateAssing) {
                        DB::table('w2t_shipment_header')
                        ->where('SHIPMENT_ID',$deliveryTempInfo->SHIPMENT_ID)
                        ->update(['ASSIGN_STATUS' => 1]); // status update assign status shipment
                    }
                    
                        
                        
                    $poHeader = PoHeader::where('PO_NO', $shipmentHeader->PO_NO)->first();
    
                    if(!empty($poHeader)) {
                        
    
                        $wipInfo = DB::table('w2t_sales_order_detail')
                            ->where('WIP', $shipmentHeader->WIP)
                            ->where('EX_COMMENTS', 'LOCAL TRANSIT')
                            ->get();
                            
                      
                        foreach($wipInfo as $supplierInfo){
    
                            if(!empty($supplierInfo)) {
                                
                                 $checkSupplier = explode(',', $supplierInfo->SUPPLIER);
                
                                $supplierList = [];
                                
                                foreach($checkSupplier as $supplierInfoArray) {
                                    $supplierList [] = trim($supplierInfoArray);
                                }
                                
                                $checkHeaderStatus = PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                    ->where('WIP', $shipmentHeader->WIP)
                                    ->where('ASSIGN_STATUS', 0)
                                    ->count();
                                    
                                if(!$checkHeaderStatus) {
                                    
                                    $allPoNO =  PoHeader::whereIn('SUPPLIER_NAME', $supplierList)
                                        ->where('WIP', $shipmentHeader->WIP)
                                        ->where('ASSIGN_STATUS', 1)
                                        ->pluck('PO_NO');
                                    
                                    $shipmentDetailsCHeck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                        ->orderBy('ID', 'desc')
                                        ->pluck('PO_DETAILS_ID');
                                
                                    
                                    $allPODetailsInfo = PoDetails::whereIn('PO_NO', $allPoNO)
                                        ->whereNotIn('ID', $shipmentDetailsCHeck)
                                        ->count();
                                        
                                    if(!$allPODetailsInfo) {
                                        
                                            $deliverDetailsInfo = DeliveryDetail::whereIn('PO_NO',  $allPoNO)
                                                ->whereNotNull('DELIVERY_DATE')
                                                ->orderBy('ID', 'desc')
                                                ->pluck('SHIPMENT_DETAIL_ID');
                                            
                                            $shipmenDetailsInfoCheck = ShipmentDetail::whereIn('PO_NO', $allPoNO)
                                                ->whereNotIn('ID', $deliverDetailsInfo)
                                                ->count();
                                            
                                       
                                            if(!$shipmenDetailsInfoCheck) {
                                                
                                                $shipmentDetailsInfoUpdate  = DB::table('w2t_sales_order_detail')
                                                    ->where('ID', $supplierInfo->ID)
                                                    ->where('EX_COMMENTS', 'LOCAL TRANSIT')
                                                    ->update(['EX_COMMENTS' => 'DELIVERED']);
                                            }
                                                
                                                
                                                
                                    
                                        
                                    }
                                }
                    
                               
                          
                            }
                        }
                        
                         
                    } 
                        
                }
                        
                $DELIVERYDATE= $deliveryDetailsInfo->DELIVERY_DATE;
            
            }
            $date = Carbon::createFromFormat('Y-m-d', $DELIVERYDATE)->format('d M Y'); 
            
            return $date;
            
        } 
    }
}


