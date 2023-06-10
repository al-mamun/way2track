<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
use App\Models\Settings;
use App\Models\Wips;
use Jenssegers\Agent\Agent;
use DB;

class OrderController extends Controller
{
    
    public function generateUniqID() {
        
        $salesOrderHeader = SalesOrderHeader::get();
        
        foreach($salesOrderHeader as $headerInfo) {
            $digits_needed = 8;
            $random_number=''; // set up a blank stringcf
            $count = 0;
            
            while ( $count < $digits_needed ) {
                $random_digit = mt_rand(0, 9);
                
                $random_number .= $random_digit;
                $count++;
            }

            $wpNoGenerate = new Wips();
            $wpNoGenerate->WIP          = $headerInfo->WIP;
            $wpNoGenerate->RAND_NO      = $random_number;
            $wpNoGenerate->save();
        }
    }
    
    public function orderDetails($orderID) {
        
        // $orderIDFirst   = substr($orderID, 0, +8);
        $orderLastEight = substr($orderID, -8);
        // rtrim($str1, $orderLastEight);
        
        $firstNumber = explode($orderLastEight, $orderID);
        if(!empty($firstNumber[0])) {
            $orderIDFirst   = $firstNumber[0];
        }
      
        $wpInfo = Wips::where('RAND_NO', $orderLastEight)
            ->where('WIP', $orderIDFirst)
            ->first();
            
        if(!empty($wpInfo)) {
            
            $saledOrderHeaders = SalesOrderHeader::where('WIP', $orderIDFirst )->first();
            $salesOrderDetails = SalesOrderDetails::where('WIP', $orderIDFirst )
                ->leftjoin('w2t_sod_comment_values','w2t_sales_order_detail.EX_COMMENTS','=','w2t_sod_comment_values.VALID_EX_COMMENT')
                ->select('w2t_sod_comment_values.COLOR_CODE','w2t_sales_order_detail.*')
                ->get();
            
            // $comments = DB::select( DB::raw("SELECT distinct `EX_COMMENTS`, `EXP_DELIVERY` , count(1) as NO_OF_ITEMS,SOD.wip as wipNumber FROM `w2t_sales_order_detail` where `WIP`='$orderIDFirst' group by `EX_COMMENTS`, `EXP_DELIVERY` order by EXP_DELIVERY desc"));
            
            $comments = DB::select( DB::raw("SELECT DISTINCT SOD.`EX_COMMENTS` AS  `Fullfilment_Status`, SOD.`EXP_DELIVERY` as `Expected_Delivery`, SOD.`wip` as wipNumber , count(1) AS 

                `No_Of_Items`, SOD.`ITEM` as `Item_list`
                FROM `w2t_sales_order_detail` SOD , `w2t_sod_comment_values` ECV WHERE SOD.`EX_COMMENTS`= 
                
                ECV.`VALID_EX_COMMENT` and SOD.`wip` = '$orderIDFirst'
                
                GROUP by SOD.`EX_COMMENTS`, SOD.`EXP_DELIVERY` , SOD.`ITEM`
                ORDER BY ECV.FLOW ASC , `Expected_Delivery` DESC"));
            
            $commentsList = SalesOrderDetails::where('WIP', $orderIDFirst )
                ->groupBy('EX_COMMENTS')
                ->pluck('EX_COMMENTS');
            
            $StatusWiseList = [];
            foreach($commentsList as $status) {
                
                $itemInfo = SalesOrderDetails::where('WIP', $orderIDFirst )
                    ->where('EX_COMMENTS', $status)
                    ->pluck('ITEM');
                    
                $total = SalesOrderDetails::where('WIP', $orderIDFirst )
                    ->where('EX_COMMENTS', $status)
                    ->count('ITEM');
                
                $itemInfo = $itemInfo->toArray();
                
                if(is_array($itemInfo)) {
                    $itemInfoList = implode(',',$itemInfo);
                } else {
                    $itemInfoList ='';
                }
                
                $colorCodeInfo = DB::table('w2t_sod_comment_values')
               
                    ->where('VALID_EX_COMMENT', $status)
                    ->first();
                    
                $StatusWiseList [] = [
                    'Fullfilment_Status' => $status,
                    'total' => $total,
                    'item' => $itemInfoList,
                    'COLOR_CODE' => !empty($colorCodeInfo->COLOR_CODE) ? $colorCodeInfo->COLOR_CODE: '#222',
                ];
            }
            
            // echo "<pre>";
            // print_r($StatusWiseList);
            // die();
            $agent           = new Agent();
			$isMobileVersion = $agent->isMobile();
	
            return view('order.details',[
                'saledOrderHeaders' =>  $saledOrderHeaders,
                'salesOrderDetails' =>  $salesOrderDetails,
                'comments'          =>  $comments,
                'orderID'           =>  $orderIDFirst,
                'isMobileVersion'   =>  $isMobileVersion,
                'StatusWiseList'    =>  $StatusWiseList,
                'global_path'       =>  Settings::UPLOAD_PATH,
            ]); 
        } else{
           
            return view('errors.404'); 
           
        }
       
        
    }
    public function orderCommentsDelivery(\Illuminate\Http\Request $request) {
        
        $orderID  = $request->orderID;
        $comments = $request->comments;
        $delivery = $request->delivery;
        
        if(empty($delivery)) {
            
             $comments = SalesOrderDetails::where('w2t_sales_order_detail.WIP', $orderID )
                ->leftjoin('w2t_sod_comment_values','w2t_sales_order_detail.EX_COMMENTS','=','w2t_sod_comment_values.VALID_EX_COMMENT')
                ->select('w2t_sod_comment_values.COLOR_CODE','w2t_sales_order_detail.*')
                ->where('w2t_sales_order_detail.EX_COMMENTS', $comments)
                ->get();
                
            //  $comments = DB::select( DB::raw("SELECT *  FROM `w2t_sales_order_detail`  where  `WIP`=$orderID and  `EX_COMMENTS`= '$comments' "));
        } else {
            $comments = DB::select( DB::raw("SELECT *  FROM `w2t_sales_order_detail`  where  `WIP`=$orderID and  `EX_COMMENTS`= '$comments' and  `EXP_DELIVERY` = '$delivery'"));
        }
         $commentsList = SalesOrderDetails::where('WIP', $orderID )
                ->groupBy('EX_COMMENTS')
                ->pluck('EX_COMMENTS');
            
        $StatusWiseList = [];
        foreach($commentsList as $status) {
            
            $itemInfo = SalesOrderDetails::where('WIP', $orderID )
                ->where('EX_COMMENTS', $status)
                ->pluck('ITEM');
                
            $total = SalesOrderDetails::where('WIP', $orderID )
                ->where('EX_COMMENTS', $status)
                ->count('ITEM');
            
            $itemInfo = $itemInfo->toArray();
            
            if(is_array($itemInfo)) {
                $itemInfoList = implode(',',$itemInfo);
            } else {
                $itemInfoList ='';
            }
            $StatusWiseList [] = [
                'Fullfilment_Status' => $status,
                'total' => $total,
                'item' => $itemInfoList,
            ];
        }
        
        $agent = new Agent();
		$isMobileVersion = $agent->isMobile();
		
        return view('order.details-coments',[
            'salesOrderDetails' =>  $comments,
             'isMobileVersion'           =>  $isMobileVersion,
             'StatusWiseList'    =>  $StatusWiseList,
             'global_path'       =>  Settings::UPLOAD_PATH,
        ]);
    }
    
    public function orderCommentsDeliveryCount(\Illuminate\Http\Request $request) {
        
        $orderID  = $request->orderID;
        $comments = $request->comments;
        $delivery = $request->delivery;
        

            
        $total = SalesOrderDetails::where('WIP', $orderID )
                ->where('EX_COMMENTS', $comments)
                ->count('ITEM');
        
        $totalList = SalesOrderDetails::where('WIP', $orderID )
                ->count('ITEM');
                
        $colorCodeInfo = DB::table('w2t_sod_comment_values')
            ->where('VALID_EX_COMMENT', $comments)
            ->first();
                    
        if( !empty($colorCodeInfo->COLOR_CODE) ) {
            $messaege ="<span style='color:".$colorCodeInfo->COLOR_CODE."'>Item Status - ".$comments." : ".$total." of ".$totalList . "</span>";
        }  else {
            $messaege ="<span style='color:#222'>Item Status - ".$comments." : ".$total." of ".$totalList . "</span>";
        }        
        
        return $messaege ;
       
    }
    
    
}
