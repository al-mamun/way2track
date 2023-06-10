<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\PoDetails;
use App\Models\PoDetailsTemp;
use App\Models\PoHeader;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\SodCommentValue;
use DB;
use Carbon\Carbon;

class purchaseOrderDetails extends Controller
{
    
    public function create() {
        
<<<<<<< HEAD
        $saledOrderHeaders = PoHeader::orderBy('PO_DATE','desc')
            
            ->get();
=======
        $saledOrderHeaders = PoHeader::get();
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        
        return view('admin.order-purchase.details.new',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            =>  8,
            'menu_open'         =>  3,
        ]);
    }


    public function store(Request $request) {

        $customer = $request->get('customer');
        
        // EXP_EXF_DT date
        $EXP_EXF_DT_DATE = $request->get('EXP_EXF_DT');
        
        if(!empty($EXP_EXF_DT_DATE)) {
            $EXP_EXF_DT = Carbon::createFromFormat('d/F/Y', $EXP_EXF_DT_DATE)->format('Y-m-d');
        } else {
            $EXP_EXF_DT = $EXP_EXF_DT_DATE;
        }
        
        
        // EXP_EXF_DT date
        $CONFIRMEDEXF  = $request->get('CONFIRMED_EXF');
        
        if(!empty($CONFIRMEDEXF)) {
            $CONFIRMED_EXF = Carbon::createFromFormat('d/F/Y', $CONFIRMEDEXF)->format('Y-m-d');
        } else {
          $CONFIRMED_EXF = $CONFIRMEDEXF;
        
        }
        
        $ETDDATE = $request->get('ETD');
        
        if(!empty($ETDDATE)) {
            $ETD = Carbon::createFromFormat('d/F/Y', $ETDDATE)->format('Y-m-d');
        } else {
            $ETD = $ETDDATE;
        }
   
        // ETA date
        $ETADATE = $request->get('ETA');
        
        if(!empty($ETADATE)) {
            $ETA = Carbon::createFromFormat('d/F/Y', $ETADATE)->format('Y-m-d');
        } else {
            $ETA = $ETADATE;
        }
        
        
        $purchaseOrder = new PoDetails();
        $purchaseOrder->PO_NO          = $request->get('PO_NO');
        $purchaseOrder->ITEM           = $request->get('ITEM');
        $purchaseOrder->DESCRIPTION    = $request->get('DESCRIPTION');
        $purchaseOrder->QTY            = $request->get('Qty');
        $purchaseOrder->EXP_EXF_DT     = $EXP_EXF_DT;
        $purchaseOrder->CONFIRMED_EXF  = $CONFIRMED_EXF;
        $purchaseOrder->ETD            = $ETD;
        $purchaseOrder->ETA            = $ETA;
        $purchaseOrder->COMMENTS       = $request->get('COMMENTS');
       
        if( $purchaseOrder->save()) {
            return redirect('/list/purchase/order/details')->with([
                'status' => 1,
<<<<<<< HEAD
                'success' => "Added PO Detail Line.",
=======
                'success' => "Success fully order status create.",
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            ]);
        }
        
    }
    
    public function importSubmit(Request $request) {

        $token = $request->token;
    
        $detailsOption = PoDetailsTemp::where('token', $token)->get();
        
        foreach($detailsOption as $detailsInfo) {
            $poDetails = new PoDetails(); 
            $poDetails->PO_NO         = $detailsInfo->PO_NO;
            $poDetails->ITEM          = $detailsInfo->ITEM;
            $poDetails->DESCRIPTION   = $detailsInfo->DESCRIPTION;
            $poDetails->QTY           = $detailsInfo->QTY;
<<<<<<< HEAD
            $poDetails->EXP_EXF_DT    = NULL;
            $poDetails->ETD           = NULL;
            $poDetails->ETA           = NULL;
            $poDetails->CONFIRMED_EXF = NULL;
=======
            $poDetails->EXP_EXF_DT    = $detailsInfo->EXP_EXF_DT;
            $poDetails->ETD           = $detailsInfo->ETD;
            $poDetails->ETA           = $detailsInfo->ETA;
            $poDetails->CONFIRMED_EXF = $detailsInfo->CONFIRMED_EXF;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            $poDetails->COMMENTS      = $detailsInfo->COMMENTS;
            $poDetails->save();
        }
        PoDetailsTemp::truncate();
        
        Session::flash('success','File uploaded success fully.');
        
         return redirect('/list/purchase/order/details')->with([
            'status' => 1,
<<<<<<< HEAD
            'success' => "P.O. Detail Imported.",
=======
            'success' => "Success fully order status import.",
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        ]);
        
    }
    
    

    public function edit($id) {
        
        $saledOrderHeaders = PoHeader::get();
        $poD = PoDetails::where('ID', $id )->first();

        return view('admin.order-purchase.details.edit',[
            'poD'                =>  $poD,
            'saledOrderHeaders'  =>  $saledOrderHeaders,
            'status'             =>  9,
            'menu_open'          =>  3,
        ]);

    }

    public function update(Request $request,$id) {
        
           $saverOrder =  PoDetails::where('ID', $id)->update(
            [
               
                'PO_NO'            => $request->PO_NO,
                'ITEM'             => $request->ITEM,
                'DESCRIPTION'     => $request->DESCRIPTION,
                'QTY'        => $request->Qty,
                'EXP_EXF_DT' => $request->EXP_EXF_DT,
                'CONFIRMED_EXF' => $request->CONFIRMED_EXF,
                'ETD' => $request->ETD,
                'ETA' => $request->ETA,
                'COMMENTS' => $request->COMMENTS,
            ]
        );
        // $purchaseOrder = PoDetails::where('ID', $id )->first();
        // $purchaseOrder->PO_NO         = $request->get('PO_NO');
        // $purchaseOrder->ITEM          = $request->get('ITEM');
        // $purchaseOrder->DESCRIPTION   = $request->get('DESCRIPTION');
        // $purchaseOrder->Qty           = $request->get('Qty');
        // $purchaseOrder->EXP_EXF_DT    = $request->get('EXP_EXF_DT');
        // $purchaseOrder->CONFIRMED_EXF = $request->get('CONFIRMED_EXF');
        // $purchaseOrder->ETD           = $request->get('ETD');
        // $purchaseOrder->ETA           = $request->get('ETA');
        // $purchaseOrder->COMMENTS      = $request->get('COMMENTS');
       
        // if( $purchaseOrder->update()) {
            return redirect('/list/purchase/order/details')->with([
                'status' => 1,
                'success' => "Success fully order status update.",
            ]);
        // }
        
    }

    public function delete($id) {
        
        SalesOrderDetails::where('ID', $id )->delete();
        PoDetails::where('ID', $id )->delete();
        
        return redirect('/list/purchase/order/details')->with([
            'status' => 1,
            'success' => "Deleted successfully.",
        ]);  
    }

    public function detailsViewList(Request $request,$PONO) {
        
        $token = $request->token;
        $poDetailsToken = [];
  
        
        $saledOrderHeaders = PoHeader::get();
        $poDetails         = PoDetails::orderBy('id','desc')
            ->where('PO_NO', $PONO)
            ->get();
        $sodCommentValue   = SodCommentValue::get();
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->PO_DETAILS_PAGE);
        
        return view('admin.order-purchase.details.list',[
            'poDetails'       =>  $poDetails,
            'sodCommentValue' =>  $sodCommentValue,
            'poDetailsToken'  =>  $poDetailsToken,
            'token'           =>  $token,
            'columnSync'      =>  $columnSync,
            'status'          => 9,
            'menu_open'       => 3,
        ]);
    }
    
    public function list(Request $request) {
        
        $token = $request->token;
        $poDetailsToken = [];
        if(isset($token)) {
             $poDetailsToken = PoDetailsTemp::orderBy('ID','asc')->where('token',$token)->get();
        }
        
        $saledOrderHeaders = PoHeader::get();
        $poDetails         = PoDetails::orderBy('id','desc')->get();
        $sodCommentValue   = SodCommentValue::get();
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->PO_DETAILS_PAGE);
        
        
        return view('admin.order-purchase.details.list',[
            'poDetails'        =>  $poDetails,
            'sodCommentValue'  =>  $sodCommentValue,
            'poDetailsToken'   =>  $poDetailsToken,
            'token'            =>  $token,
            'columnSync'       =>  $columnSync,
            'status'           => 9,
            'menu_open'        => 3,
        ]);
    }
    
    public function listFitler(Request $request) {
        
        $type       = $request->type;
        $checkobx   = $request->checkbox;
        
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->PO_DETAILS_PAGE);
        
