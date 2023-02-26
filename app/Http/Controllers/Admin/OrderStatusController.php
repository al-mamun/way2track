<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
use App\Models\Wips;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Session;
use URL;
use Validator;


class OrderStatusController extends Controller
{
    
    public function newOrderStatus() {
        
        $orderID  = 1;
        $saledOrderHeaders = SalesOrderHeader::where('WIP', $orderID )->orderBy('ID','desc')->first();
        $salesOrderDetails = SalesOrderDetails::where('WIP', $orderID )->get();
        
        return view('admin.order.header.new-order-status',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'salesOrderDetails' =>  $salesOrderDetails,
            'status'            =>  2,
            'menu_open'         =>  2,
        ]);
    }


    public function newOrderStatusSubmit(Request $request) {
          
         $salesOrderHeader = SalesOrderHeader::where('WIP', $request->get('WIP'))->first();
            
        if(!empty($salesOrderHeader)){
            return response()->json(
                [
                    'error'=>'WIP Already Exists!',
                    'status'=> 401,
                    
                ]);  
        }
    
        $validator   = Validator::make($request->all(), [
            'WIP'                  => 'required|unique:w2t_sales_order_header',
            'PROJECT_NAME'         => 'required',
            'PROJECTMANAGER_EMAIL' => 'required',
            'SALESPERSON_EMAIL'    => 'required',
            'status'               => 'required',
            'date'                 => 'required',
          
        ]);
        
         $date = $request->get('date');
         $TGT_HANDOVER_DT = Carbon::createFromFormat('d/F/Y', $date)->format('Y-m-d');

        if ($validator->passes()) {
            
            $customer = $request->get('customer');
            $salesOrder = new SalesOrderHeader();
            $salesOrder->WIP                     = $request->get('WIP');
            $salesOrder->CUSTOMER_NAME           = $request->get('customer');
            $salesOrder->CUSTOMER_PO_NO          = $request->get('customer');
            $salesOrder->PROJECT_NAME            = $request->get('PROJECT_NAME');
            $salesOrder->SO_STATUS               = $request->get('status');
            $salesOrder->TGT_HANDOVER_DT         = $TGT_HANDOVER_DT;
            $salesOrder->SALESPERSON             = $request->get('SALESPERSON');
            $salesOrder->PROJECTMANAGER          = $request->get('PROJECTMANAGER');
            $salesOrder->PROJECTMANAGER_EMAIL    = $request->get('PROJECTMANAGER_EMAIL');
            $salesOrder->SALESPERSON_EMAIL       = $request->get('SALESPERSON_EMAIL');
            $salesOrder->COMMENTS                = $request->get('comments');
       
            if( $salesOrder->save()) {
            
                $digits_needed = 8;
                $random_number=''; // set up a blank string
                $count = 0;
                
                while ( $count < $digits_needed ) {
                    $random_digit = mt_rand(0, 9);
                    
                    $random_number .= $random_digit;
                    $count++;
                }
    
                $wpNoGenerate = new Wips();
                $wpNoGenerate->WIP         = $request->get('WIP');
                $wpNoGenerate->RAND_NO       = $random_number;
                $wpNoGenerate->save();
                
                return response()->json(
                        [
                            'success'=>'Added new records.',
                            'id'=> $salesOrder->id,
                        ]);
            }
         
          
        }
         return response()->json(['error'=>$validator->errors()->all()]);
        
    }
    

    public function salesOrderListEdit($id) {
     
        $saledOrderHeaders = SalesOrderHeader::where('ID', $id )->first();

        return view('admin.order.header.edit',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            =>  3,
            'menu_open'         =>  2,
        ]);

    }
    
    public function salesUpdate(Request $request) {
        
        $type = $request->type;
        
        if($type == 1) {
            
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['WIP' => $request->wip_id]);
            
        } else if($type == 2) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['SO_STATUS' => $request->SO_STATUS]);
        } else if($type == 3) {
           
        //   $date = $request->get('hand_over_date');
        //  $TGT_HANDOVER_DT = Carbon::createFromFormat('Y-m-d', $date)->format('d/F/Y');
         
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['TGT_HANDOVER_DT' => $request->get('hand_over_date')]);
            
            $date = $request->hand_over_date;
            $TGT_HANDOVER_DT = Carbon::createFromFormat('Y-m-d', $date)->format('d M Y');
            
            return $TGT_HANDOVER_DT;
        } else if($type == 4) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['PROJECTMANAGER_EMAIL' => $request->PROJECTMANAGER_EMAIL]);
        } else if($type == 5) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
             ->update(['SALESPERSON_EMAIL' => $request->SALESPERSON_EMAIL]);
             
        } else if($type == 6) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['COMMENTS' => $request->COMMENTS]);
        }else if($type == 7) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['CUSTOMER_NAME' => $request->CUSTOMER_NAME]);
        }else if($type == 8) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['PROJECT_NAME' => $request->PROJECT_NAME]);
            
        } else if($type == 9) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['SALESPERSON' => $request->SALESPERSON]);
            
        } else if($type == 10) {
           
            DB::table('w2t_sales_order_header')
            ->where('ID', $request->id)
            ->update(['PROJECTMANAGER' => $request->PROJECTMANAGER]);
            
        }
          
       
    }
    
    public function salesSendEmail($id) {
        
        $salesOrderHeaders = SalesOrderHeader::where('ID', $id )->first();
        
          $wpInfo = Wips::where('WIP', $salesOrderHeaders->WIP)
            ->first();
            
         $url = '/order/'.$wpInfo->WIP.$wpInfo->RAND_NO;   
            
        $data = array(
            'name'=>"way2track",
            'PROJECTMANAGER_EMAIL' => $salesOrderHeaders->PROJECTMANAGER_EMAIL,
            'SALESPERSON_EMAIL'    => $salesOrderHeaders->SALESPERSON_EMAIL,
            'WIP'                  => $salesOrderHeaders->WIP,
            'from_message'         => $url,
        );
       
        Mail::send(['html' => 'url_mail'], compact('data'), function($message) use ($data) {
             $message->to($data['SALESPERSON_EMAIL'], 'Devpt')->subject
                ('Sale Person Email');
             $message->from('info@way2track.com','way2track-WIP-'.$data['WIP']);
        });
        
        Mail::send(['html' => 'url_mail'], compact('data'), function($message) use ($data) {
             $message->to($data['PROJECTMANAGER_EMAIL'], 'Devpt')->subject
                ('Project Manager Email');
             $message->from('info@way2track.com','way2track-WIP-'.$data['WIP']);
        });
                
        return redirect('/list/order/status')->with([
            'status' => 1,
            'success' => "Email sent successfully with order url .",
        ]);
    }

    public function orderStatusWithId($id){

        $saledOrderHeaders = SalesOrderHeader::where('ID', $id )->get();
    
        return view('admin.order.header.list-order-status',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            => 3,
            'menu_open'         => 2,
            'request_id'       => $id
        ]);
    }

    public function salesOrderListUpdate(Request $request,$id) {
        
      
        
            $saverOrder =   SalesOrderHeader::where('ID', $id )->update(
            [
               
                'WIP'                  => $request->WIP,
                'CUSTOMER_NAME'        => $request->CUSTOMER_NAME,
                'CUSTOMER_PO_NO'       => $request->CUSTOMER_PO_NO,
                'PROJECT_NAME'         => $request->PROJECT_NAME,
                'SO_STATUS'            => ' ',
                'TGT_HANDOVER_DT'      => $request->TGT_HANDOVER_DT,
                'PROJECTMANAGER_EMAIL' => $request->PROJECTMANAGER_EMAIL,
                'SALESPERSON_EMAIL'    => $request->SALESPERSON_EMAIL,
                'COMMENTS'             => $request->COMMENTS,
            ]
        );
       
        return redirect('/list/order/status')->with([
            'status' => 1,
            'success' => "Success fully order status update.",
        ]);
        
    }

    public function salesOrderListDelete($WIP) {
        
        
        $salesOrderDetailsInfo = SalesOrderDetails::where('WIP', $WIP )->first();  
        if(!empty($salesOrderDetailsInfo)) {
              SalesOrderHeader::where('WIP', $WIP )->delete();
           SalesOrderDetails::where('WIP', $WIP )->delete(); 
        }
       
      
        
        return 201;
        
    }


    public function ListOrderStatus() {
     
        $saledOrderHeaders = SalesOrderHeader::get();

        return view('admin.order.header.list-order-status',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            => 3,
            'menu_open'         => 2,
        ]);
    }
    
   
    
    public function ListOrderStatusExport() {
     
        $saledOrderHeaders = SalesOrderHeader::get();
        
        return view('admin.order.header.list-export',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            => 3,
            'menu_open'         => 2,
        ]);
    }
    
    public function ListOrderStatusFilter(Request $request) {
        
        $type   = $request->type;
       
      
            
        $checkobx = $request->checkbox;
        $from = $request->from;
        $to   = $request->to;
        
        if(empty($checkobx) && empty($from) && empty($to)) {
        
            $salesOrderHeaders = SalesOrderHeader::orderBy('ID','desc')
                ->get(); 
                
            return view('admin.order.header.list-export-search',[
                'saledOrderHeaders' =>  $salesOrderHeaders,
                'status'            => 3,
                'menu_open'         => 2,
            ]);
        }
        if(!empty($checkobx) && !empty($from) && !empty($to)) {
            
            $salesOrderHeaders = SalesOrderHeader::orderBy('ID','desc')
                ->whereBetween('TGT_HANDOVER_DT',[$from,$to ])
                ->whereIn('SO_STATUS', $checkobx)
                ->get(); 
                
        } else if(!empty($from) && !empty($to)) {
            
            $salesOrderHeaders = SalesOrderHeader::orderBy('ID','desc')
                ->whereBetween('TGT_HANDOVER_DT',[$from,$to ])
                ->get(); 
                
        } else if(!empty($from) && !empty($to)) {
            
            $salesOrderHeaders = SalesOrderHeader::orderBy('ID','desc')
                ->whereBetween('TGT_HANDOVER_DT',[$from,$to ])
                ->get(); 
                
        } else {
            
            $salesOrderHeaders = SalesOrderHeader::orderBy('ID','desc')
               ->whereIn('SO_STATUS', $checkobx)
                ->get(); 
        }
            
            
      
       

       return view('admin.order.header.list-export-search',[
            'saledOrderHeaders' =>  $salesOrderHeaders,
            'status'            => 3,
            'menu_open'         => 2,
        ]);
 
    }


    public function fileUpload(Request $request) {
        
        if( $request->hasFile('fileToUpload')) {
            
            $this->validate($request, [
                    'fileToUpload' => 'mimes:csv,xlsx,xls,odt,ods,odp',
                    'wip_hidden'  => 'required',
                ]
                ,
                [
                    'fileToUpload.mimes' => 'The file to upload must be a file of type: csv, XLSX, XLS.',
                    'wip_hidden.required' => 'please select header first!'
                ]
            );
          
            
            $spreadsheet = IOFactory::load(request()->file('fileToUpload'));
            
       
            $i = 0;
            $path= public_path().'/images/sales/'.$request->get('session_id');
            
            if(!File::exists( $path)) {
               File::makeDirectory($path, 0777, true, true);
            }
            
            $checkExistFirst = DB::table('w2t_wips')
                ->where('WIP', $request->get('wip_hidden'))
                ->first();
                
            if(!empty($checkExistFirst) && !empty($checkExistFirst->IMPORTED_FILES_NAME)){
                
                $array = explode(',' , $checkExistFirst->IMPORTED_FILES_NAME);
                
                foreach($array as $key=>$value) {
                    if(!empty($value) && $value ==  request()->file('fileToUpload')->getClientOriginalName()) {
                        Session::flash('error','This file has been already imported!');
                        return redirect('list/order/status');
                    }
                }
            }
            foreach ($spreadsheet->getActiveSheet()->getDrawingCollection() as $key => $drawing) {
               
                $mapDrawingList = explode('B',$drawing->getCoordinates());
                $mapDrawingListC = explode('C',$drawing->getCoordinates());
               
                if(!empty($mapDrawingList[1])) {
                    if ($drawing instanceof MemoryDrawing) {
                        
                        //  echo "<pre>";
                        
                            // print_r();
                        
                        ob_start();
                        call_user_func(
                            $drawing->getRenderingFunction(),
                            $drawing->getImageResource()
                        );
                        $imageContents = ob_get_contents();
                        ob_end_clean();
                        switch ($drawing->getMimeType()) {
                            case MemoryDrawing::MIMETYPE_PNG :
                                $extension = 'png';
                                break;
                            case MemoryDrawing::MIMETYPE_GIF:
                                $extension = 'gif';
                                break;
                            case MemoryDrawing::MIMETYPE_JPEG :
                                $extension = 'jpg';
                                break;
                        }
                      
                       
                    } else {
                        
                        $zipReader = fopen($drawing->getPath(), 'r');
                        $imageContents = '';
                        while (!feof($zipReader)) {
                            $imageContents .= fread($zipReader, 1024);
                        }
                        fclose($zipReader);
                        $extension = $drawing->getExtension();
                    }
                    
                    $myFileName = $request->get('session_id').'_'.time() .++$i. '.' . $extension;
                    file_put_contents('images/'. $myFileName, $imageContents);
                 
              
                    DB::table('w2t_sales_image')->insert(
                        [
                            'WIP'          => $request->get('wip_hidden'), 
                            'uniq_id'      => $request->get('session_id'), 
                            'key'          => $key,
                            'image'        => $myFileName,
                            'cell_number'  => $drawing->getCoordinates()
                        ]
                    );
        
                
                }
                elseif(!empty($mapDrawingListC[1])) {
                     if ($drawing instanceof MemoryDrawing) {
                        
                        //  echo "<pre>";
                        
                            // print_r();
                        
                        ob_start();
                        call_user_func(
                            $drawing->getRenderingFunction(),
                            $drawing->getImageResource()
                        );
                        $imageContents = ob_get_contents();
                        ob_end_clean();
                        switch ($drawing->getMimeType()) {
                            case MemoryDrawing::MIMETYPE_PNG :
                                $extension = 'png';
                                break;
                            case MemoryDrawing::MIMETYPE_GIF:
                                $extension = 'gif';
                                break;
                            case MemoryDrawing::MIMETYPE_JPEG :
                                $extension = 'jpg';
                                break;
                        }
                      
                       
                    } else {
                        
                        $zipReader = fopen($drawing->getPath(), 'r');
                        $imageContents = '';
                        while (!feof($zipReader)) {
                            $imageContents .= fread($zipReader, 1024);
                        }
                        fclose($zipReader);
                        $extension = $drawing->getExtension();
                    }
                    
                    $myFileName = $request->get('session_id').'_'.time() .++$i. '.' . $extension;
                    file_put_contents('images/'. $myFileName, $imageContents);
                 
              
                    DB::table('w2t_sales_image')->insert(
                        [
                            'WIP'          => $request->get('wip_hidden'), 
                            'uniq_id'      => $request->get('session_id'), 
                            'key'          => $key,
                            'image'        => $myFileName,
                            'cell_number'  => $drawing->getCoordinates()
                        ]
                    );
                }
            }
        
            $wipNo  = 
            array(
                'wip'        => $request->get('wip_hidden'),
                'sesison_id' => $request->get('session_id'),
                );
           
            $this->validate($request, [
                'wip_hidden'             =>'required',
            ]);
            
             $session_id  =$request->get('session_id');
            
            ini_set('max_execution_time', 0);
    
            $fileExtension = $request->file('fileToUpload')->getClientOriginalExtension();
            // die();
            Excel::import(new UsersImport($wipNo),request()->file('fileToUpload'),$fileExtension);
        
            $checkExist = DB::table('w2t_wips')
                ->where('WIP', $request->get('wip_hidden'))
                ->first();
                
            if(!empty($checkExist) && !empty($checkExist->IMPORTED_FILES_NAME)){
                
                $importFileName = $checkExist->IMPORTED_FILES_NAME.','. request()->file('fileToUpload')->getClientOriginalName();
            } else {
                $importFileName =  request()->file('fileToUpload')->getClientOriginalName();
            }
            
            DB::table('w2t_wips')
                ->where('WIP', $request->get('wip_hidden'))
                ->update(['IMPORTED_FILES_NAME' => $importFileName]);
            
            
            Session::flash('success','File uploaded. PLEASE REVIEW AND CLICK SAVE BELOW.');
     
            return redirect('list/order/details?token='.$session_id);
        } else {
            Session::flash('error','Please select a file to import first.');
         
            return redirect('list/order/status');
        }

    }
   
}
