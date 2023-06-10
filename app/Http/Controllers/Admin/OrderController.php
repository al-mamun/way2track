<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
use App\Models\SodCommentValue;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\Settings;
use App\Models\SalesOrderDetailstem;
use DB;
use Session;
use Validator;
use Carbon\Carbon;
use URL;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    

    public function newOrderDetails(Request $request) {

        $status     =  4;
        $menu_open  =  2;
        $salesOrderWp = SalesOrderHeader::get();
        $sodCommentValue = SodCommentValue::orderBy('FLOW','ASC')->get();

     

        return view('admin.order.details.new',compact('salesOrderWp', 'menu_open', 'status', 'sodCommentValue'));
    }
    /*
    public function newOrderDetailsSubmit(Request $request) {

         $this->validate($request, [
            'ITEM'             =>'required',
            'Qty'              =>'required',
            'WIP'              => 'required',
        ]);


        if( $request->hasFile('thumbnail_image')) {
            #Image upload section
            $thumbImage         = $request->file('thumbnail_image');
            $input['imagename'] = time().'.'.$thumbImage->getClientOriginalExtension();
            $destinationPath    = public_path('images');

            $thumbImage->move($destinationPath, $input['imagename']);
        }

        $newOrder = new SalesOrderDetails;
        $newOrder->WIP             = $request->WIP;
        $newOrder->ITEM            = $request->ITEM;
        $newOrder->Qty             = $request->Qty;
        $newOrder->DESCRIPTION     = $request->DESCRIPTION;
        $newOrder->comments        = $request->comments;
        $newOrder->EXP_HANDOVER_DT = $request->EXP_HANDOVER_DT;
        $newOrder->thumbnail_image =  isset($input['imagename'])?$input['imagename']:'default.png';
        if( $newOrder->save()) {
            return redirect('/list/order/details')->with([
                'status' => 1,
                'success' => "Success fully order details create.",
            ]);
        }
        Session::flash('success','Created Successfully.');
        return redirect()->route('admin.order.new-order-details');
       
     }

*/
    public function newOrderDetailsSubmitTemp(Request $request) {
        
        $token = $request->token;
        
        $detailsOption = SalesOrderDetailstem::where('temp_time', $token)->get();
        
        foreach($detailsOption as $detailsInfo) {
            
            $newOrder = new SalesOrderDetails;
            $newOrder->WIP             = $detailsInfo->WIP;
            $newOrder->ITEM            = $detailsInfo->ITEM;
            $newOrder->QTY             = $detailsInfo->QTY;
            $newOrder->DESCRIPTION     = !empty($detailsInfo->DESCRIPTION) ? $detailsInfo->DESCRIPTION : '';
            $newOrder->COMMENTS        = $detailsInfo->COMMENTS;
            $newOrder->EXP_HANDOVER_DT = $detailsInfo->EXP_HANDOVER_DT;
            $newOrder->EXP_DELIVERY    = $detailsInfo->EXP_DELIVERY;
            $newOrder->EX_COMMENTS     = $detailsInfo->EX_COMMENTS;
            $newOrder->THUMBNAIL_IMAGE = $detailsInfo->THUMBNAIL_IMAGE;
            $newOrder->IMAGE_ID        = $detailsInfo->IMAGE_ID;
            $newOrder->SUPPLIER        = $detailsInfo->SUPPLIER;
            $newOrder->save();
            
            
        }
        SalesOrderDetailstem::truncate();
        Session::flash('success','File uploaded successfully.');
        
        return redirect('list/order/details');
        
    }
    public function newOrderDetailsSubmit(Request $request) {

        $validator   = Validator::make($request->all(), [
            'WIP'                  => 'required',
            'ITEM'             =>'required',
             'QTY'              =>'required',
          
        ]);
        
        if ($validator->passes()) {
            
            $salesOrderHeader = SalesOrderHeader::where('WIP', $request->get('WIP'))->first();
            
            if(empty($salesOrderHeader)){
                return response()->json(
                    [
                        'error'=>'WIP number invalid',
                        'status'=> 401,
                        
                    ]);  
            }
            
             
            $customer = $request->get('customer');
            $newOrder = new SalesOrderDetails;
        
            if( $request->hasFile('THUMBNAIL_IMAGE')) {
                #Image upload section
                $thumbImage         = $request->file('THUMBNAIL_IMAGE');
                $input['imagename'] = time().'.'.$thumbImage->getClientOriginalExtension();
                $destinationPath    = base_path().Settings::UPLOAD_PATH.'images/';
                
                $thumbImage->move($destinationPath, $input['imagename']);
            }
            //return $request;
            $newOrder = new SalesOrderDetails();
            
            $dateEXP_DELIVERY = $request->get('EXP_DELIVERY');
            $EXP_DELIVERY = Carbon::createFromFormat('d/F/Y', $dateEXP_DELIVERY)->format('Y-m-d');
            
            $dateEXP_HANDOVER_DT = $request->get('EXP_HANDOVER_DT');
            $EXP_HANDOVER_DT = Carbon::createFromFormat('d/F/Y', $dateEXP_HANDOVER_DT)->format('Y-m-d');
            
            $newOrder->WIP             = $request->WIP;
            $newOrder->ITEM            = $request->ITEM;
            $newOrder->QTY             = $request->QTY;
            $newOrder->DESCRIPTION     = !empty($request->DESCRIPTION)?$request->DESCRIPTION:'';
            $newOrder->COMMENTS        = !empty($request->COMMENTS)?$request->COMMENTS:'';
            $newOrder->EX_COMMENTS     = $request->EX_COMMENTS;
            $newOrder->EXP_HANDOVER_DT = $EXP_HANDOVER_DT;
            $newOrder->EXP_DELIVERY    = $EXP_DELIVERY;
            $newOrder->SUPPLIER        = $request->SUPPLIER;
            
            $newOrder->THUMBNAIL_IMAGE = isset($input['imagename'])?$input['imagename']:'default.png';
            if( $newOrder->save()){
                
                return response()->json(
                [
                    'success'=>'Added new records.',
                    'id'=> $newOrder->id,
                ]);
            //   Session::flash('success','Created Successfully.');
            //   return redirect('list/order/details');
          }
          
        }
        
        return response()->json(['error'=>$validator->errors()->all()]);
     }
     
     public function singleSalesImageUpdate(Request $request) {
         
         if( $request->hasFile('THUMBNAIL_IMAGE')) {
         
            #Image upload section
            $thumbImage         = $request->file('THUMBNAIL_IMAGE');
            $input['imagename'] = time().'.'.$thumbImage->getClientOriginalExtension();
            $destinationPath    = base_path().Settings::UPLOAD_PATH.'images/';

            $thumbImage->move($destinationPath, $input['imagename']);
            
        } else {

            $salesOrderDetails  = SalesOrderDetails::where('ID', $id)->first();
            
            $input['imagename'] = $salesOrderDetails->THUMBNAIL_IMAGE;
        }
        
        $ID = $request->SALES_ID;
  
        DB::table('w2t_sales_order_detail')
            ->where('ID', $ID)
            ->update(
                [
                    'THUMBNAIL_IMAGE' => $input['imagename'],
                    'IMAGE_ID' => 0
            
            ]);
       
        return json_encode([
                "status" => 200,
                'image_url' =>Settings::UPLOAD_PATH.'images/'.$input['imagename'],
        ]);
        
        return 401;


     }
     
    public function listOrderEdit($id) {
        $status     =  5;
        $menu_open  =  2;
        $salesOrderWp = SalesOrderHeader::get();
        $salesOrderDetails = SalesOrderDetails::where('ID', $id)->first();
        $sodCommentValue = SodCommentValue::get();
        
        return view('admin.order.details.edit',compact('salesOrderWp','salesOrderDetails', 'menu_open', 'status','sodCommentValue'));
    }

    public function listOrderUpdate(Request $request,$id) {

        $status            =  5;
        $menu_open         =  2;

        $this->validate($request, [
            'ITEM'             =>'required',
            'QTY'              =>'required',
            'WIP'              =>'required',
        ]);


        if( $request->hasFile('THUMBNAIL_IMAGE')) {

            #Image upload section
            $thumbImage         = $request->file('THUMBNAIL_IMAGE');
            $input['imagename'] = time().'.'.$thumbImage->getClientOriginalExtension();
            $destinationPath    = public_path('images');

            $thumbImage->move($destinationPath, $input['imagename']);
        } else {

            $salesOrderDetails  = SalesOrderDetails::where('ID', $id)->first();
            
            $input['imagename'] = $salesOrderDetails->THUMBNAIL_IMAGE;
        }


        $saverOrder =  SalesOrderDetails::where('ID', $id)->update(
            [
                'WIP'             => $request->WIP,
                'ITEM'            => $request->ITEM,
                'QTY'             => $request->QTY,
                'DESCRIPTION'     => $request->DESCRIPTION,
                'COMMENTS'        => $request->EX_COMMENTS,
                'EX_COMMENTS'     => $request->EX_COMMENTS,
                'EXP_HANDOVER_DT' => $request->EXP_HANDOVER_DT,
                'EXP_DELIVERY' => $request->EXP_DELIVERY,
                
                'THUMBNAIL_IMAGE' => isset($input['imagename'])?$input['imagename']:'default.png',
            ]
        );

        return redirect('/list/order/details')->with([
            'status' => 1,
            'success' => "Successfully update order details .",
        ]);
        // $saverOrder->WIP             = $request->WIP;
        // $saverOrder->ITEM            = $request->ITEM;
        // $saverOrder->Qty             = $request->Qty;
        // $saverOrder->DESCRIPTION     = $request->DESCRIPTION;
        // $saverOrder->comments        = $request->comments;
        // $saverOrder->EXP_HANDOVER_DT = $request->EXP_HANDOVER_DT;
        // $saverOrder->thumbnail_image =  isset($input['imagename'])?$input['imagename']:'default.png';
        // if($saverOrder->save()) {
        //     return redirect('/list/order/details')->with([
        //         'status' => 1,
        //         'success' => "Success fully order details create."f
        //     ]);
        // }

    }
    
     public function listOfOrderDetailWIPWise(Request $request,$wip) {
  
        $salesOrderDetails = SalesOrderDetails::latest()->where('WIP', $wip)->get();
        $status     = 5;
        $menu_open  = 2;
        $token  = $request->token;
        $salesOrderDetailsTemp = [];
        
  
        $sodCommentValue = SodCommentValue::get();
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        
        return view('admin.order.details.list',compact('salesOrderDetails','status','menu_open','salesOrderDetailsTemp','token','sodCommentValue','wip','columnSync'));
     }
    /**
     * [listOfOrderDetails description]
     * @return [type] [description]
     */
    public function listOfOrderDetails(Request $request) {

        $salesOrderDetails = SalesOrderDetails::latest()->paginate(1);
        $status                = 5;
        $menu_open             = 2;
        $token                 = $request->token;
        $salesOrderDetailsTemp = [];
        
        if(isset($token)) {
             $salesOrderDetailsTemp = SalesOrderDetailstem::orderBy('id','asc')->where('temp_time',$token)
             ->get(); 
        }
        
        $sodCommentValue = SodCommentValue::get();
        
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        $uploadPath = Settings::UPLOAD_PATH;
        
        return view('admin.order.details.list',compact('salesOrderDetails','status','menu_open','salesOrderDetailsTemp','token','sodCommentValue','columnSync','uploadPath'));

    }
    
    /**
     * [listOfOrderDetails description]
     * @return [type] [description]
     */
    public function listOfOrderDetailsAjax(Request $request) {

         if ($request->ajax()) {
             
            $wip = $request->wip;
            
            if(!empty($wip)) {
                $data = SalesOrderDetails::select('*')
                    ->where('WIP', $wip)
                    ->orderBy('id','desc');
            } else {
                $data = SalesOrderDetails::select('*')->orderBy('id','desc');
            }
            
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('WIP', function ($dataInfo) {
                	     return '<div class="edit_wip_no" style="background-color:#E8ECF1;"  id="'.$dataInfo->ID.'">
                    						<span id="wip_'.$dataInfo->ID.'" class="text">'.$dataInfo->WIP.'</span>
                    						<input type="text" value="'. $dataInfo->WIP.'" class="editbox" id="wip_input_'. $dataInfo->ID.'" style="display:none">
                    				  </div>';
                	})
                	->editColumn('ITEM', function ($dataInfo) {
                	     return '<div class="editITEM" style="background-color:#E8ECF1;"  id="'.$dataInfo->ID.'">
                    						<span id="ITEM_'.$dataInfo->ID.'" class="text">'.$dataInfo->ITEM.'</span>
                    						<input type="text" value="'. $dataInfo->ITEM.'" class="editbox" id="ITEM_input_'. $dataInfo->ID.'" style="display:none">
                    				  </div>';
                	})
                	->editColumn('DESCRIPTION', function ($dataInfo) {
                	     return view('admin.order.details.descraption',compact('dataInfo'));
                	
                	})
                	->editColumn('DESCRIPTION2', function ($dataInfo) {
                	    return $dataInfo->DESCRIPTION;
                	
                	})
                	->editColumn('EXP_DELIVERY', function ($dataInfo) {
                	    
                	     return '
                    						<span id="EXP_DELIVERY_'.$dataInfo->ID.'" class="text EXP_DELIVERY_box_text" style="width:80px; display:block">'. date("d M  Y", strtotime($dataInfo->EXP_DELIVERY)) .'</span>
                    						<input type="date" value="'. $dataInfo->EXP_DELIVERY.'" class="editbox" id="EXP_DELIVERY_input_'. $dataInfo->ID.'" style="display:none">
                    	
                    			';
                	})
                	->editColumn('EXP_HANDOVER_DT', function ($dataInfo) {
                	     return '
                    						<span id="EXP_HANDOVER_DT_'.$dataInfo->ID.'" class="text exp_handover_box_text"  style="width:80px; display:block">'.date("d M  Y", strtotime($dataInfo->EXP_HANDOVER_DT)).'</span>
                    						<input type="date" value="'. $dataInfo->EXP_HANDOVER_DT.'" class="editbox" id="EXP_HANDOVER_DT_input_'. $dataInfo->ID.'" style="display:none">
                    			';
                	})
                	->editColumn('QTY', function ($dataInfo) {
                	     return '	<span id="QTY_'.$dataInfo->ID.'" class="text">'.$dataInfo->QTY.'</span>
                    						<input type="number" value="'. $dataInfo->QTY.'" class="editbox" id="QTY_input_'. $dataInfo->ID.'" style="display:none"> ';
                	})
                	->editColumn('EX_COMMENTS', function ($dataInfo) {
                	    
                	         return '
            						<span id="EX_COMMENTS_'.$dataInfo->ID.'" class="text">'.$dataInfo->EX_COMMENTS.'</span>
            						<input type="text" value="'. $dataInfo->EX_COMMENTS.'" class="editbox" id="EX_COMMENTS_input_'. $dataInfo->ID.'" style="display:none">
                    				  ';
                	})
                	->editColumn('COMMENTS', function ($dataInfo) {
                	    
                	         return '
                    						<span id="COMMENTS_'.$dataInfo->ID.'" class="text">'.$dataInfo->COMMENTS.'</span>
                    						<input type="text" value="'. $dataInfo->COMMENTS.'" class="editbox" id="COMMENTS_input_'. $dataInfo->ID.'" style="display:none">
                    				';
                	})
                	->editColumn('SUPPLIER', function ($dataInfo) {
                	    
                	    
                	         return '
                    						<span id="SUPPLIER_'.$dataInfo->ID.'" class="text">'.$dataInfo->SUPPLIER.'</span>
                    						<input type="text" value="'. $dataInfo->SUPPLIER.'" class="editbox" id="SUPPLIER_input_'. $dataInfo->ID.'" style="display:none">
                    				';
                	})
                	
                	->editColumn('THUMBNAIL_IMAGE', function ($dataInfo) {
                	        
                	        $upload_path = Settings::UPLOAD_PATH.'images/';
                	        
                	       // $url = URL::asset('images/'.$dataInfo->THUMBNAIL_IMAGE);
                	        
                	        return view('admin.order.details.image_preview',compact('dataInfo','upload_path'));
                	        
            //     	        return '<a style=" display: block;" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
							     //       <img style="max-width: 80px; display: block;" class="example-image-link" src= '.$url.'>
							     //   </a>';
                	})
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" onclick="deleteData('.$row->ID.')" id="salesOrderDelete" class="btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->escapeColumns([])
                    ->setRowId(function ($user) {
                        return 'sales_id_'.$user->ID;
                    })
                    
                    ->rawColumns(['action'])
              
                    ->make(true);
        }
        
        return view('users');

    }

    public function listOfOrderDetailsShow($id) {

         $orderShow = SalesOrderDetails::get();
         return view('admin.order.new-order-show',compact('orderShow'));

    }
    
    public function listOfOrderDetailsDelete($id){
        $orderDelete = SalesOrderDetails::where('ID', $id)->delete();
        $salesOrderWp = SalesOrderHeader::get();
         
        return redirect('list/order/details')->with([
            'status' => 1,
            'success' => "Deleted successfully.",
        ]);  
      

    }
    
    public function listOfOrderDetailsExpecctedDelivery(Request $request) {
        
        $type       = $request->type;
        $checkobx   = $request->checkbox;
        
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        
        if($type == 3 ) {
            
            
            $WIP        = $request->WIP;
            $COMMENTS   = $request->COMMENTS;
            $from       = $request->from;
            $to         = $request->to;
            $checkobx   = $request->checkbox;
            
            $hand_over_from = $request->hand_over_from;
            $hand_over_to   = $request->hand_over_to;
            
            if(empty($WIP) && empty($COMMENTS) && empty($from)  && empty($to) && empty($hand_over_from) && empty($hand_over_to) &&  empty($checkobx)) {
                
                $salesOrderDetails = SalesOrderDetails::latest()->limit(500)->get();
                
                return view('admin.order.details.result',[
                    'salesOrderDetails' =>  $salesOrderDetails,
                    'columnSync'        =>  $columnSync,
                    'status'            => 3,
                    'menu_open'         => 2,
                ]);
            }
            if(!empty($checkobx)) { // if check box checked 
                
                $checkboxFilter = $this->checkboxFilter($request);
                
                return $checkboxFilter;
                
            }

            if(!empty($WIP)) {
                
                 $wipAllFilter= $this->wpAllFilter($request);
                
                return $wipAllFilter;
               
                    
            }  
            
            if(!empty($COMMENTS)) {
                
                 $commentsAllAllFilter= $this->commentsAllFilter($request);
                
                return $commentsAllAllFilter;
               
                    
            }  
             
             
            if(!empty($COMMENTS))  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get(); 
            }  
            
            if(!empty($from) && !empty($to))  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get(); 
            } 
            
            if(!empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to))  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get(); 
                    
            } else if(!empty($from) && !empty($to))  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get(); 
            } else if(!empty($hand_over_from) && !empty($hand_over_to)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get(); 

            }  else if(!empty($hand_over_from) && !empty($from)) {
                
              
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '>=', $from)
                    ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
                    ->get(); 

            }  else if(!empty($to) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                    ->where('EXP_DELIVERY', '<=', $to)
                    ->get(); 

            } else if(!empty($from) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '>=', $from)
                    ->get(); 
                
                
                    
            } else if(!empty($to)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '<=', $to)
                    ->get();
                    

            }  else if(!empty($hand_over_from) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
                    ->get(); 
                    
            } else if(!empty($hand_over_to)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                    ->get(); 

            }   
           
         }
            
         return $this->ajaxDatatableSearch($salesOrderDetails);   
       
       

    //   return view('admin.order.details.result',[
    //         'salesOrderDetails' =>  $salesOrderDetails,
    //         'columnSync'        =>  $columnSync,
    //         'status'            => 3,
    //         'menu_open'         => 2,
    //     ]);
        
        
    }
    
    private function ajaxDatatableSearch($data) {
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('WIP', function ($dataInfo) {
        	     return '<div class="edit_wip_no" style="background-color:#E8ECF1;"  id="'.$dataInfo->ID.'">
            						<span id="wip_'.$dataInfo->ID.'" class="text">'.$dataInfo->WIP.'</span>
            						<input type="text" value="'. $dataInfo->WIP.'" class="editbox" id="wip_input_'. $dataInfo->ID.'" style="display:none">
            				  </div>';
        	})
        	->editColumn('ITEM', function ($dataInfo) {
        	     return '<div class="editITEM" style="background-color:#E8ECF1;"  id="'.$dataInfo->ID.'">
            						<span id="ITEM_'.$dataInfo->ID.'" class="text">'.$dataInfo->ITEM.'</span>
            						<input type="text" value="'. $dataInfo->ITEM.'" class="editbox" id="ITEM_input_'. $dataInfo->ID.'" style="display:none">
            				  </div>';
        	})
        	->editColumn('DESCRIPTION', function ($dataInfo) {
        	     return view('admin.order.details.descraption',compact('dataInfo'));
        	
        	})
        	->editColumn('DESCRIPTION2', function ($dataInfo) {
                	    return $dataInfo->DESCRIPTION;
                	
                	})
        	->editColumn('EXP_DELIVERY', function ($dataInfo) {
        	    
        	     return '
            						<span id="EXP_DELIVERY_'.$dataInfo->ID.'" class="text EXP_DELIVERY_box_text" style="width:80px; display:block">'. date("d M  Y", strtotime($dataInfo->EXP_DELIVERY)) .'</span>
            						<input type="date" value="'. $dataInfo->EXP_DELIVERY.'" class="editbox" id="EXP_DELIVERY_input_'. $dataInfo->ID.'" style="display:none">
            	
            			';
        	})
        	->editColumn('EXP_HANDOVER_DT', function ($dataInfo) {
        	     return '
            						<span id="EXP_HANDOVER_DT_'.$dataInfo->ID.'" class="text exp_handover_box_text"  style="width:80px; display:block">'.date("d M  Y", strtotime($dataInfo->EXP_HANDOVER_DT)).'</span>
            						<input type="date" value="'. $dataInfo->EXP_HANDOVER_DT.'" class="editbox" id="EXP_HANDOVER_DT_input_'. $dataInfo->ID.'" style="display:none">
            			';
        	})
        	->editColumn('QTY', function ($dataInfo) {
        	     return '	<span id="QTY_'.$dataInfo->ID.'" class="text">'.$dataInfo->QTY.'</span>
            						<input type="number" value="'. $dataInfo->QTY.'" class="editbox" id="QTY_input_'. $dataInfo->ID.'" style="display:none"> ';
        	})
        	->editColumn('EX_COMMENTS', function ($dataInfo) {
        	    
        	         return '
    						<span id="EX_COMMENTS_'.$dataInfo->ID.'" class="text">'.$dataInfo->EX_COMMENTS.'</span>
    						<input type="text" value="'. $dataInfo->EX_COMMENTS.'" class="editbox" id="EX_COMMENTS_input_'. $dataInfo->ID.'" style="display:none">
            				  ';
        	})
        	->editColumn('COMMENTS', function ($dataInfo) {
        	    
        	         return '
            						<span id="COMMENTS_'.$dataInfo->ID.'" class="text">'.$dataInfo->COMMENTS.'</span>
            						<input type="text" value="'. $dataInfo->COMMENTS.'" class="editbox" id="COMMENTS_input_'. $dataInfo->ID.'" style="display:none">
            				';
        	})
        	->editColumn('SUPPLIER', function ($dataInfo) {
        	    
        	    
        	         return '
            						<span id="SUPPLIER_'.$dataInfo->ID.'" class="text">'.$dataInfo->SUPPLIER.'</span>
            						<input type="text" value="'. $dataInfo->SUPPLIER.'" class="editbox" id="SUPPLIER_input_'. $dataInfo->ID.'" style="display:none">
            				';
        	})
        	
        	->editColumn('THUMBNAIL_IMAGE', function ($dataInfo) {
        	    
        	         $upload_path = Settings::UPLOAD_PATH.'images/';
        	        
        	        return view('admin.order.details.image_preview',compact('dataInfo','upload_path'));
        	        
        	   //     return '<a style=" display: block;" class="example-image-link" href="javacript:void(0)" data-lightbox="example-1">
					       //     <img style="max-width: 80px; display: block;" class="example-image-link" src= '.$url.'>
					       // </a>';
        	})
            ->addColumn('action', function($row){

                   $btn = '<a href="javascript:void(0)" onclick="deleteData('.$row->ID.')" id="salesOrderDelete" class="btn btn-danger btn-sm">Delete</a>';

                    return $btn;
            })
            ->escapeColumns([])
            ->setRowId(function ($user) {
                return 'sales_id_'.$user->ID;
            })
            
            ->rawColumns(['action'])
      
            ->make(true);

        return view('users');
    }
    
    private function wpAllFilter($request) {
        
        $WIP        = $request->WIP;
        $COMMENTS   = $request->COMMENTS;
        $from       = $request->from;
        $to         = $request->to;
        $hand_over_from = $request->hand_over_from;
        $hand_over_to   = $request->hand_over_to;
        
        if(!empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to) && !empty($COMMENTS)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                ->where('WIP', $WIP)
                ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->where('EX_COMMENTS', $COMMENTS)
                ->get(); 
                
                
        }  elseif(!empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                 ->where('WIP', $WIP)
                 ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        }   elseif( !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_DELIVERY', '<=', $to)
                ->where('WIP', $WIP)
                ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        }   elseif( !empty($from) && !empty($hand_over_from) && !empty($hand_over_to)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_DELIVERY', '>=', $from)
                ->where('WIP', $WIP)
                ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        }   elseif( !empty($from) && !empty($to) && !empty($hand_over_to)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                ->where('WIP', $WIP)
                ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                ->get(); 
                
                
        }    elseif( !empty($from) && !empty($to) && !empty($hand_over_from)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                ->where('WIP', $WIP)
                ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
                ->get(); 
                
                
        }    else if(!empty($from) && !empty($to) && !empty($COMMENTS) ) {
            
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                ->where('EX_COMMENTS', $COMMENTS)
                 ->where('WIP', $WIP)
                ->get(); 
                
        }  else if(!empty($hand_over_from) && !empty($hand_over_to)  && !empty($COMMENTS) ) {
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->where('EX_COMMENTS', $COMMENTS)
                ->where('WIP', $WIP)
                ->get(); 
                
                
        }  else if(!empty($from) && !empty($to)) {
            
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                 ->where('WIP', $WIP)
                ->get(); 
                
        }  else if(!empty($hand_over_from) && !empty($hand_over_to)) {
            
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                 ->where('WIP', $WIP)
                 ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        }  else if(!empty($from) && !empty($WIP) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '>=', $from)
                    ->where('WIP', $WIP)
                    ->get(); 
                
                
                    
            } else if(!empty($to) && !empty($WIP)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '<=', $to)
                    ->where('WIP', $WIP)
                    ->get();
                    

            }  else if(!empty($hand_over_from) && !empty($WIP) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
                    ->where('WIP', $WIP)
                    ->get(); 
                    
            } else if(!empty($hand_over_to) && !empty($WIP)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                    ->where('WIP', $WIP)
                    ->get(); 

            }  else if(!empty($COMMENTS)) {
            
      
                 $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get(); 
                    
                    
            } else {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('WIP', $WIP)
                    ->get(); 
            }
             
        
       return $this->ajaxDatatableSearch($salesOrderDetails);   
        
    }
    
    private function checkboxFilter($request) {
          
        $WIP        = $request->WIP;
        $COMMENTS   = $request->COMMENTS;
        $from       = $request->from;
        $to         = $request->to;
        $checkobx   = $request->checkbox;
        
        $hand_over_from = $request->hand_over_from;
        $hand_over_to   = $request->hand_over_to;
        
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        
        if($checkobx =='Yes') {
            
             if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get();
                
            } else if(!empty($COMMENTS)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get();
                
            } else if(!empty($hand_over_from) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get();
                
            }  else if(!empty($from) && !empty($to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get();
                
                }  else if(!empty($from) )  {
                
                    $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                        ->where('EXP_DELIVERY', '>=', $from)
                        ->whereNull('THUMBNAIL_IMAGE')
                   
                        ->get(); 
                    
                        
                } else if(!empty($to)) {
                
                    $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                        ->where('EXP_DELIVERY', '<=', $to)
                    
                        ->whereNull('THUMBNAIL_IMAGE')
                        ->get();
                        
    
                }  else if(!empty($hand_over_from)  )  {
                    
                    $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                        ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
             
                        ->whereNull('THUMBNAIL_IMAGE')
                        ->get(); 
                        
                } else if(!empty($hand_over_to) ) {
                
                    $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                        ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
            
                        ->whereNull('THUMBNAIL_IMAGE')
                        ->get(); 
    
                } else if(!empty($WIP)) {
                
                  $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->where('WIP', $WIP)
                    ->get();
                    
            } else {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNull('THUMBNAIL_IMAGE')
                    ->where('THUMBNAIL_IMAGE') 
                    ->get(); 
            }
           
            
        } else if($checkobx =='No') {
            
             if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get();
                
            } else if(!empty($from) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '>=', $from)
                    ->whereNotNull('THUMBNAIL_IMAGE')
       
                    ->get(); 
                
                
                    
            } else if(!empty($to)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '<=', $to)
           
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->get();
                    

            }  else if(!empty($hand_over_from)  )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
                    ->where('WIP', $WIP)
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->get(); 
                    
            } else if(!empty($hand_over_to) ) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
         
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->get(); 

            } else if(!empty($WIP)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
              
                        
                    ->get(); 
            } else {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereNotNull('THUMBNAIL_IMAGE')
                    ->get(); 
            }
                
        } else if($checkobx =='Both') {
            
            
             if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                 
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS) && !empty($from) && !empty($to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get();
                
            } else if( !empty($from) && !empty($to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                
                    ->whereBetween('EXP_DELIVERY',[$from,$to])
                    ->get();
                
            } else if( !empty($hand_over_from) && !empty($hand_over_to)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                    ->get();
                
            } else if(!empty($WIP) && !empty($COMMENTS)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                   
                    ->where('WIP', $WIP)
                    ->where('EX_COMMENTS', $COMMENTS)
                    ->get();
                
            } else if(!empty($from) )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '>=', $from)
                 
                    ->where('WIP', $WIP)
                    ->get(); 
                
                
                    
            } else if(!empty($to)) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_DELIVERY', '<=', $to)
                  
                    ->get();
                    

            }  else if(!empty($hand_over_from)  )  {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
             
                    ->get(); 
                    
            } else if(!empty($hand_over_to) ) {
            
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                
                    ->get(); 

            } else if(!empty($WIP)) {
                
                $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                   ->where('WIP', $WIP)
                    ->get(); 
            } else {
               
               $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                    ->get();  
            }
        }
        
        return $this->ajaxDatatableSearch($salesOrderDetails);   
        return view('admin.order.details.result',[
            'salesOrderDetails' =>  $salesOrderDetails,
            'columnSync'        =>  $columnSync,
            'status'            => 3,
            'menu_open'         => 2,
        ]);
    }
    
    private function commentsAllFilter($request) {
       
        $WIP        = $request->WIP;
        $COMMENTS   = $request->COMMENTS;
        $from       = $request->from;
        $to         = $request->to;
        $hand_over_from = $request->hand_over_from;
        $hand_over_to   = $request->hand_over_to;
        
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        
        if(!empty($from) && !empty($to) && !empty($hand_over_from) && !empty($hand_over_to)) {

            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                  ->where('EX_COMMENTS', $COMMENTS)
                 ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        } else if(!empty($from) && !empty($to)) {
            
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->whereBetween('EXP_DELIVERY',[$from,$to])
                  ->where('EX_COMMENTS', $COMMENTS)
                ->get(); 
                
        }  else if(!empty($hand_over_from) && !empty($hand_over_to)) {
            
      
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EX_COMMENTS', $COMMENTS)
                ->whereBetween('EXP_HANDOVER_DT',[$hand_over_from, $hand_over_to])
                ->get(); 
                
                
        }   else if(!empty($from) )  {
                
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_DELIVERY', '>=', $from)
                ->where('EX_COMMENTS', $COMMENTS)
           
                ->get(); 
            
                
        } else if(!empty($to)) {
        
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_DELIVERY', '<=', $to)
            
                ->where('EX_COMMENTS', $COMMENTS)
                ->get();
                

        }  else if(!empty($hand_over_from)  )  {
            
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_HANDOVER_DT', '>=', $hand_over_from)
     
               ->where('EX_COMMENTS', $COMMENTS)
                ->get(); 
                
        } else if(!empty($hand_over_to) ) {
        
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EXP_HANDOVER_DT', '<=', $hand_over_to)
                ->where('EX_COMMENTS', $COMMENTS)
                ->get(); 

        } else {
            
            $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
                ->where('EX_COMMENTS', $COMMENTS)
                ->get(); 
        }
         
        return $this->ajaxDatatableSearch($salesOrderDetails);   
            
        return view('admin.order.details.result',[
            'salesOrderDetails' =>  $salesOrderDetails,
            'columnSync'        =>  $columnSync,
            'status'            => 3,
            'menu_open'         => 2,
        ]); 
    }
    
    public function newOrderDetailsUpdate(Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['WIP' => $request->wip_id]);
            
        } else if($type == 2) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 3) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
        } else if($type == 4) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['QTY' => $request->QTY]);
            
        } else if($type == 5) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
             ->update(['EXP_DELIVERY' => $request->EXP_DELIVERY]);
             
        } else if($type == 6) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['EXP_HANDOVER_DT' => $request->EXP_HANDOVER_DT]);
            
        }else if($type == 7) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['EX_COMMENTS' => $request->EX_COMMENTS]);
        } else if($type == 8) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
            
        }  else if($type == 9) {
           
            DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->update(['SUPPLIER' => $request->SUPPLIER]);
            
        } else if($type == 11) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['ITEM' => $request->ITEM]);
            
        } else if($type == 12) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['DESCRIPTION' => $request->DESCRIPTION]);
        } else if($type == 13) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['QTY' => $request->QTY]);
        } else if($type == 14) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
             ->update(['EXP_DELIVERY' => $request->EXP_DELIVERY]);
             
             echo date("d M  Y", strtotime( $request->EXP_DELIVERY)) ;
             
        } else if($type == 15) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['EXP_HANDOVER_DT' => $request->EXP_HANDOVER_DT]);
             echo date("d M  Y", strtotime( $request->EXP_HANDOVER_DT)) ;
            
        }else if($type == 16) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['EX_COMMENTS' => $request->EX_COMMENTS]);
        }else if($type == 17) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
        }else if($type == 18) {
           
            DB::table('w2t_sales_order_detail_temporary')
            ->where('ID', $request->id)
            ->update(['SUPPLIER' => $request->SUPPLIER]);
        }
          
       
    }
    
    public function salesDetailsDescraption(Request $request) {
        
        $dataInfo =  DB::table('w2t_sales_order_detail')
            ->where('ID', $request->id)
            ->first();
            
     
         return view('admin.order.details.descraption_ajax',[
            'dataInfo' =>  $dataInfo,
        ]);

    }
   
    public function salesDetailsCommentsUpdate(Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            
            $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_sales_order_detail')
                ->where('ID', $ID)
                ->update(['WIP' => $request->WIP]);  
            }
          
            
        } else if($type == 2) {
           $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                ->where('ID', $ID)
                ->update(['ITEM' => $request->ITEM]);
            }
            
        } else if($type == 3) {
           $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                ->where('ID', $ID)
                ->update(['DESCRIPTION' => $request->DESCRIPTION]);
            
            }
            
            
        } else if($type == 4) {
            $detailsID = $request->detailsID;
             foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                    ->where('ID', $ID)
                    ->update(['QTY' => $request->QTY]);
             }
        } else if($type == 5) {
            
            $dateEXP_DELIVERY = $request->get('EXP_DELIVERY');
            $EXP_DELIVERY = Carbon::createFromFormat('d/F/Y', $dateEXP_DELIVERY)->format('Y-m-d');
        
            $detailsID = $request->detailsID;
            foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                    ->where('ID', $ID)
                    ->update(['EXP_DELIVERY' => $EXP_DELIVERY]);
            }
             
        } else if($type == 6) {
            
            $dateEXP_HANDOVER_DT = $request->get('EXP_HANDOVER_DT');
            $EXP_HANDOVER_DT = Carbon::createFromFormat('d/F/Y', $dateEXP_HANDOVER_DT)->format('Y-m-d');
        
            $detailsID = $request->detailsID;
            foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                    ->where('ID', $ID)
                ->update(['EXP_HANDOVER_DT' => $EXP_HANDOVER_DT]);
            }
            
        }else if($type == 7) {
           
            $detailsID = $request->detailsID;
            foreach($detailsID as  $ID) { 
                
                DB::table('w2t_sales_order_detail')
                    ->where('ID', $ID)
                    ->update(['EX_COMMENTS' => $request->EX_COMMENTS]);
            }
        }else if($type == 8) {
           
            $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_sales_order_detail')
                ->where('ID', $ID)
                ->update(['COMMENTS' => $request->COMMENTS]);  
            }
           
            
        }else if($type == 9) {
           
            $detailsID = $request->detailsID;
           
            foreach($detailsID as  $ID) { 
                DB::table('w2t_sales_order_detail')
                ->where('ID', $ID)
                ->update(['SUPPLIER' => $request->supplier_box]);  
            }
           
            
        }
          
       
    }
    
    
    public function saledDetailsUpdateList(Request $request) {
        
        $detailsID = $request->detailsID;
        
        $salesOrderDetails = SalesOrderDetails::orderBy('ID','desc')
            ->whereIn('ID', $detailsID)
            ->get(); 
        $columnSync        = DB::table('w2t_setting_table')->first();
        
        $columnSync        =  json_decode($columnSync->SALES_ORDER_DETAILS);
        return view('admin.order.details.result',[
            'salesOrderDetails' =>  $salesOrderDetails,
            'columnSync'        =>  $columnSync,
        ]);
    }
  
}