<<<<<<< HEAD
       if($type == 3 ) {
=======
        if($type == 2  ) {
            if($checkobx =='Yes') {
                $poDetails = PoDetails::orderBy('ID','desc')
                ->whereNull('THUMBNAIL_IMAGE')
                ->get(); 
                
            } else if($checkobx =='No') {
               $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->get(); 
            } else if($checkobx =='Both') {
               $poDetails = PoDetails::orderBy('ID','desc')
                   
                    ->get(); 
            }
      
                
        } else if($type == 3 ) {
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            
            $COMMENTS = $request->COMMENTS;
            $hand_over_from = $request->hand_over_from;
            $hand_over_to   = $request->hand_over_to;
            $from = $request->from;
            $to   = $request->to;
            $WIP = $request->WIP;
            
            if(empty($WIP) && empty($hand_over_from) && empty($hand_over_to) && empty($from) && empty($to)  && empty($COMMENTS)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->get(); 
                
                return view('admin.order-purchase.details.list_filter',[
                    'poDetails'     =>  $poDetails,
                    'columnSync'    =>  $columnSync,
                    'status'        => 3,
                    'menu_open'     => 2,
                ]);
            }
            # hand over date
            if(!empty($hand_over_from) && !empty($hand_over_to) && !empty($from) && !empty($to)  && !empty($COMMENTS)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->whereBetween('EXP_EXF_DT',[$from,$to])
                    ->where('COMMENTS', $COMMENTS)
                    ->get(); 
                    
<<<<<<< HEAD
            } else if(!empty($hand_over_from) && !empty($hand_over_to) && !empty($from) && !empty($to)  && !empty($WIP)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->whereBetween('EXP_EXF_DT',[$from,$to])
                    ->where('PO_NO', $WIP)
                    ->get(); 
                    
            }  elseif ( !empty($hand_over_from) && !empty($hand_over_to) && !empty($from) && !empty($to)) {
=======
            } elseif ( !empty($hand_over_from) && !empty($hand_over_to) && !empty($from) && !empty($to)) {
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->whereBetween('EXP_EXF_DT',[$from,$to])
                    ->get();  
                
            }  elseif ( !empty($hand_over_from) && !empty($hand_over_to) && !empty($COMMENTS) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
<<<<<<< HEAD
            }  elseif ( !empty($WIP) && !empty($COMMENTS) && !empty($from) ) {
                // po no // commnents //from
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('EXP_EXF_DT', '>=', $from)
                    // ->where('EXP_EXF_DT','>=', $from)
                    ->where('PO_NO', $WIP)
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
            }   elseif ( !empty($WIP) && !empty($COMMENTS) && !empty($to) ) {
                // po no // commnents //to
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where(function ($query) use ($to) {
                        $query->where('EXP_EXF_DT','<=', $to)
                            ->orwhereNull('EXP_EXF_DT');
                    })
                    ->where('PO_NO', $WIP)
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
            } elseif ( !empty($WIP) && !empty($COMMENTS) && !empty($hand_over_from) ) {
                // po no // commnents //handover from
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('CONFIRMED_EXF', '>=', $hand_over_from)
                    ->where('PO_NO', $WIP)
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
            }   elseif ( !empty($WIP) && !empty($COMMENTS) && !empty($hand_over_to) ) {
                // po no // commnents //handover  to
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where(function ($query) use ($hand_over_to) {
                        $query->where('CONFIRMED_EXF','<=', $hand_over_to)
                            ->orwhereNull('CONFIRMED_EXF');
                    })
                    ->where('PO_NO', $WIP)
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
            } elseif ( !empty($from) && !empty($to) && !empty($COMMENTS) ) {
=======
            }  elseif ( !empty($from) && !empty($to) && !empty($COMMENTS) ) {
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_EXF_DT',[$from,$to])
                    ->where('COMMENTS', $COMMENTS)
                    ->get();  
                
<<<<<<< HEAD
            }  elseif ( !empty($hand_over_from) && !empty($hand_over_to) && !empty($WIP) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                   ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->where('PO_NO', $WIP)
                    ->get();  
                
            } elseif ( !empty($from) && !empty($to) && !empty($WIP) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_EXF_DT',[$from,$to])
                    ->where('PO_NO', $WIP)
                    ->get();  
                
            } elseif ( !empty($hand_over_from) && !empty($COMMENTS)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_from])
                    ->where('COMMENTS', $COMMENTS)
                    ->get(); 
                
            }   elseif ( !empty($hand_over_from) && !empty($WIP)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('CONFIRMED_EXF', '>=', $hand_over_from)
                    // ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_from])
                    ->where('PO_NO', $WIP)
                    ->get(); 
                
            }  elseif ( !empty($hand_over_from) && !empty($hand_over_to)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->get(); 
                
            }  elseif ( !empty($hand_over_to) && !empty($WIP) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    // ->where('CONFIRMED_EXF', '<=', $hand_over_to)
                    ->where(function ($query) use ($hand_over_to) {
                        $query->where('CONFIRMED_EXF','<=', $hand_over_to)
                            ->orwhereNull('CONFIRMED_EXF');
                    })
                    ->where('PO_NO', $WIP)
                    ->get();  
                
            }   elseif ( !empty($from) && !empty($WIP) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('EXP_EXF_DT', '>=', $from)
                    // ->where('EXP_EXF_DT','>=', $from)
                    ->where('PO_NO', $WIP)
                    ->get();  
                
            }   elseif ( !empty($to) && !empty($WIP) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where(function ($query) use ($to) {
                        $query->where('EXP_EXF_DT','<=', $to)
                            ->orwhereNull('EXP_EXF_DT');
                    })
                    // ->whereBetween('EXP_EXF_DT',[$to, $to])
                    ->where('PO_NO', $WIP)
                    ->get();  
                
            }   elseif ( !empty($hand_over_from) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('CONFIRMED_EXF', '>=', $hand_over_from)
                    // ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_from])
                    // ->where('PO_NO', $WIP)
                    ->get(); 
                
            }   elseif ( !empty($from) ) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('EXP_EXF_DT', '>=', $from)
 
                    ->get();  
                
            }     elseif ( !empty($to) ) {
            
                $poDetails = PoDetails::orderBy('ID','desc')
                   ->where(function ($query) use ($to) {
                        $query->where('EXP_EXF_DT','<=', $to)
                            ->orwhereNull('EXP_EXF_DT');
                    })
                 
                    ->get();  
                
            }   elseif ( !empty($hand_over_to)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('CONFIRMED_EXF', '<=', $hand_over_to)
                    ->get();  
                
=======
            } elseif ( !empty($from) && !empty($to)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                    ->where('COMMENTS', $COMMENTS)
                    ->get(); 
                
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            }  elseif ( !empty($COMMENTS)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('COMMENTS', $COMMENTS)
                    ->get(); 
                
            }  elseif ( !empty($WIP)) {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                    ->where('PO_NO', $WIP)
                    ->get(); 
                
            } else {
                
                $poDetails = PoDetails::orderBy('ID','desc')
                ->whereBetween('CONFIRMED_EXF',[$hand_over_from, $hand_over_to])
                ->get(); 
                
            }
            
            
                
        } else if($type == 4 ) {
             
            $WIP = $request->WIP;
            
            if(!empty($WIP)) {
                $poDetails = PoDetails::orderBy('ID','desc')
                ->where('PO_NO', $WIP)
                ->get(); 
            } else {
               $poDetails = PoDetails::orderBy('ID','desc')
                ->get();  
            }
            
                
        }  else if($type == 5 ) {
             
            $COMMENTS = $request->COMMENTS;
            
            $poDetails = PoDetails::orderBy('ID','desc')
                ->where('COMMENTS', $COMMENTS)
                ->get(); 
                
                
        }   else {
            
            $from = $request->from;
            $to   = $request->to;
            
            $poDetails = PoDetails::orderBy('ID','desc')
                ->whereBetween('EXP_EXF_DT',[$from,$to])
                ->get(); 
        }
       

        return view('admin.order-purchase.details.list_filter',[
            'poDetails' =>  $poDetails,
            'columnSync'    =>  $columnSync,
            'status'            => 3,
            'menu_open'         => 2,
        ]);
    }
    
    public function fileUpload(Request $request) {
       
        $wip  =$request->get('wip_hidden');
        $this->validate($request, [
            'wip_hidden'             =>'required',
           
        ]);
        ini_set('max_execution_time', 0);


        Excel::import(new UsersImport($wip),request()->file('fileToUpload'));
        Session::flash('success','File upload success fully.');
        return redirect('list/order/details');

    }
    
    /***
     *  Purchase updated
     * */
    public function purchaseUpdate(Request $request) {
        
       $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['PO_NO' => $request->wip_id]);
            
        } else if($type == 2) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 3) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
        } else if($type == 4) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['QTY' => $request->QTY]);
            
        } else if($type == 5) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
             ->update(['EXP_EXF_DT' => $request->EXP_DELIVERY]);
             
            $EXP_DELIVERY = $request->EXP_DELIVERY;
            
            $date = Carbon::createFromFormat('Y-m-d', $EXP_DELIVERY)->format('d M Y');
            return $date;
            
             
        } else if($type == 6) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        }else if($type == 7) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
