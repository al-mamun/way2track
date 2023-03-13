<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PoHeader;
use App\Models\ShipmentDetail;
use App\Models\PoDetails;
use App\Models\SalesOrderHeader;
use App\Models\SalesOrderDetails;
use App\Models\PoDetailsTemp;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\PurchaseImport;
use CurlFile;
use Storage;
use Validator;
use Carbon\Carbon;
use DB;

class PurchaseOrderHeader extends Controller
{
    
    public function create() {
        
        $orderID  = 1;
        
        return view('admin.order-purchase.header.new',[
          
            'status'            =>  6,
            'menu_open'         =>  3,
        ]);
    }
    
    
    public function supplierList(Request $request) {
        
        $salesOrderDetails = SalesOrderDetails::where('WIP',$request->wip )
            ->select('SUPPLIER')
            ->groupBy('SUPPLIER')
            ->get();
        
        return view('admin.order-purchase.header.supplier_list_dropdown',[
            'salesOrderDetails'  =>  $salesOrderDetails,
            'WIP'  =>  $request->wip,
        ]);
    }

    public function store(Request $request) {

        $customer = $request->get('customer');
        $firstLastPONO =  $request->get('PO_NO') .'-'. $request->get('PO_NO_LAST');
        
        $poOrderHeader = PoHeader::where('PO_NO', $firstLastPONO)->count();
        
        if($poOrderHeader > 0) {
            
            return response()->json(
                [
                    'error'=>'PO Number Already Exist',
                    'status'=> 401,
                    
                ]);  
        }
            
        $validator   = Validator::make($request->all(), [
            'WIP'                  => 'required',
            'PO_NO'                => 'required|unique:w2t_po_header',
            'PO_STATUS'            => 'required',
            'REQD_EXF_DATE'        => 'required',
            'PO_DATE'              => 'required',
            'SUPPLIER_NAME'        => 'required',
            'SUPPLIER_SITE'        => 'required',
        ]
        );
        
        if ($validator->passes()) {
            
            $salesOrderHeader = SalesOrderHeader::where('WIP', $request->get('WIP'))->first();
            
            if(empty($salesOrderHeader)){
                return response()->json(
                    [
                        'error'=>'WIP Number Does Not Exist',
                        'status'=> 401,
                        
                    ]);  
            }
            
            // Po date
            $PO_DATE = $request->get('PO_DATE');
            $PODATE = Carbon::createFromFormat('d/F/Y', $PO_DATE)->format('Y-m-d');
            
            // ACK date
            $ACKDATEE = $request->get('ACK_DATE');
            if(!empty($ACKDATEE)) {
               $ACKDATEE = Carbon::createFromFormat('d/F/Y', $ACKDATEE)->format('Y-m-d'); 
            }
            
            // REQD EXF date
            $REQDEXFDATE = $request->get('REQD_EXF_DATE');
            $REQD_EXF_DATE = Carbon::createFromFormat('d/F/Y', $REQDEXFDATE)->format('Y-m-d');
            
            
            $salesOrder = new PoHeader();
            $salesOrder->WIP                  = $request->get('WIP');
            $salesOrder->PO_NO                = $firstLastPONO;
            $salesOrder->PO_DATE              = $PODATE;
            $salesOrder->SUPPLIER_NAME        = $request->get('SUPPLIER_NAME');
            $salesOrder->SUPPLIER_SITE        = $request->get('SUPPLIER_SITE');
            $salesOrder->PO_STATUS            = $request->get('PO_STATUS');
            $salesOrder->REQD_EXF_DATE        = $REQD_EXF_DATE;
            $salesOrder->SUPPLIER_REF_NO      = $request->get('SUPPLIER_REF_NO');
            $salesOrder->ACK_NO               = $request->get('ACK_NO');
            $salesOrder->ACK_DATE             = $ACKDATEE;
           
            if( $salesOrder->save()) {
                
                if(!empty($request->SUPPLIER_NAME)) {
                    
                    $supplierCheck = DB::table('w2t_sales_order_detail')
                        ->where('WIP', $request->WIP)
                        ->where('SUPPLIER','like', '%'.$request->SUPPLIER_NAME.'%' )
                        ->get();
                    
                    foreach($supplierCheck as $checkInfo) {
                        
                        if(!empty($checkInfo)) {
                            
                            if(!empty($checkInfo->STATUS_ACTIVATION)) {
                                $statusActivation = $checkInfo->STATUS_ACTIVATION.','.$request->SUPPLIER_NAME;
                            } else {
                                $statusActivation = $request->SUPPLIER_NAME;
                            }
                            
                             DB::table('w2t_sales_order_detail')
                                ->where('ID', $checkInfo->ID)
                                ->update(['STATUS_ACTIVATION' => $statusActivation]);
                                
                        
                            $checkArray = DB::table('w2t_sales_order_detail')
                                ->where('ID', $checkInfo->ID)
                                ->first();
                                
                            $activationArray = explode(',', $checkArray->STATUS_ACTIVATION);
                            
                            $supplarArray = explode(',', $checkArray->SUPPLIER);   
                            
                            
                            if(count($supplarArray) > 0) {
                                $trimArray = [];
                                foreach($supplarArray as $trimData) {
                                     if(!empty($trimData)) {
                                         $trimArray[] = trim($trimData);
                                     }
                                }
                                 
                            } else{
                               $trimArray = explode(',', $checkArray->SUPPLIER);    
                            }
                          
                            $result = array_diff($trimArray,$activationArray);
                            
                            
                            $checkPreviousId = DB::table('w2t_sod_comment_values')
                                ->where('VALID_EX_COMMENT','ORDERED')
                                ->first();
                                
                            
                            $prevoucList = DB::table('w2t_sod_comment_values')
                                ->where('FLOW','<' ,$checkPreviousId->FLOW )
                                ->pluck('VALID_EX_COMMENT');
                            
                     
                            
                            if(empty($result)) {
                                DB::table('w2t_sales_order_detail')
                                    ->where('ID', $checkInfo->ID)
                                    ->whereIn('EX_COMMENTS', $prevoucList)
                                    ->update(['EX_COMMENTS' => 'ORDERED']);
                            }
                
                        
                        } else {
                            
                            // $supplierCheckList = DB::table('w2t_sales_order_detail')
                            //     ->where('WIP', $request->WIP)
                            //     ->where('SUPPLIER', $request->SUPPLIER_NAME )
                            //     ->first();
                                
                            
                            // if(!empty($supplierCheckList)) {
                            //     $statusActivation = $request->SUPPLIER_NAME;
                                
                            //     DB::table('w2t_sales_order_detail')
                            //         ->where('ID', $supplierCheckList->ID)
                            //         ->update(['STATUS_ACTIVATION' => $statusActivation]);
                            // }
                                
                        } 
                    }
                    
                        
                    // DB::table('w2t_sales_order_detail')
                    //     ->where('WIP', $request->WIP)
                    //     ->where('SUPPLIER', $request->SUPPLIER_NAME)
                    //     ->update(['EX_COMMENTS' => 'ORDERED']);
                  
                }
                
           

           
                 return response()->json(
                    [
                        'success'=>'Added new records.',
                        'id'=> $salesOrder->id,
                    ]);
                // return redirect('list/purchase/order/header')->with([
                //     'status' => 1,
                //     'success' => "Success fully order status create.",
                // ]);
            }
            
        }
         return response()->json(['error'=>$validator->errors()->all()]);
        
    }
    

