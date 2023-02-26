<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;
use App\Models\Wips;
use DB;

class OrderController extends Controller
{
    
    public function generateUniqID() {
        
        $salesOrderHeader = SalesOrderHeader::get();
        
        foreach($salesOrderHeader as $headerInfo) {
            $digits_needed = 8;
            $random_number=''; // set up a blank string
            $count = 0;
            
            while ( $count < $digits_needed ) {
                $random_digit = mt_rand(0, 9);
                
                $random_number .= $random_digit;
                $count++;
            }

            $wpNoGenerate = new Wips();
            $wpNoGenerate->WIP                     = $headerInfo->WIP;
            $wpNoGenerate->RAND_NO                  = $random_number;
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
            $salesOrderDetails = SalesOrderDetails::where('WIP', $orderIDFirst )->get();
            
            // $comments = DB::select( DB::raw("SELECT distinct `EX_COMMENTS`, `EXP_DELIVERY` , count(1) as NO_OF_ITEMS,SOD.wip as wipNumber FROM `w2t_sales_order_detail` where `WIP`='$orderIDFirst' group by `EX_COMMENTS`, `EXP_DELIVERY` order by EXP_DELIVERY desc"));
            
            $comments = DB::select( DB::raw("SELECT DISTINCT SOD.`EX_COMMENTS` AS  `Fullfilment_Status`, SOD.`EXP_DELIVERY` as `Expected_Delivery`, SOD.`wip` as wipNumber , count(1) AS 

                `No_Of_Items` 
                FROM `w2t_sales_order_detail` SOD , `w2t_sod_comment_values` ECV WHERE SOD.`EX_COMMENTS`= 
                
                ECV.`VALID_EX_COMMENT` and SOD.`wip` = '$orderIDFirst'
                
                GROUP by SOD.`EX_COMMENTS`, SOD.`EXP_DELIVERY` 
                ORDER BY ECV.FLOW ASC , `Expected_Delivery` DESC"));
            
            // print_r($dalyComments);
            // die();
            return view('order.details',[
                'saledOrderHeaders' =>  $saledOrderHeaders,
                'salesOrderDetails' =>  $salesOrderDetails,
                'comments'          =>  $comments,
                'orderID'           =>  $orderIDFirst,
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
             $comments = DB::select( DB::raw("SELECT *  FROM `w2t_sales_order_detail`  where  `WIP`=$orderID and  `EX_COMMENTS`= '$comments' "));
        } else {
            $comments = DB::select( DB::raw("SELECT *  FROM `w2t_sales_order_detail`  where  `WIP`=$orderID and  `EX_COMMENTS`= '$comments' and  `EXP_DELIVERY` = '$delivery'"));
        }
        
        
   
        return view('order.details-coments',[
            'commentsInfo' =>  $comments,
        ]);
    }
    
    
}