<<<<<<< HEAD
            ->update([
                'CONFIRMED_EXF' => $request->CONFIRMED_EXF,
                'CONFIRMED_EXF_CHANGE_DATE' => date('Y-m-d'),
            ]);
            
            
            $CONFIRMED_EXF = $request->CONFIRMED_EXF;
            if(!empty($CONFIRMED_EXF)) {
               $date = Carbon::createFromFormat('Y-m-d', $CONFIRMED_EXF)->format('d M Y');
                return $date; 
            } else {
                return '';
            }
            
=======
            ->update(['CONFIRMED_EXF' => $request->CONFIRMED_EXF]);
            
            
            $CONFIRMED_EXF = $request->CONFIRMED_EXF;
            $date = Carbon::createFromFormat('Y-m-d', $CONFIRMED_EXF)->format('d M Y');
            return $date;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
           
        } 
        else if($type == 8) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['ETD' => $request->ETD]);
            
            $ETD = $request->ETD;
            
<<<<<<< HEAD
            if(!empty($ETD)) {
                
               $date1 = Carbon::createFromFormat('Y-m-d', $ETD)->format('d M Y');
               
               return $date1; 
            } else {
                return '';
            }
            
=======
            $date = Carbon::createFromFormat('Y-m-d', $ETD)->format('d M Y');
            return $date;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            
        }   else if($type == 9) {
           
            DB::table('w2t_po_details')
            ->where('ID', $request->id)
            ->update(['ETA' => $request->ETA]);
            
            $ETA = $request->ETA;
            
<<<<<<< HEAD
            if(!empty($ETA)) {
                
               $date1 = Carbon::createFromFormat('Y-m-d', $ETA)->format('d M Y');
               
               return $date1; 
            } else {
                return '';
            }
            
           
=======
            $date = Carbon::createFromFormat('Y-m-d', $ETA)->format('d M Y');
            return $date;
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
            
        }  else if($type == 20) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 21) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
        } else if($type == 22) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['QTY' => $request->QTY]);
            
        } else if($type == 23) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
             ->update(['EXP_EXF_DT' => $request->EXP_DELIVERY]);
             
            $EXP_DELIVERY = $request->EXP_DELIVERY;
            
            $date = Carbon::createFromFormat('Y-m-d', $EXP_DELIVERY)->format('d M Y');
            return $date;
             
        } else if($type == 24) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['CONFIRMED_EXF' => $request->CONFIRMED_EXF]);
            
            $CONFIRMED_EXF = $request->CONFIRMED_EXF;
            
            $date = Carbon::createFromFormat('Y-m-d', $CONFIRMED_EXF)->format('d M Y');
            return $date;
            
        }else if($type == 25) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['EX_COMMENTS' => $request->EX_COMMENTS]);
            
        } else if($type == 26) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        }
        else if($type == 27) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['ETD' => $request->ETD]);
            
            $ETD = $request->ETD;
            
            $date = Carbon::createFromFormat('Y-m-d', $ETD)->format('d M Y');
            return $date;
            
        }   else if($type == 28) {
           
            DB::table('w2t_po_details_temporary')
            ->where('ID', $request->id)
            ->update(['ETA' => $request->ETA]);
            
            $ETA = $request->ETA;
            
            $date = Carbon::createFromFormat('Y-m-d', $ETA)->format('d M Y');
            return $date;
            
        } 
    }
    
    public function purchaseUpdateOfSales(Request $request) {
        
       $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['WIP' => $request->WIP]);
            
        } else if($type == 2) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['PO_NO' => $request->PO_NO]);
            
        } else if($type == 3) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['PO_DATE' => $request->PO_DATE]);
            
            $PO_DATE = $request->PO_DATE;
            $date = Carbon::createFromFormat('Y-m-d', $PO_DATE)->format('d M Y');
            return $date;
            
        } else if($type == 4) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['PO_STATUS' => $request->PO_STATUS]);
            
        } else if($type == 5) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
             ->update(['SUPPLIER_NAME' => $request->SUPPLIER_NAME]);
             
        } else if($type == 6) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['SUPPLIER_SITE' => $request->SUPPLIER_SITE]);
            
        }else if($type == 7) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['REQD_EXF_DATE' => $request->REQD_EXF_DATE]);
            
            $REQD_EXF_DATE = $request->REQD_EXF_DATE;
            
            $date = Carbon::createFromFormat('Y-m-d', $REQD_EXF_DATE)->format('d M Y');
            return $date;
            
            
        } 
        else if($type == 8) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['ACK_NO' => $request->ACK_NO]);
            
        }   else if($type == 9) {
           
            DB::table('w2t_po_header')
            ->where('ID', $request->id)
            ->update(['ACK_DATE' => $request->ACK_DATE]);
            
            $ACK_DATE = $request->ACK_DATE;
            $date = Carbon::createFromFormat('Y-m-d', $ACK_DATE)->format('d M Y');
            return $date;
            
        } 
    }
    
    
    public function purchaseUpdateOfSalesCopy(Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            
            $detailsID = $request->detailsID;
            
            $poHeaderCount =DB::table('w2t_po_header')
                ->where('PO_NO', $request->PO_NO)
                ->count();
            
            
            // Count po hader
            if($poHeaderCount == 0) {
                
                return response()->json(
                [
                    'error'=>'PO Number Does Not  Exist',
                    'status'=> 401,
                    
                ]);  
            }
            
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
                    ->update(['PO_NO' => $request->PO_NO]);
            }
            
        } else if($type == 2) {
           
           $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
                    ->update(['ITEM' => $request->ITEM]);
            }
            
        } else if($type == 3) {
            
           $detailsID = $request->detailsID;
           
           foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
                    ->update(['DESCRIPTION' => $request->DESCRIPTION]);
                    
           }
            
        } else if($type == 4) {
           
            $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                ->where('ID', $ID)
                ->update(['QTY' => $request->QTY]);
           }
            
        } else if($type == 5) {
           
            $detailsID = $request->detailsID;
           
           $ETDDT = $request->get('EXP_EXF_DT');
            $EXP_EXF_DT = Carbon::createFromFormat('d/F/Y', $ETDDT)->format('Y-m-d');
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
                    ->update(['EXP_EXF_DT' => $EXP_EXF_DT]);
            }
             
        } else if($type == 6) {
           
            $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                ->where('ID', $ID)
                ->update(['COMMENTS' => $request->COMMENTS]);
            }
            
        }else if($type == 7) {
            
            $detailsID = $request->detailsID;
            $ETDDT = $request->get('CONFIRMED_EXF');
            $CONFIRMED_EXF = Carbon::createFromFormat('d/F/Y', $ETDDT)->format('Y-m-d');
            
             foreach($detailsID as  $ID) { 
                 
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
<<<<<<< HEAD
                    ->update(
                        [
                            'CONFIRMED_EXF' => $CONFIRMED_EXF,
                            'CONFIRMED_EXF_CHANGE_DATE' => date('Y-m-d'),
                        ]);
=======
                    ->update(['CONFIRMED_EXF' => $CONFIRMED_EXF]);
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
             }
            
        } 
        else if($type == 8) {
            
            $detailsID = $request->detailsID;
            $ETDDT     = $request->get('ETD');
            $ETD       = Carbon::createFromFormat('d/F/Y', $ETDDT)->format('Y-m-d');
            
            foreach($detailsID as  $ID) { 
                DB::table('w2t_po_details')
                ->where('ID', $ID)
                ->update(['ETD' => $ETD]);
            }
            
        }   else if($type == 9) {
            
            $detailsID = $request->detailsID;
            $ETADT     = $request->get('ETA');
            $ETA       = Carbon::createFromFormat('d/F/Y', $ETADT)->format('Y-m-d');
         
            foreach($detailsID as  $ID) { 
               
                DB::table('w2t_po_details')
                    ->where('ID', $ID)
                    ->update(['ETA' => $ETA]);
            }
            
            
            die(); 
            
        }  
    }
    
    public function purchaseDetailsUpdateList(Request $request) {
        
  
        
        $detailsID = $request->detailsID;
        
        $poDetails = PoDetails::orderBy('ID','desc')
                ->whereIn('ID', $detailsID)
                ->get(); 
                
        // $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
        //     ->whereIn('ID', $detailsID)
        //     ->get(); 
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->PO_DETAILS_PAGE);
        return view('admin.order-purchase.details.list_filter',[
            'poDetails'  =>  $poDetails,
            'columnSync' =>  $columnSync,
        ]);

    }
    
    
    public function purchaseDetailsDuplicate(Request $request){
        
        $ID = $request->ID;
        
        $poDetailsID = PoDetails::OrderBy('id','desc')->first();
        
        $poDetails = PoDetails::find($ID); 
        $new = $poDetails->replicate();
        $new->ID = $poDetailsID->ID +1;
        $new->save();
        
        $latestID = $new->ID;
        // $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
        //     ->whereIn('ID', $detailsID)
        //     ->get(); 
        
        $poDetailsInfo= PoDetails::find($latestID);
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->PO_DETAILS_PAGE);
        
        return view('admin.order-purchase.details.duplicateRow',[
            'data'       =>  $poDetailsInfo,
            'columnSync' =>  $columnSync,
        ]);
    }
    
    
    public function sortableDataSync(Request $request) {
        
        $i = 0;
        
       if($request->type == 1) {
            
            $result = json_encode($request->sortable_name);
        
            DB::table('w2t_setting_table')->update(
                ['SALES_ORDER_HEADER' => $result]
            );
        
        } elseif($request->type == 2) {
            
            $result = json_encode($request->sortable_name);
        
            DB::table('w2t_setting_table')->update(
                ['SALES_ORDER_DETAILS' => $result]
            );
        
        } else if($request->type == 3) {
            
            $result = json_encode($request->sortable_name);
        
            DB::table('w2t_setting_table')->update(
                ['PO_HEADER_PAGE' => $result]
            );
            
        } else if($request->type == 4) {
            
            $result = json_encode($request->sortable_name);
        
            DB::table('w2t_setting_table')->update(
                ['PO_DETAILS_PAGE' => $result]
            );
            
        }  else if($request->type == 6) {
            
            $result = json_encode($request->sortable_name);
        
            DB::table('w2t_setting_table')->update(
                ['SHIPMENT_DETAILS_PAGE' => $result]
            );
            
        } 
        return 200;
    }
    
    public function purchaseDetailsColumnSwitch(Request $request) {
        
        $i = 0;
        
        $settingTableInfo = DB::table('w2t_setting_column_table')
            ->where('page_name',  $request->page_name)
            ->where('type',  $request->type)
            ->first();
        
        if(!empty($settingTableInfo)) {
            
            DB::table('w2t_setting_column_table')
                ->where('page_name',  $request->page_name)
                ->where('type',  $request->type)
                ->update(
                    [
                        'page_name' => $request->page_name,
                        'status'    => $request->status,
                        'type'     => $request->type,
                    ]
                );
        } else {
            DB::table('w2t_setting_column_table')
                ->insert(
                    [
                        'page_name' => $request->page_name,
                        'status'    => $request->status,
                        'type'     => $request->type,
                    ]
                );
        }
        
            
       
        return 401;
    }
 }