    public function edit($id) {
     
        $saledOrderHeaders = PoHeader::where('ID', $id )->first();

        return view('admin.order-purchase.header.edit',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            =>  3,
            'menu_open'         =>  2,
        ]);

    }

    public function update(Request $request,$id) {
        
        $customer = $request->get('customer');
        
        $saverOrder =  PoHeader::where('ID', $id)->update(
            [
                'WIP'                  => $request->WIP,
                'PO_NO'                => $request->PO_NO,
                'PO_DATE'              => $request->PO_DATE,
                'SUPPLIER_NAME'        => $request->SUPPLIER_NAME,
                'SUPPLIER_SITE'        => $request->SUPPLIER_SITE,
                'PO_STATUS'            => $request->PO_STATUS,
                'REQD_EXF_DATE'        => $request->REQD_EXF_DATE,
                'SUPPLIER_REF_NO'      => $request->SUPPLIER_REF_NO,
                'ACK_NO'               => $request->ACK_NO,
                'ACK_DATE'             => $request->ACK_DATE,
            ]
        );
        
        
        
        // $salesOrder = PoHeader::where('ID', $id )->first();
        // $salesOrder->WIP              = $request->get('WIP');
        // $salesOrder->PO_NO            = $request->get('PO_NO');
        // $salesOrder->PO_DATE          = $request->get('PO_DATE');
        // $salesOrder->SUPPLIER_NAME    = $request->get('SUPPLIER_NAME');
        // $salesOrder->SUPPLIER_SITE    = $request->get('SUPPLIER_SITE');
        // $salesOrder->PO_STATUS        = $request->get('PO_STATUS');
        // $salesOrder->REQD_EXF_DATE    = $request->get('REQD_EXF_DATE');
        // $salesOrder->SUPPLIER_REF_NO  = $request->get('SUPPLIER_REF_NO');
        // $salesOrder->ACK_NO           = $request->get('ACK_NO');
        // $salesOrder->ACK_DATE         = $request->get('ACK_DATE');
       
       
        return redirect('/list/purchase/order/header')->with([
            'status' => 1,
            'success' => "Success fully order status update.",
        ]);
        
        
    }
    
    public function purchasesOrderImportCsv(Request $request) {
        
        if( $request->hasFile('fileToUpload')) {
            
             $this->validate($request, [
                    'fileToUpload' => 'mimes:csv,xlsx,xls,odt,ods,odp',
                    'wip_hidden_csv'  => 'required',
                ]
                ,
                [
                    'fileToUpload.mimes' => 'The file to upload must be a file of type: csv, XLSX, xls.',
                    'wip_hidden_csv.required' => 'please select header first!'
                ]
            );
            
            $wip         = $request->get('wip_hidden_csv');
            $session_id  = date('Ymdhim');
            
            $wipNo  = array(
                'po_no'        => $request->get('wip_hidden_csv'),
                'session_id'   => $session_id,
            );
            
            
             $this->validate($request, [
                'wip_hidden_csv'             =>'required',
                ]
            );
            
            $csvFile = request()->file('fileToUpload');
            
            $fileExtension = $request->file('fileToUpload')->getClientOriginalExtension();
            
            Excel::import(new PurchaseImport($wipNo),request()->file('fileToUpload'),$fileExtension);
            
            Session::flash('success','File uploaded. PLEASE REVIEW AND CLICK SAVE BELOW.');
         
            $nameFormat = date('ymdh') . rand(0,99999);
            $pdf   =  $nameFormat . $csvFile->getClientOriginalName();
            $csvFile->move(public_path() . '/upload', $pdf);
            
            return redirect('list/purchase/order/details?token='.$session_id);
           // return 100;
            // return redirect('list/order/details?token='.$session_id);
        } else {
            
            Session::flash('error','Please select a file to import first.');
         
            return back();
        }
    }
    
    public function purchasesOrderImport(Request $request) {
         
        if( $request->hasFile('fileToUpload')) {
           
            $wip  =$request->get('wip_hidden');
             
             $this->validate($request, [
                    'fileToUpload' => 'mimes:pdf',
                    'wip_hidden'  => 'required',
                ]
                ,
                [
                    'fileToUpload.mimes' => 'The file to upload must be a file of type: pdf.',
                    'wip_hidden.required' => 'please select header first!'
                ]
            );
        
            $pdf_file = request()->file('fileToUpload');
            $getSize = $pdf_file->getSize();
  
            $nameFormat = date('ymdh') . rand(0,99999);
            
            $pdf   =  $nameFormat . $pdf_file->getClientOriginalName();
            $pdf_file->move(public_path() . '/upload', $pdf);
                 
            $pdf_file1 ='upload/'.$pdf;
        
              
            // Get submitted form data
            $apiKey ="mrramgopal@gmail.com_5ad62162c66c536f73651da08eab4c8d03251b774b65b149ac98f6d5984995f62076dabe";
            $pages = 2;
             
     
            // Create URL
            $url = "https://api.pdf.co/v1/file/upload/get-presigned-url" . 
                "?name=" . $pdf_file .
                "&contenttype=application/octet-stream";
                 
            // Create request
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("x-api-key: " . $apiKey));
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            // Execute request
            $result = curl_exec($curl);
                
            if (curl_errno($curl) == 0)
            {
                $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                 
                if ($status_code == 200)
                {
                    $json = json_decode($result, true);
                     
                    // Get URL to use for the file upload
                    $uploadFileUrl = $json["presignedUrl"];
                    // Get URL of uploaded file to use with later API calls
                    $uploadedFileUrl = $json["url"];
                     
                    // 2. UPLOAD THE FILE TO CLOUD.
                  
                    $localFile = $pdf_file->getClientOriginalName();
                    $fileHandle = fopen($pdf_file1, "r");
                    
                    curl_setopt($curl, CURLOPT_URL, $uploadFileUrl);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array("content-type: application/octet-stream"));
                    curl_setopt($curl, CURLOPT_PUT, true);
                    curl_setopt($curl, CURLOPT_INFILE, $fileHandle);
                    curl_setopt($curl, CURLOPT_INFILESIZE, $getSize);
             
                    // Execute request
                    curl_exec($curl);
                     
                    fclose($fileHandle);
                     
                    if (curl_errno($curl) == 0)
                    {
                        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                         
                        if ($status_code == 200)
                        {
                            // 3. CONVERT UPLOADED PDF FILE TO Excel
                             
                            $this->ExtractCSV($apiKey, $uploadedFileUrl, $pages, $wip,date('Ymdhim'));
                        }
                        else
                        {
                            // Display request error
                            echo "<p>Status code: " . $status_code . "</p>"; 
                            echo "<p>" . $result . "</p>"; 
                        }
                    }
                    else
                    {
                        // Display CURL error
                        echo "Error: " . curl_error($curl);
                    }
                }
                else
                {
                    // Display service reported error
                    echo "<p>Status code: " . $status_code . "</p>"; 
                    echo "<p>" . $result . "</p>"; 
                }
                 
                curl_close($curl);
            }
            else
            {
                // Display CURL error
                echo "Error: " . curl_error($curl);
            }
            
            curl_close($curl);
                $token = date('Ymdhim');
                Session::flash('success','File uploaded. PLEASE REVIEW AND CLICK SAVE BELOW.');
               
                // die();
                return redirect('list/purchase/order/details?token='.$token);
            // }
            
            curl_close($c);
        } else {
            
            Session::flash('error','Please select a file to import first.');
         
            return back();
        }
    }

    public function ExtractCSV($apiKey, $uploadedFileUrl, $pages, $wip,$token) 
    {
        // Create URL
        $url = "https://api.pdf.co/v1/pdf/convert/to/json";
        
        // Prepare requests params
        $parameters = array();
        $parameters["url"] = $uploadedFileUrl;
        $parameters["inline"] = false;
    
        // Create Json payload
        $data = json_encode($parameters);
    
        // Create request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("x-api-key: " . $apiKey, "Content-type: application/json"));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
        // Execute request
        $result = curl_exec($curl);
       
        if (curl_errno($curl) == 0)
        {
            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            
            if ($status_code == 200)
            {
                $json = json_decode($result, true);
                
                if (!isset($json["error"]) || $json["error"] == false)
                {
                        $resultFileUrl = $json["url"];
                        $ch  = curl_init();
                        curl_setopt($ch, CURLOPT_URL, '');
                        curl_setopt($ch, CURLOPT_URL, $resultFileUrl);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 20); 
                        $responseData = curl_exec($ch);
                
                        curl_close($ch);
                        $dataRes = json_decode($responseData)->document->page;
                        
                        $couttoalpage =    explode('"@pageCount": "', $responseData); 
                        $couttoalpage1 =    explode('",', $couttoalpage[1]); 
                        $totalPageas = $couttoalpage1[0];
                           
                         for($i =0; $i <$totalPageas; $i++) {
                            
                          
                            if(empty($dataRes->row)) {
                                $data =  $dataRes[$i]->row;
                                
                                foreach($data as $key => $dataInfo) {
                            
                                // if($key> 22) {
                                    $itemCode = '';
                                    if(!empty($data[$key]->column[5]->text)) {
                                    $itemText = $data[$key]->column[5]->text;
                                    $inputFiled = json_encode($itemText);
                                    $explodeInfo =    explode('text":"', $inputFiled); 
                                    if(!empty($explodeInfo[1])) {
                                        $code = $explodeInfo =    explode('"}', $explodeInfo[1]); 
                                        $itemCode = $code[0]; 
                                    }
                                
                                
                                    $productDescText = $data[$key]->column[1]->text;
                                    
                                    $productDesc = json_encode($productDescText);
                                    $descexplodeInfo =    explode('text":"', $productDesc); 
                                    $descraption ='';
                                    if(!empty($descexplodeInfo[1])) {
                                        $code = $descexplodeInfo =    explode('"}', $descexplodeInfo[1]); 
                                        $descraption = $code[0]; 
                                    }
                                    
                                    $productDescText2 = $data[$key]->column[2]->text;
                                    
                                    $productDesc2 = json_encode($productDescText2);
                                    $descexplodeInfo2 =    explode('text":"', $productDesc2); 
                                    if(!empty($descexplodeInfo2[1])) {
                                        $code = $descexplodeInfo2 =    explode('"}', $descexplodeInfo2[1]); 
                                        $descraption2 = $code[0]; 
                                    }
                                    
                                    $qtyInfo = 0;
                                    $productQty = '';
                                    if(!empty($data[$key]->column[6]->text)) {
                                        $productQty= $data[$key]->column[6]->text;
                                    }
                                    
                                    $productqty = json_encode($productQty);
                                    $qtyexplodeInfo2 =    explode('text":"', $productqty); 
                                    
                                    if(!empty($qtyexplodeInfo2[1])) {
                                        $codeqty = $qtyexplodeInfo2 =    explode('"}', $qtyexplodeInfo2[1]); 
                                        $qtyInfo = $codeqty[0]; 
                                    }
                                    
                                     $qtyInfo7 =0;
                                    
                                    if(!empty($data[$key]->column[7]->text)) {
                                        
                                        $productQty7 = $data[$key]->column[7]->text;
                                        $productqty7 = json_encode($productQty7 );
                                        $qtyexplodeInfo27 =    explode('text":"', $productqty7); 
                                        
                                        if(!empty($qtyexplodeInfo27[1])) {
                                            $codeqty7 = $qtyexplodeInfo27 =    explode('"}', $qtyexplodeInfo27[1]); 
                                            $qtyInfo7 = $codeqty7[0]; 
                                        }
                                    }
                                    
                                    $qtyInfo8 =0;
                                    
                                    if(!empty($data[$key]->column[8]->text)){
                                        $productQty8 = $data[$key]->column[8]->text;
                                        $productqty8 = json_encode($productQty8);
                                        $qtyexplodeInfo28 =    explode('text":"', $productqty8); 
                                        
                                        if(!empty($qtyexplodeInfo28[1])) {
                                            $codeqty8 = $qtyexplodeInfo28 =    explode('"}', $qtyexplodeInfo28[1]); 
                                            $qtyInfo8 = $codeqty8[0]; 
                                        }
                                    }
                                    
                                    $array =[
                                        'qty6' =>   $qtyInfo,  
                                        'qty7' =>   $qtyInfo7,
                                        'qty8' =>   $qtyInfo8,
                                    ];
                                    
                                    $descraption = $descraption;
                                    // $wip  =$request->get('wip_hidden');
                                    if(!empty($descraption2) ) {
                                        $descraption = $descraption.' '.$descraption2;
                                    }
                                    
                                    if(is_numeric($qtyInfo) && $qtyInfo > 0) {
                                        $poDetails = new PoDetailsTemp(); 
                                        $poDetails->PO_NO         = $wip;
                                        $poDetails->ITEM          = $itemCode;
                                        $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                                        $poDetails->QTY           = $qtyInfo;
                                        $poDetails->EXP_EXF_DT    = date('Y-m-d');
                                        $poDetails->ETD           = date('Y-m-d');
                                        $poDetails->ETA           = date('Y-m-d');
                                        $poDetails->CONFIRMED_EXF = date('Y-m-d');
                                        $poDetails->token = $token;
                                        $poDetails->COMMENTS = 'ORDERED';
                                        
                                        $poDetails->save();
                                    
                                    } else {
                                        if(is_numeric($qtyInfo7) && $qtyInfo7 > 0) {
                                            $poDetails = new PoDetailsTemp(); 
                                            $poDetails->PO_NO         = $wip;
                                            $poDetails->ITEM          = $itemCode;
                                            $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                                            $poDetails->QTY           = $qtyInfo7;
                                            $poDetails->EXP_EXF_DT    = date('Y-m-d');
                                            $poDetails->ETD           = date('Y-m-d');
                                            $poDetails->ETA           = date('Y-m-d');
                                            $poDetails->CONFIRMED_EXF = date('Y-m-d');
                                            $poDetails->token =$token;
                                            $poDetails->COMMENTS = 'ORDERED';
                                            $poDetails->save();
                                        }
                                        
                                    }
                                   
                                }
                           
                                  
                            }
                            } else {
                                  $data =  $dataRes->row;
                //                       echo "<pre>";
                // print_r($data);
                                  foreach($data as $key=>$dataInfo) {
                                    
                                    
                                // if($key> 22) {
                                    $itemCode = '';
                                    if(!empty($data[$key]->column[5]->text)) {
                                    $itemText = $data[$key]->column[5]->text;
                                    $inputFiled  = json_encode($itemText);
                                    $explodeInfo = explode('text":"', $inputFiled); 
                                    if(!empty($explodeInfo[1])) {
                                        $code = $explodeInfo =    explode('"}', $explodeInfo[1]); 
                                        $itemCode = $code[0]; 
                                    }
                                
                                
                                    $productDescText = $data[$key]->column[1]->text;
                                    
                                    $productDesc = json_encode($productDescText);
                                    $descexplodeInfo =    explode('text":"', $productDesc); 
                                    $descraption ='';
                                    if(!empty($descexplodeInfo[1])) {
                                        $code = $descexplodeInfo =    explode('"}', $descexplodeInfo[1]); 
                                        $descraption = $code[0]; 
                                    }
                                    
                                    $productDescText2 = $data[$key]->column[2]->text;
                                    
                                    $productDesc2 = json_encode($productDescText2);
                                    $descexplodeInfo2 =    explode('text":"', $productDesc2); 
                                    if(!empty($descexplodeInfo2[1])) {
                                        $code = $descexplodeInfo2 =    explode('"}', $descexplodeInfo2[1]); 
                                        $descraption2 = $code[0]; 
                                    }
                                    
                                     
                                    
                                    $qtyInfo = 0;
                                    $productQty = '';
                                    
                                    
                                     
                                    if(!empty($data[$key]->column[6]->text)) {
                                        $productQty= $data[$key]->column[6]->text;
                                    }
                                    
                                
                                    
                                    $productqty = json_encode($productQty);
                                    
                                    $qtyexplodeInfo2 =    explode('text":"', $productqty); 
                                    
                                    if(!empty($qtyexplodeInfo2[1])) {
                                        $codeqty = $qtyexplodeInfo2 =    explode('"}', $qtyexplodeInfo2[1]); 
                                        $qtyInfo = $codeqty[0]; 
                                    }
                                    
                                     $qtyInfo7 =0;
                                    
                                    if(!empty($data[$key]->column[7]->text)) {
                                        
                                        $productQty7 = $data[$key]->column[7]->text;
                                        $productqty7 = json_encode($productQty7 );
                                        $qtyexplodeInfo27 =    explode('text":"', $productqty7); 
                                        
                                        if(!empty($qtyexplodeInfo27[1])) {
                                            $codeqty7 = $qtyexplodeInfo27 =    explode('"}', $qtyexplodeInfo27[1]); 
                                            $qtyInfo7 = $codeqty7[0]; 
                                        }
                                    }
                                    
                                    
                                    
                                    $qtyInfo8 =0;
                                    
                                    if(!empty($data[$key]->column[8]->text)){
                                        $productQty8 = $data[$key]->column[8]->text;
                                        $productqty8 = json_encode($productQty8);
                                        $qtyexplodeInfo28 =    explode('text":"', $productqty8); 
                                        
                                        if(!empty($qtyexplodeInfo28[1])) {
                                            $codeqty8 = $qtyexplodeInfo28 =    explode('"}', $qtyexplodeInfo28[1]); 
                                            $qtyInfo8 = $codeqty8[0]; 
                                        }
                                    }
                                    
                                    $qtyInfo4 =0;
                                    
                                    if(!empty($data[$key]->column[4]->text)){
                                        $qtyInfo4 = $data[$key]->column[4]->text;
                                        $productqty4 = json_encode($qtyInfo4);
                                        $qtyexplodeInfo42 =    explode('text":"', $productqty4); 
                                        
                                        if(!empty($qtyexplodeInfo42[1])) {
                                            $codeqtyInfo4 = $qtyexplodeInfo42 =    explode('"}', $qtyexplodeInfo42[1]); 
                                            $qtyInfo4 = $codeqtyInfo4[0]; 
                                        }
                                    }
                                    
                                    $array =[
                                        'qty6' =>   $qtyInfo,  
                                        'qty7' =>   $qtyInfo7,
                                        'qty8' =>   $qtyInfo8,
                                        'qty4' =>   $qtyInfo4,
                                    ];
                                    
                                    $descraption = $descraption;
                                    // $wip  =$request->get('wip_hidden');
                                    if(!empty($descraption2) ) {
                                        $descraption = $descraption.' '.$descraption2;
                                    }
                                    
                                    if(is_numeric($qtyInfo) && $qtyInfo > 0) {
                                        $poDetails = new PoDetailsTemp(); 
                            		    $poDetails->PO_NO         = $wip;
                            		    $poDetails->ITEM          = $itemCode;
                            		    $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                            		    $poDetails->QTY           = $qtyInfo;
                            		    $poDetails->EXP_EXF_DT    = date('Y-m-d');
                            		    $poDetails->ETD           = date('Y-m-d');
                            		    $poDetails->ETA           = date('Y-m-d');
                            		    $poDetails->CONFIRMED_EXF = date('Y-m-d');
                            		     $poDetails->COMMENTS = 'ORDERED';
                            		    $poDetails->token =$token;
                            		    $poDetails->save();
                                    
                                    } else {
                                        if(is_numeric($qtyInfo7) && $qtyInfo7 > 0) {
                                            $poDetails = new PoDetailsTemp(); 
                                            $poDetails->PO_NO         = $wip;
                                            $poDetails->ITEM          = $itemCode;
                                            $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                                            $poDetails->QTY           = $qtyInfo7;
                                            $poDetails->EXP_EXF_DT    = date('Y-m-d');
                                            $poDetails->ETD           = date('Y-m-d');
                                            $poDetails->ETA           = date('Y-m-d');
                                            $poDetails->CONFIRMED_EXF = date('Y-m-d');
                                             $poDetails->COMMENTS = 'ORDERED';
                                             $poDetails->token = $token;
                                            $poDetails->save();
                                        }
                                        
                                         if(is_numeric($qtyInfo4) && $qtyInfo4 > 0) {
                                            $poDetails = new PoDetailsTemp(); 
                                            $poDetails->PO_NO         = $wip;
                                            $poDetails->ITEM          = $itemCode;
                                            $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                                            $poDetails->QTY           = $qtyInfo4;
                                            $poDetails->EXP_EXF_DT    = date('Y-m-d');
                                            $poDetails->ETD           = date('Y-m-d');
                                            $poDetails->ETA           = date('Y-m-d');
                                            $poDetails->CONFIRMED_EXF = date('Y-m-d');
                                             $poDetails->COMMENTS     = 'ORDERED';
                                             $poDetails->token        = $token;
                                            $poDetails->save();
                                        }
                                        
                                        
                                    }
                                   
                                 }
                                  
                            }
                            }
                            
                            
                        }
                    } else  {
                        // Display service reported error
                        echo "<p>Error: " . $json["message"] . "</p>"; 
                    }
            }
            else
            {
                // Display request error
                echo "<p>Status code: " . $status_code . "</p>"; 
                echo "<p>" . $result . "</p>"; 
            }
        }
        else
        {
            // Display CURL error
            echo "Error: " . curl_error($curl);
        }
        
        // Cleanup
        curl_close($curl);
    }

    public function testcsv() {
                $resultFileUrl = 'https://pdf-temp-files.s3.us-west-2.amazonaws.com/ZYF830H7AHAAUGQECJ6E17NJAJZG6YB9/_tmp_phpbKuKfx.json?X-Amz-Expires=3600&X-Amz-Security-Token=FwoGZXIvYXdzEAkaDDWXCg6bg2D%2Bp0ZN3yKCAZnQKSYH0D1YVZ%2FCtaCC7BtP1OB9gLHadFzDAuoVWKYyMlY8GsPR5G1c2kHqUcEEqm47Ub2ZQO4a8ubAUWDiVwqiLelzpG8uzEYCcgPbf5YhOTc1chb8KMOmyqFei1pS0k9j0sXeAxJrKPvhzPz770N8CzFRawkP9b9GSny1Nag%2BWSwoyqigngYyKATuoyCMMfiwtk9Ae3Tw3U6qmTNtPPt%2F8AyF1N7iVb0ZJzvL8dH25k0%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIA4NRRSZPHI6GFED6D/20230118/us-west-2/s3/aws4_request&X-Amz-Date=20230118T155252Z&X-Amz-SignedHeaders=host&X-Amz-Signature=0e013220de5176067025062e3a8e885d6bce12e990bd0d3cdd9f8782c55e98ff';
                $ch  = curl_init();
                curl_setopt($ch, CURLOPT_URL, '');
                curl_setopt($ch, CURLOPT_URL, $resultFileUrl);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20); 
                $responseData = curl_exec($ch);
                
                curl_close($ch);
                $dataRes = json_decode($responseData)->document->page;
                
                $couttoalpage =    explode('"@pageCount": "', $responseData); 
                $couttoalpage1 =    explode('",', $couttoalpage[1]); 
                $totalPageas = $couttoalpage1[0] -1;
               
                for($i =0; $i <$totalPageas; $i++) {
                  
                   $data =  $dataRes[$i]->row;
                
                    // echo "<pre>";
                    // print_r($data);
                    // die();
                   $sl = 1;
                    foreach($data as $key => $dataInfo) {
                    
                        // if($key> 22) {
                            $itemCode = '';
                            
                            $itemText = $data[$key]->column[5]->text;
                            $inputFiled = json_encode($itemText);
                            $explodeInfo =    explode('text":"', $inputFiled); 
                            if(!empty($explodeInfo[1])) {
                                $code = $explodeInfo =    explode('"}', $explodeInfo[1]); 
                                $itemCode = $code[0]; 
                            }
                            $productDescText = $data[$key]->column[1]->text;
                            
                            $productDesc = json_encode($productDescText);
                            $descexplodeInfo =    explode('text":"', $productDesc); 
                            $descraption ='';
                            if(!empty($descexplodeInfo[1])) {
                                $code = $descexplodeInfo =    explode('"}', $descexplodeInfo[1]); 
                                $descraption = $code[0]; 
                            }
                            
                            $productDescText2 = $data[$key]->column[2]->text;
                            
                            $productDesc2 = json_encode($productDescText2);
                            $descexplodeInfo2 =    explode('text":"', $productDesc2); 
                            if(!empty($descexplodeInfo2[1])) {
                                $code = $descexplodeInfo2 =    explode('"}', $descexplodeInfo2[1]); 
                                $descraption2 = $code[0]; 
                            }
                            
                            $qtyInfo =0;
                            $productQty= $data[$key]->column[6]->text;
                            
                            $productqty = json_encode($productQty);
                            $qtyexplodeInfo2 =    explode('text":"', $productqty); 
                            
                            if(!empty($qtyexplodeInfo2[1])) {
                                $codeqty = $qtyexplodeInfo2 =    explode('"}', $qtyexplodeInfo2[1]); 
                                $qtyInfo = $codeqty[0]; 
                            }
                     
                            $descraption = $descraption;
                            // $wip  =$request->get('wip_hidden');
                            if(!empty($descraption2) ) {
                                $descraption = $descraption.' '.$descraption2;
                            }
                            
                            $qtyInfo7 =0;
                            
                            if(!empty($data[$key]->column[7]->text)){
                                $productQty7 = $data[$key]->column[7]->text;
                                $productqty7 = json_encode($productQty7 );
                                $qtyexplodeInfo27 =    explode('text":"', $productqty7); 
                                
                                if(!empty($qtyexplodeInfo27[1])) {
                                    $codeqty7 = $qtyexplodeInfo27 =    explode('"}', $qtyexplodeInfo27[1]); 
                                    $qtyInfo7 = $codeqty7[0]; 
                                }
                            }
                            
                            $qtyInfo8 =0;
                            
                            if(!empty($data[$key]->column[8]->text)){
                                $productQty8 = $data[$key]->column[8]->text;
                                $productqty8 = json_encode($productQty8 );
                                $qtyexplodeInfo28 =    explode('text":"', $productqty8); 
                                
                                if(!empty($qtyexplodeInfo28[1])) {
                                    $codeqty8 = $qtyexplodeInfo28 =    explode('"}', $qtyexplodeInfo28[1]); 
                                    $qtyInfo8 = $codeqty8[0]; 
                                }
                            }
                            
                            $array =[
                                'qty6' =>   $qtyInfo,  
                                'qty7' =>   $qtyInfo7,
                                'qty8' =>   $qtyInfo8,
                            ];
                            // echo "<pre>";
                            // print_r($array);
                            // echo "</pre>";
                            if(is_numeric($qtyInfo) && $qtyInfo > 0) {
                                
                                $poDetails = new PoDetails(); 
                    		    $poDetails->PO_NO         = '1232122';
                    		    $poDetails->ITEM          = $itemCode;
                    		    $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                    		    $poDetails->Qty           = $qtyInfo;
                    		    $poDetails->EXP_EXF_DT    = date('Y-m-d');
                    		    $poDetails->ETD           = date('Y-m-d');
                    		    $poDetails->ETA           = date('Y-m-d');
                    		    $poDetails->CONFIRMED_EXF = date('Y-m-d');
                    		    $poDetails->save();
                     
                            }  else {
                                if(is_numeric($qtyInfo7) && $qtyInfo7 > 0) {
                                    $poDetails = new PoDetails(); 
                                    $poDetails->PO_NO         = '1232122';
                                    $poDetails->ITEM          = $itemCode;
                                    $poDetails->DESCRIPTION   = preg_replace("/[^a-zA-Z0-9]+/", " ", $descraption);
                                    $poDetails->Qty           = $qtyInfo7;
                                    $poDetails->EXP_EXF_DT    = date('Y-m-d');
                                    $poDetails->ETD           = date('Y-m-d');
                                    $poDetails->ETA           = date('Y-m-d');
                                    $poDetails->CONFIRMED_EXF = date('Y-m-d');
                                    $poDetails->save();
                                }
                            }
                           
                        // }
                   
                          
                    }
                    
                }
                
                die();
               
    }
    
    public function delete($id) {
        
        $poHeaderInfo = PoHeader::where('ID', $id )->first();
        
        if(!empty($poHeaderInfo)) {
              PoDetails::where('PO_NO', $poHeaderInfo->PO_NO )->delete();
            PoHeader::where('ID', $id )->delete();
          
            
           /* return  "Deleted successfully.";*/
            return redirect('/list/purchase/order/header')->with([
                'status' => 1,
                 'success' => "Deleted successfully.",
             ]);  
        }   
       
    }


    public function list() {
     
        $saledOrderHeaders = PoHeader::orderBy('ID','desc')->get();

        return view('admin.order-purchase.header.list',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            => 7,
            'menu_open'         => 3,
        ]);
    }
    
    public function listShow($id) {
     
        $saledOrderHeaders = PoHeader::where("ID", $id)->orderBy('ID','desc')->get();

        return view('admin.order-purchase.header.list',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'status'            => 7,
            'menu_open'         => 3,
            'id'         => $id,
        ]);
    }
    
    public function listExport(Request $request) {
        
        
        if(!empty($request->WIP)) {
            $poOrderHeaders = PoHeader::orderBy('ID','desc')
                ->where('WIP', $request->WIP)
                ->get();
        } else {
            $poOrderHeaders = PoHeader::orderBy('ID','desc')->get();
        }
        
        
        return view('admin.order-purchase.header.export',[
            'poOrderHeaders'    =>  $poOrderHeaders,
            'WIP'               =>  $request->WIP,
            'status'            => 7,
            'menu_open'         => 3,
        ]);
    }
    
    public function listExportSearch (Request $request) {
        
        $type   = $request->type;
       
        // if($type ==2  ) {
            
        //     $checkobx = $request->checkbox;
        //     $saledOrderHeaders = PoHeader::orderBy('ID','desc')
        //         ->whereIn('PO_STATUS', $checkobx)
        //         ->get(); 
                
        // } else {
            
            $from   = $request->from;
            $to     = $request->to;
            $PO_NO  = $request->PO_NO;
            $checkobx = $request->checkbox;
            
            if(empty($from) && empty($to) &&  empty($PO_NO) &&  empty($checkobx)) {
                
                $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->get(); 
                
                return view('admin.order-purchase.header.export-search',[
                    'saledOrderHeaders' =>  $purchaseOrderHeaders,
                    'status'            => 7,
                    'menu_open'         => 3,
                ]);
            }
            
            if(!empty($from)) {
                $from = Carbon::createFromFormat('d/F/Y', $from)->format('Y-m-d');
            }
            if(!empty($to)) {
                $to = Carbon::createFromFormat('d/F/Y', $to)->format('Y-m-d');
            }
            
            if(!empty($from) && !empty($to) &&  !empty($PO_NO) &&  !empty($checkobx)) {
                
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->whereBetween('po_date',[$from, $to])
                    ->where('PO_NO', $PO_NO)
                    ->whereIn('PO_STATUS', $checkobx)
                    ->get(); 
                    
            } else if(!empty($from) && !empty($to) &&  !empty($checkobx)) {
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->whereBetween('po_date', [$from, $to])
                    ->whereIn('PO_STATUS', $checkobx)
                    ->get(); 
            } else if(!empty($from) && !empty($to) &&  !empty($PO_NO)) {
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->whereBetween('po_date', [$from, $to])
                    ->where('PO_NO', $PO_NO)
                    ->get(); 
                    

            }  else if(!empty($from) && !empty($to) ) {
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->whereBetween('po_date', [$from, $to])
                    ->get(); 
                    
            }   else if(!empty($PO_NO) ) {
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->where('PO_NO', $PO_NO)
                    ->get(); 
                    
            }   else if(!empty($checkobx) ) {
                
                 $purchaseOrderHeaders = PoHeader::orderBy('ID','desc')
                    ->whereIn('PO_STATUS', $checkobx)
                    ->get(); 
            }
           
        // }
       

        return view('admin.order-purchase.header.export-search',[
            'saledOrderHeaders' =>  $purchaseOrderHeaders,
            'status'            => 7,
            'menu_open'         => 3,
        ]);
 
    }

    public function fileUpload(Request $request) {
       
        $wip  =$request->get('wip_hidden');
       
        $this->validate($request, [
            'wip_hidden'             =>'required',
           
        ]);
        ini_set('max_execution_time', 0);

   
        
        Excel::import(new UsersImport($wip), request()->file('fileToUpload'));
        Session::flash('success','File uploaded success fully.');
        return redirect('list/order/details');

    }
}
